# clinic_web
Site Web de Clinique Médicale
Ce projet est un site web destiné à faciliter la gestion des rendez-vous et à fournir des informations médicales essentielles aux patients. Il est conçu en HTML, CSS, JavaScript, et PHP, permettant ainsi de gérer les besoins de communication et d'organisation pour une clinique médicale.

Structure du Projet
image/ : Contient les images et les éléments visuels utilisés sur le site, notamment pour illustrer les services, les médecins, ou l'accueil de la clinique.

about.php : Page "À propos" qui fournit des informations détaillées sur la clinique, son histoire, sa mission, et les valeurs qu'elle défend.

appointment.php : Formulaire de prise de rendez-vous en ligne permettant aux utilisateurs de sélectionner une date, un médecin, et de soumettre une demande de consultation.

appointments_handler.php : Script PHP de gestion des données de rendez-vous. Il traite les informations soumises via le formulaire de prise de rendez-vous et les enregistre dans la base de données.

clinic.css : Feuille de styles CSS principale qui assure la mise en forme du site, garantissant une interface utilisateur cohérente, professionnelle et réactive.

clinic.js : Script JavaScript pour les fonctionnalités interactives du site, comme la validation des formulaires, les animations ou autres interactions client.

doctors.php : Page listant les médecins de la clinique. Chaque médecin est présenté avec sa spécialité, son expérience, et ses horaires de consultation.

home.php : Page d'accueil du site présentant les services principaux de la clinique, les actualités, et des informations importantes pour les patients.

modify_appointment.php : Page permettant aux utilisateurs de modifier un rendez-vous existant. Elle offre aux patients la flexibilité de mettre à jour leur rendez-vous si nécessaire.

myapp.js : Script JavaScript complémentaire pour des fonctionnalités spécifiques du site, notamment celles liées aux rendez-vous ou aux interactions sur la page d'accueil.

MyApp.php : Fichier PHP central qui regroupe des fonctions et des classes utilisées pour le traitement des données des patients et des rendez-vous.

Myappointments.php : Page listant tous les rendez-vous d'un patient. Elle affiche les rendez-vous à venir et les informations associées.

process_form.php : Script de traitement de formulaires, utilisé pour gérer les soumissions de contact et de demandes spécifiques des utilisateurs.

services.php : Page dédiée aux services médicaux offerts par la clinique, avec des descriptions de chaque service pour informer les patients.

Fonctionnalités Principales
Gestion de Rendez-vous : Prise de rendez-vous, modification, et affichage des rendez-vous pour les utilisateurs.
Informations sur les Médecins : Liste des médecins de la clinique avec leurs spécialités et expériences.
Présentation des Services Médicaux : Détails des différents services offerts par la clinique.
Formulaire de Contact : Permet aux patients de poser des questions et de demander des informations complémentaires.
Technologies Utilisées
Frontend : HTML, CSS, JavaScript pour une interface utilisateur interactive et moderne.
Backend : PHP pour la logique de traitement et la gestion des données de la clinique.
Installation et Déploiement
Clonez ce dépôt : git clone (https://github.com/fatma-Mbarki/dentist_clinic_web)
Installez un serveur local (par exemple, XAMPP ou WAMP) et placez les fichiers dans le dossier racine (htdocs pour XAMPP).
Configurez la base de données en important le fichier SQL fourni dans votre gestionnaire de base de données (phpMyAdmin).
Lancez le serveur et accédez au site via http://localhost/nom-du-repo.
Auteurs
Projet réalisé par Fatma Mbarki.
