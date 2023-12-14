<?php
/**
 * Title: Masonry/Text
 * Slug: simppple/masonry-text
 * Categories: simppple-sections
 * Keywords: pictures, text, masonry
 */
?>

<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|30"}}},"className":"pattern\u002d\u002d-masonry-text","layout":{"type":"constrained"}} -->
<section
	class="wp-block-group pattern---masonry-text"
	style="margin-top:var(--wp--preset--spacing--30);padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"
>
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"style":{"spacing":{"padding":{"top":"50px","bottom":"50px"}}}} -->
		<div
			class="wp-block-column"
			style="padding-top:50px;padding-bottom:50px"
		>
			<!-- wp:gallery {"columns":2,"linkTo":"none","sizeSlug":"medium","align":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
			<figure class="wp-block-gallery alignfull has-nested-images columns-2 is-cropped">
				<!-- wp:image {"id":52,"sizeSlug":"medium","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
				<figure class="wp-block-image size-medium has-custom-border">
					<img
						src="<?php echo esc_url(get_template_directory_uri() . SIMPPPLE_PICTURE_FOLDER . '/placeholder.webp'); ?>"
						alt=""
						class="wp-image-52"
						style="border-radius:10px"
					/>
				</figure>
				<!-- /wp:image -->

				<!-- wp:image {"id":53,"sizeSlug":"medium","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
				<figure class="wp-block-image size-medium has-custom-border">
					<img
						src="<?php echo esc_url(get_template_directory_uri() . SIMPPPLE_PICTURE_FOLDER . '/placeholder.webp'); ?>"
						alt=""
						class="wp-image-53"
						style="border-radius:10px"
					/>
				</figure>
				<!-- /wp:image -->

				<!-- wp:image {"id":50,"sizeSlug":"medium","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
				<figure class="wp-block-image size-medium has-custom-border">
					<img
						src="<?php echo esc_url(get_template_directory_uri() . SIMPPPLE_PICTURE_FOLDER . '/placeholder.webp'); ?>"
						alt=""
						class="wp-image-50"
						style="border-radius:10px"
					/>
				</figure>
				<!-- /wp:image -->

				<!-- wp:image {"id":47,"sizeSlug":"medium","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
				<figure class="wp-block-image size-medium has-custom-border">
					<img
						src="<?php echo esc_url(get_template_directory_uri() . SIMPPPLE_PICTURE_FOLDER . '/placeholder.webp'); ?>"
						alt=""
						class="wp-image-47"
						style="border-radius:10px"
					/>
				</figure>
				<!-- /wp:image -->
			</figure>
			<!-- /wp:gallery -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:pattern {"slug":"simppple/hidden-sample-title"} /-->

			<!-- wp:pattern {"slug":"simppple/hidden-sample-paragraph"} /-->
			<!-- wp:pattern {"slug":"simppple/hidden-sample-paragraph"} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
