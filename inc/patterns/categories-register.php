<?php

if (!defined('ABSPATH')) {
    exit;
}

function simppple_register_pattern_category() {
    register_block_pattern_category(
        'simppple-sections',
        [
            'label' => esc_html__('Simppple - Page Sections', 'simppple')
        ]
    );

    register_block_pattern_category(
        'simppple-templates',
        [
            'label' => esc_html__('Simppple - Page Templates', 'simppple')
        ]
    );

    register_block_pattern_category(
        'simppple-site-header',
        [
            'label' => esc_html__('Simppple - Headers', 'simppple')
        ]
    );

    register_block_pattern_category(
        'simppple-site-footer',
        [
            'label' => esc_html__('Simppple - Footers', 'simppple')
        ]
    );
}
add_action('init', 'simppple_register_pattern_category', 9);
