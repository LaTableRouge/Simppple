<?php
/**
 * Title: Woocommerce related products
 * Slug: simppple/wc-related-products
 * Inserter: no
 */
?>

<!-- wp:woocommerce/related-products {"align":"center","className":"pattern---wc-related-products"} -->
<div class="wp-block-woocommerce-related-products aligncenter pattern---wc-related-products"><!-- wp:query {"queryId":11,"query":{"perPage":5,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false},"tagName":"section","displayLayout":{"type":"flex","columns":6},"namespace":"woocommerce/related-products","lock":{"remove":true,"move":true}} -->
	<section class="wp-block-query"><!-- wp:heading {"textAlign":"center","className":"underlined-title"} -->
		<h2 class="wp-block-heading has-text-align-center underlined-title"><?php _e('Related products', 'simppple'); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:post-template {"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->
		<!-- wp:woocommerce/product-image {"isDescendentOfQueryLoop":true} /-->

		<!-- wp:post-title {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|10","right":"0","bottom":"var:preset|spacing|10","left":"0"}}},"fontSize":"16","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

		<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->

		<!-- wp:woocommerce/product-button {"textAlign":"left","isDescendentOfQueryLoop":true,"fontSize":"small","style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->
		<!-- /wp:post-template -->
	</section>
	<!-- /wp:query -->
</div>
<!-- /wp:woocommerce/related-products -->
