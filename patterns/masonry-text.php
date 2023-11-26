<?php
/**
 * Title: Masonry/Text
 * Slug: simple/masonry-text
 * Categories: simple-sections
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
						src="<?php echo get_template_directory_uri() . SIMPLE_PICTURE_FOLDER ?>/placeholder.webp"
						alt=""
						class="wp-image-52"
						style="border-radius:10px"
					/>
				</figure>
				<!-- /wp:image -->

				<!-- wp:image {"id":53,"sizeSlug":"medium","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
				<figure class="wp-block-image size-medium has-custom-border">
					<img
						src="<?php echo get_template_directory_uri() . SIMPLE_PICTURE_FOLDER ?>/placeholder.webp"
						alt=""
						class="wp-image-53"
						style="border-radius:10px"
					/>
				</figure>
				<!-- /wp:image -->

				<!-- wp:image {"id":50,"sizeSlug":"medium","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
				<figure class="wp-block-image size-medium has-custom-border">
					<img
						src="<?php echo get_template_directory_uri() . SIMPLE_PICTURE_FOLDER ?>/placeholder.webp"
						alt=""
						class="wp-image-50"
						style="border-radius:10px"
					/>
				</figure>
				<!-- /wp:image -->

				<!-- wp:image {"id":47,"sizeSlug":"medium","linkDestination":"none","style":{"border":{"radius":"10px"}}} -->
				<figure class="wp-block-image size-medium has-custom-border">
					<img
						src="<?php echo get_template_directory_uri() . SIMPLE_PICTURE_FOLDER ?>/placeholder.webp"
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
			<!-- wp:heading {"className":"underlined-title"} -->
			<h2 class="wp-block-heading underlined-title">Title</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.<br>This is a <a href="#">section of some</a> simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated. This is a section of some simple filler text, also known as placeholder text. It shares some.<br>This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.<br>This is a section of some simple filler text, also known as placeholder text.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->