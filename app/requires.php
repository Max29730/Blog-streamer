<?php

// Requires récurrents du blog

require_once 'app/database.php';

require_once 'Model/PostModel.php';
require_once 'Model/AuteurModel.php';
require_once 'Model/CategorieModel.php';
require_once 'Model/UserModel.php';
require_once 'Model/ChatModel.php';
require_once 'Model/CalendarModel.php';
require_once 'Model/AgendaModel.php';


$postModel = new PostModel();
$auteurModel = new AuteurModel();
$categorieModel = new CategorieModel();
$userModel = new UserModel();
$chatModel = new ChatModel();
$calendarModel = new CalendarModel();
$agendaModel = new AgendaModel();

require_once 'Controller/FormController.php';

$formController = new FormController();