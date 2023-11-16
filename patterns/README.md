# Patterns

- Placer ici les fichiers des patterns
 1. Un fichier template **your-pattern.php**
 2. Si nécéssaire, un dossier **your-pattern/** contenant les assets à compiler

## Assets

### Enqueue

- Les assets scss sont appelés automatiquement grâce à la méthode glob de sass
    - [front.scss](../assets/scss/front.scss)
    - [editor.scss](../assets/scss/editor.scss)
- Les assets js sont appelés automatiquement grâce à la méthode glob de vite.js
    - [front.js](../assets/js/front.js)
    - [editor.js](../assets/js/editor.js)

### Compilation

- voir [package.json](../package.json)

## Traduction

- Les traductions des patterns sont à générer en même temps que celles du thème (Voir [README](../README.md#traduction))
