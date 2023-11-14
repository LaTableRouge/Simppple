# ACF blocks

- Les blocks sont créés en se référant à ce [tutoriel](https://www.advancedcustomfields.com/resources/blocks/), ou bien en se référant à un block existant dans ce dossier.
- Compilation (voir [package.json](../../../../../../package.json))

## Enqueue

### Assets

- Les assets (scss|js) sont à enqueue dans les fichiers du thème
    - [_blocks.scss](../../../assets/scss/components/blocks/_blocks.scss)
    - [_blocks-editor.scss](../../../assets/scss/components/blocks/_blocks-editor.scss)
    - [front.js](../../../assets/js/front.js)
    - [editor.js](../../../assets/js/editor.js)

### Templates

- Les templates (php) sont à enqueue dans le fichier prévu à cet effet
    - [blocks-register.php](../../../inc/blocks/acf/blocks-register.php)

## Traduction

- Les traductions des blocs sont à générer en même temps que celles du thème (Voir [README](../../../README.md#traduction))
