import { resolve } from 'path'

import { stringReplace, stringReplaceOpenAndWrite } from '@mlnop/string-replace'
import autoprefixer from 'autoprefixer'
import { defineConfig } from 'vite'
import { run } from 'vite-plugin-run'
import sassGlobImports from 'vite-plugin-sass-glob-import'
import { viteStaticCopy } from 'vite-plugin-static-copy'

const chore = process.env.npm_config_chore
const isProduction = process.env.NODE_ENV === 'production'

/*
 |--------------------------------------------------------------------------
 | Global config
 |--------------------------------------------------------------------------
 |
 | Assets path
 | Destination path
 |
 */
const themeName = 'simple'
const assetsPath = 'assets'
const distPath = 'build'

/*
 |--------------------------------------------------------------------------
 | Assets config
 |--------------------------------------------------------------------------
 | {
 |  scripts = [
 |      {
 |        - File name
 |        - File input
 |      }
 |    ]
 |
 |  styles = [
 |      {
 |        - File name
 |        - File input
 |      }
 |    ]
 | }
 |
 */
const entryFiles = [
    {
        scripts: [
            {
                name: 'front',
                input: `${assetsPath}/js`
            },
            {
                name: 'admin',
                input: `${assetsPath}/js`
            },
            {
                name: 'editor',
                input: `${assetsPath}/js`
            },
        ],
        styles: [
            {
                name: 'front',
                input: `${assetsPath}/scss`
            },
            {
                name: 'admin',
                input: `${assetsPath}/scss`
            },
            {
                name: 'editor',
                input: `${assetsPath}/scss`
            },
        ]
    }
]

/*
 |--------------------------------------------------------------------------
 | Beautify config (lint/prettier files)
 |--------------------------------------------------------------------------
 | {
 |    js|php|scss: {
 |     - Config (string)
 |     - Files (array of strings)
 |    }
 | }
 |
 */
const beautifyObject = {
    js_lint: {
        config: 'npx eslint --no-error-on-unmatched-pattern --fix',
        files: [
            ...Array.from(new Set(entryFiles.flatMap(element => element.scripts.flatMap(script => script.input)))),
            'blocks',
            'parts',
            'templates',
            'patterns'
        ]
    },
    js_prettier: {
        config: 'npx prettier --no-error-on-unmatched-pattern --write',
        files: [
            ...Array.from(new Set(entryFiles.flatMap(element => element.scripts.flatMap(script => script.input)))),
            'blocks',
            'parts',
            'templates',
            'patterns'
        ]
    },
    scss_lint: {
        config: 'npx stylelint --allow-empty-input --fix',
        files: [
            ...Array.from(new Set(entryFiles.flatMap(element => element.styles.flatMap(style => style.input)))),
            'blocks',
            'parts',
            'templates',
            'patterns'
        ]
    },
    scss_prettier: {
        config: 'npx prettier --no-error-on-unmatched-pattern --write',
        files: [
            ...Array.from(new Set(entryFiles.flatMap(element => element.styles.flatMap(style => style.input)))),
            'blocks',
            'parts',
            'templates',
            'patterns'
        ]
    },
    php_lint: {
        config: `${resolve(__dirname, 'vendor/bin/php-cs-fixer.bat')} fix -v --show-progress=dots --using-cache=no --config=${resolve(__dirname, '.php-cs-fixer.php')}`,
        files: [
            'inc',
            'functions.php',
            'patterns',
            'blocks'
        ]
    }
}

/*
 |--------------------------------------------------------------------------
 | Files to edit
 |--------------------------------------------------------------------------
 |  [
 |    {
 |     - File path (array of strings)
 |     - Replace (array)
 |       {
 |        from (regex of string)
 |        to (string)
 |       }
 |    }
 |  ]
 |
 */
const filesToEdit = [
    {
        filePath: [
            resolve(__dirname, 'inc/'),
            resolve(__dirname, 'functions.php')
        ],
        replace: [
            {
                from: /\bvar_dump\(([^)]+)\);/g,
                to: ''
            }
        ]
    }
]

/*
 |--------------------------------------------------------------------------
 | Copy config
 |--------------------------------------------------------------------------
 |  [
 |    {
 |      - File input (string)
 |      - File output (string)
 |    }
 |  ]
 |
 */
const filesToCopy = [
    {
        src: `${assetsPath}/img`,
        dest: 'assets/'
    }
]

/*
 |--------------------------------------------------------------------------
 |--------------------------------------------------------------------------
 |--------------------------------------------------------------------------
 | That's all, stop editing, happy development
 |--------------------------------------------------------------------------
 |--------------------------------------------------------------------------
 |--------------------------------------------------------------------------
 */

const entriesToCompile = []

if (entryFiles.length) {
    entryFiles.forEach(group => {
        if (group) {
            /*
            |--------------------------------------------------------------------------
            | Javascript Compilation
            |--------------------------------------------------------------------------
            |
            | Create array of files to compile
            |
            */
            if (group.scripts?.length) {
                group.scripts.forEach(file => {
                    if (!entriesToCompile.includes(`${file.input}/${file.name}.js`)) {
                        entriesToCompile.push(`${file.input}/${file.name}.js`)
                    }
                })
            }

            /*
            |--------------------------------------------------------------------------
            | SCSS Compilation
            |--------------------------------------------------------------------------
            |
            | Create array of files to compile
            |
            */
            if (group.styles?.length) {
                group.styles.forEach(file => {
                    if (chore === undefined || chore === 'all' || chore.includes('scss')) {
                        if (!entriesToCompile.includes(`${file.input}/${file.name}.scss`)) {
                            entriesToCompile.push(`${file.input}/${file.name}.scss`)
                        }
                    }
                })
            }
        }
    })
}

