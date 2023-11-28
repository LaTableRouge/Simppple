<?php

if (!defined('ABSPATH')) {
    exit;
}

// https://fullsiteediting.com/lessons/how-to-filter-theme-json-with-php/
function sample_remove_default_values_from_CSS_variables($themeJSON) {
    // Only do this in the front-end

    $data = $themeJSON->get_data();

    if (!empty($data)) {
        // Remove les couleurs de Wordpress
        if (isset($data['settings']['color'])) {
            $data['settings']['color']['defaultPalette'] = false;
            $data['settings']['color']['defaultGradients'] = false;
            $data['settings']['color']['defaultDuotone'] = false;
            $data['settings']['color']['duotone'] = [];
            $data['settings']['color']['gradients'] = [];
            $data['settings']['color']['palette'] = [];
        }

        // Remove les ombres de Wordpress
        if (isset($data['settings']['shadow'])) {
            $data['settings']['shadow']['defaultPresets'] = false;
            $data['settings']['shadow']['presets'] = [];
        }

        // Remove les tailles de typo de Wordpress
        if (isset($data['settings']['typography'])) {
            $data['settings']['typography']['fontSizes'] = [];
        }
    }

    $themeJSON->update_with($data);

    return $themeJSON;
}
add_filter('wp_theme_json_data_default', 'sample_remove_default_values_from_CSS_variables');
