PHP
MySQL
HTML5
CSS3
JavaScript
My Cinema est un projet de gestion de cinéma, réalisé en PHP avec une base de données SQL. L'objectif était de créer un site web permettant de gérer les films, les clients et les séances dans un cinéma.

Fonctionnalités principales
Gestion des films : Affichage des films à l'affiche avec leurs détails (titre, description, durée, genre, etc.)

Gestion des séances : Affichage des horaires des séances pour chaque film

Réservations : Système permettant aux clients de réserver leurs places

Base de données : Stockage centralisé des informations sur les films, clients et séances

Technologies utilisées
PHP : Langage principal pour la logique backend

MySQL : Base de données relationnelle

HTML/CSS : Structure et style des pages

JavaScript : Interactions côté client

Installation et utilisation
Clonez le dépôt :

bash
Copy
git clone https://github.com/votre-utilisateur/my-cinema.git
cd my-cinema
Configurez votre base de données MySQL (importez le fichier SQL fourni)

Lancez le serveur PHP intégré :

bash
Copy
php -S localhost:3000
Ouvrez votre navigateur à l'adresse :

Copy
http://localhost:3000
Structure de la base de données
La base de données contient trois tables principales :

films : Stocke les informations sur les films

clients : Gère les informations des utilisateurs

seances : Contient les horaires des séances et les réservations



