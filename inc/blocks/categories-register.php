<?php

if (!defined('ABSPATH')) {
    exit;
}

function simple_register_blocks_category ($categories, $post) {
    $category_slugs = wp_list_pluck($categories, 'slug');

    return in_array('simple-blocks', $category_slugs, true) ? $categories : array_merge(
        [
            [
                'slug' => 'simple-blocks',
                'title' => __('Simple - Blocks', 'simple'),
                'icon' => null, // Pour la gestion de l'icone de la catégorie voir editor.js
            ],
        ],
        $categories
    );
}
add_filter('block_categories_all', 'simple_register_blocks_category', 10, 2);

