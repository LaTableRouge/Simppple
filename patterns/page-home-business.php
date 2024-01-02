<?php
/**
 * Title: Business home
 * Slug: simppple/page-home-business
 * Categories: simppple-templates
 * Keywords: starter, home
 * Block Types: core/post-content
 * Post Types: page, wp_template
 */
?>

<!-- wp:pattern {"slug":"simppple/search-banner"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
<div
	style="height:var(--wp--preset--spacing--30)"
	aria-hidden="true"
	class="wp-block-spacer"
></div>
<!-- /wp:spacer -->

<!-- wp:pattern {"slug":"simppple/masonry-text"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
<div
	style="height:var(--wp--preset--spacing--30)"
	aria-hidden="true"
	class="wp-block-spacer"
></div>
<!-- /wp:spacer -->

<!-- wp:pattern {"slug":"simppple/img-img"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
<div
	style="height:var(--wp--preset--spacing--30)"
	aria-hidden="true"
	class="wp-block-spacer"
></div>
<!-- /wp:spacer -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity" />
<!-- /wp:separator -->

<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
<div
	style="height:var(--wp--preset--spacing--30)"
	aria-hidden="true"
	class="wp-block-spacer"
></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":1,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"enhancedPagination":true,"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
	<!-- wp:query-no-results -->
	<!-- wp:pattern {"slug":"simppple/hidden-no-results"} /-->
	<!-- /wp:query-no-results -->

	<!-- wp:post-template {"align":"wide","layout":{"type":"default","columnCount":3}} -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
	<div
		class="wp-block-group alignwide"
		style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"
	>
		<!-- wp:columns -->
		<div class="wp-block-columns">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|32"}}}} /-->

				<!-- wp:pattern {"slug":"simppple/post-date-author-terms"} /-->

				<!-- wp:post-excerpt {"moreText":"<?php _e('Read more', 'simppple'); ?>"} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","width":"100%","height":"250px","align":"wide","style":{"border":{"radius":"10px"}}} /--></div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- wp:query-pagination-previous {"label":"<?php _e('Newer Posts', 'simppple'); ?>"} /-->

	<!-- wp:query-pagination-next {"label":"<?php _e('Older Posts', 'simppple'); ?>"} /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->

<!-- wp:spacer {"height":"120px"} -->
<div
	style="height:120px"
	aria-hidden="true"
	class="wp-block-spacer"
></div>
<!-- /wp:spacer -->
