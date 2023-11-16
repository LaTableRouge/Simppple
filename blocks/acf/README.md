# ACF blocks

- Les blocks sont créés en se référant à ce [tutoriel](https://www.advancedcustomfields.com/resources/blocks/), ou bien en se référant à un block existant dans ce dossier.

## Assets

### Enqueue

- Les assets scss sont appelés automatiquement grâce à la méthode glob de sass
    - [front.scss](../../assets/scss/front.scss)
    - [editor.scss](../../assets/scss/editor.scss)
- Les assets js sont appelés automatiquement grâce à la méthode glob de vite.js
    - [front.js](../../assets/js/front.js)
    - [editor.js](../../assets/js/editor.js)

### Compilation

- voir [package.json](../../package.json)

## Traduction

- Les traductions des blocs sont à générer en même temps que celles du thème (Voir [README](../../README.md#traduction))
