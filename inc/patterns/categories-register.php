<?php
/**
 * Register block pattern categories
 *
 * @package Simppple
 * @subpackage Patterns
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register custom block pattern categories
 *
 * @return void
 */
function simppple_register_pattern_category(): void {
    $categories = [
        'simppple-sections' => __('Simppple - Page Sections', 'simppple'),
        'simppple-templates' => __('Simppple - Page Templates', 'simppple'),
        'simppple-site-header' => __('Simppple - Headers', 'simppple'),
        'simppple-site-footer' => __('Simppple - Footers', 'simppple'),
        'simppple-wc-patterns' => __('Simppple - Woocommerce patterns', 'simppple'),
        'simppple-wc-templates' => __('Simppple - Woocommerce templates', 'simppple')
    ];

    foreach ($categories as $slug => $label) {
        register_block_pattern_category($slug, [
            'label' => esc_html($label)
        ]);
    }
}
add_action('init', 'simppple_register_pattern_category', 9);
