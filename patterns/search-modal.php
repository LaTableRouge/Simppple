<?php
/**
 * Title: Search popup
 * Slug: simppple/search-modal
 * Categories: simppple-site-header
 * Keywords: search, modal
 * Block Types: core/navigation
 */

function pattern_search_modal_icon($html, $block) {
    if (
        'core/navigation' !== $block['blockName']
        || !isset($block['attrs']['className'])
        || !str_contains($block['attrs']['className'], 'pattern---search-modal')
    ) {
        return $html;
    }

    $parsedHTML = new WP_HTML_Tag_Processor($html);
    if ($parsedHTML->next_tag(['tag_name' => 'button', 'class_name' => 'wp-block-navigation__responsive-container-open'])) {
        $parsedHTML->set_attribute('aria-label', esc_attr__('Open search', 'simppple'));
    }

    if ($parsedHTML->next_tag(['tag_name' => 'button', 'class_name' => 'wp-block-navigation__responsive-container-close'])) {
        $parsedHTML->set_attribute('aria-label', esc_attr__('Close search', 'simppple'));
    }
    $html = $parsedHTML->get_updated_html();

    $icon = '<span class="icon-simppple-search" role="img" aria-label="' . esc_attr__('Search', 'simppple') . '"></span>';

    // Replace any core open-button SVG (attribute order / paths may change across WP versions).
    $html = preg_replace(
        '/(<button\b[^>]*\bwp-block-navigation__responsive-container-open\b[^>]*>)\s*<svg\b[^>]*>.*?<\/svg>/is',
        '$1' . $icon,
        $html,
        1
    ) ?? $html;

    // Text-mode overlay trigger: replace the Menu label when present.
    $menu_label = esc_html__('Menu', 'simppple');
    $html = preg_replace(
        '/(<button\b[^>]*\bwp-block-navigation__responsive-container-open\b[^>]*>)\s*' . preg_quote($menu_label, '/') . '/i',
        '$1' . $icon,
        $html,
        1
    ) ?? $html;

    return $html;
}
add_filter('render_block', 'pattern_search_modal_icon', 10, 2);

?>
<!-- wp:navigation {"hasIcon":false,"overlayMenu":"always","className":"pattern---search-modal","layout":{"type":"flex"}} -->
<!-- wp:navigation-link {"label":"placeholder","rel":"placeholder","url":"placeholder","title":"placeholder","kind":"custom"} /-->
<!-- wp:pattern {"slug":"simppple/hidden-search"} /-->
<!-- /wp:navigation -->
