<?php
/**
 * Title: Research banner
 * Slug: simppple/search-banner
 * Categories: simppple-sections
 * Keywords: search, banner
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri() . '/build/assets/img' . '/placeholder.webp'); ?>","id":878,"dimRatio":50,"focalPoint":{"x":0.5,"y":0.5},"isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|120","bottom":"var:preset|spacing|120"}}},"className":"pattern\u002d\u002d-search-banner"} -->
<div
	class="wp-block-cover alignfull is-light pattern---search-banner"
	style="padding-top:var(--wp--preset--spacing--120);padding-bottom:var(--wp--preset--spacing--120)"
>
	<span
		aria-hidden="true"
		class="wp-block-cover__background has-background-dim"
	></span>
	<img
		class="wp-block-cover__image-background wp-image-878"
		alt=""
		src="<?php echo esc_url(get_template_directory_uri() . '/build/assets/img' . '/placeholder.webp'); ?>"
		style="object-position:50% 50%"
		data-object-fit="cover"
		data-object-position="50% 50%"
	/>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"textColor":"white","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-white-color has-text-color">
				<!-- wp:heading {"textAlign":"center","level":1} -->
				<h1 class="wp-block-heading has-text-align-center">Lorem ipsum dolor sit amet, <br>consetetur sadipscing !</h1>
				<!-- /wp:heading -->

				<!-- wp:spacer {"height":"40px"} -->
				<div
					style="height:40px"
					aria-hidden="true"
					class="wp-block-spacer"
				></div>
				<!-- /wp:spacer -->

				<!-- wp:search {"label":"Search\u003e","showLabel":false,"buttonText":"Search\u003e","buttonPosition":"no-button"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->
