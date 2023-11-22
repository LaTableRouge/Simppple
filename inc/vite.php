<?php

if (!defined('ABSPATH')) {
    exit;
}

define('SIMPLE_VITE_SERVER', 'http://localhost:5173');
define('SIMPLE_DIST_FOLDER', 'build');
define('SIMPLE_DIST_URI', get_template_directory_uri() . '/' . SIMPLE_DIST_FOLDER);
define('SIMPLE_DIST_PATH', get_template_directory() . '/' . SIMPLE_DIST_FOLDER);

function simple_vite_fetch_asset_from_manifest($fileThemePath, $assetType) {
    $returnedArray = [];

    $fileName = basename($fileThemePath);
    $fileNameWithoutExtension = substr($fileName, 0, strrpos($fileName, '.'));

    // Use manifest json to know which asset to enqueue
    if (file_exists(SIMPLE_DIST_PATH . '/manifest.json')) {
        $manifest = json_decode(file_get_contents(SIMPLE_DIST_PATH . '/manifest.json'), true);

        if (is_array($manifest)) {
            $manifest_keys = array_keys($manifest);
            $fileKey = null;
            foreach ($manifest_keys as $key => $asset) {
                if (str_contains($asset, $fileName)) {
                    $fileKey = $asset;
                    break;
                }
            }

            if ($fileKey && isset($manifest[$fileKey])) {
                $returnedArray = [
                    'path' => SIMPLE_DIST_URI . "/{$manifest[$fileKey]['file']}",
                    'slug' => "simple_vite_{$fileNameWithoutExtension}_{$assetType}"
                ];

                // In case of scss files included in Javascript
                if (isset($manifest[$fileKey]['css']) && !empty($manifest[$fileKey]['css'])) {
                    foreach ($manifest[$fileKey]['css'] as $stylePath) {
                        $styleFile = basename($stylePath);
                        $styleFileWithoutExtension = substr($styleFile, 0, strrpos($styleFile, '.'));
                        $styleFileWithoutVersionning = substr($styleFile, 0, strrpos($styleFileWithoutExtension, '.'));

                        $returnedArray['css'][] = [
                            'path' => SIMPLE_DIST_URI . "/{$stylePath}",
                            'slug' => "simple_vite_{$styleFileWithoutVersionning}_style"
                        ];
                    }
                }
            }
        }
    }

    return $returnedArray;
}

function simple_vite_enqueue_dev_dependencies() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('wp-i18n');
    wp_enqueue_script('wp-blocks');
    echo "<script>
            const wpparams = {
                ajax_url: '" . admin_url('admin-ajax.php') . "',
                rest_url: '" . esc_url_raw(get_rest_url(null, '/wp/v2')) . "',
                rest_nonce: '" . wp_create_nonce('wp_rest') . "',
                stylesheet_directory: '" . get_template_directory_uri() . "',
                plugins_directory: '" . plugins_url() . "',
                pictures_directory: '" . get_template_directory_uri() . SIMPLE_PICTURE_FOLDER . "',
                posts_per_page: '" . get_option('posts_per_page') . "'
            }
        </script>";
}

function simple_vite_enqueue_style($fileThemePath, $hookBuild, $hookDev = false) {
    if (!$hookDev) {
        $hookDev = $hookBuild;
    }

    $adminAsset = str_contains($hookBuild, 'admin') || str_contains($hookBuild, 'block') || str_contains($hookBuild, 'editor');
    if ($adminAsset && !is_admin()) {
        return;
    }

    if (defined('SIMPLE_IS_VITE_DEVELOPMENT') && SIMPLE_IS_VITE_DEVELOPMENT === true) {
        /*
        * ================================ Inject assets in DOM
        * insert link tag for styles
        */
        add_action($hookDev, function () use ($fileThemePath) {
            echo '<link rel="stylesheet" href="' . SIMPLE_VITE_SERVER . '/' . $fileThemePath . '">';
        });
    } else {
        /*
        * ================================ Call assets with WP hooks
        */
        $manifestFileInfos = simple_vite_fetch_asset_from_manifest($fileThemePath, 'style');
        if (!empty($manifestFileInfos)) {
            $filePath = $manifestFileInfos['path'];
            $fileSlug = $manifestFileInfos['slug'];
            add_action(
                $hookBuild,
                function () use ($fileSlug, $filePath) {
                    wp_enqueue_style(
                        $fileSlug,
                        $filePath,
                        [],
                        time(),
                        'all'
                    );
                },
                20
            );
        }
    }
}

