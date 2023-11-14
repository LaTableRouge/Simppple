# Thème Design system 💾

![Version WordPress](https://img.shields.io/badge/wordpress-%3E%3D%206.2-blue)
![Version Woocommerce](https://img.shields.io/badge/woocommerce-%3E%3D%208.0-purple)
![Version ACF](https://img.shields.io/badge/acf-%3E%3D%206.0-cyan)
![Version Gravity form](https://img.shields.io/badge/gravityform-%3E%3D%202.7-orange)

## Arborescence des fichiers

- 📂 **highfive**
  - 📂 acf-json
    -  Contient les configurations des acfs (Types de publications, Taxonomies, Groupes de champs etc...)
  - 📂 assets
    -  Contient les assets qui seront compilés (scss, js, fonts, img etc...)
    - 📂 fonts
      - 📂 icomoon
    - 📂 img
    - 📂 js
    - 📂 scss
  - 📂 build
    - Contient tout les assets compilés (css, js, fonts, img etc...)
  - 📂 components
    - 📂 blocks
      - 📂 [acf](./components/blocks/acf/README.md)
        - 📂 your-block
          - 📂 scss
            - Contient les fichiers de styles du block acf "your-block"
          - 📂 js
            - Contient les fichiers javascript du block acf "your-block"
          - block.json
          - your-block.php
      - 📂 [core](./components/blocks/core/README.md)
        - 📂 block-paragraph
          - 📂 scss
            - Contient les fichiers de surcharge de styles du block gutenberg natif "paragraph"
          - 📂 js
            - Contient les fichiers de surcharge javascript du block gutenberg natif "paragraph"
      - 📂 [woocommerce](./components/blocks/woocommerce/README.md)
        - 📂 wc-upsells
          - 📂 scss
            - Contient les fichiers de surcharge de styles du block woocommerce "wc-upsells"
          - 📂 js
            - Contient les fichiers de surcharge javascript du block woocommerce "wc-upsells"
    - 📂 [patterns](./components/patterns/README.md)
      - 📂 your-pattern
        - 📂 scss
          - Contient les fichiers de styles du pattern "your-pattern"
        - 📂 js
          - Contient les fichiers javascript du pattern "your-pattern"
        - your-pattern.php
  - 📂 inc
    - Contient les fichiers php qui servent à personnaliser le thème & aider au développement du thème
    - 📂 blocks
        - 📂 acf
            - Tout ce qui est en lien avec les blocks acf (Création de catégorie de blocks, register de blocks etc...)
    - 📂 pattern
        - Tout ce qui est en lien avec les patterns en global (Création de catégorie de patterns)
    - 📂 theme-customization
  - 📂 lang
    - Contient les fichiers de traductions propres au thème et aux blocks acf/react
  - 📂 parts
    - Templates parts ou Éléments html de modèles du thème (Header, Footer etc...)
  - 📂 styles
    - Toutes les variations de styles du thème
  - 📂 templates
    - Templates ou Modèles html du thème (404, archive, single, product etc...)
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

Si ce n'est pas déjà le cas faire un `npm install && composer install` dans ce dossier

### 🧙‍♂️ Scripts de développement

Nous utilisons vite.js pour faciliter et optimiser nos développements.

La liste des scripts de développement est listée ci-dessous :

| Commande NPM  | Action                                                                                                                                                                         |
| ------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| npm run prod  | compile les fichiers du thème highfive (\*.scss, \*.js) et déploie les fichiers statiques dans de dossier **build/** du thème.                                          |
| npm run build | lint, indente et compile les fichiers du thème highfive (\*.php, \*.scss, \*.js) et déploie les fichiers statiques dans de dossier **build/** du thème.                         |
| npm run watch | démarre un serveur de développement local accessible directement sur **local.design-system.com**, compile et recharge les fichiers statiques (\*.scss, \*.js) à chaque modification. |

### Surcharge de Blocs Natifs Gutenberg
Les blocs natifs de l'éditeur Gutenberg peuvent être surchargés en créant des fichiers dans le dossier `components/blocks/core` de votre thème.

### Création de Blocs ACF
Les blocs ACF (Advanced Custom Fields) sont à créer et éditer dans le dossier `components/blocks/acf` de votre thème.

### Création de Patterns
Les patterns peuvent être créés et édités dans le dossier `components/patterns` de votre thème.

### Création de child themes
- [Article rapide](https://fullsiteediting.com/lessons/child-themes/#h-what-type-of-child-themes-can-i-create)

### Traduction

‼Les chaînes de caractères dans le code sont écrites en français‼ (C'est plus facile de traduire du français vers autre chose)
<br>
<br>
Pour générer le fichier .pot (se placer dans le dossier du thème)

```bash
wp i18n make-pot . lang/highfive.pot --domain=highfive --exclude=node_modules,vendor,lang --include=*.php,blocks,build
```
Pour générer les json de traductions pour le js (se placer dans le dossier du thème)

```bash
wp i18n make-json lang/ --no-purge
```


## Ressources Additionnelles

### Documentation
Pour en savoir plus sur l'utilisation et la personnalisation du thème :
- [Full Site Editing With Wordpress](https://fullsiteediting.com/)
- [Theme example avec boutique Woocommerce](https://themedemos.com/jace/)

### Exemples de Sites
Découvrez des exemples de sites utilisant highfive :
- [Demo-web](https://demo-web.glanum.net/)
- [Colas CSE](https://cse-colas-solutions.glanum.net)
