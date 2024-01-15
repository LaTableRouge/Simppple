<?php
/**
 * Title: Products research banner
 * Slug: simppple/wc-search-banner
 * Categories: simppple-sections
 * Keywords: search, banner, products, woocommerce
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri() . '/build/assets/img' . '/placeholder.webp'); ?>","id":878,"dimRatio":50,"focalPoint":{"x":0.5,"y":0.5},"isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"pattern\u002d\u002d-wc-search-banner"} -->
<div
	class="wp-block-cover alignfull is-light pattern---wc-search-banner"
	style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)"
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
			<!-- wp:group {"textColor":"white","layout":{"type":"constrained","justifyContent":"left"}} -->
			<div class="wp-block-group has-white-color has-text-color">
				<!-- wp:woocommerce/breadcrumbs {"textColor":"white","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"},":hover":{"color":{"text":"var:preset|color|white"}}}}}} /-->

				<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"top":"var:preset|spacing|80"}}}} -->
				<h1
					class="wp-block-heading has-text-align-center"
					style="margin-top:var(--wp--preset--spacing--80)"
				><?php _e('Shop', 'simppple'); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:search {"label":"<?php _e('Search a product', 'simppple'); ?>","showLabel":false,"placeholder":"<?php _e('Search a product...', 'simppple'); ?>","buttonText":"<?php _e('Search', 'simppple'); ?>","buttonPosition":"no-button"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->
