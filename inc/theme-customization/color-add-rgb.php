<?php

if (!defined('ABSPATH')) {
    exit;
}

// https://fullsiteediting.com/lessons/how-to-filter-theme-json-with-php/
function simple_add_RGB_values_to_CSS_variables($themeJSON) {
    // Only do this in the front-end
    // if (!is_admin()) {
    $data = $themeJSON->get_data();

    if (!empty($data)) {
        if (isset($data['settings']['color']['palette']['theme'])) {
            $rgbColorPalette = [];

            // Loop through color palette
            $colorPalette = $data['settings']['color']['palette']['theme'];

            if (!empty($colorPalette)) {
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
    // }

    return $themeJSON;
}
add_filter('wp_theme_json_data_theme', 'simple_add_RGB_values_to_CSS_variables');