/*
|--------------------------------------------------------------------------
| Replace in file
|--------------------------------------------------------------------------
|
| Replace string in file
| Change vite constant in watch
| Change vite constant in build
|
*/
if (chore !== 'ci') {
    if (isProduction) {
        stringReplaceOpenAndWrite(
            resolve(__dirname, 'functions.php'),
            [
                {
                    from: /\bdefine\([ ]?'SIMPLE_IS_VITE_DEVELOPMENT',[ ]?true[ ]?\);/g,
                    to: "define('SIMPLE_IS_VITE_DEVELOPMENT', false);"
                }
            ]
        )

    } else {
        stringReplaceOpenAndWrite(
            resolve(__dirname, 'functions.php'),
            [
                {
                    from: /\bdefine\([ ]?'SIMPLE_IS_VITE_DEVELOPMENT',[ ]?false[ ]?\);/g,
                    to: "define('SIMPLE_IS_VITE_DEVELOPMENT', true);"
                }
            ]
        )
    }
}

/*
 |--------------------------------------------------------------------------
 | Global Vite config
 |--------------------------------------------------------------------------
 |
 | Plugins :
 |  - Replace in file
 |  - Live reload :
 |    - Files to refresh
 |  - Run :
 |    - execute scss lint command
 |    - execute scss prettier command
 |    - execute js lint command
 |    - execute js prettier command
 |    - execute php lint command
 | Options :
 |  - Build
 |    - minify when production build
 |    - terser options
 |    - define build directory
 |    - empty build dir
 |  - Server
 |    - hot reload config
 |  - CSS
 |    - autoprefixer when production build
 |
 */
export default defineConfig({
    base: isProduction ? './' : `/wp-content/themes/${themeName}`, // Url to apply refresh
    plugins: [
        sassGlobImports(),

        isProduction && chore === 'all'
            ? stringReplace(filesToEdit)
            : false,

        isProduction
            ? viteStaticCopy({
                targets: filesToCopy
            })
            : false,

        isProduction
            ? run({
                silent: false,
                skipDts: true,
                input: [
                    chore === 'all' || chore === 'prettier:scss'
                        ? {
                            name: 'prettier:scss',
                            run: [`${beautifyObject.scss_prettier.config} ${beautifyObject.scss_prettier.files.length > 1 ? `{${beautifyObject.scss_prettier.files.join(',')}}` : beautifyObject.scss_prettier.files.join(',')}/**/*.scss`],
                        }
                        : false,
                    chore === 'all' || chore === 'lint:scss'
                        ? {
                            name: 'lint:scss',
                            run: [`${beautifyObject.scss_lint.config} ${beautifyObject.scss_lint.files.length > 1 ? `{${beautifyObject.scss_lint.files.join(',')}}` : beautifyObject.scss_lint.files.join(',')}/**/*.scss`],
                        }
                        : false,
                    chore === 'all' || chore === 'prettier:js'
                        ? {
                            name: 'prettier:js',
                            run: [`${beautifyObject.js_prettier.config} ${beautifyObject.js_prettier.files.length > 1 ? `{${beautifyObject.js_prettier.files.join(',')}}` : beautifyObject.js_prettier.files.join(',')}/**/*.js`],
                        }
                        : false,
                    chore === 'all' || chore === 'lint:js'
                        ? {
                            name: 'lint:js',
                            run: [`${beautifyObject.js_lint.config} ${beautifyObject.js_lint.files.length > 1 ? `{${beautifyObject.js_lint.files.join(',')}}` : beautifyObject.js_lint.files.join(',')}/**/*.js`],
                        }
                        : false,
                    chore === 'all' || chore === 'lint:php'
                        ? {
                            name: 'lint:php',
                            run: [`${beautifyObject.php_lint.config} ${beautifyObject.php_lint.files.join(' ')}`],
                        }
                        : false
                ].filter(Boolean)
            })
            : false,
    ].filter(Boolean),

    build: {
        rollupOptions: {
            input: entriesToCompile,
        },
        write: true,
        minify: isProduction ? 'terser' : false,
        terserOptions: isProduction
            ? {
                keep_fnames: true,
                enclose: true,
                compress: {
                    pure_funcs: [
                        'console.log',
                        '__'
                        // 'console.error',
                        // 'console.warn',
                        // ...
                    ]
                },
                // Make sure symbols under `pure_funcs`,
                // are also under `mangle.reserved` to avoid mangling.
                mangle: {
                    reserved: [
                        'console.log',
                        '__'
                        // 'console.error',
                        // 'console.warn',
                        // ...
                    ]
                },
                output: {
                    comments: false
                }
            }
            : null,
        outDir: distPath,
        emptyOutDir: true,
        manifest: true,
        sourcemap: !isProduction,
    },

    server: {
        cors: true,
        strictPort: true,
        port: 5173,
        https: false,
        open: false,
        hmr: {
            host: 'localhost'
        },
        watch: {
            usePolling: true
        },
    },

    css: {
        devSourcemap: !isProduction,
        postcss: {
            plugins: [
                autoprefixer
            ],
        }
    },

    clearScreen: false
})
