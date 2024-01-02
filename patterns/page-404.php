<?php
/**
 * Title: 404
 * Slug: simppple/page-404
 * Categories: simppple-templates
 * Keywords: starter, 404
 * Block Types: core/post-content
 * Post Types: page, wp_template
 */
?>

<!-- wp:group {"tagName":"section","className":"pattern\u002d\u002d-404-v1","layout":{"type":"constrained","justifyContent":"center"}} -->
<section class="wp-block-group pattern---404-v1">
	<!-- wp:image {"align":"center","id":302,"width":"300px","height":"300px","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-resized is-style-rounded"} -->
	<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded">
		<img
			src="<?php echo esc_url(get_template_directory_uri() . '/build/assets/img' . '/404.webp'); ?>"
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
	><?php echo _e("Oops! That page can't be found.", 'simppple'); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php _e('It looks like nothing was found at this location. Maybe try searching?', 'simppple'); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"<?php _e('Search', 'simppple'); ?>","showLabel":false,"placeholder":"<?php _e('Search a post, a page...', 'simppple'); ?>","width":75,"widthUnit":"%","buttonText":"<?php _e('Search', 'simppple'); ?>","buttonPosition":"no-button","align":"center"} /-->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"900"}},"fontSize":"30"} -->
	<p
		class="has-text-align-center has-30-font-size"
		style="font-style:normal;font-weight:900"
	><?php _e('Or', 'simppple'); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button">
			<a
				class="wp-block-button__link wp-element-button"
				href="<?php echo get_home_url(); ?>"
			><?php _e('Back to home page', 'simppple'); ?></a>
		</div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</section>
<!-- /wp:group -->
