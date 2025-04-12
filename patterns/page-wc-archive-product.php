<?php
/**
 * Title: Archive product template
 * Slug: simppple/page-wc-archive-product
 * Categories: simppple-wc-templates
 * Keywords: woocommerce, archive, product
 * Inserter: no
 */

if (!class_exists('WooCommerce')) { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This template needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php } else { ?>
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
<?php }
