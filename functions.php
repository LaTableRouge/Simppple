<?php

if (!defined('ABSPATH')) {
    exit;
}

define('SIMPLE_IS_VITE_DEVELOPMENT', false);

define('SAMPLE_PICTURE_FOLDER', defined('SIMPLE_IS_VITE_DEVELOPMENT') && SIMPLE_IS_VITE_DEVELOPMENT ? '/assets/img' : '/build/assets/img');

/*
 * ================================
 *  THEME FUNCTIONS
 */
require get_template_directory() . '/inc/vite.php';
// Front assets
sample_vite_enqueue_script('/assets/js/front.js', 'wp_enqueue_scripts', 'wp_footer');

// Admin assets
sample_vite_enqueue_script('/assets/js/admin.js', 'admin_enqueue_scripts', 'admin_footer');

// Editor assets
sample_vite_enqueue_script('/assets/js/editor.js', 'enqueue_block_editor_assets');

// Theme customization
require get_template_directory() . '/inc/theme-customization/wp_customization.php';
require get_template_directory() . '/inc/theme-customization/theme-remove-default-settings.php';
require get_template_directory() . '/inc/theme-customization/color-add-rgb.php';
require get_template_directory() . '/inc/theme-customization/color-add-hsl.php';

// Patterns
require get_template_directory() . '/inc/patterns/categories-register.php';
