<?php
/**
 * Theme customization functions
 *
 * @package Simppple
 * @subpackage Theme_Customization
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Setup theme support and text domain
 *
 * @return void
 */
function simppple_theme_setup(): void {
    // Editor styles and custom spacing support
    add_theme_support('editor-styles');
    add_theme_support('custom-spacing');

    // Remove core block patterns
    remove_theme_support('core-block-patterns');

    // Load theme text domain
    load_child_theme_textdomain('simppple', get_template_directory() . '/lang');
}
add_action('after_setup_theme', 'simppple_theme_setup', 20);

/**
 * Customize login page
 *
 * @return void
 */
function simppple_customize_login_page(): void {
    add_filter('login_headerurl', fn(): string => home_url());
    add_filter('login_headertext', fn(): string => (string) get_option('blogname'));
    add_filter('login_display_language_dropdown', '__return_false');
}
add_action('login_enqueue_scripts', 'simppple_customize_login_page');

/**
 * Add current post slug to body class
 *
 * @param array<string> $classes Array of body classes
 * @return array<string>
 */
function simppple_add_slug_body_class(array $classes): array {
    global $post;
    if (isset($post) && isset($post->post_type, $post->post_name)) {
        $classes[] = $post->post_type . '__' . $post->post_name;
    }

    return $classes;
}
add_filter('body_class', 'simppple_add_slug_body_class');

/**
 * Add classes to core paragraph block
 *
 * @param string $block_content Block content to filter
 * @return string Modified block content
 */
function simppple_add_class_to_core_paragraph(string $block_content): string {
    $p = new WP_HTML_Tag_Processor($block_content);

    if ($p->next_tag()) {
        $p->add_class('wp-block-paragraph');
        if ($p->next_tag('a')) {
            $p->add_class('wp-block-paragraph__link');
        }
    }

    return $p->get_updated_html();
}
add_filter('render_block_core/paragraph', 'simppple_add_class_to_core_paragraph');

/**
 * Add lazy loading to core image block
 *
 * @param string $block_content Block content to filter
 * @return string Modified block content
 */
function simppple_add_class_to_core_image(string $block_content): string {
    $picture = new WP_HTML_Tag_Processor($block_content);

    if ($picture->next_tag('img')) {
        $picture->set_attribute('loading', 'lazy');
    }

    return $picture->get_updated_html();
}
add_filter('render_block_core/image', 'simppple_add_class_to_core_image');

/**
 * Add context attributes to HTML tag
 *
 * @param string $output Current output of language_attributes()
 * @return string Modified language attributes
 */
function simppple_add_context_to_html_tag(string $output): string {
    $output .= is_admin() ? ' data-context="back"' : ' data-context="front"';

    if (is_rtl()) {
        $output .= ' dir="rtl"';
    }

    return $output;
}
add_filter('language_attributes', 'simppple_add_context_to_html_tag');
