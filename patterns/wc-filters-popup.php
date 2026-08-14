<?php
/**
 * Title: Filters popup
 * Slug: simppple/wc-filters-popup
 * Categories: simppple-sections, simppple-wc-patterns
 * Keywords: filters, popup, woocommerce
 * Block Types: core/navigation
 */
if (class_exists('WooCommerce')) {

    function pattern_filters_popup_icon($html, $block) {
        if (
            'core/navigation' !== $block['blockName']
            || !isset($block['attrs']['className'])
            || !str_contains($block['attrs']['className'], 'pattern---wc-filters-popup')
        ) {
            return $html;
        }

        $parsedHTML = new WP_HTML_Tag_Processor($html);
        if ($parsedHTML->next_tag(['tag_name' => 'button', 'class_name' => 'wp-block-navigation__responsive-container-open'])) {
            $parsedHTML->set_attribute('aria-label', esc_attr__('Open filters', 'simppple'));
        }

        if ($parsedHTML->next_tag(['tag_name' => 'button', 'class_name' => 'wp-block-navigation__responsive-container-close'])) {
            $parsedHTML->set_attribute('aria-label', esc_attr__('Close filters', 'simppple'));
        }
        $html = $parsedHTML->get_updated_html();

        $icon = '<span class="icon-simppple-filter" role="img" aria-label="' . esc_attr__('Filter', 'simppple') . '"></span><span>' . esc_html__('Filter', 'simppple') . '</span>';

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
    add_filter('render_block', 'pattern_filters_popup_icon', 10, 2);

    ?>

<!-- wp:navigation {"icon":"menu","overlayBackgroundColor":"base","overlayTextColor":"contrast","className":"pattern---wc-filters-popup","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/filter-wrapper {"filterType":"price-filter","heading":"<?php esc_html_e('Filter by price', 'simppple'); ?>"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e('Filter by price', 'simppple'); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/price-filter {"inlineInput":true,"heading":""} -->
<div class="wp-block-woocommerce-price-filter is-loading"><span aria-hidden="true" class="wc-block-product-categories__placeholder"></span></div>
<!-- /wp:woocommerce/price-filter --></div>
<!-- /wp:woocommerce/filter-wrapper -->

<!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"<?php esc_html_e('Filter by color', 'simppple'); ?>"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e('Filter by color', 'simppple'); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":1,"heading":"","lock":{"remove":true}} -->
<div class="wp-block-woocommerce-attribute-filter is-loading"></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper -->

<!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"<?php esc_html_e('Filter by size', 'simppple'); ?>"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e('Filter by size', 'simppple'); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":2,"heading":"","lock":{"remove":true}} -->
<div class="wp-block-woocommerce-attribute-filter is-loading"></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group -->
<!-- /wp:navigation -->

<?php } else { ?>
	<!-- wp:paragraph -->
	<p><?php esc_html_e('This pattern needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php }
