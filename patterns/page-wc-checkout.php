<?php
/**
 * Title: Checkout template
 * Slug: simppple/page-wc-checkout
 * Categories: simppple-wc-templates
 * Keywords: woocommerce, checkout
 * Inserter: no
 */

if (!class_exists('WooCommerce')) { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This template needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php } else { ?>
	<!-- wp:woocommerce/checkout {"align":""} -->
	<div class="wp-block-woocommerce-checkout wc-block-checkout is-loading"><!-- wp:woocommerce/checkout-fields-block -->
		<div class="wp-block-woocommerce-checkout-fields-block"><!-- wp:woocommerce/checkout-express-payment-block -->
			<div class="wp-block-woocommerce-checkout-express-payment-block"></div>
			<!-- /wp:woocommerce/checkout-express-payment-block -->

			<!-- wp:woocommerce/checkout-contact-information-block -->
			<div class="wp-block-woocommerce-checkout-contact-information-block"></div>
			<!-- /wp:woocommerce/checkout-contact-information-block -->

			<!-- wp:woocommerce/checkout-shipping-method-block -->
			<div class="wp-block-woocommerce-checkout-shipping-method-block"></div>
			<!-- /wp:woocommerce/checkout-shipping-method-block -->

			<!-- wp:woocommerce/checkout-pickup-options-block -->
			<div class="wp-block-woocommerce-checkout-pickup-options-block"></div>
			<!-- /wp:woocommerce/checkout-pickup-options-block -->

			<!-- wp:woocommerce/checkout-shipping-address-block -->
			<div class="wp-block-woocommerce-checkout-shipping-address-block"></div>
			<!-- /wp:woocommerce/checkout-shipping-address-block -->

			<!-- wp:woocommerce/checkout-billing-address-block -->
			<div class="wp-block-woocommerce-checkout-billing-address-block"></div>
			<!-- /wp:woocommerce/checkout-billing-address-block -->

			<!-- wp:woocommerce/checkout-shipping-methods-block -->
			<div class="wp-block-woocommerce-checkout-shipping-methods-block"></div>
			<!-- /wp:woocommerce/checkout-shipping-methods-block -->

			<!-- wp:woocommerce/checkout-payment-block -->
			<div class="wp-block-woocommerce-checkout-payment-block"></div>
			<!-- /wp:woocommerce/checkout-payment-block -->

			<!-- wp:woocommerce/checkout-order-note-block -->
			<div class="wp-block-woocommerce-checkout-order-note-block"></div>
			<!-- /wp:woocommerce/checkout-order-note-block -->

			<!-- wp:woocommerce/checkout-terms-block -->
			<div class="wp-block-woocommerce-checkout-terms-block"></div>
			<!-- /wp:woocommerce/checkout-terms-block -->

			<!-- wp:woocommerce/checkout-actions-block -->
			<div class="wp-block-woocommerce-checkout-actions-block"></div>
			<!-- /wp:woocommerce/checkout-actions-block -->
		</div>
		<!-- /wp:woocommerce/checkout-fields-block -->

		<!-- wp:woocommerce/checkout-totals-block -->
		<div class="wp-block-woocommerce-checkout-totals-block"><!-- wp:woocommerce/checkout-order-summary-block -->
			<div class="wp-block-woocommerce-checkout-order-summary-block"><!-- wp:woocommerce/checkout-order-summary-cart-items-block -->
				<div class="wp-block-woocommerce-checkout-order-summary-cart-items-block"></div>
				<!-- /wp:woocommerce/checkout-order-summary-cart-items-block -->

				<!-- wp:woocommerce/checkout-order-summary-coupon-form-block -->
				<div class="wp-block-woocommerce-checkout-order-summary-coupon-form-block"></div>
				<!-- /wp:woocommerce/checkout-order-summary-coupon-form-block -->

				<!-- wp:woocommerce/checkout-order-summary-subtotal-block -->
				<div class="wp-block-woocommerce-checkout-order-summary-subtotal-block"></div>
				<!-- /wp:woocommerce/checkout-order-summary-subtotal-block -->

				<!-- wp:woocommerce/checkout-order-summary-fee-block -->
				<div class="wp-block-woocommerce-checkout-order-summary-fee-block"></div>
				<!-- /wp:woocommerce/checkout-order-summary-fee-block -->

				<!-- wp:woocommerce/checkout-order-summary-discount-block -->
				<div class="wp-block-woocommerce-checkout-order-summary-discount-block"></div>
				<!-- /wp:woocommerce/checkout-order-summary-discount-block -->

				<!-- wp:woocommerce/checkout-order-summary-shipping-block -->
				<div class="wp-block-woocommerce-checkout-order-summary-shipping-block"></div>
				<!-- /wp:woocommerce/checkout-order-summary-shipping-block -->

				<!-- wp:woocommerce/checkout-order-summary-taxes-block -->
				<div class="wp-block-woocommerce-checkout-order-summary-taxes-block"></div>
				<!-- /wp:woocommerce/checkout-order-summary-taxes-block -->
			</div>
			<!-- /wp:woocommerce/checkout-order-summary-block -->
		</div>
		<!-- /wp:woocommerce/checkout-totals-block -->
	</div>
	<!-- /wp:woocommerce/checkout -->
<?php } ?>
