<?php
/**
 * Title: List of posts, 2 columns
 * Slug: simppple/posts-2-col
 * Categories: query, simppple-sections
 * Block Types: core/query
 */
?>

<!-- wp:query {"queryId":0,"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"constrained"}} -->
<div class="wp-block-query">
	<!-- wp:query-no-results -->
	<!-- wp:pattern {"slug":"simppple/hidden-no-results"} /-->
	<!-- /wp:query-no-results -->

	<!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":2}} -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0"},"border":{"radius":"10px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
	<div
		class="wp-block-group alignwide has-base-background-color has-background"
		style="border-radius:10px"
	>
		<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"264px","align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"10px","topRight":"10px"}}}} /-->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
		<div
			class="wp-block-group"
			style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"
		>
			<!-- wp:post-terms {"term":"category","separator":"","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

			<!-- wp:post-terms {"term":"post_tag","separator":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"0"}}}} /-->

			<!-- wp:pattern {"slug":"simppple/post-date-author"} /-->

			<!-- wp:post-title {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10","top":"0"}}}} /-->

			<!-- wp:post-excerpt {"moreText":"<?php _e('Read more', 'simppple'); ?>"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- wp:query-pagination-previous {"label":"<?php _e('Newer Posts', 'simppple'); ?>"} /-->

	<!-- wp:query-pagination-next {"label":"<?php _e('Older Posts', 'simppple'); ?>"} /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->