<?php

/**
 * Add RGB color values to theme.json
 *
 * @package Simppple
 * @subpackage ThemeCustomization
 */

declare(strict_types=1);

namespace Simppple\ThemeCustomization;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Convert hex color to RGB values
 *
 * @param string $hex_color Hex color code
 * @return string RGB color values
 */
function hex_to_rgb(string $hex_color): string {
    $hex = str_replace('#', '', $hex_color);
    $length = strlen($hex);

    $rgb = $length > 3
        ? str_split($hex, 2)
        : str_split($hex);

    $rgb = array_map('hexdec', $rgb);

    return implode(',', $rgb);
}

/**
 * Get custom color palette from global styles
 *
 * @return array<int, array<string, string>>
 */
function get_custom_color_palette_rgb(): array {
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
 * Add RGB values to CSS variables in theme.json
 *
 * @param $theme_json Theme JSON data object
 */
function add_RGB_values_to_CSS_variables($theme_json) {
    $data = $theme_json->get_data();

    if (empty($data) || !isset($data['settings']['color']['palette']['theme'])) {
        return $theme_json;
    }

    $rgb_color_palette = [];
    $color_palette = $data['settings']['color']['palette']['theme'];

    // Get custom colors if they exist
    $custom_palette = get_custom_color_palette_rgb();
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

    // Convert colors to RGB
    foreach ($color_palette as $color) {
        if (!str_contains($color['slug'], '-rgb') && !str_contains($color['slug'], '-hsl')) {
            $rgb_color_palette["{$color['slug']}-rgb"] = hex_to_rgb($color['color']);
        }
    }

    if (!empty($rgb_color_palette)) {
        ksort($rgb_color_palette);

        return $theme_json->update_with([
            'version' => 2,
            'settings' => [
                'custom' => $rgb_color_palette,
            ],
        ]);
    }

    return $theme_json;
}
add_filter('wp_theme_json_data_theme', __NAMESPACE__ . '\add_RGB_values_to_CSS_variables');
