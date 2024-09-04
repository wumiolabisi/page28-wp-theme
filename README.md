# Page28 - Thème WordPress

Bienvenue dans le dépôt du thème WordPress développé pour **Page28**, un catalogue dédié à la promotion des œuvres cinématographiques réalisées par des femmes. Ce thème est le fruit d'une collaboration entre **Anne Roux**, réalisatrice et fondatrice de Page28, et **Omowumi OLABISI**, développeuse web.

## Table des matières

- [Introduction](#introduction)
- [Installation](#installation)
- [Fonctionnalités](#fonctionnalités)
- [Structure du Répertoire](#structure-du-répertoire)
- [Personnalisation](#personnalisation)
- [License](#license)
- [Crédits](#crédits)

## Introduction

Ce thème WordPress a été spécialement conçu pour Page28 afin de mettre en valeur les contenus tels que les fiches de films et séries, les dossiers de presse vulgarisés, et les portraits de réalisatrices. Il est conçu pour être performant, accessible, et entièrement compatible avec les dernières versions de WordPress.

## Installation

### Pré-requis

Assurez-vous d'avoir une installation WordPress fonctionnelle sur votre serveur.

### Étapes d'installation

1. **Cloner le dépôt :**
   ```bash
   git clone https://github.com/votre-utilisateur/page28-theme.git
   ```

2. **Télécharger et installer WordPress :**
   - Placez le répertoire du thème dans le dossier `wp-content/themes/` de votre installation WordPress.
   - Allez dans le tableau de bord WordPress, puis dans `Apparence > Thèmes` et activez le thème **Page28**.

3. **Compilation des fichiers CSS et JS :**
   Ce projet utilise Laravel Mix pour la gestion des assets. Pour compiler les fichiers CSS et JavaScript :

   - Assurez-vous d'avoir Node.js et npm installés sur votre machine.
   - Installez les dépendances :
     ```bash
     npm install
     ```
   - Compilez les fichiers pour la production :
     ```bash
     npm run production
     ```
   - Pour le développement avec watch :
     ```bash
     npm run watch
     ```

4. **Finalisation :**
   Une fois le thème activé et les fichiers compilés, votre site devrait être prêt à fonctionner avec le thème **Page28**.

## Fonctionnalités

- **Design Responsive :** Le thème est entièrement responsive et optimisé pour les appareils mobiles.
- **Fiches de Films et Séries :** Fiches personnalisées pour afficher les informations détaillées sur les œuvres.
- **Portraits de Réalisatrices :** Sections dédiées à la présentation des réalisatrices mises en avant sur Page28.
- **Accessibilité :** Conformité avec les standards d'accessibilité pour une navigation facile pour tous les utilisateurs.

## Structure du Répertoire

```plaintext
page28/
│
├── dist/               # Fichiers CSS, JS optimisés et fonts
│   ├── css/
│   ├── js/
│   └── fonts/
│
├── img/                # Les images du thème
│
├── src/                # Styles et fonctionnalités du thème
│   ├── js/       
│   └── scss/
│   └── server/
│
├── template-parts/     # Fichiers template   
│   
├── functions.php       # Fonctions et hooks pour le thème
├── screenshot.png      # Capture d'écran du thème (visible dans le tableau de bord WP)
└── README.md           # Ce fichier
```

## Personnalisation

- **Fichier `style.css`** : Ce style est généré avec SASS, pour modifier le style il faut modifier les fichiers présents dans src.
- **Templates** : Pour modifier la mise en page, éditez les fichiers dans le répertoire `templates/`.
- **Fonctions** : Ajoutez ou modifiez les fonctionnalités du thème dans `functions.php`.

## License

Ce projet est sous licence MIT. Veuillez consulter le fichier [LICENSE](LICENSE) pour plus de détails.

## Crédits

Le thème **Page28** a été développé par **Omowumi OLABISI** en collaboration avec **Anne Roux**, fondatrice de Page28 et réalisatrice engagée. Pour en savoir plus sur le projet Page28, visitez [Page28.fr](https://page28.fr).