function simple_vite_enqueue_script($fileThemePath, $hookBuild, $hookDev = false, $footerEnqueue = true) {
    if (!$hookDev) {
        $hookDev = $hookBuild;
    }

    $adminAsset = str_contains($hookBuild, 'admin') || str_contains($hookBuild, 'block') || str_contains($hookBuild, 'editor');
    if ($adminAsset && !is_admin()) {
        return;
    }

    if (defined('SIMPLE_IS_VITE_DEVELOPMENT') && SIMPLE_IS_VITE_DEVELOPMENT === true) {
        /*
        * ================================ Inject assets in DOM
        * insert script tag for scripts
        */
        add_action($hookDev, 'simple_vite_enqueue_dev_dependencies');
        add_action($hookDev, function () use ($fileThemePath) {
            echo '<script type="module" crossorigin src="' . SIMPLE_VITE_SERVER . '/' . $fileThemePath . '"></script>';
        });
    } else {
        /*
        * ================================ Call assets with WP hooks
        */
        $manifestFileInfos = simple_vite_fetch_asset_from_manifest($fileThemePath, 'script');
        if (!empty($manifestFileInfos)) {
            if (isset($manifestFileInfos['css'])) {
                foreach ($manifestFileInfos['css'] as $style) {
                    $filePath = $style['path'];
                    $fileSlug = $style['slug'];
                    add_action(
                        $hookBuild,
                        function () use ($fileSlug, $filePath) {
                            wp_enqueue_style(
                                $fileSlug,
                                $filePath,
                                [],
                                time(),
                                'all'
                            );
                        },
                        20
                    );
                }
            }

            $filePath = $manifestFileInfos['path'];
            $fileSlug = $manifestFileInfos['slug'];
            add_action(
                $hookBuild,
                function () use ($fileSlug, $filePath, $footerEnqueue) {
                    wp_register_script(
                        $fileSlug,
                        $filePath,
                        ['jquery', 'wp-i18n', 'wp-blocks'], // Libraries to use
                        time(),
                        [
                            'in_footer' => $footerEnqueue,
                            'strategy' => 'defer'
                        ]
                    );

                    wp_set_script_translations(
                        $fileSlug,
                        'simple',
                        get_template_directory() . '/lang'
                    );

                    wp_localize_script(
                        $fileSlug,
                        'wpparams',
                        [
                            'ajax_url' => admin_url('admin-ajax.php'),
                            'rest_url' => esc_url_raw(get_rest_url(null, '/wp/v2')),
                            'rest_nonce' => wp_create_nonce('wp_rest'),
                            'stylesheet_directory' => get_template_directory_uri(),
                            'plugins_directory' => plugins_url(),
                            'pictures_directory' => get_template_directory_uri() . SIMPLE_PICTURE_FOLDER,
                            'posts_per_page' => get_option('posts_per_page'),
                        ]
                    );

                    wp_enqueue_script($fileSlug);
                },
                20
            );
        }
    }
}

function simple_vite_enqueue_style_editor($fileThemePath, $hook) {
    /*
    * ================================ Call assets with WP hooks
    */
    $manifestFileInfos = simple_vite_fetch_asset_from_manifest($fileThemePath, 'script');
    if (!empty($manifestFileInfos)) {
        $filePath = $manifestFileInfos['path'];

        add_action(
            $hook,
            function () use ($filePath) {
                add_editor_style($filePath);
            },
            20
        );
    } else {
        echo 'Please compile (build/prod) to see the editor style';
    }
}
