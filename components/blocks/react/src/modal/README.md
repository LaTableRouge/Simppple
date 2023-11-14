# React blocks

<img src="https://img.shields.io/badge/wordpress-%3E%3D%206.2-blue">
<img src="https://img.shields.io/badge/node-%3E%3D%2016-brightgreen">

![Block](https://media.giphy.com/media/l0JMrPWRQkTeg3jjO/giphy.gif)


- Les blocks sont créés en se référant à ce [tutoriel](https://developer.wordpress.org/block-editor/getting-started/create-block/), ou bien en se référant à un block existant dans ce dossier.
- Les blocks sont enqueue dans le fichier [blocks-register.php](../../../inc/blocks/react/blocks-register.php)

## Compilation (voir [package.json](./package.json))

### Installer les dépendances requises

**Positionnez-vous dans le dossier du plugin**

```bash
npm install
```

### Commandes

- Compilation dev :
```bash
npm start
```

- Build :
```bash
npm run build
```

## Traduction

- Les traductions des blocs sont à générer en même temps que celles du thème (Voir [README](../../../README.md#traduction))
