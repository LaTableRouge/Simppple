<?php
/**
 * Title: Image/Image
 * Slug: sample/img-img
 * Categories: sample-sections
 * Keywords: pictures in 2 columns
 */
?>

<!-- wp:group {"tagName":"section","style":{"spacing":{"blockGap":"0"}},"className":"pattern\u002d\u002d-img-img","layout":{"type":"constrained"}} -->
<section class="wp-block-group pattern---img-img">
	<!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
	<div
		class="wp-block-columns"
		style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"
	>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"id":50,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"var(--wp--custom--border-radius-picture)"}}} -->
				<figure class="wp-block-image size-large has-custom-border">
					<img
						src="<?php echo esc_url(get_template_directory_uri() . SAMPLE_PICTURE_FOLDER . '/placeholder.webp'); ?>"
						alt=""
						class="wp-image-50"
						style="border-radius:var(--wp--custom--border-radius-picture);"
					/>
				</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"id":50,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"var(--wp--custom--border-radius-picture)"}}} -->
			<figure class="wp-block-image size-large has-custom-border">
				<img
					src="<?php echo esc_url(get_template_directory_uri() . SAMPLE_PICTURE_FOLDER . '/placeholder.webp'); ?>"
					alt=""
					class="wp-image-50"
					style="border-radius:var(--wp--custom--border-radius-picture);"
				/>
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->

