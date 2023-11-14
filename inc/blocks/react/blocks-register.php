<?php

function register_react_blocks() {
    /**
     * Registers the blocks using the metadata loaded from the `block.json` files.
     * Behind the scenes, it registers also all assets so they can be enqueued
     * through the block editor in the corresponding context.
     *
     * @see https://developer.wordpress.org/reference/functions/register_block_type/
     */

    // Blocks slug list to be included
    $react_blocks = [];

    if (!empty($react_blocks)) {
        foreach ($react_blocks as $blockSlug) {
            $path = get_theme_file_path("/components/blocks/react/build/{$blockSlug}");
            if (file_exists($path)) {
                register_block_type($path);
            }

            // Pass des json de traductions au scripts
            wp_set_script_translations(
                "highfive-{$blockSlug}-script",
                'highfive',
                get_template_directory() . '/lang'
            );
            wp_set_script_translations(
                "highfive-{$blockSlug}-editor-script",
                'highfive',
                get_template_directory() . '/lang'
            );
        }
    }
}
add_action('init', 'register_react_blocks');

