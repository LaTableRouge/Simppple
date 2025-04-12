<?php
/**
 * Title: Cart template
 * Slug: simppple/page-wc-cart
 * Categories: simppple-wc-templates
 * Keywords: woocommerce, cart
 * Inserter: no
 */

if (!class_exists('WooCommerce')) { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This template needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php } else { ?>
	<!-- wp:pattern {"slug":"simppple/wc-breadcrumbs"} /-->

	<!-- wp:pattern {"slug":"simppple/wc-store-notices"} /-->

	<!-- wp:woocommerce/cart {"align":""} -->
	<div class="wp-block-woocommerce-cart is-loading">
		<!-- wp:woocommerce/filled-cart-block -->
		<div class="wp-block-woocommerce-filled-cart-block">
			<!-- wp:woocommerce/cart-items-block -->
			<div class="wp-block-woocommerce-cart-items-block">
				<!-- wp:woocommerce/cart-line-items-block -->
				<div class="wp-block-woocommerce-cart-line-items-block"></div>
				<!-- /wp:woocommerce/cart-line-items-block -->

				<!-- wp:woocommerce/cart-cross-sells-block -->
				<div class="wp-block-woocommerce-cart-cross-sells-block">
					<!-- wp:heading {"fontSize":"large"} -->
					<h2 class="wp-block-heading has-large-font-size"><?php _e('You may be interested in…', 'simppple'); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/cart-cross-sells-products-block -->
					<div class="wp-block-woocommerce-cart-cross-sells-products-block"></div>
					<!-- /wp:woocommerce/cart-cross-sells-products-block -->
				</div>
				<!-- /wp:woocommerce/cart-cross-sells-block -->
			</div>
			<!-- /wp:woocommerce/cart-items-block -->

			<!-- wp:woocommerce/cart-totals-block -->
			<div class="wp-block-woocommerce-cart-totals-block">
				<!-- wp:woocommerce/cart-order-summary-block -->
				<div class="wp-block-woocommerce-cart-order-summary-block">
					<!-- wp:woocommerce/cart-order-summary-heading-block -->
					<div class="wp-block-woocommerce-cart-order-summary-heading-block"></div>
					<!-- /wp:woocommerce/cart-order-summary-heading-block -->

					<!-- wp:woocommerce/cart-order-summary-coupon-form-block -->
					<div class="wp-block-woocommerce-cart-order-summary-coupon-form-block"></div>
					<!-- /wp:woocommerce/cart-order-summary-coupon-form-block -->

					<!-- wp:woocommerce/cart-order-summary-subtotal-block -->
					<div class="wp-block-woocommerce-cart-order-summary-subtotal-block"></div>
					<!-- /wp:woocommerce/cart-order-summary-subtotal-block -->

					<!-- wp:woocommerce/cart-order-summary-fee-block -->
					<div class="wp-block-woocommerce-cart-order-summary-fee-block"></div>
					<!-- /wp:woocommerce/cart-order-summary-fee-block -->

					<!-- wp:woocommerce/cart-order-summary-discount-block -->
					<div class="wp-block-woocommerce-cart-order-summary-discount-block"></div>
					<!-- /wp:woocommerce/cart-order-summary-discount-block -->

					<!-- wp:woocommerce/cart-order-summary-shipping-block -->
					<div class="wp-block-woocommerce-cart-order-summary-shipping-block"></div>
					<!-- /wp:woocommerce/cart-order-summary-shipping-block -->

					<!-- wp:woocommerce/cart-order-summary-taxes-block -->
					<div class="wp-block-woocommerce-cart-order-summary-taxes-block"></div>
					<!-- /wp:woocommerce/cart-order-summary-taxes-block -->
				</div>
				<!-- /wp:woocommerce/cart-order-summary-block -->

				<!-- wp:woocommerce/cart-express-payment-block -->
				<div class="wp-block-woocommerce-cart-express-payment-block"></div>
				<!-- /wp:woocommerce/cart-express-payment-block -->

				<!-- wp:woocommerce/proceed-to-checkout-block -->
				<div class="wp-block-woocommerce-proceed-to-checkout-block"></div>
				<!-- /wp:woocommerce/proceed-to-checkout-block -->

				<!-- wp:woocommerce/cart-accepted-payment-methods-block -->
				<div class="wp-block-woocommerce-cart-accepted-payment-methods-block"></div>
				<!-- /wp:woocommerce/cart-accepted-payment-methods-block -->
			</div>
			<!-- /wp:woocommerce/cart-totals-block -->
		</div>
		<!-- /wp:woocommerce/filled-cart-block -->

		<!-- wp:woocommerce/empty-cart-block -->
		<div class="wp-block-woocommerce-empty-cart-block">
			<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"align":"center","width":"309px","height":266,"scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image aligncenter size-full is-resized">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/build/assets/img' . '/empty-cart.svg'); ?>" alt="" style="object-fit:contain;width:309px;height:266px"/>
				</figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"textAlign":"center","level":1,"className":"underlined-title"} -->
			<h1 class="wp-block-heading has-text-align-center underlined-title"><?php _e('Your cart is empty!', 'simppple'); ?></h1>
			<!-- /wp:heading -->

			<?php if (function_exists('wc_get_page_permalink')) { ?>
				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a
							class="wp-block-button__link wp-element-button"
							href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
						><?php _e('Explore the products...', 'simppple'); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			<?php } ?>

			<!-- wp:spacer {"height":"80px"} -->
			<div
				style="height:80px"
				aria-hidden="true"
				class="wp-block-spacer"
			></div>
			<!-- /wp:spacer -->

			<!-- wp:heading {"textAlign":"center","className":"underlined-title"} -->
			<h2 class="wp-block-heading has-text-align-center underlined-title"><?php _e('Search products…', 'simppple'); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:pattern {"slug":"simppple/hidden-search-products"} /-->
		</div>
		<!-- /wp:woocommerce/empty-cart-block -->
	</div>
	<!-- /wp:woocommerce/cart -->
<?php } ?>
