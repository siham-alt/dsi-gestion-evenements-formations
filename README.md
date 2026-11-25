# Gestion des Événements et des Formations – DSI

## Présentation du projet

Cette application web a pour objectif de faciliter la gestion des événements et des formations organisés au sein de la Direction des Systèmes d’Information (DSI) du Ministère de l’Éducation nationale, du Préscolaire, de la Formation professionnelle et de la Qualification du Royaume du Maroc.

Elle permet aux utilisateurs de consulter les événements et les formations proposés, de s'y inscrire et de suivre leurs inscriptions.

Elle offre également un espace d'administration permettant de gérer les événements, les formations, les utilisateurs et les inscriptions.

## Objectifs du projet

- Centraliser la gestion des événements et des formations.
- Simplifier le processus d'inscription des utilisateurs.
- Gérer efficacement les capacités d'accueil.
- Éviter les inscriptions en double.
- Empêcher les inscriptions aux activités déjà terminées.
- Faciliter le suivi et l'administration des inscriptions.

## Fonctionnalités principales

### Espace utilisateur

- Consulter la liste des événements et des formations disponibles.
- Consulter les détails de chaque activité : description, date, lieu et nombre de places disponibles.
- S'inscrire à un événement ou à une formation.
- Consulter ses inscriptions.
- Vérifier automatiquement la disponibilité des places avant toute inscription.
- Empêcher les inscriptions multiples à une même activité.
- Empêcher les inscriptions aux activités déjà passées.

### Espace administrateur

- Ajouter, modifier et supprimer des événements.
- Ajouter, modifier et supprimer des formations.
- Définir les informations des activités : titre, description, date, lieu et capacité d'accueil.
- Consulter la liste des utilisateurs inscrits.
- Gérer les inscriptions aux événements et aux formations.
- Suivre le nombre de participants et les places restantes.
- Administrer les différentes activités depuis un espace dédié.

## Règles de gestion

L'application applique les règles suivantes :

1. Un utilisateur peut s'inscrire à un événement ou à une formation uniquement si l'activité n'est pas encore passée.
2. Une inscription est autorisée uniquement lorsqu'il reste des places disponibles.
3. Un utilisateur ne peut pas s'inscrire plusieurs fois à la même activité.
4. Le nombre de places disponibles est calculé en fonction des inscriptions enregistrées.
5. L'administrateur dispose des droits nécessaires pour gérer les événements, les formations et les inscriptions.

## Technologies utilisées

### Backend
- **PHP** : langage de programmation côté serveur.
- **Laravel** : framework PHP utilisé pour développer la logique métier, gérer les routes, les contrôleurs et les interactions avec la base de données.

### Frontend
- **HTML5** : structure des pages web.
- **CSS3** : mise en forme et design de l'interface.
- **JavaScript** : gestion des interactions et dynamisation des pages.

### Base de données
- **MySQL** : système de gestion de base de données relationnelle utilisé pour stocker les utilisateurs, les événements, les formations et les inscriptions.

### Outils de développement
- **Visual Studio Code** : environnement de développement.
- **Composer** : gestionnaire de dépendances PHP.
- **Git et GitHub** : gestion des versions et hébergement du code source.

## Installation et lancement

### 1. Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- PHP
- Composer
- MySQL
- Git
- Un environnement permettant d'exécuter Laravel (XAMPP, Laragon ou autre).

### 2. Cloner le repository

```bash
git clone https://github.com/siham-alt/dsi-gestion-evenements-formations.git
```

Accéder au dossier du projet :

```bash
cd dsi-gestion-evenements-formations
```

### 3. Installer les dépendances

```bash
composer install
```

### 4. Configurer le fichier d'environnement

Créer le fichier `.env` à partir du fichier d'exemple :

```bash
cp .env.example .env
```

Sous Windows PowerShell, tu peux également utiliser :

```powershell
Copy-Item .env.example .env
```

Générer la clé de l'application :

```bash
php artisan key:generate
```

### 5. Configurer la base de données

Créer une base de données MySQL, puis modifier les paramètres suivants dans le fichier `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_ta_base
DB_USERNAME=root
DB_PASSWORD=
```

Remplacer les valeurs par les informations correspondant à ton environnement MySQL.

### 6. Exécuter les migrations

```bash
php artisan migrate
```

Si le projet contient des seeders nécessaires :

```bash
php artisan db:seed
```

### 7. Lancer l'application

```bash
php artisan serve
```

Ouvrir ensuite l'application dans le navigateur :

```text
http://127.0.0.1:8000
```


## Contexte du projet

Ce projet s'inscrit dans une démarche de digitalisation de la gestion des événements et des formations au sein de la Direction des Systèmes d'Information (DSI).

Il vise à proposer une solution centralisée permettant de simplifier les inscriptions, d'optimiser la gestion des places disponibles et de faciliter le travail administratif.

---

**Nom du projet :** Gestion des Événements et des Formations – DSI

**Repository GitHub :** [dsi-gestion-evenements-formations](https://github.com/siham-alt/dsi-gestion-evenements-formations)

**Organisme concerné :** Direction des Systèmes d'Information (DSI) – Maroc

**Technologies :** Laravel, PHP, HTML5, CSS3, JavaScript et MySQL
