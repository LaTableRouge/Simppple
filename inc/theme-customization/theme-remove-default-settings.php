<?php

/**
 * Remove default WordPress theme settings
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
 * Remove default values from CSS variables in theme.json
 *
 * @param \WP_Theme_JSON_Data $theme_json Theme JSON data object
 * @return \WP_Theme_JSON_Data Modified theme JSON data
 */
function remove_default_values_from_CSS_variables(\WP_Theme_JSON_Data $theme_json): \WP_Theme_JSON_Data {
    $data = $theme_json->get_data();

    if (empty($data)) {
        return $theme_json;
    }

    // Remove WordPress default colors
    if (isset($data['settings']['color'])) {
        $data['settings']['color'] = array_merge($data['settings']['color'], [
            'defaultPalette' => false,
            'defaultGradients' => false,
            'defaultDuotone' => false,
            'duotone' => [],
            'gradients' => [],
            'palette' => []
        ]);
    }

    // Remove WordPress default shadows
    if (isset($data['settings']['shadow'])) {
        $data['settings']['shadow'] = array_merge($data['settings']['shadow'], [
            'defaultPresets' => false,
            'presets' => []
        ]);
    }

    // Remove WordPress default font sizes
    if (isset($data['settings']['typography'])) {
        $data['settings']['typography']['fontSizes'] = [];
    }

    $theme_json->update_with($data);

    return $theme_json;
}
add_filter('wp_theme_json_data_default', __NAMESPACE__ . '\remove_default_values_from_CSS_variables');
