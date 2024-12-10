# Bibliothèque Web - Documentation des Actions Utilisateur

Ce document explique les actions que vous pouvez réaliser dans l'application en fonction de votre rôle (utilisateur ou administrateur).

---

## Table des matières

1. [Introduction](#introduction)
2. [Actions disponibles pour un utilisateur](#actions-disponibles-pour-un-utilisateur)
   - [Consulter la liste des utilisateurs](#userindex)
   - [Afficher les détails d'un utilisateur](#usershow)
   - [Créer un utilisateur](#usernew)
   - [Éditer un utilisateur](#useredit)
3. [Actions disponibles pour un auteur](#actions-disponibles-pour-un-auteur)
   - [Consulter la liste des auteurs](#authorindex)
   - [Afficher les détails d'un auteur](#authorshow)
   - [Créer un auteur](#authornew)
   - [Éditer un auteur](#authoredit)
4. [Actions disponibles pour un livre](#actions-disponibles-pour-un-livre)
   - [Consulter la liste des livres](#bookindex)
   - [Afficher les détails d'un livre](#bookshow)
   - [Créer un livre](#booknew)
   - [Éditer un livre](#bookedit)
5. [Actions disponibles pour un emprunt](#actions-disponibles-pour-un-emprunt)
   - [Consulter la liste des emprunts](#borrowindex)
6. [Installation](#installation)
7. [Licence](#licence)

---

## Introduction

Cette application permet de gérer les utilisateurs, les auteurs, les livres et les emprunts dans une bibliothèque en ligne. Selon votre rôle (utilisateur ou administrateur), vous pouvez effectuer diverses actions sur ces éléments.

---

## Utilisateur

### Consulter la liste des utilisateurs

En tant qu'administrateur, vous pouvez voir la liste complète des utilisateurs inscrits dans la bibliothèque. Vous pourrez :

- Voir les informations basiques des utilisateurs (ID, email, rôles et nom).
- Rechercher un utilisateur en particulier.
- Accéder à l'interface pour **modifier** ou **supprimer** un utilisateur.

### Afficher les détails d'un utilisateur

En tant qu'administrateur, vous pouvez afficher les informations détaillées d'un utilisateur. Cela inclut :

- Voir ses informations de profil (ID, email, rôles et nom).
- Voir les **emprunts en cours** de l'utilisateur (livres empruntés, date d'emprunt, statut).
- **Modifier** ou **supprimer** l'utilisateur si nécessaire.

### Créer un utilisateur

En tant qu'administrateur, vous pouvez ajouter un nouvel utilisateur à la bibliothèque en remplissant un formulaire avec :

- **Email**, **nom**, et autres informations pertinentes pour le nouvel utilisateur.
- Vous pouvez ensuite enregistrer ce nouvel utilisateur et le rediriger vers la liste des utilisateurs.

### Éditer un utilisateur

En tant qu'administrateur, vous pouvez modifier les informations d'un utilisateur existant, telles que son **email**, son **nom**, ses **rôles**, etc.

- Après avoir modifié les informations, vous pouvez **mettre à jour** l'utilisateur.
- Vous pouvez également **supprimer** un utilisateur si nécessaire.

---

## Auteur

### Consulter la liste des auteurs

En tant qu'utilisateur, vous pouvez voir la liste des auteurs enregistrés dans la bibliothèque. Vous pourrez :

- Voir les informations basiques des auteurs (nom, prénom, biographie).
- Accéder aux **détails** des auteurs et voir les livres associés.
- Ajouter un nouvel auteur.(ADMIN)

### Afficher les détails d'un auteur 

En tant qu'utilisateur, vous pouvez afficher les informations détaillées d'un auteur, y compris :

- Son **nom**, **prénom** et **biographie**.
- La liste des **livres** écrits par l'auteur.
- **Modifier** ou **supprimer** l'auteur.(ADMIN)

### Créer un auteur

En tant qu'administrateur, vous pouvez ajouter un nouvel auteur à la bibliothèque en remplissant un formulaire avec :

- **Nom**, **prénom**, et **biographie** de l'auteur.
- Vous pouvez ensuite enregistrer ce nouvel auteur et le rediriger vers la liste des auteurs.

### Éditer un auteur 

En tant qu'administrateur, vous pouvez modifier les informations d'un auteur existant. Cela inclut :

- **Nom**, **prénom** et **biographie**.
- Vous pouvez ensuite enregistrer les modifications ou **supprimer** l'auteur.

---

## Livre

### Consulter la liste des livres

En tant qu'utilisateur, vous pouvez voir la liste de tous les livres disponibles dans la bibliothèque. Vous pourrez :

- Voir le titre, le genre, l'auteur, et la date de publication des livres.
- Accéder aux **détails** des livres et voir les emprunts associés.
- Ajouter un nouveau livre.(ADMIN)

### Afficher les détails d'un livre 

En tant qu'utilisateur, vous pouvez afficher les informations détaillées d'un livre. Cela inclut :

- **Titre**, **genre**, **auteur**, **date de publication**.
- Vous pouvez aussi voir les **emprunts** de ce livre (nom de l'emprunteur, date d'emprunt, statut).
- **Modifier** ou **supprimer** le livre si nécessaire.(ADMIN)

### Créer un livre

En tant qu'administrateur, vous pouvez ajouter un nouveau livre à la bibliothèque en remplissant un formulaire avec :

- **Titre**, **genre**, **auteur**, **date de publication**, etc.
- Après avoir ajouté le livre, vous serez redirigé vers la liste des livres.

### Éditer un livre

En tant qu'administrateur, vous pouvez modifier les informations d'un livre existant, telles que :

- **Titre**, **genre**, **auteur**, **date de publication**.
- Après modification, vous pouvez enregistrer les changements ou **supprimer** le livre.

---

## Emprunt

### Consulter la liste des emprunts

En tant qu'administrateur, vous pouvez consulter tous les emprunts effectués dans la bibliothèque. Vous pourrez :

- Voir le nom de l'emprunteur, le titre du livre emprunté, la date d'emprunt, et le statut de l'emprunt.
- Accéder aux **détails** des emprunts individuels.
- Modifier le statut d'un emprunt si nécessaire.

---

## Installation

Pour installer l'application, suivez les étapes suivantes :

1. Clonez le dépôt Git :
    ```bash
   git clone https://github.com/votre-compte/bibliotheque.git

2. Installez les dépendances :
    ```bash
   composer install

3. Configurez votre base de données et exécutez les migrations :
    ```bash
    php bin/console doctrine:migrations:migrate

4. Lancez le serveur :
    ```bash
    symfony serve

5. Accédez à l'application via http://localhost:8000.

**Compte Administrateur par défaut**
email:admin@admin.com
mdp:admin!
