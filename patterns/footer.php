<?php
/**
 * Title: Footer
 * Slug: simppple/footer
 * Categories: simppple-site-footer
 * Keywords: footer
 * Block Types: core/template-part/footer
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","bottom":"20px","left":"var:preset|spacing|30","top":"20px"}}},"backgroundColor":"base","className":"pattern\u002d\u002d-footer","layout":{"type":"constrained"}} -->
<div
	class="wp-block-group pattern---footer has-base-background-color has-background"
	style="padding-top:20px;padding-right:var(--wp--preset--spacing--30);padding-bottom:20px;padding-left:var(--wp--preset--spacing--30)"
>
	<!-- wp:social-links {"iconColor":"base","iconColorValue":"#ffffff","iconBackgroundColor":"contrast","iconBackgroundColorValue":"#1A1A1A","openInNewTab":true,"size":"has-normal-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"},"margin":{"top":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<ul
		class="wp-block-social-links has-normal-icon-size has-icon-color has-icon-background-color"
		style="margin-top:var(--wp--preset--spacing--10)"
	>
		<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

		<!-- wp:social-link {"url":"#","service":"instagram"} /-->

		<!-- wp:social-link {"url":"#","service":"facebook"} /-->

		<!-- wp:social-link {"url":"#","service":"twitter"} /-->
	</ul>
	<!-- /wp:social-links -->

<!-- wp:separator {"className":"is-style-default"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-default"/>
<!-- /wp:separator -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"0","top":"0"}}},"fontSize":"16"} -->
	<p class="has-text-align-center has-16-font-size" style="margin-top:0;margin-bottom:0">&copy;<?php echo date('Y'); ?> <?php echo esc_html_x('Your company', 'simple content', 'simppple'); ?> • <a href="#"><?php echo esc_html_x('Terms and Conditions', 'simple content', 'simppple'); ?></a> • <a href="#"><?php echo esc_html_x('Privacy Policy', 'simple content', 'simppple'); ?></a></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
