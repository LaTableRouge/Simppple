<?php
/**
 * Title: Taxonomy product template
 * Slug: simppple/page-wc-taxonomy-product
 * Categories: simppple-wc-templates
 * Keywords: woocommerce, taxonomy, product
 * Inserter: no
 */

if (!class_exists('WooCommerce')) { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This template needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php } else { ?>
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
<?php } ?>
