<?php
/**
 * Title: 404
 * Slug: simple/hidden-404
 * Categories: simple-templates
 * Keywords: 404
 */

?>

<!-- wp:group {"tagName":"section","className":"pattern\u002d\u002d-404-v1","layout":{"type":"constrained"}} -->
<section class="wp-block-group pattern---404-v1">
	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"left":"var:preset|spacing|30"}}}} -->
		<div
			class="wp-block-column is-vertically-aligned-center"
			style="padding-left:var(--wp--preset--spacing--30)"
		>
			<!-- wp:heading {"level":1,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"120"} -->
			<h1
				class="wp-block-heading has-120-font-size"
				style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"
			>404</h1>
			<!-- /wp:heading -->

			<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"800"},"spacing":{"margin":{"top":"0"}}},"className":"underlined-title"} -->
			<h2
				class="wp-block-heading underlined-title"
				style="margin-top:0;font-style:normal;font-weight:800"
			>
				<?php echo _e('Oops! That page can&rsquo;t be found.', 'simple'); ?>
			</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>
				<?php _e('It looks like nothing was found at this location. Maybe try searching?', 'simple'); ?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:search {"label":"<?php _e('Search', 'simple') ?>","showLabel":false,"placeholder":"<?php _e('Search a post, a page...', 'simple'); ?>","buttonText":"<?php _e('Search', 'simple') ?>","buttonPosition":"no-button"} /-->

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"fontSize":"30"} -->
			<p
				class="has-30-font-size"
				style="font-style:normal;font-weight:900"
			>
				<?php _e('Or', 'simple'); ?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button -->
				<div class="wp-block-button"><a
						class="wp-block-button__link wp-element-button"
						href="<?php echo get_home_url(); ?>"
					>
						<?php _e('Back to home page', 'simple'); ?>
					</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"id":302,"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image size-full is-resized is-style-rounded">
				<img
					src="<?php echo esc_url(get_template_directory_uri() . SIMPLE_PICTURE_FOLDER . '/404.webp'); ?>"
					alt=""
					class="wp-image-302"
					style="aspect-ratio:3/4;object-fit:cover"
				/>
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
