<?php

if (!defined('ABSPATH')) {
    exit;
}

function sample_register_pattern_category() {
    register_block_pattern_category(
        'sample-sections',
        [
            'label' => esc_html__('Sample - Page Sections', 'sample')
        ]
    );

    register_block_pattern_category(
        'sample-templates',
        [
            'label' => esc_html__('Sample - Page Templates', 'sample')
        ]
    );

    register_block_pattern_category(
        'sample-site-header',
        [
            'label' => esc_html__('Sample - Headers', 'sample')
        ]
    );

    register_block_pattern_category(
        'sample-site-footer',
        [
            'label' => esc_html__('Sample - Footers', 'sample')
        ]
    );
}
add_action('init', 'sample_register_pattern_category', 9);
