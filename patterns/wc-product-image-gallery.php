<?php
/**
 * Title: Woocommerce product image gallery
 * Slug: simppple/wc-product-image-gallery
 * Categories: simppple-sections, simppple-wc-patterns
 * Keywords: woocommerce, product, gallery
 */
if (class_exists('WooCommerce')) { ?>

<!-- wp:group {"className":"pattern---wc-product-image-gallery","layout":{"type":"constrained"}} -->
<div class="wp-block-group pattern---wc-product-image-gallery">
	<!-- wp:woocommerce/product-image-gallery /-->
</div>
<!-- /wp:group -->

<?php } else { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This pattern needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php }
