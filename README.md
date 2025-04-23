<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Intranet - Maison des ligues

## Description du projet
Plateforme intranet permettant aux collaborateurs d'une entreprise de se connecter, de découvrir des collègues au hasard, de consulter une liste de tous les collaborateurs avec filtres, et de gérer leur profil. Les administrateurs ont des fonctionnalités supplémentaires pour gérer les utilisateurs.

## Technologies utilisées
- **Framework**: Laravel
- **Front-end**: HTML, CSS, JavaScript, Blade
- **Back-end**: PHP
- **Base de données**: MySQL (gérée via phpMyAdmin)
- **Gestion de version**: Git

## Fonctionnalités

### Pour les utilisateurs standard
- Connexion/déconnexion sécurisée
- Page d'accueil affichant un collaborateur aléatoire
- Liste des collaborateurs avec filtres (nom, localisation, catégorie)
- Modification du profil personnel (email, mot de passe, etc.)

### Pour les administrateurs
- Ajout/suppression/édition de collaborateurs
- Attribution du rôle administrateur
- Accès à un formulaire dédié pour la gestion des utilisateurs

## Installation

1. **Cloner le dépôt**:
   ```bash
   git clone [URL_du_dépôt]
   cd nom_du_projet
