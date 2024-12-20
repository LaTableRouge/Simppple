<?php
/**
 * Title: Order confirmation template
 * Slug: simppple/template-wc-order-confirmation
 * Categories: simppple-wc-templates
 * Template Types: order-confirmation-page
 * Inserter: no
 */

if (class_exists('WooCommerce')) { ?>

	<!-- wp:group {"tagName":"header","style":{"position":{"type":"sticky","top":"0px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
	<header class="wp-block-group has-base-background-color has-background">
		<!-- wp:template-part {"slug":"header","area":"header","tagName":"div"} /-->
	</header>
	<!-- /wp:group -->

	<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<main
		class="wp-block-group"
		style="margin-top:0;margin-bottom:0"
	>
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

		<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
		<div
			style="height:var(--wp--preset--spacing--40)"
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
