<?php
/**
 * Title: List of products, 3 columns
 * Slug: simppple/products-3-col
 * Categories: query, simppple-sections
 * Block Types: core/query
 */
?>

<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"woocommerceAttributes":[],"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceOnSale":false,"woocommerceHandPickedProducts":[],"taxQuery":{},"isProductCollectionBlock":true,"perPage":9,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true,"featured":false},"tagName":"div","displayLayout":{"type":"flex","columns":3},"convertedFromProducts":true,"layout":{"type":"constrained"}} -->
<div class="wp-block-woocommerce-product-collection"><!-- wp:woocommerce/product-template -->
			<!-- wp:woocommerce/product-image {"saleBadgeAlign":"left","imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->

			<!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"0"},"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"fontSize":"16","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

			<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"left","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} /-->

			<!-- wp:woocommerce/product-button {"textAlign":"left","isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
			<!-- /wp:woocommerce/product-template -->

			<!-- wp:query-pagination {"paginationArrow":"arrow","showLabel":false,"layout":{"type":"flex","justifyContent":"center"}} -->
			<!-- wp:query-pagination-previous {"label":"<?php _e('Previous page', 'simppple'); ?>"} /-->

			<!-- wp:query-pagination-numbers /-->

			<!-- wp:query-pagination-next {"label":"<?php _e('Next page', 'simppple'); ?>"} /-->
			<!-- /wp:query-pagination -->

			<!-- wp:query-no-results -->
			<!-- wp:pattern {"slug":"simppple/hidden-products-no-results"} /-->
			<!-- /wp:query-no-results --></div>
			<!-- /wp:woocommerce/product-collection -->
