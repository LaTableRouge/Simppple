<?php
/**
 * Title: Woocommerce store notices
 * Slug: simppple/wc-store-notices
 * Categories: simppple-sections
 * Keywords: woocommerce, notices
 */

if (class_exists('WooCommerce')) { ?>
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"},"margin":{"top":"0","bottom":"0"}}},"className":"single-product__notifications-wrapper","layout":{"type":"constrained"}} -->
	<div
		class="wp-block-group alignfull single-product__notifications-wrapper"
		style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)"
	><!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:woocommerce/store-notices /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

<?php } else { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This pattern needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php }
