<?php
/**
 * Title: Order confirmation page
 * Slug: simppple/page-wc-order-confirmation
 * Categories: simppple-wc-templates
 * Keywords: woocommerce, order confirmation
 * Inserter: no
 */

if (!class_exists('WooCommerce')) { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This template needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php } else { ?>
	<!-- wp:pattern {"slug":"simppple/wc-breadcrumbs"} /-->

	<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
	<div
		style="height:var(--wp--preset--spacing--40)"
		aria-hidden="true"
		class="wp-block-spacer"
	></div>
	<!-- /wp:spacer -->

	<!-- wp:woocommerce/order-confirmation-status {"align":"","fontSize":"40","style":{"typography":{"fontStyle":"normal","fontWeight":"900","lineHeight":"1.15"}}} /-->

	<!-- wp:woocommerce/order-confirmation-summary {"align":""} /-->

	<!-- wp:pattern {"slug":"simppple/wc-order-confirmation-totals"} /-->

	<!-- wp:pattern {"slug":"simppple/wc-order-confirmation-downloads"} /-->

	<!-- wp:pattern {"slug":"simppple/wc-order-confirmation-addresses"} /-->


	<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}}} -->
	<hr
		class="wp-block-separator has-alpha-channel-opacity"
		style="margin-top:var(--wp--preset--spacing--80);margin-bottom:var(--wp--preset--spacing--80)"
	/>
	<!-- /wp:separator -->

	<!-- wp:pattern {"slug":"simppple/wc-order-additional-informations"} /-->
<?php }
