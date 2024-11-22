<?php
/**
 * Title: Woocommerce breadcrumbs
 * Slug: simppple/wc-breadcrumbs
 * Categories: simppple-sections
 * Keywords: woocommerce, breadcrumbs
 */
if (class_exists('WooCommerce')) { ?>

<!-- wp:group {"align":"full","style":{"color":{"background":"hsla(var(--wp--custom--accent-2-hsl), 0.2)"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"className":"pattern---wc-breadcrumbs","layout":{"type":"constrained"}} -->
<div
	class="wp-block-group alignfull pattern---wc-breadcrumbs has-background"
	style="background-color:hsla(var(--wp--custom--accent-2-hsl), 0.2);padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"
>
	<!-- wp:group {"layout":{"type":"default"}} -->
	<div class="wp-block-group"><!-- wp:woocommerce/breadcrumbs {"textColor":"contrast","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|contrast"}}}}}} /--></div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<?php } else { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This pattern needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php }
