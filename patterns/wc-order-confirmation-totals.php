<?php
/**
 * Title: Order - additional informations
 * Slug: simppple/wc-order-confirmation-totals
 * Inserter: no
 */
if (class_exists('WooCommerce')) { ?>

<!-- wp:woocommerce/order-confirmation-totals-wrapper {"align":""} -->
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php _e('Order details', 'simppple'); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:woocommerce/order-confirmation-totals {"lock":{"remove":true}} /-->
<!-- /wp:woocommerce/order-confirmation-totals-wrapper -->

<?php } else { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This pattern needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php }
