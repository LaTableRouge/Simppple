<?php
/**
 * Title: Header top section
 * Slug: simppple/header-top-section
 * Categories: simppple-site-header
 * Keywords: header, menu
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|10","top":"var:preset|spacing|10","right":"0","left":"0"},"blockGap":"0"},"color":{"background":"var(--wp--preset--color--base)"}},"className":"pattern---header-top-section","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div
    class="wp-block-group pattern---header-top-section has-background"
    style="background-color:var(--wp--preset--color--base);padding-top:var(--wp--preset--spacing--10);padding-right:0;padding-bottom:var(--wp--preset--spacing--10);padding-left:0"
>
    <!-- wp:paragraph -->
    <p><?php _e('This is a section of some simple filler text, also known as placeholder text.', 'simppple'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group">
        <!-- wp:pattern {"slug":"simppple/search-modal"} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
