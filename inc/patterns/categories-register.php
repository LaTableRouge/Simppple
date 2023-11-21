<?php

function register_pattern_category() {
    register_block_pattern_category(
        'simple-sections',
        [
            'label' => esc_html__('Simple - Page Sections', 'simple')
        ]
    );

    register_block_pattern_category(
        'simple-templates',
        [
            'label' => esc_html__('Simple - Page Templates', 'simple')
        ]
    );

    register_block_pattern_category(
        'simple-site-header',
        [
            'label' => esc_html__('Simple - Headers', 'simple')
        ]
    );

    register_block_pattern_category(
        'simple-site-footer',
        [
            'label' => esc_html__('Simple - Footers', 'simple')
        ]
    );
}
add_action('init', 'register_pattern_category', 9);
