<?php
/**
 * Title: My account template
 * Slug: simppple/page-wc-my-account
 * Categories: simppple-wc-templates
 * Keywords: woocommerce, my account
 * Inserter: no
 */

if (!class_exists('WooCommerce')) { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This template needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php } else { ?>
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
<?php } ?>
