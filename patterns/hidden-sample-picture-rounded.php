<?php
/**
 * Title: Sample picture
 * Slug: simppple/hidden-sample-picture-rounded
 * Inserter: no
 */
?>

<!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"var(--wp--custom--border-radius-picture)"}}} -->
<figure class="wp-block-image size-large has-custom-border">
	<img
		src="<?php echo esc_url(get_template_directory_uri() . '/build/assets/img' . '/placeholder.webp'); ?>"
		alt=""
		class=""
		style="border-radius:var(--wp--custom--border-radius-picture)"
	/>
</figure>
<!-- /wp:image -->
