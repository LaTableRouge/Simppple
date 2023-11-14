<?php

function register_patterns() {
    /**
     * @see https://developer.wordpress.org/reference/functions/register_block_pattern/
     */

    // Pattern slug list to be included
    $block_patterns = [];

    if (!empty($block_patterns)) {
        $block_patterns = apply_filters('block_patterns', $block_patterns);
        foreach ($block_patterns as $block_pattern) {
            $path = get_theme_file_path("/components/patterns/{$block_pattern}/{$block_pattern}.php");
            if (file_exists($path)) {
                register_block_pattern(
                    "simple/{$block_pattern}",
                    require $path
                );
            }
        }
    }
}
add_action('init', 'register_patterns', 9);
