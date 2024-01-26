<?php
/**
 * Title: Modale de filres
 * Slug: simppple/wc-filters-popup
 * Categories: simppple-sections
 * Keywords: filters, modal, woocommerce
 * Block Types: core/navigation
 */

function pattern_filters_popup_icon($html, $block) {
    if (
        'core/navigation' === $block['blockName']
        && isset($block['attrs']['className'])
        && strpos($block['attrs']['className'], 'pattern---wc-filters-popup') !== false
    ) {
        // Replace labels
        $parsedHTML = new WP_HTML_Tag_Processor($html);
        if ($parsedHTML->next_tag(['tag_name' => 'button', 'class_name' => 'wp-block-navigation__responsive-container-open'])) {
            $parsedHTML->set_attribute('aria-label', esc_attr__('Open filters', 'simppple'));
        }

        if ($parsedHTML->next_tag(['tag_name' => 'div', 'class_name' => 'wp-block-navigation__responsive-container'])) {
            if ($parsedHTML->next_tag(['tag_name' => 'div', 'class_name' => 'wp-block-navigation__responsive-close'])) {
                if ($parsedHTML->next_tag(['tag_name' => 'div', 'class_name' => 'wp-block-navigation__responsive-dialog'])) {
                    if ($parsedHTML->next_tag(['tag_name' => 'button', 'class_name' => 'wp-block-navigation__responsive-container-close'])) {
                        $parsedHTML->set_attribute('aria-label', esc_attr__('Close filters', 'simppple'));
                    }
                }
            }
        }
        $html = $parsedHTML->get_updated_html();

        // Replace the icon if the icon option is used
        $icon = '><span class="icon-simppple-filter" role="img" aria-label="' . esc_attr__('Filter', 'simppple') . '"></span><span>' . __('Filter', 'simppple') . '</span>';
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
        $html = str_replace('>' . __('Filters', 'simppple'), $icon, $html);
    }

    return $html;
}
add_filter('render_block', 'pattern_filters_popup_icon', 10, 2);

?>

<!-- wp:navigation {"icon":"menu","className":"pattern---wc-filters-popup","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/filter-wrapper {"filterType":"price-filter","heading":"<?php _e('Filter by price', 'simppple'); ?>"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php _e('Filter by price', 'simppple'); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/price-filter {"inlineInput":true,"heading":""} -->
<div class="wp-block-woocommerce-price-filter is-loading"><span aria-hidden="true" class="wc-block-product-categories__placeholder"></span></div>
<!-- /wp:woocommerce/price-filter --></div>
<!-- /wp:woocommerce/filter-wrapper -->

<!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"<?php _e('Filter by color', 'simppple'); ?>"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php _e('Filter by color', 'simppple'); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":1,"heading":"","lock":{"remove":true}} -->
<div class="wp-block-woocommerce-attribute-filter is-loading"></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper -->

<!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"<?php _e('Filter by size', 'simppple'); ?>"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php _e('Filter by size', 'simppple'); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":2,"heading":"","lock":{"remove":true}} -->
<div class="wp-block-woocommerce-attribute-filter is-loading"></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group -->
<!-- /wp:navigation -->
