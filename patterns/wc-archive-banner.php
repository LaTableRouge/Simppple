<?php
/**
 * Title: Products archive banner
 * Slug: simppple/wc-archive-banner
 * Categories: simppple-sections, simppple-wc-patterns
 * Keywords: archive, banner, products, woocommerce
 */

if (class_exists('WooCommerce')) { ?>
	<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri() . '/build/assets/img' . '/placeholder.webp'); ?>","id":878,"dimRatio":50,"focalPoint":{"x":0.5,"y":0.5},"minHeight":300,"minHeightUnit":"px","contentPosition":"top center","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"pattern\u002d\u002d-wc-archive-banner"} -->
	<div
		class="wp-block-cover alignfull is-light has-custom-content-position is-position-top-center pattern---wc-archive-banner"
		style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30);min-height:300px"
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

					<!-- wp:query-title {"type":"archive","textAlign":"center","showPrefix":false,"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|80"}}},"textColor":"white"} /-->

					<!-- wp:term-description {"textAlign":"center","align":"wide","fontSize":"20"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->

<?php } else { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This pattern needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php } ?>
