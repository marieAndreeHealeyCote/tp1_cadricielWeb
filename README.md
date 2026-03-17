# Réseau social étudiant – Collège Maisonneuve

## Étudiante

Marie-Andrée Healey-Côté

---

## Description du projet

Ce projet a été réalisé dans le cadre du cours **Cadriciel Web (582-41B-MA)**.

Il s'agit d'une application web développée avec **Laravel** permettant de simuler un réseau social pour les étudiants du Collège Maisonneuve.

Le système inclut :

- une gestion des étudiants
- un forum de publication
- un répertoire de documents
- un système d’authentification
- un support multilingue (français / anglais)

---

## Technologies utilisées

- Laravel 12
- PHP 8.4
- MySQL (Workbench)
- Bootstrap 5
- Blade (templating)
- Laravel Breeze (authentification)
- GitHub

---

## Accès au système

### Compte de test

email : test@example.com
password : password

---

## Fonctionnalités

### Authentification

- Inscription et connexion
- Mot de passe sécurisé (hash)
- Accès protégé aux pages

---

### Gestion des étudiants

- Ajouter un étudiant
- Modifier un étudiant
- Supprimer un étudiant
- Validation des formulaires

---

### Forum

- Création de publications
- Modification et suppression (uniquement par l’auteur)
- Affichage des publications
- Gestion de la langue (FR/EN)

---

### Répertoire de documents

- Upload de fichiers (PDF, ZIP, DOC)
- Liste paginée
- Affichage de l’utilisateur et de la date
- Accès public aux étudiants connectés
- Modification et suppression (uniquement par l’auteur)

---

### Multilingue

- Interface disponible en français et en anglais
- Changement de langue dynamique
- Traduction des messages et validations

---

### Interface

- Interface responsive avec Bootstrap
- Navigation claire
- Messages de succès et d’erreur

---

## Sécurité

- Authentification obligatoire
- Protection des routes avec middleware
- Vérification côté serveur pour modification/suppression
- Restrictions par utilisateur (forum et documents)

---

## Installation du projet

1. Cloner le projet :
   https://github.com/marieAndreeHealeyCote/tp1_cadricielWeb.git

2. Installer les dépendances :
   composer install
   npm install

3. Configurer le fichier `.env`

4. Générer la clé :
   php artisan key:generate

5. Lancer les migrations et seeders :
   php artisan migrate --seed

6. Lier le stockage :
   php artisan storage:link

7. Lancer le serveur :
   php artisan serve

---

## Déploiement

Lien vers le projet en ligne :  
👉 [LIEN_WEBDEV_OU_AUTRE]

---

## 🔗 GitHub

👉 https://github.com/marieAndreeHealeyCote/tp1_cadricielWeb.git

---

## Remarques

- Le système de profil provient de Laravel Breeze mais n’est pas utilisé dans ce projet.
- Toutes les fonctionnalités demandées dans le devis ont été implémentées.
- Le projet respecte les exigences de sécurité, validation et interface.

---

## Conclusion

Ce projet démontre :

- l’utilisation du framework Laravel
- la gestion complète CRUD
- l’authentification sécurisée
- la gestion multilingue
- une architecture MVC propre
