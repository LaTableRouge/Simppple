<?php

if (!defined('ABSPATH')) {
    exit;
}

/*
* ================================ Theme setup
* Gutenberg editor custom style
* Manage block specific styles
* Call textdomain
*/
function simple_theme_setup() {
    // !!!! usage of @import in style break the call of the file in gutenberg !!!!
    add_theme_support('editor-styles');
    add_theme_support('custom-spacing');

    remove_theme_support('core-block-patterns');

    load_child_theme_textdomain('simple', get_template_directory() . '/lang');
}
add_action('after_setup_theme', 'simple_theme_setup', 20);

/*
 * ================================
 *  Login page - Logo, link, title, text
 *  Disable login screen language switcher
 */
function simple_customizelogin_page() {

    add_filter('login_headerurl', function () {
        return home_url();
    });

    add_filter('login_headertext', function () {
        return get_option('blogname');
    });

    add_filter('login_display_language_dropdown', '__return_false');
}
add_action('login_enqueue_scripts', 'simple_customizelogin_page');

/*
 * ================================
 *  Add current post slug to body class
 */
function simple_add_slug_body_class($classes) {
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '__' . $post->post_name;
    }

    return $classes;
}
add_filter('body_class', 'simple_add_slug_body_class');

/*
* ================================ Add classes to native blocks
*/
function simple_add_class_to_core_paragraph($block_content) {
    $p = new WP_HTML_Tag_Processor($block_content);

    if ($p->next_tag()) {
        $p->add_class('wp-block-paragraph');
        if ($p->next_tag('a')) {
            $p->add_class('wp-block-paragraph__link');
        }
    }

    return $p->get_updated_html();
}
add_filter('render_block_core/paragraph', 'simple_add_class_to_core_paragraph');

function simple_add_class_to_core_list($block_content) {
    $list = new WP_HTML_Tag_Processor($block_content);

    if ($list->next_tag()) {
        $list->add_class('wp-block-list');
    }

    return $list->get_updated_html();
}
add_filter('render_block_core/list', 'simple_add_class_to_core_list');

function simple_add_class_to_core_image($block_content) {
    $picture = new WP_HTML_Tag_Processor($block_content);

    if ($picture->next_tag('img')) {
        $picture->set_attribute('loading', 'lazy');
    }

    return $picture->get_updated_html();
}
add_filter('render_block_core/image', 'simple_add_class_to_core_image');

function simple_add_context_to_html_tag($output) {
    if (is_admin()) {
        $output .= ' data-context="back"';
    } else {
        $output .= ' data-context="front"';
    }

    return $output;
}
add_filter('language_attributes', 'simple_add_context_to_html_tag');
