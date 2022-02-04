# Blog streamer

 ---Update 1.1---
 
Nouvelle fonctionnalité : -Calendrier de streaming- 
    Création d'un calendrier avec api drag and drop pour gérer les activités de la chaîne
    Accessibilité de la gestion uniquement en administrateur (gestcalendar.phtml) et visuel non éditable pour les utilisateurs (calendar.phtml)
    Ajout du fichier JS correspondant
    Ajout du Model correspondant
    Ajout des requêtes SQL correspondantes
    Mise à jour des fichier FormController, IndexController pour son fonctionnement avec la BDD

Sécurisation des données de la BDD lors de l'insertion

Mise à jour CSS mineure background, footer et images

---Description----

Blog essentiellement en PHP.

Structure MVC.

Utilisation d'un template pour les vues.

Utilisation de JQuery pour la gestion du chat.

Responsive mobile first - tablette/écran de pc.

Requêtes SQL via phpMyAdmin.

Sources d'aides pour la réalisation : Stack Overflow (divers topic du forum), Udemy (cours de Louis Nicolas Leuillet pour le PHP et MySQL et de John Taieb pour le JS), 
Youtube (chaîne de Lior CHAMLA pour la réalisation du chat).

Logiciels utilisés pour la création : Visual Studio Code et WampServer.

---Mode d'emploi du Blog---

Les visiteurs et utilisateurs en statut USER sont uniquement destinés à visiter les sections du blog et à chatter dans la messagerie instantanée.

Afin d'administrer le site, l'utilisateur doit être de statut ADMIN.

Il peut créer des articles, des auteurs, des catégories d'articles, les modifier et les effacer.

Il peut également mofifier les statuts des utilisateurs.

Les utilisateurs doivent être connectés pour discuter sur la messagerie qui s'actualise sans rafraîchissement de la page.

Compte administrateur : admin@admin.fr - mot de passe : admin
Compte utilisateur : user@user.fr - mot de passe : user
