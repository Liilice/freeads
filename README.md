# Free Ads

## Introduction
Ce projet consiste à développer un site de petites annonces utilisant le framework Laravel. Le site permet aux utilisateurs de s'inscrire, de créer et de gérer des annonces, de rechercher et de filtrer les annonces, et bien plus encore.

## Fonctionnalités
- **Authentification des utilisateurs**
  - Page d'inscription avec confirmation par email.
  - Page de connexion.
  - Page de modification de profil utilisateur.
- **Gestion des annonces**
  - Création d'annonces avec un titre, une description, une ou plusieurs photographies et un prix.
  - Affichage de la liste des annonces.
  - Modification et suppression des annonces par leurs propriétaires.
- **Recherche et filtrage des annonces**
  - Recherche d'annonces par nom, type de produit, prix, etc.
  - Affichage des annonces par pertinence, proximité, goûts, couleur, etc.

## Prérequis
- PHP >= 7.4
- Composer
- MySQL
- Laravel 8.x
- Serveur Web (Apache, Nginx, etc.)

## Installation et Configuration

### 1. Cloner le Répertoire du Projet
```bash
git clone git@github.com:Liilice/freeads.git
cd freeads
```

### 2. Installer les Dépendances
```bash
composer install
```

### 3. Configurer l'Environnement
Générez la clé de l'application Laravel.
```bash
php artisan key:generate
```

### 4. Configurer la Base de Données
Créez une base de données MySQL et configurez les paramètres de connexion dans le fichier `.env` avec vos username et password.
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
Configurez les paramètres de mailtrap dans le fichier `.env` avec vos username et password.
```php
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 5. Migrer la Base de Données
```bash
php artisan migrate
```

### 6. Lancer le Serveur de Développement
```bash
php artisan serve
```

Accédez au site via `http://127.0.0.1:8000`.
