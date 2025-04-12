<?php
/**
 * Title: Product search results page
 * Slug: simppple/page-wc-product-search-results
 * Categories: simppple-wc-templates
 * Keywords: woocommerce, product search results
 * Inserter: no
 */

if (!class_exists('WooCommerce')) { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This template needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php } else { ?>
	<!-- wp:pattern {"slug":"simppple/wc-breadcrumbs"} /-->

	<!-- wp:pattern {"slug":"simppple/wc-store-notices"} /-->

	<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
	<div
		style="height:var(--wp--preset--spacing--30)"
		aria-hidden="true"
		class="wp-block-spacer"
	></div>
	<!-- /wp:spacer -->

	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:search {"label":"Recherche","showLabel":false,"placeholder":"Recherche de produits…","buttonText":"Recherche","buttonPosition":"no-button","query":{"post_type":"product"}} /-->

		<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
		<div
			style="height:var(--wp--preset--spacing--30)"
			aria-hidden="true"
			class="wp-block-spacer"
		></div>
		<!-- /wp:spacer -->

		<!-- wp:query-title {"type":"search","align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} /-->

		<!-- wp:woocommerce/product-results-count {"fontSize":"26"} /-->

		<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
		<div
			style="height:var(--wp--preset--spacing--30)"
			aria-hidden="true"
			class="wp-block-spacer"
		></div>
		<!-- /wp:spacer -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"simppple/products-1-col"} /-->
<?php }