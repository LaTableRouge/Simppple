<?php
/**
 * Title: Archive product template
 * Slug: simppple/template-wc-archive-product
 * Categories: simppple-wc-templates
 * Template Types: archive-product-page
 * Inserter: no
 */

if (class_exists('WooCommerce')) { ?>

	<!-- wp:group {"tagName":"header","style":{"position":{"type":"sticky","top":"0px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
	<header class="wp-block-group has-base-background-color has-background">
		<!-- wp:template-part {"slug":"header-shop","area":"header","tagName":"div"} /-->
	</header>
	<!-- /wp:group -->

	<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|70"}}},"className":"archive-products","layout":{"type":"constrained"}} -->
	<main
		class="wp-block-group archive-products"
		style="margin-top:0;margin-bottom:var(--wp--preset--spacing--70)"
	>
		<!-- wp:pattern {"slug":"simppple/wc-search-banner"} /-->

		<!-- wp:pattern {"slug":"simppple/wc-store-notices"} /-->

		<!-- wp:columns -->
		<div class="wp-block-columns">
			<!-- wp:column {"width":"20%","style":{"spacing":{"padding":{"right":"var:preset|spacing|10","bottom":"0","left":"var:preset|spacing|10"}}}} -->
			<div
				class="wp-block-column"
				style="padding-right:var(--wp--preset--spacing--10);padding-bottom:0;padding-left:var(--wp--preset--spacing--10);flex-basis:20%"
			>
				<!-- wp:pattern {"slug":"simppple/wc-filters-popup"} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"80%","style":{"spacing":{"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10"}}}} -->
			<div
				class="wp-block-column"
				style="padding-right:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10);flex-basis:80%"
			>
				<!-- wp:pattern {"slug":"simppple/products-2-col"} /-->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
		<div
			style="height:var(--wp--preset--spacing--30)"
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
