# Simple theme

![Version WordPress](https://img.shields.io/badge/wordpress-%3E%3D%206.2-blue)
![Version Woocommerce](https://img.shields.io/badge/woocommerce-%3E%3D%208.0-purple)
![Version ACF](https://img.shields.io/badge/acf-%3E%3D%206.0-cyan)
![Version Gravity form](https://img.shields.io/badge/gravityform-%3E%3D%202.7-orange)

## Arborescence des fichiers

- 📂 **Simple**
  - 📂 acf-json
    - Contient les configurations des acfs (Types de publications, Taxonomies, Groupes de champs etc...)
  - 📂 assets
    - Contient les assets qui seront compilés (scss, js, fonts, img etc...)
    - 📂 fonts
      - 📂 icomoon
    - 📂 img
    - 📂 js
    - 📂 scss
  - 📂 build
    - Contient tout les assets compilés (css, js, fonts, img etc...)
  - 📂 blocks
    - 📂 [acf](./blocks/acf/README.md)
    - 📂 your-block
      - 📂 assets
        - 📂 scss
        - 📂 js
      - block.json
      - your-block.php
    - 📂 [react](./blocks/react/README.md)
      - 📂 src
        - 📂 your-block
          - 📂 assets
          - 📂 scss
            - editor.scss
            - style.scss
          - 📂 js
            - save.jsx
            - edit.jsx
          - index.jsx
          - view.js
          - block.json
    - 📂 [core](./blocks/core/README.md)
    - 📂 block-paragraph
      - 📂 scss
        - \_block.scss
        - \_editor.scss
      - 📂 js
    - 📂 [woocommerce](./blocks/woocommerce/README.md)
    - 📂 wc-upsells
      - 📂 scss
        - \_block.scss
        - \_editor.scss
      - 📂 js
  - 📂 [patterns](./patterns/README.md)
    - 📂 your-pattern
      - 📂 scss
        - \_pattern.scss
        - \_editor.scss
      - 📂 js
    - your-pattern.php
  - 📂 inc
    - Contient les fichiers php qui servent à personnaliser le thème & aider au développement du thème
    - 📂 blocks
      - Tout ce qui est en lien avec les blocks personnalisés (création de catégorie etc...)
      - 📂 acf
        - Tout ce qui est en lien avec les blocks acf (register de blocks etc...)
      - 📂 react
        - Tout ce qui est en lien avec les blocks react (register de blocks etc...)
    - 📂 pattern
      - Tout ce qui est en lien avec les patterns personnalisés (création de catégorie etc...)
    - 📂 theme-customization
      - Tout ce qui est en lien avec la personnalisation plus en profondeur du thème (suppression des couleurs de base, suppression des menus inutiles etc...)
  - 📂 lang
    - Contient les fichiers de traductions propres au thème et aux blocks acf/react
  - 📂 parts
    - Templates parts ou Éléments html de modèles du thème (Header, Footer etc...)
    - 📂 your-part
      - 📂 scss
        - \_part.scss
      - 📂 js
    - your-part.php
  - 📂 styles
    - Toutes les variations de styles du thème
  - 📂 templates
    - Templates ou Modèles html du thème (404, archive, single, product etc...)
    - 📂 your-template
      - 📂 scss
        - \_template.scss
      - 📂 js
    - your-template.php
  - theme.json
    - Contient toute la configuration globale possible des styles du thème
  - functions.php
    - Appelle les fichiers php qui servent à personnaliser le thème & aider au développement du thème
  - style.css
    - Contient les informations utiles du thème (auteur, version etc...)
  - screenshot.png
    - Image de présentation du thème

## Guide de développement

### Installation des dependencies

Si ce n'est pas déjà le cas faire un `npm install` dans ce dossier

### 🧙‍♂️ Scripts de développement

Nous utilisons vite.js pour faciliter et optimiser nos développements.

La liste des scripts de développement est listée ci-dessous :

| Commande NPM  | Action                                                                                                                                                                               |
| ------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| npm run prod  | compile les fichiers du thème Simple (\*.scss, \*.js) et déploie les fichiers statiques dans de dossier **build/** du thème.                                                         |
| npm run build | lint, indente et compile les fichiers du thème Simple (\*.php, \*.scss, \*.js) et déploie les fichiers statiques dans de dossier **build/** du thème.                                |
| npm run watch | démarre un serveur de développement local accessible directement sur **local.design-system.com**, compile et recharge les fichiers statiques (\*.scss, \*.js) à chaque modification. |
| npm run watch:react-blocks | démarre la compilation des blocks react, compile et recharge les fichiers statiques (\*.scss, \*.js) à chaque modification. |
| npm run build:react-blocks | compile blocks react, les blocks sont compilés dans le dossier **blocks/react/build/** du thème |

### Surcharge de Blocs Natifs Gutenberg

Les blocs natifs de l'éditeur Gutenberg peuvent être surchargés en créant des fichiers dans le dossier `blocks/core/` de votre thème.

### Surcharge de Blocs Natifs Woocommerce

Les blocs natifs Woocommerce de l'éditeur Gutenberg peuvent être surchargés en créant des fichiers dans le dossier `blocks/woocommerce/` de votre thème.

### Création de Blocs ACF

Les blocs ACF (Advanced Custom Fields) sont à créer et éditer dans le dossier `blocks/acf/` de votre thème.

### Création de Blocs REACT

Les blocs React sont à créer et éditer dans le dossier `blocks/react/` de votre thème.

### Création de Patterns

Les patterns peuvent être créés et édités dans le dossier `patterns/` de votre thème.

### Création de Parts

Les parts peuvent être créés et édités dans le dossier `parts/` de votre thème.

### Création de Templates

Les templates peuvent être créés et édités dans le dossier `templates/` de votre thème.

### Traduction

Pour générer le fichier .pot (se placer dans le dossier du thème)

```bash
wp i18n make-pot . lang/simple.pot --domain=simple --exclude=node_modules,vendor,lang --include=*.php,blocks,build
```

Pour générer les json de traductions pour le js (se placer dans le dossier du thème)

```bash
wp i18n make-json lang/ --no-purge
```

### Création de child themes

- [Article rapide](https://fullsiteediting.com/lessons/child-themes/#h-what-type-of-child-themes-can-i-create)

## Roadmap

- [ ] Woocommerce compatibility
- [ ] Mises à jour automatiques
- [ ] Traductions (anglais)

## Ressources Additionnelles

### Documentation

Pour en savoir plus sur l'utilisation et la personnalisation du thème :

- [Full Site Editing With Wordpress](https://fullsiteediting.com/)
- [Theme example avec boutique Woocommerce](https://themedemos.com/jace/)
