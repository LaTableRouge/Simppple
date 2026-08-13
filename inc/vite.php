<?php

/**
 * Vite integration for WordPress theme
 *
 * @package Simppple
 * @subpackage Vite
 */

declare(strict_types=1);

namespace Simppple\Vite;

if (!defined('ABSPATH')) {
    exit;
}

class Vite {
    private const VITE_SERVER = 'http://localhost:5179';
    private const DIST_FOLDER = 'build';

    private string $distUri;
    private string $distPath;
    private string $version;
    private string $paramsName;
    private array $params;
    private string $textDomain;
    private bool $paramsEnqueued = false;

    public function __construct() {
        $this->distUri = get_template_directory_uri() . '/' . self::DIST_FOLDER;
        $this->distPath = get_template_directory() . '/' . self::DIST_FOLDER;
        $this->version = '1.2.8';
        $this->paramsName = 'wpparams';
        $this->params = [
            'ajax_url' => admin_url('admin-ajax.php'),
            'rest_url' => esc_url_raw(get_rest_url(null, '/wp/v2')),
            'rest_nonce' => wp_create_nonce('wp_rest'),
            'template_directory' => get_template_directory_uri(),
            'plugins_directory' => plugins_url(),
            'pictures_directory' => get_template_directory_uri() . '/build/assets/src/img',
            'posts_per_page' => get_option('posts_per_page'),
        ];
        $this->textDomain = 'simppple';

    }

    /**
     * Fetch asset information from Vite manifest
     *
     * @param string $fileThemePath Path to the file relative to theme root
     * @param string $assetType Type of asset ('script' or 'style')
     * @return array{
     *  path?: string,
     *  slug?: string,
     *  css?: array<array{path: string, slug: string}>
     * }
     */
    public function fetchAssetFromManifest(string $fileThemePath, string $assetType): array {
        $returnedArray = [];

        $fileName = basename($fileThemePath);
        $fileNameWithoutExtension = substr($fileName, 0, (int) strrpos($fileName, '.'));

        $manifestPath = $this->distPath . '/.vite/manifest.json';
        if (!file_exists($manifestPath)) {
            return $returnedArray;
        }

        /** @var array<string, array{file: string, css?: array<string>}> $manifest */
        $manifest = json_decode(file_get_contents($manifestPath), true);

        $fileKey = array_reduce(
            array_keys($manifest),
            fn(?string $carry, string $asset) => str_contains($asset, $fileName) ? $asset : $carry,
            null
        );

        if ($fileKey && isset($manifest[$fileKey])) {
            $returnedArray = [
                'path' => $this->distUri . "/{$manifest[$fileKey]['file']}",
                'slug' => "simppple_vite_{$fileNameWithoutExtension}_{$assetType}"
            ];

            if (isset($manifest[$fileKey]['css']) && !empty($manifest[$fileKey]['css'])) {
                foreach ($manifest[$fileKey]['css'] as $stylePath) {
                    $styleFile = basename($stylePath);
                    $styleFile = substr($styleFile, 0, (int) strrpos($styleFile, '.'));
                    if (strpos($styleFile, 'ver=')) {
                        $styleFile = remove_query_arg('ver', $styleFile);
                    }

                    $returnedArray['css'][] = [
                        'path' => $this->distUri . "/{$stylePath}",
                        'slug' => "simppple_vite_{$styleFile}_style"
                    ];
                }
            }
        }

        return $returnedArray;
    }

    /**
     * Enqueue development dependencies
     *
     * @return void
     */
    public function enqueueDevDependencies(): void {
        wp_enqueue_script('jquery');
        wp_enqueue_script('wp-i18n');
        wp_enqueue_script('wp-blocks');

        printf(
            '<script>var %s = %s;</script>',
            $this->paramsName,
            wp_json_encode($this->params)
        );
    }

