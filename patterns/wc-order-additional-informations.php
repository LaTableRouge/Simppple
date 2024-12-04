<?php
/**
 * Title: Order - additional informations
 * Slug: simppple/wc-order-additional-informations
 * Categories: simppple-wc-patterns
 * Inserter: no
 */
if (class_exists('WooCommerce')) { ?>

<!-- wp:group {"tagName":"section","className":"pattern\u002d\u002d-wc-additional-informations","layout":{"type":"constrained"}} -->
<section class="wp-block-group pattern---wc-additional-informations">
	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php _e('Additional informations', 'simppple'); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:woocommerce/order-confirmation-additional-information {"align":"","style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->
</section>
<!-- /wp:group -->

<?php } else { ?>
	<!-- wp:paragraph -->
	<p><?php _e('This pattern needs the "Woocommerce" plugin in order to work', 'simppple'); ?></p>
	<!-- /wp:paragraph -->
<?php }
