# Simppple theme & child theme

![WordPress Version](https://img.shields.io/badge/wordpress-%3E%3D%206.4-blue)
![Node](https://img.shields.io/badge/node-%3E%3D%2018-brightgreen)
![PHP](https://img.shields.io/badge/php-%5E8.0-blue)
![ACF Version](https://img.shields.io/badge/acf-%3E%3D%206.0-cyan)

Simppple is a Wordpress theme designed to be flexible, versatile and applicable to any website.
Its collection of templates and patterns tailor to different needs.
A multitude of possibilities open up with just a few adjustments to color and typography.
Simppple comes with some style variations to help the creativity of the site building process, it's fully compatible with the site editor, and takes advantage of new design tools introduced in WordPress 6.4.

In this project, you'll find a parent theme and a child theme.
<br>
[The development guide](#development-guide) for both themes is shown below.


**The parent theme is not meant to be modified.** If you want to add new acf/react blocks or patterns please put it inside the child theme folder.
<br>
**The parent theme will have it's own update options.** So every changes will be overriden when updating the theme.

## File Structure

- 📂 **simple** (parent theme)
  - 📂 [assets](./simppple/assets/)
    - Contains assets that will be compiled (scss, js, fonts, img, etc...)
    - 📂 fonts
      - 📂 icomoon
    - 📂 img
    - 📂 js
    - 📂 scss
  - 📂 build
    - Contains all the compiled assets (css, js, fonts, img, etc...)
  - 📂 blocks
    - 📂 [core](./simppple/blocks/core/README.md)
    - 📂 [woocommerce](./simppple/blocks/woocommerce/README.md)
  - 📂 [patterns](./simppple/patterns/README.md)
  - 📂 [inc](./simppple/inc/)
    - Contains PHP files that are used to customize the theme & assist in theme development
    - 📂 pattern
      - Everything related to custom patterns (category creation, etc...)
    - 📂 theme-customization
      - Everything related to simple theme customization (removing default colors etc...)
  - 📂 [lang](./simppple/lang/)
    - Contains translation files specific to the theme
  - 📂 [parts](./simppple/parts/README.md)
    - Theme template parts (Header, Footer, etc...)
  - 📂 styles
    - All the style variations of the theme
  - 📂 [templates](./simppple/templates/README.md)
    - Pages templates of the theme (404, archive, single, product, etc...)
  - [theme.json](./simppple/theme.json)
    - Contains all possible global configuration for the theme's styles
  - [functions.php](./simppple/functions.php)
    - Calls PHP files that are used to customize the theme & assist in theme development
  - [style.css](./simppple/style.css)
    - Contains useful theme information (author, version, etc...)
  - screenshot.png
    - Presentation image of the theme
- 📂 **simple-child** (child theme)
  - 📂 [assets](./simppple-child/assets/)
    - Contains assets that will be compiled (scss, js, fonts, img, etc...)
    - 📂 fonts
      - 📂 icomoon
    - 📂 img
    - 📂 js
    - 📂 scss
  - 📂 build
    - Contains all the compiled assets (css, js, fonts, img, etc...)
  - 📂 blocks
    - 📂 [acf](./simppple-child/blocks/acf/README.md)
    - 📂 [react](./simppple-child/blocks/react/README.md)
    - 📂 [core](./simppple-child/blocks/core/README.md)
    - 📂 [woocommerce](./simppple-child/blocks/woocommerce/README.md)
  - 📂 [patterns](./simppple-child/patterns/README.md)
  - 📂 [inc](./simppple-child/inc/)
    - Contains PHP files that are used to customize the theme & assist in theme development
    - 📂 blocks
      - Everything related to custom blocks (category creation, register, etc...)
    - 📂 pattern
      - Everything related to custom patterns (category creation, etc...)
    - 📂 theme-customization
      - Everything related to deeper theme customization (unnecessary menus, etc...)
  - 📂 [lang](./simppple-child/lang/)
    - Contains translation files specific to the theme
  - 📂 [parts](./simppple-child/parts/README.md)
    - Theme template parts (Header, Footer, etc...)
  - 📂 styles
    - All the style variations of the theme
  - 📂 [templates](./simppple-child/templates/README.md)
    - Pages templates of the theme (404, archive, single, product, etc...)
  - [theme.json](./simppple-child/theme.json)
    - Contains all possible global configuration for the theme's styles
  - [functions.php](./simppple-child/functions.php)
    - Calls PHP files that are used to customize the theme & assist in theme development
  - [style.css](./simppple-child/style.css)
    - Contains useful theme information (author, version, etc...)
  - screenshot.png
    - Presentation image of the theme

## Development Guide

### Installing Dependencies

If not already done, run `npm install` at the root of the project

### 🧙‍♂️ Development Scripts

We use vite.js to facilitate and optimize our development.

The list of development scripts is listed below:

| NPM Command                | Action                                                                                                                                               |
| -------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------- |
| npm run prod:{parent/child}               | compiles theme files (\*.scss, \*.js) and deploys static files to the **build/** directory of the parent/child theme.                                  |
| npm run build:{parent/child}               | lints, formats, and compiles theme files (\*.php, \*.scss, \*.js) and deploys static files to the **build/** directory of the parent/child theme.      |
| npm run watch:{parent/child}               | starts a local development server accessible directly on **local.your-host.com**, compiles and reloads static files (\*.scss, \*.js) on each change. |
| npm run watch:react-blocks | starts the compilation of React blocks, compiles and reloads static files (\*.scss, \*.js) on each change.                                           |
| npm run build:react-blocks | compiles React blocks, the blocks are compiled in the **blocks/react/build/** directory of the child theme.                                                |

### Overriding Gutenberg Native Blocks

Gutenberg's native editor blocks can be overridden by creating files in the `blocks/core/` ([see parent theme README](./simppple/blocks/core/README.md) / [see child theme README](./simppple-child/blocks/core/README.md)) directory of the parent/child theme.

### Overriding Woocommerce Native Blocks

Woocommerce's native Gutenberg blocks can be overridden by creating files in the `blocks/woocommerce/` ([see parent theme README](./simppple/blocks/woocommerce/README.md) / [see child theme README](./simppple-child/blocks/woocommerce/README.md)) directory of the parent/child theme.

### Creating ACF Blocks

ACF (Advanced Custom Fields) blocks should be created and edited in the `blocks/acf/` ([see parent theme README](./simppple/blocks/acf/README.md) / [see child theme README](./simppple-child/blocks/acf/README.md)) directory of the parent/child theme.

### Creating REACT Blocks

React blocks should be created and edited in the `blocks/react/src/` ([see parent theme README](./simppple/blocks/react/src/README.md) / [see child theme README](./simppple-child/blocks/react/src/README.md)) directory of the parent/child theme.

### Creating Patterns

Patterns can be created and edited in the `patterns/` ([see parent theme README](./simppple/patterns/README.md) / [see child theme README](./simppple-child/patterns/README.md)) directory of the parent/child theme.

### Creating Parts

Parts can be created and edited in the `parts/` ([see parent theme README](./simppple/parts/README.md) / [see child theme README](./simppple-child/parts/README.md)) directory of the parent/child theme.

### Creating Templates

Templates can be created and edited in the `templates/` ([see parent theme README](./simppple/templates/README.md) / [see child theme README](./simppple-child/templates/README.md)) directory of the parent/child theme.

### Translation

To generate the .pot file (from the theme's directory):

```bash
wp i18n make-pot . lang/simppple.pot --domain=simppple --exclude=node_modules,vendor,lang --include=*.php,blocks,build
```

To generate the translation json files for JS (from the theme's directory):

```bash
wp i18n make-json lang/ --no-purge
```

## Roadmap

- [x] Prefix functions
- [ ] Automatic release
- [ ] Automatic updates
- [x] Translations (English)
- [ ] Woocommerce compatibility

## Additional Resources

### Documentation

To learn more about using and customizing the theme:

- [Full Site Editing With WordPress](https://fullsiteediting.com/)
- [Theme example with Woocommerce store](https://themedemos.com/jace/)