    /**
     * Enqueue style assets
     *
     * @param string $fileThemePath Path to the file relative to theme root
     * @param string $hookBuild WordPress hook for build mode
     * @param string|false $hookDev WordPress hook for dev mode
     * @return void
     */
    public function enqueueStyle(string $fileThemePath, string $hookBuild, string|false $hookDev = false): void {
        $hookDev = $hookDev ?: $hookBuild;

        $adminAsset = str_contains($hookBuild, 'admin')
            || str_contains($hookBuild, 'editor');

        if ($adminAsset && !is_admin()) {
            return;
        }

        // @phpstan-ignore booleanAnd.rightAlwaysFalse
        if (defined('SIMPPPLE_IS_VITE_DEVELOPMENT') && SIMPPPLE_IS_VITE_DEVELOPMENT) {
            $themePath = parse_url(get_template_directory_uri(), PHP_URL_PATH);
            add_action($hookDev, function () use ($themePath, $fileThemePath): void {
                printf(
                    '<link rel="stylesheet" href="%s">',
                    esc_url(self::VITE_SERVER . $themePath . $fileThemePath)
                );
            });

            return;
        }

        $manifestFileInfos = $this->fetchAssetFromManifest($fileThemePath, 'style');
        if (empty($manifestFileInfos)) {
            return;
        }

        $filePath = $manifestFileInfos['path'];
        $fileSlug = $manifestFileInfos['slug'];

        add_action(
            $hookBuild,
            function () use ($fileSlug, $filePath): void {
                wp_enqueue_style(
                    $fileSlug,
                    $filePath,
                    [],
                    $this->version,
                    'all'
                );
            },
            20
        );
    }

    /**
     * Enqueue script assets
     *
     * @param string $fileThemePath Path to the file relative to theme root
     * @param string $hookBuild WordPress hook for build mode
     * @param string|false $hookDev WordPress hook for dev mode
     * @param bool $footerEnqueue Whether to enqueue in footer
     * @param string $type Script type (e.g., 'module')
     * @param int $order Action priority
     * @return void
     */
    public function enqueueScript(
        string $fileThemePath,
        string $hookBuild,
        string|false $hookDev = false,
        bool $footerEnqueue = true,
        string $type = '',
        int $order = 20
    ): void {
        $hookDev = $hookDev ?: $hookBuild;

        $adminAsset = str_contains($hookBuild, 'admin')
            || str_contains($hookBuild, 'editor');

        if ($adminAsset && !is_admin()) {
            return;
        }

        // @phpstan-ignore booleanAnd.rightAlwaysFalse
        if (defined('SIMPPPLE_IS_VITE_DEVELOPMENT') && SIMPPPLE_IS_VITE_DEVELOPMENT) {
            $themePath = parse_url(get_template_directory_uri(), PHP_URL_PATH);

            remove_action($hookDev, [$this, 'enqueueDevDependencies']);
            add_action($hookDev, [$this, 'enqueueDevDependencies']);
            add_action($hookDev, function () use ($themePath, $fileThemePath): void {
                printf(
                    '<script type="module" crossorigin src="%s"></script>',
                    esc_url(self::VITE_SERVER . $themePath . $fileThemePath)
                );
            });

            return;
        }

        $manifestFileInfos = $this->fetchAssetFromManifest($fileThemePath, 'script');
        if (empty($manifestFileInfos)) {
            return;
        }

        // Enqueue associated CSS files
        if (isset($manifestFileInfos['css'])) {
            foreach ($manifestFileInfos['css'] as $style) {
                add_action(
                    $hookBuild,
                    function () use ($style): void {
                        wp_enqueue_style(
                            $style['slug'],
                            $style['path'],
                            [],
                            $this->version,
                            'all'
                        );
                    },
                    $order
                );
            }
        }

        $filePath = $manifestFileInfos['path'];
        $fileSlug = $manifestFileInfos['slug'];

        add_action(
            $hookBuild,
            function () use ($fileSlug, $filePath, $footerEnqueue, $type): void {

                if ($type === 'module') {
                    // Script modules cannot use wp_localize_script. Print the classic global
                    // so existing JS (`wpparams`, `wp.i18n`) keeps working.
                    wp_enqueue_script('wp-i18n');
                    $this->enqueueParamsAsGlobal();

                    wp_register_script_module(
                        $fileSlug,
                        $filePath,
                        [],
                        $this->version
                    );

                    add_filter(
                        "script_module_data_{$fileSlug}",
                        function (array $data) use ($fileSlug, $filePath): array {
                            $translationsPath = get_template_directory() . '/lang';
                            $jsonTranslations = $this->loadScriptTranslations($fileSlug, $filePath, $this->textDomain, $translationsPath);

                            if ($jsonTranslations) {
                                $data['translations'] = json_decode($jsonTranslations, true);
                                $data['textDomain'] = $this->textDomain;
                            }

                            $data['params'] = $this->params;
                            $data['paramsName'] = $this->paramsName;

                            return $data;
                        }
                    );

                    wp_enqueue_script_module($fileSlug);
                } else {
                    // Register regular script
                    wp_register_script(
                        $fileSlug,
                        $filePath,
                        ['wp-i18n', 'jquery'],
                        $this->version,
                        [
                            'in_footer' => $footerEnqueue,
                            'strategy' => 'defer'
                        ]
                    );

                    wp_set_script_translations(
                        $fileSlug,
                        $this->textDomain,
                        get_template_directory() . '/lang'
                    );

                    wp_localize_script(
                        $fileSlug,
                        $this->paramsName,
                        $this->params
                    );

                    wp_enqueue_script($fileSlug, $filePath);
                }
            },
            $order
        );
    }

