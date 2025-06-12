# Simppple Theme

![WordPress Version](https://img.shields.io/badge/wordpress-%3E%3D%206.5-blue)
![Node](https://img.shields.io/badge/node-%3E%3D%2022-brightgreen)
![PHP](https://img.shields.io/badge/php-%5E8.0-blue)

Simppple is a Wordpress theme designed to be flexible, versatile and applicable to any website.
Its collection of templates and patterns tailor to different needs.
A multitude of possibilities open up with just a few adjustments to color and typography.
Simppple comes with some style variations to help the creativity of the site building process, it's fully compatible with the site editor, and takes advantage of new design tools introduced in WordPress 6.4.

**This parent theme is not meant to be modified inside a Wordpress project.** If you want to add new acf/react blocks or patterns please put it inside the child theme folder ([Child theme template](https://github.com/LaTableRouge/Simppple-child)).
<br>
<br>
**This parent theme will have it's own updates** (maybe once a year idk 🤷‍♀️).
<br>
You can download the theme via [Wordpress.org](https://wordpress.org/themes/simppple/) or [Github](https://github.com/LaTableRouge/Simppple/releases/latest/)

## File Structure

- 📂 **Simppple**
  - 📂 [src](./src/)
    - Contains assets that will be compiled (scss, js, fonts, img, etc...)
    - 📂 fonts
      - 📂 icomoon
    - 📂 img
    - 📂 scripts
    - 📂 styles
  - 📂 build
    - Contains all the compiled assets (css, js, fonts, img, etc...)
  - 📂 blocks
    - 📂 [core](./blocks/core/README.md)
    - 📂 [woocommerce](./blocks/woocommerce/README.md)
  - 📂 [patterns](./patterns/README.md)
  - 📂 [inc](./inc/)
    - Contains PHP files that are used to customize the theme & assist in theme development
    - 📂 pattern
      - Everything related to custom patterns (category creation, etc...)
    - 📂 theme-customization
      - Everything related to deeper theme customization (removing default colors, unnecessary menus, etc...)
  - 📂 [lang](./lang/)
    - Contains translation files specific to the theme
  - 📂 [parts](./parts/README.md)
    - Theme template parts (Header, Footer, etc...)
  - 📂 [styles](./styles/)
    - All the style variations of the theme
  - 📂 [templates](./templates/README.md)
    - Pages templates of the theme (404, archive, single, product, etc...)
  - [theme.json](./theme.json)
    - Contains all possible global configuration for the theme's styles
  - [functions.php](./functions.php)
    - Calls PHP files that are used to customize the theme & assist in theme development
  - [style.css](./style.css)
    - Contains useful theme information (author, version, etc...)
  - screenshot.png
    - Presentation image of the theme

## Development Guide

### Installing Dependencies

If not already done, run `npm install` in this directory

### 🧙‍♂️ Development Scripts

We use [vite.js](https://vite.dev/) to facilitate and optimize our development.

The list of development scripts is listed below:

| NPM Command                | Action                                                                                                                                               |
| -------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------- |
| npm run watch              | starts a local development server accessible directly on **local.your-host.com**, compiles and reloads static files (\*.scss, \*.js) on each change. |
| npm run build              | compiles `simppple` theme files (\*.scss, \*.js) and deploys static files to the **build/** directory of the theme.                            |
| npm run beautify:all       | lints, formats theme files (\*.php, \*.scss, \*.js)                                                                                                  |

### 🐶 Husky & Git Hooks

We use [Husky](https://github.com/typicode/husky) to manage Git hooks, ensuring code quality and consistency before commits and pushes.

#### Installation and Usage

It is **strongly recommended** to install all dependencies with `npm install` before starting development. This will set up Husky and all necessary tools to ensure code quality.

Husky will automatically run checks when you attempt to commit changes. **Important:** Commits will fail if any linting errors or code quality issues are detected. You must fix all issues before your code can be committed to the repository. This strict approach ensures that only high-quality code enters the codebase.

If you need to bypass these checks in exceptional circumstances (not recommended), you can use the `--no-verify` flag with your git commit command.

#### Pre-commit Hook

The pre-commit hook runs automatically when you attempt to commit changes, performing the following tasks:

- Runs lint-staged to process only the files that are staged for commit
- Prevents commits if any of the checks fail

#### Lint-staged Configuration

Lint-staged runs specific scripts based on file types:

| File Type        | Scripts Run                                                                       |
| ---------------- | --------------------------------------------------------------------------------- |
| \*.php           | PHP-CS-Fixer to ensure consistent formatting & PHPStan to enforce coding standard |
| \*.scss          | Stylelint to enforce consistent styling                                           |
| _.js, _.jsx      | ESLint to check for JavaScript errors and enforce coding standards                |
| \*.{js,jsx,scss} | Prettier to ensure consistent formatting                                          |

This ensures that all code committed to the repository meets our quality standards and maintains a consistent style.

#### Git Hooks in Detail

##### Pre-commit Check

The pre-commit hook performs several checks before allowing a commit to proceed:

1. **Code Quality Checks**: Runs lint-staged to verify that all staged files meet coding standards
2. **Type Checking**: Ensures TypeScript files have proper type definitions
3. **Unit Tests**: Runs relevant unit tests that might be affected by your changes
4. **Build Verification**: Ensures the project can build successfully with your changes

If any of these checks fail, the commit will be aborted, and you'll need to fix the issues before trying again.

##### Branch Name Validation

The branch name validation hook ensures that all branch names follow our standardized naming convention:

- Format: `type/description` (e.g., `feature/add-login-page`, `fix/header-alignment`)
- Allowed types: `feature`, `bugfix`, `fix`, `hotfix`, `release`, `chore`, `docs`, `refactor`, `test`
- Description must use kebab-case (lowercase with hyphens)
- No uppercase letters, underscores, or special characters allowed

This standardization makes it easier to track work and understand the purpose of each branch at a glance.

##### Commitlint Standard

We follow the [Conventional Commits](https://www.conventionalcommits.org/) standard for commit messages, enforced by commitlint:

- Format: `type(scope): subject` (e.g., `feat(auth): add login functionality`)
- Types: `feat`, `fix`, `docs`, `style`, `refactor`, `perf`, `test`, `build`, `ci`, `chore`, `revert`
- Scope: Optional component/module name in parentheses
- Subject: Short description in present tense, no capital first letter, no period at the end
- Body: Optional detailed description after a blank line
- Footer: Optional, for referencing issues (e.g., `Fixes #123`)

Example of a complete commit message:

```
feat(auth): add password reset functionality

Implement the password reset flow including email notification
and secure token validation.

Fixes #456
```

#### Benefits

- Prevents bad code from entering the codebase
- Maintains consistent code style across the project
- Catches errors early in the development process
- Reduces the need for style-related code reviews

### Overriding Gutenberg Native Blocks

Gutenberg's native editor blocks can be overridden by creating files in the `blocks/core/` ([see README](./blocks/core/README.md)) directory of the theme.

### Overriding Woocommerce Native Blocks

Woocommerce's native Gutenberg blocks can be overridden by creating files in the `blocks/woocommerce/` ([see README](./blocks/woocommerce/README.md)) directory of the theme.

### Creating ACF Blocks

ACF (Advanced Custom Fields) blocks should be created and edited in the `blocks/acf/` directory of the [child theme](https://github.com/LaTableRouge/Simppple-child) ([see README](https://github.com/LaTableRouge/Simppple-child/blob/master/blocks/acf/README.md)).

### Creating REACT Blocks

React blocks should be created and edited in the `blocks/react/` directory of the [child theme](https://github.com/LaTableRouge/Simppple-child) ([see README](https://github.com/LaTableRouge/Simppple-child/blob/master/blocks/react/README.md)).

### Creating Patterns

Patterns can be created and edited in the `patterns/` ([see README](./patterns/README.md)) directory of the theme.

### Creating Parts

Parts can be created and edited in the `parts/` ([see README](./parts/README.md)) directory of the theme.

### Creating Templates

Templates can be created and edited in the `templates/` ([see README](./templates/README.md)) directory of the theme.

### Translation

To generate the .pot file (from the theme's directory):

```bash
wp i18n make-pot . lang/simppple.pot --domain=simppple --exclude=node_modules,vendor,lang --include=*.php,build
```

To generate the translation json files for JS (from the theme's directory):

```bash
wp i18n make-json lang/ --no-purge
```

### Creating Child Themes

- [Quick Article](https://fullsiteediting.com/lessons/child-themes/#h-what-type-of-child-themes-can-i-create)
- Use the designated child theme [Simppple-child](https://github.com/LaTableRouge/Simppple-child)

## Roadmap

- [x] Prefix functions
- [x] Automatic release
- [x] Automatic updates
- [x] Translations (English)
- [x] Woocommerce compatibility
- [ ] Automatic pot/po/mo json translation files

## Additional Resources

### Documentation

To learn more about using and customizing the theme:

- [Full Site Editing With WordPress](https://fullsiteediting.com/)
- [Theme example with Woocommerce store](https://themedemos.com/jace/)
