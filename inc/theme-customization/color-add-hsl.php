<?php

if (!defined('ABSPATH')) {
    exit;
}

// https://fullsiteediting.com/lessons/how-to-filter-theme-json-with-php/
function simppple_add_HSL_values_to_CSS_variables($themeJSON) {
    $data = $themeJSON->get_data();

    if (!empty($data)) {

        if (isset($data['settings']['color']['palette']['theme'])) {
            $hslColorPalette = [];

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

                if (array_key_exists('custom', $data['settings'])) {
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
                }

                // Loop through color palette
                foreach ($colorPalette as $color) {
                    if (!str_contains($color['slug'], '-rgb') && !str_contains($color['slug'], '-hsl')) {
                        // Convert values in hsl
                        $hexColor = str_replace('#', '', $color['color']);
                        if (strlen($hexColor) > 3) {
                            $hexColor = str_split($hexColor, 2);
                        } else {
                            $hexColor = str_split($hexColor);
                        }

                        $R = hexdec($hexColor[0]);
                        $G = hexdec($hexColor[1]);
                        $B = hexdec($hexColor[2]);
                        $RGB = [$R, $G, $B];

                        // scale value 0 to 255 to floats from 0 to 1
                        $r = $RGB[0] / 255;
                        $g = $RGB[1] / 255;
                        $b = $RGB[2] / 255;

                        // using https://gist.github.com/brandonheyer/5254516
                        $max = max($r, $g, $b);
                        $min = min($r, $g, $b);

                        // lum
                        $l = ($max + $min) / 2;

                        // sat
                        $d = $max - $min;
                        if ($d == 0) {
                            $h = $s = 0; // achromatic
                        } else {
                            $s = $d / (1 - abs((2 * $l) - 1));
                            // hue
                            switch ($max) {
                                case $r:
                                    $h = 60 * fmod((($g - $b) / $d), 6);
                                    if ($b > $g) {
                                        $h += 360;
                                    }
                                    break;
                                case $g:
                                    $h = 60 * (($b - $r) / $d + 2);
                                    break;
                                case $b:
                                    $h = 60 * (($r - $g) / $d + 4);
                                    break;
                            }
                        }

                        $hsl = [round($h), round($s * 100), round($l * 100)];
                        $hslColor = ($hsl[0]) . ',' . ($hsl[1]) . '%,' . ($hsl[2]) . '%';

                        $hslColorPalette["{$color['slug']}-hsl"] = $hslColor;
                    }
                }
            }

            if (!empty($hslColorPalette)) {
                // Sort array
                ksort($hslColorPalette);

                // Update interpreted theme.json values
                return $themeJSON->update_with(
                    [
                        'version' => 2,
                        'settings' => [
                            'custom' => $hslColorPalette,
                        ],
                    ]
                );
            }
        }
    }

    return $themeJSON;
}
add_filter('wp_theme_json_data_theme', 'simppple_add_HSL_values_to_CSS_variables');