    /**
     * Print `wpparams` as a classic global. `wp_localize_script` does not run for script modules.
     */
    private function enqueueParamsAsGlobal(): void {
        if ($this->paramsEnqueued) {
            return;
        }

        $this->paramsEnqueued = true;
        $handle = 'simppple_vite_params';

        wp_register_script($handle, '', [], $this->version, false);
        wp_localize_script($handle, $this->paramsName, $this->params);
        wp_enqueue_script($handle);
    }

    /**
     * Load script translations for a given handle
     *
     * @param string $handle Script handle
     * @param string $src Script source URL
     * @param string $domain Text domain
     * @param string $path Path to translation files
     * @return string|false JSON-encoded translations or false on failure
     */
    private function loadScriptTranslations(string $handle, string $src, string $domain, string $path): string|false {
        if (!function_exists('load_script_textdomain')) {
            return false;
        }

        // Temporarily register a script with the actual source to use load_script_textdomain
        // This is needed because load_script_textdomain requires a registered script
        // and uses the script's src to determine the translation file name
        $tempHandle = $handle . '_temp_translations';
        wp_register_script($tempHandle, $src, [], $this->version);

        // Set translations path on the registered script
        wp_set_script_translations($tempHandle, $domain, $path);

        // Load translations using WordPress function
        $translations = load_script_textdomain($tempHandle, $domain, $path);

        // Clean up temporary script
        wp_deregister_script($tempHandle);

        return $translations;
    }

    /**
     * Enqueue editor styles
     *
     * @param string $fileThemePath Path to the file relative to theme root
     * @param string $hook WordPress hook
     * @param int $order Action priority
     * @return void
     */
    public function enqueueStyleEditor(string $fileThemePath, string $hook, int $order = 20): void {
        $manifestFileInfos = $this->fetchAssetFromManifest($fileThemePath, 'script');
        if (empty($manifestFileInfos)) {
            echo 'Please compile (build/prod) to see the editor style';

            return;
        }

        $filePath = $manifestFileInfos['path'];
        add_action(
            $hook,
            function () use ($filePath): void {
                add_editor_style($filePath);
            },
            $order
        );
    }
}
