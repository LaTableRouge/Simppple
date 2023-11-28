<?php
/**
 * Title: Search popup
 * Slug: sample/search-modal
 * Categories: sample-site-header
 * Keywords: search, modal
 * Block Types: core/navigation
 */

function pattern_search_modal_icon($html, $block) {
    if (
        'core/navigation' === $block['blockName']
        && isset($block['attrs']['className'])
        && strpos($block['attrs']['className'], 'pattern---search-modal') !== false
    ) {
        // Replace labels
        $parsedHTML = new WP_HTML_Tag_Processor($html);
        if ($parsedHTML->next_tag(['tag_name' => 'button', 'class_name' => 'wp-block-navigation__responsive-container-open'])) {
            $parsedHTML->set_attribute('aria-label', esc_attr__('Open search', 'sample'));
        }

        if ($parsedHTML->next_tag(['tag_name' => 'div', 'class_name' => 'wp-block-navigation__responsive-container'])) {
            if ($parsedHTML->next_tag(['tag_name' => 'div', 'class_name' => 'wp-block-navigation__responsive-close'])) {
                if ($parsedHTML->next_tag(['tag_name' => 'div', 'class_name' => 'wp-block-navigation__responsive-dialog'])) {
                    if ($parsedHTML->next_tag(['tag_name' => 'button', 'class_name' => 'wp-block-navigation__responsive-container-close'])) {
                        $parsedHTML->set_attribute('aria-label', esc_attr__('Close search', 'sample'));
                    }
                }
            }
        }
        $html = $parsedHTML->get_updated_html();

        // Replace the icon if the icon option is used
        $icon = '><span class="icon-sample-search" role="img" aria-label="' . esc_attr__('Search', 'sample') . '"></span>';
        $html = str_replace(
            '><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="4" y="7.5" width="16" height="1.5" /><rect x="4" y="15" width="16" height="1.5" /></svg>',
            $icon,
            $html
        );
        $html = str_replace(
            '><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 5v1.5h14V5H5zm0 7.8h14v-1.5H5v1.5zM5 19h14v-1.5H5V19z" /></svg>',
            $icon,
            $html
        );

        // Replace the menu text, if the text option is used
        $html = str_replace('>' . __('Menu', 'sample'), $icon, $html);
    }

    return $html;
}
add_filter('render_block', 'pattern_search_modal_icon', 10, 2);

?>
<!-- wp:navigation {"hasIcon":false,"overlayMenu":"always","className":"pattern---search-modal","layout":{"type":"flex"}} -->
<!-- wp:navigation-link {"label":"placeholder","rel":"placeholder","url":"placeholder","title":"placeholder","kind":"custom"} /-->
<!-- wp:search {"label":"<?php _e('Search', 'sample') ?>","showLabel":false,"buttonText":"<?php _e('Search', 'sample') ?>","buttonPosition":"no-button"} /-->
<!-- /wp:navigation -->
