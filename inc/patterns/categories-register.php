<?php

function register_pattern_category() {
    register_block_pattern_category(
        'simple-sections',
        [
            'label' => esc_html__('Simple - Sections de page', 'simple')
        ]
    );

    register_block_pattern_category(
        'simple-templates',
        [
            'label' => esc_html__('Simple - Modèles de page', 'simple')
        ]
    );

    register_block_pattern_category(
        'simple-site-header',
        [
            'label' => esc_html__('Simple - En-têtes', 'simple')
        ]
    );

    register_block_pattern_category(
        'simple-site-footer',
        [
            'label' => esc_html__('Simple - Pieds de page', 'simple')
        ]
    );
}
add_action('init', 'register_pattern_category', 9);
