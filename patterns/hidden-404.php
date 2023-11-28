<?php
/**
 * Title: 404
 * Slug: simple/hidden-404
 * Categories: simple-templates
 * Keywords: 404
 */
?>

<!-- wp:group {"tagName":"section","className":"pattern\u002d\u002d-404-v1","layout":{"type":"constrained","justifyContent":"center"}} -->
<section class="wp-block-group pattern---404-v1">
	<!-- wp:image {"align":"center","id":302,"width":"300px","height":"300px","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-resized is-style-rounded"} -->
	<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded">
		<img
			src="<?php echo esc_url(get_template_directory_uri() . SIMPLE_PICTURE_FOLDER . '/404.webp'); ?>"
			alt=""
			class="wp-image-302"
			style="object-fit:cover;width:300px;height:300px"
		/>
	</figure>
	<!-- /wp:image -->

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"120"} -->
	<h1
		class="wp-block-heading has-text-align-center has-120-font-size"
		style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"
	>404</h1>
	<!-- /wp:heading -->

	<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"800"},"spacing":{"margin":{"top":"0"}}},"className":"underlined-title"} -->
	<h2
		class="wp-block-heading has-text-align-center underlined-title"
		style="margin-top:0;font-style:normal;font-weight:800"
	><?php echo _e("Oops! That page can't be found.", 'simple'); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php _e('It looks like nothing was found at this location. Maybe try searching?', 'simple'); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search a post, a page...","width":75,"widthUnit":"%","buttonText":"Search","buttonPosition":"no-button","align":"center"} /-->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"fontSize":"30"} -->
	<p
		class="has-text-align-center has-30-font-size"
		style="font-style:normal;font-weight:900"
	><?php _e('Or', 'simple'); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button">
			<a
				class="wp-block-button__link wp-element-button"
				href="<?php echo get_home_url(); ?>"
			><?php _e('Back to home page', 'simple'); ?></a>
		</div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->
