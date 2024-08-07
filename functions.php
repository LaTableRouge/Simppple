<?php

if (!defined('ABSPATH')) {
    exit;
}

define('SIMPPPLE_IS_VITE_DEVELOPMENT', false);

/*
 * ================================
 *  THEME FUNCTIONS
 */
require get_template_directory() . '/inc/vite.php';
// Front assets
simppple_vite_enqueue_script('/assets/scripts/front.js', 'wp_enqueue_scripts', 'wp_footer');

// Admin assets
simppple_vite_enqueue_script('/assets/scripts/admin.js', 'admin_enqueue_scripts', 'admin_footer');

// Editor assets
simppple_vite_enqueue_script('/assets/scripts/editor.js', 'enqueue_block_editor_assets');

// Theme customization
require get_template_directory() . '/inc/theme-customization/wp_customization.php';
require get_template_directory() . '/inc/theme-customization/theme-remove-default-settings.php';
require get_template_directory() . '/inc/theme-customization/color-add-rgb.php';
require get_template_directory() . '/inc/theme-customization/color-add-hsl.php';

// Patterns
require get_template_directory() . '/inc/patterns/categories-register.php';
