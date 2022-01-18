<?php

// Fonctions de redirection

function redirectTo($path)
{
    header("Location: $path.php");
    exit;
}


function filtrePost($post)
{
    if ($post == false){
        redirectTo('index');
    }
}

// Filtres de vérification utilisateur

function userOnline()
{
    if (array_key_exists('user', $_SESSION)) {
        redirectTo('index');
    }
}

function userNotOnline()
{
    if (!array_key_exists('user', $_SESSION)) {
        redirectTo('index');
    }
}

// Filtre de vérification administrateur

function isAdmin()
{
    if (!array_key_exists('user', $_SESSION) || $_SESSION['user']['Role'] != 'Admin') {
        redirectTo('index');
    }
}