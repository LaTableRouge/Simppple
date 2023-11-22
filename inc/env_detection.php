<?php

if (!defined('ABSPATH')) {
    exit;
}

/*
* ================================ Display ENV in Back-office
*/
if (wp_get_environment_type() !== 'production') {
    function simple_display_env_back_office () {
        $css = '<style>
            body::before {
                content: "";
                width: 100%;
                position: fixed;
                bottom: 0;
                left: 0;
                height: 40px;
                background-color: #af2e29;
                opacity: 0.5;
                pointer-events: none;
                z-index: 998;
            }
            body::after {
                content:"' . wp_get_environment_type() . '";
                position: fixed;
                bottom: 0;
                left: 50%;
                height: 40px;
                text-transform: uppercase;
                font-weight: bold;
                color: #ffffff;
                line-height: 40px;
                opacity: 0.5;
                pointer-events: none;
                z-index: 999;
            }
        </style>';

        echo $css;
    }

    add_action('admin_head', 'simple_display_env_back_office');
}
