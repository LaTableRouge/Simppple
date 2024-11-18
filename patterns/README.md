# Patterns

- Place pattern files here

1. A template file **your-pattern.php**
2. If necessary, a **your-pattern/** folder containing assets to be compiled

## Assets

### File Structure

- 📂 your-pattern
  - 📂 scss
    - \_pattern.scss
    - \_editor.scss
  - 📂 js
- your-pattern.php

### Enqueue

- The scss assets are automatically called using the sass glob method
  - [front.scss](../src/styles/front.scss)
  - [editor.scss](../src/styles/editor.scss)
- The js assets are automatically called using the vite.js glob method
  - [front.js](../src/scripts/front.js)
  - [editor.js](../src/scripts/editor.js)

### Compilation

- see [package.json](../package.json)

## Translation

- The translations for patterns should be generated at the same time as those for the theme (See [README](../README.md#translation))
