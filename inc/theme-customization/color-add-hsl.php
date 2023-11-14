<?php

if (!defined('ABSPATH')) {
    exit;
}

// https://fullsiteediting.com/lessons/how-to-filter-theme-json-with-php/
function addHSLValuesToCSSVariables($themeJSON) {
    // Only do this in the front-end
    // if (!is_admin()) {
    $data = $themeJSON->get_data();

    if (!empty($data)) {
        if (isset($data['settings']['color']['palette']['theme'])) {
            $hslColorPalette = [];

            // Loop through color palette
            $colorPalette = $data['settings']['color']['palette']['theme'];

            if (!empty($colorPalette)) {
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
    // }

    return $themeJSON;
}
add_filter('wp_theme_json_data_theme', 'addHSLValuesToCSSVariables');
