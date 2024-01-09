<?php
/**
 * Title: Payment insurance
 * Slug: simppple/payment-insurance
 * Categories: simppple-sections
 * Keywords: payment, insurance, columns
 */
?>

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group">
	<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|10"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div
			class="wp-block-column is-vertically-aligned-center"
			style="flex-basis:50%"
		>
			<!-- wp:image {"aspectRatio":"4/3","scale":"contain","sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img
					src="<?php echo esc_url(get_template_directory_uri() . '/build/assets/img' . '/secure-payment.svg'); ?>"
					alt=""
					style="aspect-ratio:4/3;object-fit:contain"
				/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"right":"var:preset|spacing|8","left":"var:preset|spacing|8"}}}} -->
		<div
			class="wp-block-column is-vertically-aligned-center"
			style="padding-right:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--8);flex-basis:50%"
		>
			<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"bottom":"var:preset|spacing|8","top":"0"}}},"fontSize":"20"} -->
			<h3
				class="wp-block-heading has-20-font-size"
				style="margin-top:0;margin-bottom:var(--wp--preset--spacing--8);font-style:normal;font-weight:600"
			>
				<?php _e('Secure payment', 'simppple'); ?>
			</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
			<p style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">Lorem ipsum dolor sit amet.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|10"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div
			class="wp-block-column is-vertically-aligned-center"
			style="flex-basis:50%"
		>
			<!-- wp:image {"aspectRatio":"4/3","scale":"contain","sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img
					src="<?php echo esc_url(get_template_directory_uri() . '/build/assets/img' . '/fast-delivery.svg'); ?>"
					alt=""
					style="aspect-ratio:4/3;object-fit:contain"
				/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"right":"var:preset|spacing|8","left":"var:preset|spacing|8"}}}} -->
		<div
			class="wp-block-column is-vertically-aligned-center"
			style="padding-right:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--8);flex-basis:50%"
		>
			<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"bottom":"var:preset|spacing|8","top":"0"}}},"fontSize":"20"} -->
			<h3
				class="wp-block-heading has-20-font-size"
				style="margin-top:0;margin-bottom:var(--wp--preset--spacing--8);font-style:normal;font-weight:600"
			>
				<?php _e('Fast delivery', 'simppple'); ?>
			</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
			<p style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">Lorem ipsum dolor sit amet.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|10"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile">
		<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
		<div
			class="wp-block-column is-vertically-aligned-center"
			style="flex-basis:50%"
		>
			<!-- wp:image {"aspectRatio":"4/3","scale":"contain","sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large"><img
					src="<?php echo esc_url(get_template_directory_uri() . '/build/assets/img' . '/nice-hand.svg'); ?>"
					alt=""
					style="aspect-ratio:4/3;object-fit:contain"
				/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"right":"var:preset|spacing|8","left":"var:preset|spacing|8"}}}} -->
		<div
			class="wp-block-column is-vertically-aligned-center"
			style="padding-right:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--8);flex-basis:50%"
		>
			<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"bottom":"var:preset|spacing|8","top":"0"}}},"fontSize":"20"} -->
			<h3
				class="wp-block-heading has-20-font-size"
				style="margin-top:0;margin-bottom:var(--wp--preset--spacing--8);font-style:normal;font-weight:600"
			>
				<?php _e('Money back guarantee', 'simppple'); ?>
			</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
			<p style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">Lorem ipsum dolor sit amet.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
