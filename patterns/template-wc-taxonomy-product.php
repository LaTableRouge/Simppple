<?php
/**
 * Title: Taxonomy product template
 * Slug: simppple/template-wc-taxonomy-product
 * Categories: simppple-wc-templates
 * Template Types: taxonomy-product-page
 * Inserter: no
 */

if (class_exists('WooCommerce')) { ?>
	<!-- wp:group {"tagName":"header","style":{"position":{"type":"sticky","top":"0px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
	<header class="wp-block-group has-base-background-color has-background">
		<!-- wp:template-part {"slug":"header","area":"header","tagName":"div"} /-->
	</header>
	<!-- /wp:group -->

	<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"archive-products","layout":{"type":"constrained"}} -->
	<main
		class="wp-block-group archive-products"
		style="margin-top:0;margin-bottom:0"
	>
		<!-- wp:pattern {"slug":"simppple/wc-archive-banner"} /-->

		<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
		<div
			style="height:var(--wp--preset--spacing--30)"
			aria-hidden="true"
			class="wp-block-spacer"
		></div>
		<!-- /wp:spacer -->

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:pattern {"slug":"simppple/products-3-col"} /-->
		</div>
		<!-- /wp:group -->

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
