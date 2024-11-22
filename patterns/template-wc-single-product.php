<?php
/**
 * Title: Single product template
 * Slug: simppple/template-wc-single-product
 * Categories: simppple-wc-templates
 * Template Types: single-product-page
 * Inserter: no
 */

if (class_exists('WooCommerce')) { ?>
	<!-- wp:group {"tagName":"header","style":{"position":{"type":"sticky","top":"0px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
	<header class="wp-block-group has-base-background-color has-background"><!-- wp:template-part {"slug":"header","tagName":"div"} /--></header>
	<!-- /wp:group -->

	<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|70"}}},"className":"single-product","layout":{"type":"constrained"}} -->
	<main
		class="wp-block-group single-product"
		style="margin-top:0;margin-bottom:var(--wp--preset--spacing--70)"
	>

		<!-- wp:pattern {"slug":"simppple/wc-breadcrumbs"} /-->

		<!-- wp:pattern {"slug":"simppple/wc-store-notices"} /-->

		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"top","align":"full","className":"single-product__product-wrapper"} -->
			<div class="wp-block-columns alignfull are-vertically-aligned-top single-product__product-wrapper">
				<!-- wp:column {"verticalAlignment":"top"} -->
				<div class="wp-block-column is-vertically-aligned-top">
					<!-- wp:pattern {"slug":"simppple/wc-product-image-gallery"} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"top","className":"product-wrapper__infos-wrapper"} -->
				<div class="wp-block-column is-vertically-aligned-top product-wrapper__infos-wrapper">
					<!-- wp:post-title {"level":1,"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"var:preset|spacing|10"}}},"__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

					<!-- wp:post-excerpt {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"var:preset|spacing|40"}}},"__woocommerceNamespace":"woocommerce/product-query/product-summary"} /-->

					<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductTemplate":true} /-->

					<!-- wp:separator {"backgroundColor":"contrast-3"} -->
					<hr class="wp-block-separator has-text-color has-contrast-3-color has-alpha-channel-opacity has-contrast-3-background-color has-background" />
					<!-- /wp:separator -->

					<!-- wp:woocommerce/add-to-cart-form /-->

					<!-- wp:separator {"backgroundColor":"contrast-3"} -->
					<hr class="wp-block-separator has-text-color has-contrast-3-color has-alpha-channel-opacity has-contrast-3-background-color has-background" />
					<!-- /wp:separator -->

					<!-- wp:woocommerce/product-meta -->
					<div class="wp-block-woocommerce-product-meta">
						<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
						<div class="wp-block-group">
							<!-- wp:woocommerce/product-sku {"isDescendentOfSingleProductTemplate":true} /-->

							<!-- wp:post-terms {"term":"product_cat","prefix":"Category: "} /-->

							<!-- wp:post-terms {"term":"product_tag","prefix":"Tags: "} /-->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:woocommerce/product-meta -->

					<!-- wp:woocommerce/product-details {"align":"wide"} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"align":"full","style":{"color":{"background":"hsla(var(--wp--custom--accent-hsl), 0.2)"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"layout":{"type":"constrained"}} -->
		<div
			class="wp-block-group alignfull has-background"
			style="background-color:hsla(var(--wp--custom--accent-hsl), 0.2);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"
		>
			<!-- wp:group {"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:pattern {"slug":"simppple/hidden-sample-paragraph"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
		<div
			style="height:var(--wp--preset--spacing--40)"
			aria-hidden="true"
			class="wp-block-spacer"
		></div>
		<!-- /wp:spacer -->

		<!-- wp:pattern {"slug":"simppple/payment-insurance"} /-->

		<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
		<div
			style="height:var(--wp--preset--spacing--30)"
			aria-hidden="true"
			class="wp-block-spacer"
		></div>
		<!-- /wp:spacer -->

		<!-- wp:separator {"style":{"color":{"background":"var(--wp--preset--color--contrast)"}}} -->
		<hr
			class="wp-block-separator has-text-color has-alpha-channel-opacity has-background"
			style="background-color:var(--wp--preset--color--contrast);color:var(--wp--preset--color--contrast)"
		/>
		<!-- /wp:separator -->

		<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
		<div
			style="height:var(--wp--preset--spacing--30)"
			aria-hidden="true"
			class="wp-block-spacer"
		></div>
		<!-- /wp:spacer -->

		<!-- wp:pattern {"slug":"simppple/wc-related-products"} /-->

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
