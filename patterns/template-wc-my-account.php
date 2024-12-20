<?php
/**
 * Title: My account template
 * Slug: simppple/template-wc-my-account
 * Categories: simppple-wc-templates
 * Template Types: my-account-page
 * Inserter: no
 */
if (class_exists('WooCommerce')) { ?>

	<!-- wp:group {"tagName":"header","style":{"position":{"type":"sticky","top":"0px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
	<header class="wp-block-group has-base-background-color has-background">
		<!-- wp:template-part {"slug":"header","area":"header","tagName":"div"} /-->
	</header>
	<!-- /wp:group -->

	<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
	<main
		class="wp-block-group"
		style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70)"
	>
		<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
		<div
			style="height:var(--wp--preset--spacing--40)"
			aria-hidden="true"
			class="wp-block-spacer"
		></div>
		<!-- /wp:spacer -->

		<!-- wp:group {"tagName":"section","layout":{"type":"constrained","justifyContent":"center"}} -->
		<section class="wp-block-group">
			<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
			<div class="wp-block-columns are-vertically-aligned-center">
				<!-- wp:column {"verticalAlignment":"center","className":"my-account__content-wrapper"} -->
				<div class="wp-block-column is-vertically-aligned-center my-account__content-wrapper">
					<!-- wp:shortcode -->
					<?php echo do_shortcode('[woocommerce_my_account]'); ?>
					<!-- /wp:shortcode -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","className":"my-account__deco-wrapper"} -->
				<div class="wp-block-column is-vertically-aligned-center my-account__deco-wrapper">
					<!-- wp:pattern {"slug":"simppple/hidden-sample-picture-rounded"} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</section>
		<!-- /wp:group -->

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
<?php } ?>
