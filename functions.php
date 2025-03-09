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
Simppple\Vite\enqueue_script('/src/scripts/parts.js', 'wp_enqueue_scripts', 'wp_footer', false, 'module');
Simppple\Vite\enqueue_script('/src/scripts/front.js', 'wp_enqueue_scripts', 'wp_footer', false, '');

// Admin assets
Simppple\Vite\enqueue_script('/src/scripts/admin.js', 'admin_enqueue_scripts', 'admin_footer');

// Editor assets
Simppple\Vite\enqueue_script('/src/scripts/editor.js', 'enqueue_block_editor_assets');

// Theme customization
require get_template_directory() . '/inc/theme-customization/wp_customization.php';
require get_template_directory() . '/inc/theme-customization/theme-remove-default-settings.php';
require get_template_directory() . '/inc/theme-customization/color-add-rgb.php';
require get_template_directory() . '/inc/theme-customization/color-add-hsl.php';

// Patterns
require get_template_directory() . '/inc/patterns/categories-register.php';
