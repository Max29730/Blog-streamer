<?php

session_start();

require_once 'app/functions.php';
require_once 'app/requires.php';
require_once 'Controller/AdminController.php';

// Filtre administrateur
isAdmin();

$posts = $postModel->recupAllPosts();
$auteurs = $auteurModel->recupAllAuteur();
$categories = $categorieModel->recupAllCategorie();
$users = $userModel->recupAllUser();


$title = "Page d'administration";
$template = 'View/admin.phtml';

include 'template/template.php';