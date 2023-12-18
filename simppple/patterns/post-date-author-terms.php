<?php
/**
 * Title: Display the date, author & terms of the post
 * Slug: simppple/post-date-author-terms
 * Categories: date, author, terms, post
 */
?>

<!-- wp:group {"style":{"spacing":{"blockGap":"0.4rem"}},"className":"pattern\u002d\u002d-post-date-author-terms","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group pattern---post-date-author-terms">
	<!-- wp:post-date /-->

	<!-- wp:paragraph -->
	<p>—</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0.4rem"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}}},"textColor":"contrast-2"} -->
		<p class="has-contrast-2-color has-text-color has-link-color"><?php _e('by', 'simppple'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:post-author-name {"isLink":true,"linkTarget":"_blank"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0.4rem"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}}},"textColor":"contrast-2"} -->
		<p class="has-contrast-2-color has-text-color has-link-color"><?php _e('in', 'simppple'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:post-terms {"term":"category"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
