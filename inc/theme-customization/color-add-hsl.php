<?php
/**
 * Add HSL color values to theme.json
 *
 * @package Simppple
 * @subpackage Theme_Customization
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Convert hex color to HSL values
 *
 * @param string $hex_color Hex color code
 * @return string HSL color values (format: "H,S%,L%")
 */
function simppple_hex_to_hsl(string $hex_color): string {
    $hex = str_replace('#', '', $hex_color);
    $length = strlen($hex);

    // Convert hex to RGB first
    $rgb = $length > 3
        ? str_split($hex, 2)
        : str_split($hex);

    // Convert hex to decimal values
    $r = hexdec($rgb[0]) / 255;
    $g = hexdec($rgb[1]) / 255;
    $b = hexdec($rgb[2]) / 255;

    // Find greatest and smallest values
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);

    // Calculate HSL values
    $l = ($max + $min) / 2;

    if ($max === $min) {
        // Achromatic color (gray)
        $h = $s = 0;
    } else {
        $d = $max - $min;
        $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);

        // Calculate hue
        $h = match ($max) {
            $r => ($g - $b) / $d + ($g < $b ? 6 : 0),
            $g => ($b - $r) / $d + 2,
            default => ($r - $g) / $d + 4
        };

        $h = round($h * 60);
        if ($h < 0) {
            $h += 360;
        }
    }

    return sprintf(
        '%d,%d%%,%d%%',
        $h,
        round($s * 100),
        round($l * 100)
    );
}

/**
 * Get custom color palette from global styles
 *
 * @return array<int, array<string, string>>
 */
function simppple_get_custom_color_palette_hsl(): array {
    $active_theme_slug = get_stylesheet();
    $custom_styles = get_posts([
        'name' => "wp-global-styles-{$active_theme_slug}",
        'post_type' => 'wp_global_styles',
        'post_status' => 'publish'
    ]);

    if (empty($custom_styles)) {
        return [];
    }

    $styles = json_decode($custom_styles[0]->post_content, true);

    return $styles['settings']['color']['palette']['theme'] ?? [];
}

/**
 * Add HSL values to CSS variables in theme.json
 *
 * @param WP_Theme_JSON_Data $theme_json Theme JSON data object
 * @return WP_Theme_JSON_Data Modified theme JSON data
 */
function simppple_add_HSL_values_to_CSS_variables(WP_Theme_JSON_Data $theme_json): WP_Theme_JSON_Data {
    $data = $theme_json->get_data();

    if (empty($data) || !isset($data['settings']['color']['palette']['theme'])) {
        return $theme_json;
    }

    $hsl_color_palette = [];
    $color_palette = $data['settings']['color']['palette']['theme'];

    // Get custom colors if they exist
    $custom_palette = simppple_get_custom_color_palette_hsl();
    if (!empty($custom_palette)) {
        $color_palette = array_map(
            function ($value) use ($custom_palette) {
                $custom_value_key = array_search($value['slug'], array_column($custom_palette, 'slug'));

                return $custom_value_key !== false ? $custom_palette[$custom_value_key] : $value;
            },
            $color_palette
        );
    }

    // Add custom colors from settings if they exist
    if (isset($data['settings']['custom'])) {
        $custom_colors = array_filter(
            $data['settings']['custom'],
            fn($key) => str_starts_with($key, 'color-'),
            ARRAY_FILTER_USE_KEY
        );

        foreach ($custom_colors as $key => $value) {
            $color_palette[] = [
                'color' => $value,
                'slug' => substr($key, strlen('color-'))
            ];
        }
    }

    // Convert colors to HSL
    foreach ($color_palette as $color) {
        if (!str_contains($color['slug'], '-rgb') && !str_contains($color['slug'], '-hsl')) {
            $hsl_color_palette["{$color['slug']}-hsl"] = simppple_hex_to_hsl($color['color']);
        }
    }

    if (!empty($hsl_color_palette)) {
        ksort($hsl_color_palette);

        return $theme_json->update_with([
            'version' => 2,
            'settings' => [
                'custom' => $hsl_color_palette,
            ],
        ]);
    }

    return $theme_json;
}
add_filter('wp_theme_json_data_theme', 'simppple_add_HSL_values_to_CSS_variables');
