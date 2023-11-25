<?php
/**
 * Title: List of posts, 2 columns
 * Slug: simple/posts-2-col
 * Categories: query, simple-sections
 * Block Types: core/query
 */
?>

<!-- wp:query {"queryId":0,"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"constrained"}} -->
<div class="wp-block-query"><!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":2}} -->
		<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","width":"100%","height":"264px","align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}}} /-->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
		<div
			class="wp-block-group"
			style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"
		>
			<!-- wp:post-terms {"term":"category","separator":"","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

			<!-- wp:post-terms {"term":"post_tag","separator":"","style":{"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"0"}}}} /-->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.4rem"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-group">
				<!-- wp:post-date /-->

				<!-- wp:paragraph -->
				<p>—</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0.4rem"}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"horizontal"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}}},"textColor":"contrast-2"} -->
					<p class="has-contrast-2-color has-text-color has-link-color">by</p>
					<!-- /wp:paragraph -->

					<!-- wp:post-author-name {"isLink":true,"linkTarget":"_blank"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-title {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10","top":"0"}}}} /-->

			<!-- wp:post-excerpt {"moreText":"Lire l'article"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous {"label":"Newer Posts"} /-->

		<!-- wp:query-pagination-next {"label":"Older Posts"} /-->
		<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:query -->
