<?php

if (!defined('ABSPATH')) {
    exit;
}

// https://fullsiteediting.com/lessons/how-to-filter-theme-json-with-php/
function simppple_add_RGB_values_to_CSS_variables($themeJSON) {
    $data = $themeJSON->get_data();

    if (!empty($data)) {

        if (isset($data['settings']['color']['palette']['theme'])) {
            $rgbColorPalette = [];

            $colorPalette = $data['settings']['color']['palette']['theme'];

            if (!empty($colorPalette)) {
                // Query the global styles to find custom color palettes
                $customStyles = false;
                $activeThemeSlug = get_stylesheet();
                $dbCustomStyles = get_posts([
                    'name' => "wp-global-styles-{$activeThemeSlug}",
                    'post_type' => 'wp_global_styles',
                    'post_status' => 'publish'
                ]);

                if (!empty($dbCustomStyles)) {
                    $customStyles = json_decode($dbCustomStyles[0]->post_content, true);
                }

                // find occurences in custom palette and replace them in the original one
                if ($customStyles && isset($customStyles['settings']['color']['palette']['theme'])) {
                    $customPalette = $customStyles['settings']['color']['palette']['theme'];

                    $colorPalette = array_map(function ($value) use ($customPalette) {
                        $customValueKey = array_search($value['slug'], array_column($customPalette, 'slug'));

                        return $customValueKey ? $customPalette[$customValueKey] : $value;
                    }, $colorPalette);
                }

                $colorsPaletteCustom = $data['settings']['custom'];
                if (!empty($colorsPaletteCustom)) {
                    $colorsPaletteCustom = array_filter(
                        $colorsPaletteCustom,
                        function ($value, $key) {
                            return stripos($key, 'color-') !== false;
                        },
                        ARRAY_FILTER_USE_BOTH
                    );

                    $tempArray = [];
                    if (!empty($colorsPaletteCustom)) {
                        foreach ($colorsPaletteCustom as $key => $value) {
                            $tempArray[] = [
                                'color' => $value,
                                'slug' => substr($key, strlen('color-'))
                            ];
                        }
                    }

                    $colorPalette = array_merge($colorPalette, $tempArray);
                }

                // Loop through color palette
                foreach ($colorPalette as $color) {
                    if (!str_contains($color['slug'], '-hsl') && !str_contains($color['slug'], '-rgb')) {
                        // Convert values in rgb
                        $hexColor = str_replace('#', '', $color['color']);
                        if (strlen($hexColor) > 3) {
                            $tempColor = str_split($hexColor, 2);
                        } else {
                            $tempColor = str_split($hexColor);
                        }
                        $rgbColor = hexdec($tempColor[0]) . ',' . hexdec($tempColor[1]) . ',' . hexdec($tempColor[2]);

                        $rgbColorPalette["{$color['slug']}-rgb"] = $rgbColor;
                    }
                }
            }

            if (!empty($rgbColorPalette)) {
                // Sort array
                ksort($rgbColorPalette);

                // Update interpreted theme.json values
                return $themeJSON->update_with(
                    [
                        'version' => 2,
                        'settings' => [
                            'custom' => $rgbColorPalette,
                        ],
                    ]
                );
            }
        }
    }

    return $themeJSON;
}
add_filter('wp_theme_json_data_theme', 'simppple_add_RGB_values_to_CSS_variables');
