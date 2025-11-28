<?php

namespace Simppple;

if (!defined('ABSPATH')) {
    exit;
}

define('SIMPPPLE_IS_VITE_DEVELOPMENT', false);

/*
 * ================================
 *  THEME FUNCTIONS
 */
use Simppple\Vite\Vite;

require_once get_template_directory() . '/inc/vite.php';

$vite = new Vite();

// Front assets
$vite->enqueueScript('/src/scripts/parts.js', 'wp_enqueue_scripts', 'wp_footer', false, 'module');
$vite->enqueueScript('/src/scripts/front.js', 'wp_enqueue_scripts', 'wp_footer', false, '');

// Admin assets
$vite->enqueueScript('/src/scripts/admin.js', 'admin_enqueue_scripts', 'admin_footer');

// Editor assets
$vite->enqueueScript('/src/scripts/editor.js', 'enqueue_block_editor_assets');

// Theme customization
require_once get_template_directory() . '/inc/theme-customization/wp_customization.php';
require_once get_template_directory() . '/inc/theme-customization/theme-remove-default-settings.php';
require_once get_template_directory() . '/inc/theme-customization/color-add-rgb.php';
require_once get_template_directory() . '/inc/theme-customization/color-add-hsl.php';

// Patterns
require_once get_template_directory() . '/inc/patterns/categories-register.php';

