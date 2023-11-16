# Woocommerce blocks

- Placer ici les fichiers de surcharge des blocks natifs de Woocommerce
    1. Créer un dossier **block-to-override/** contenant les assets à compiler

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
