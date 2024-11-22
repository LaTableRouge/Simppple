<?php
/**
 * Title: Order - additional informations
 * Slug: simppple/wc-order-confirmation-addresses
 * Inserter: no
 */
if (class_exists('WooCommerce')) { ?>

<!-- wp:columns {"align":"","className":"woocommerce-order-confirmation-address-wrapper"} -->
<div class="wp-block-columns woocommerce-order-confirmation-address-wrapper">
	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:woocommerce/order-confirmation-shipping-wrapper {"align":""} -->
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php _e('Shipping address', 'simppple'); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:woocommerce/order-confirmation-shipping-address {"lock":{"remove":true}} /-->
		<!-- /wp:woocommerce/order-confirmation-shipping-wrapper -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:woocommerce/order-confirmation-billing-wrapper {"align":"","style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
		<!-- wp:heading -->
		<h2 class="wp-block-heading"><?php _e('Billing address', 'simppple'); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:woocommerce/order-confirmation-billing-address {"lock":{"remove":true},"style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->
		<!-- /wp:woocommerce/order-confirmation-billing-wrapper -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<?php } else { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This pattern needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php }
