<?php
/**
 * Title: Order - additional informations
 * Slug: simppple/wc-order-confirmation-downloads
 * Categories: simppple-wc-patterns
 * Inserter: no
 */
if (class_exists('WooCommerce')) { ?>

<!-- wp:woocommerce/order-confirmation-downloads-wrapper {"align":""} -->
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php _e('Downloads', 'simppple'); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:woocommerce/order-confirmation-downloads {"lock":{"remove":true}} /-->
<!-- /wp:woocommerce/order-confirmation-downloads-wrapper -->

<?php } else { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This pattern needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php }
