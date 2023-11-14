<?php

if (!defined('ABSPATH')) {
    exit;
}

define('IS_VITE_DEVELOPMENT', false);
define('VITE_SERVER', 'http://localhost:5173');
define('DIST_FOLDER', 'build');

define('PICTURE_FOLDER', defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT ? '/assets/img' : '/build/assets/img');

/*
 * ================================
 *  THEME FUNCTIONS
 */
require get_template_directory() . '/inc/vite.php';
// Front assets
vite_enqueue_script('assets/js/front.js', 'wp_enqueue_scripts', 'wp_footer');

// Admin assets
vite_enqueue_script('assets/js/admin.js', 'admin_enqueue_scripts', 'admin_footer');

// Editor assets
vite_enqueue_script('assets/js/editor.js', 'enqueue_block_editor_assets');

// Helpers
require get_template_directory() . '/inc/env_detection.php';

// Theme customization
require get_template_directory() . '/inc/theme-customization/wp_customization.php';
require get_template_directory() . '/inc/theme-customization/theme-remove-default-settings.php';
require get_template_directory() . '/inc/theme-customization/color-add-rgb.php';
require get_template_directory() . '/inc/theme-customization/color-add-hsl.php';

// Blocks
require get_template_directory() . '/inc/blocks/categories-register.php';
require get_template_directory() . '/inc/blocks/react/blocks-register.php';

// Patterns
require get_template_directory() . '/inc/patterns/categories-register.php';
require get_template_directory() . '/inc/patterns/patterns-register.php';
