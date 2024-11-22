<?php
/**
 * Title: Product search results template
 * Slug: simppple/template-wc-product-search-results
 * Template Types: product-search-results-page
 * Inserter: no
 */

if (class_exists('WooCommerce')) { ?>

	<!-- wp:group {"tagName":"header","style":{"position":{"type":"sticky","top":"0px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
	<header class="wp-block-group has-base-background-color has-background">
		<!-- wp:template-part {"slug":"header","area":"header","tagName":"div"} /-->
	</header>
	<!-- /wp:group -->

	<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<main
		class="wp-block-group"
		style="margin-top:0;margin-bottom:0"
	>
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

		<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
		<div
			style="height:var(--wp--preset--spacing--40)"
			aria-hidden="true"
			class="wp-block-spacer"
		></div>
		<!-- /wp:spacer -->
	</main>
	<!-- /wp:group -->

	<!-- wp:template-part {"slug":"footer","area":"footer","tagName":"footer"} /-->

<?php } else { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This template needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php }
