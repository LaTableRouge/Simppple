<?php
/**
 * Title: Display the date, author of the post
 * Slug: sample/post-date-author
 * Categories: date, author, post
 */
?>

<!-- wp:group {"style":{"spacing":{"blockGap":"0.4rem"}},"className":"pattern\u002d\u002d-post-date-author","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group pattern---post-date-author">
	<!-- wp:post-date /-->

	<!-- wp:paragraph -->
	<p>—</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0.4rem"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}}},"textColor":"contrast-2"} -->
		<p class="has-contrast-2-color has-text-color has-link-color"><?php _e('by', 'sample'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:post-author-name {"isLink":true,"linkTarget":"_blank"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
