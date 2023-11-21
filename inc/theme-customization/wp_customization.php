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
function theme_setup() {
    // !!!! usage of @import in style break the call of the file in gutenberg !!!!
    add_theme_support('editor-styles');
    add_theme_support('custom-spacing');

    remove_theme_support('core-block-patterns');

    load_child_theme_textdomain('simple', get_template_directory() . '/lang');
}
add_action('after_setup_theme', 'theme_setup', 20);

/*
 * ================================
 *  Login page - Logo, link, title, text
 */
add_action('login_enqueue_scripts', function () {
    $img = get_template_directory_uri() . PICTURE_FOLDER . '/login-logo.png';
    $img_size = getimagesize($img);
    ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url('<?php echo $img; ?>');
            width: <?php echo $img_size[0]; ?>px;
            height: <?php echo $img_size[1]; ?>px;
            background-size: 100%;
        }
    </style>
    <?php

    add_filter('login_headerurl', function () {
        return home_url();
    });

    add_filter('login_headertext', function () {
        return get_option('blogname');
    });
});

/*
 * ================================
 *  Disable login screen language switcher
 */
add_filter('login_display_language_dropdown', '__return_false');

/*
 * ================================
 *  Disable useless dashboard widgets
 */
function disable_dashboard_widgets() {
    global $wp_meta_boxes;
    // wp..
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
    // plugins
    unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['zerospam_dashboard_widget']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['simple_history_dashboard_widget']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
}
add_action('wp_dashboard_setup', 'disable_dashboard_widgets', 999);

/*
 * ================================
 *  Disable useless admin toolbar node
 */
function remove_toolbar_node($wp_admin_bar) {
    $wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('search');
    $wp_admin_bar->remove_node('wpseo-menu');
    $wp_admin_bar->remove_node('duplicate-post');
    $wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'remove_toolbar_node', 999);

/*
 * ================================
 *  Add current post slug to body class
 */
function add_slug_body_class($classes) {
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '__' . $post->post_name;
    }

    return $classes;
}
add_filter('body_class', 'add_slug_body_class');

function author_page_redirect($link) {
    $link = '';

    return $link;
}
add_action('author_link', 'author_page_redirect');

/*
 * ================================
 *  Remove comment author URL
 */
function remove_comment_author_link($return, $author, $comment_ID) {
    return $author;
}
add_filter('get_comment_author_link', 'remove_comment_author_link', 10, 3);

/*
 * ================================
 *  Remove comment website URL
 */
function disable_comment_url($fields) {
    unset($fields['url']);

    return $fields;
}
function add_comment_url_filter() {
    add_filter('comment_form_default_fields', 'disable_comment_url', 20);
}
add_action('after_setup_theme', 'add_comment_url_filter');

/*
 * ================================
 *  Disable emoji's
 */
//Filter function used to remove the tinymce emoji plugin.
function disable_emojis_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, ['wpemoji']);
    } else {
        return [];
    }
}

//Remove emoji CDN hostname from DNS prefetching hints.
function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
    if ('dns-prefetch' == $relation_type) {
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
        $urls = array_diff($urls, [$emoji_svg_url]);
    }

    return $urls;
}

function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/*
 * ================================
 *  Disable Dashicons CSS for non-logged-in users
 */
function adminify_remove_dashicons() {
    if (!is_admin_bar_showing() && !is_customize_preview()) {
        wp_dequeue_style('dashicons');
        wp_deregister_style('dashicons');
    }
}
add_action('wp_print_styles', 'adminify_remove_dashicons', 100);

/*
 * ================================
 *  Disable XML RPC
 */
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link');

/*
 * ================================
 *  Disable jQuery migrate
 */
function remove_jquery_migrate($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, ['jquery-migrate']);
        }
    }
}
add_action('wp_default_scripts', 'remove_jquery_migrate');

/*
 * ================================
 *  Hide WP version
 */
function remove_version() {
    return '';
}
add_filter('the_generator', 'remove_version');
remove_action('wp_head', 'wp_generator');

/*
 * ================================
 *  Remove wlwmanifest Link
 */
remove_action('wp_head', 'wlwmanifest_link');

/*
 * ================================
 *  Remove RSD Link
 */
remove_action('wp_head', 'rsd_link');

/*
 * ================================
 *  Remove Shortlink
 */
remove_action('template_redirect', 'wp_shortlink_header', 11);

/*
 * ================================
 *  Disable RSS Feeds
 */
function disable_feed() {
    wp_die(__('No feed available, please visit the <a href="' . esc_url(home_url('/')) . '">homepage</a>!'));
}
add_action('do_feed', 'disable_feed', 1);
add_action('do_feed_rdf', 'disable_feed', 1);
add_action('do_feed_rss', 'disable_feed', 1);
add_action('do_feed_rss2', 'disable_feed', 1);
add_action('do_feed_atom', 'disable_feed', 1);
add_action('do_feed_rss2_comments', 'disable_feed', 1);
add_action('do_feed_atom_comments', 'disable_feed', 1);

/*
 * ================================
 *  Remove RSS Feed links
 */
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

/*
 * ================================
 *  Disable Self Pingbacks
 */
function no_self_ping(&$links) {
    $home = get_option('home');
    foreach ($links as $l => $link) {
        if (0 === strpos($link, $home)) {
            unset($links[$l]);
        }
    }
}
add_action('pre_ping', 'no_self_ping');

/*
 * ================================
 *  Condition access to REST API
 */
add_filter('rest_authentication_errors', function ($errors) {
    $route = $GLOBALS['wp']->query_vars['rest_route'];

    if (str_contains($route, '/wp/v2/')) {
        if (!is_user_logged_in()) {
            if (!isset($_REQUEST['nonce'])) {
                return new WP_Error(
                    'rest_not_logged_in',
                    __('Nonce parameter missing in the request', 'simple'),
                    ['status' => 401]
                );
            } else {
                if (!wp_verify_nonce($_REQUEST['nonce'], 'wp_rest')) {
                    return new WP_Error(
                        'rest_not_logged_in',
                        __('Incorrect nonce parameter in the request', 'simple'),
                        ['status' => 401]
                    );
                }
            }
        }
    }

    return $errors;
});

/*
 * ================================
 *  Remove REST API links
 */
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');

/*
 * ================================
 *  Remove YOAST SEO HTML comments
 */
add_filter('wpseo_debug_markers', '__return_false');

/*
 * ================================
 * Disable color scheme from user dashboard
 */
remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');

/*
* ================================ Add classes to native blocks
*/
add_filter('render_block_core/paragraph', function ($block_content) {
    $p = new WP_HTML_Tag_Processor($block_content);

    if ($p->next_tag()) {
        $p->add_class('wp-block-paragraph');
        if ($p->next_tag('a')) {
            $p->add_class('wp-block-paragraph__link');
        }
    }

    return $p->get_updated_html();
});

add_filter('render_block_core/list', function ($block_content) {
    $list = new WP_HTML_Tag_Processor($block_content);

    if ($list->next_tag()) {
        $list->add_class('wp-block-list');
    }

    return $list->get_updated_html();
});

add_filter('render_block_core/image', function ($block_content) {
    $picture = new WP_HTML_Tag_Processor($block_content);

    if ($picture->next_tag('img')) {
        $picture->set_attribute('loading', 'lazy');
    }

    return $picture->get_updated_html();
});

function add_context_to_html_tag($output) {
    if (is_admin()) {
        $output .= ' data-context="back"';
    } else {
        $output .= ' data-context="front"';
    }

    return $output;
}
add_filter('language_attributes', 'add_context_to_html_tag');
