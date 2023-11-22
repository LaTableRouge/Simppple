<?php
/**
 * Title: Footer
 * Slug: simple/footer
 * Categories: simple-site-footer
 * Keywords: footer
 * Block Types: core/template-part/footer
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","bottom":"var:preset|spacing|10","left":"var:preset|spacing|30","top":"var:preset|spacing|40"}}},"className":"pattern\u002d\u002d-footer","layout":{"type":"constrained"}} -->
<div
    class="wp-block-group pattern---footer"
    style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--30)"
>
    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column {"width":"33.33%","className":"footer__logo-socials"} -->
        <div
            class="wp-block-column footer__logo-socials"
            style="flex-basis:33.33%"
        >
            <!-- wp:site-logo {"shouldSyncIcon":false,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} /-->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
            <p style="margin-bottom:0"><?php _e('Suivez-nous sur les réseaux sociaux', 'simple'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","iconBackgroundColor":"contrast","iconBackgroundColorValue":"#455a64","openInNewTab":true,"size":"has-normal-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"},"margin":{"top":"var:preset|spacing|10"}}}} -->
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
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"66.66%","className":"footer__menus"} -->
        <div
            class="wp-block-column footer__menus"
            style="flex-basis:66.66%"
        >
            <!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:columns -->
                <div class="wp-block-columns">
                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|10","left":"0"}}}} -->
                        <p style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--10);margin-left:0"><strong><?php _e('Solutions', 'simple'); ?></strong></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:navigation {"ref":1078,"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"}} /-->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|10","left":"0"}}}} -->
                        <p style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--10);margin-left:0"><strong><?php _e('Company', 'simple'); ?></strong></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:navigation {"ref":1079,"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"}} /-->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column -->
                    <div class="wp-block-column">
                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|10","left":"0"}}}} -->
                        <p style="margin-top:0;margin-right:0;margin-bottom:var(--wp--preset--spacing--10);margin-left:0"><strong><?php _e('Support', 'simple'); ?></strong></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:navigation {"ref":1080,"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"}} /-->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|10"}}},"backgroundColor":"base-2"} -->
    <hr
        class="wp-block-separator has-text-color has-base-2-color has-alpha-channel-opacity has-base-2-background-color has-background"
        style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--10)"
    />
    <!-- /wp:separator -->

    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"0","top":"0"}}},"fontSize":"16"} -->
    <p class="has-text-align-center has-16-font-size" style="margin-top:0;margin-bottom:0">&copy;<?php date('Y'); ?> <?php echo esc_html_x('Votre entreprise', 'sample content', 'simple'); ?> • <a href="#"><?php echo esc_html_x('Mentions légales', 'sample content', 'simple'); ?></a> • <a href="#"><?php echo esc_html_x('Politique de confidentialité', 'sample content', 'simple'); ?></a></p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
