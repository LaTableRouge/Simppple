<?php
/**
 * Title: Header shop top section
 * Slug: simppple/header-shop-top-section
 * Categories: simppple-site-header
 * Keywords: header, menu
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|10","top":"var:preset|spacing|10","right":"0","left":"0"},"blockGap":"0"},"color":{"background":"var(--wp--preset--color--base-2)"}},"className":"pattern---header-top-section","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div
    class="wp-block-group pattern---header-top-section has-background"
    style="background-color:var(--wp--preset--color--base-2);padding-top:var(--wp--preset--spacing--10);padding-right:0;padding-bottom:var(--wp--preset--spacing--10);padding-left:0"
>
    <!-- wp:paragraph -->
    <p><?php _e(			'This is a section of some simple filler text, also known as placeholder text.', 'simppple'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group">
		<!-- wp:woocommerce/mini-cart {"miniCartIcon":"bag-alt","style":{"layout":{"selfStretch":"fit","flexSize":null}}} /-->
		<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"alt","iconClass":"wc-block-customer-account__account-icon","style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->
        <!-- wp:pattern {"slug":"simppple/search-modal"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
