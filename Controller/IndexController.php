<?php

if(array_key_exists('a',$_GET)){
// die(var_dump($_GET));
    switch ($_GET['a']){

        case 'post':
            $post = $postModel->recupPost($_GET['idArticle']);
            filtrePost($post);
            $title = "Article";
            $template = 'View/post.phtml';
        break;

        case 'register':
            userOnline();
            $addUser = null; $error = [];

            if($_POST){

                $registerUser = $formController ->registerForm($_POST);  
                if(is_array($registerUser)){
                    $error = $registerUser;
                }else {
                    $addUser = $registerUser;
                }
            
            }
            
            $title = "Enregistrement";
            $template = 'View/register.phtml';
        break;

        case 'login':
            userOnline();
            $message = null; $error = [];

            if($_POST){

                $connectUser = $formController ->loginForm($_POST);
                if(is_array($connectUser)){
                    $error = $connectUser;
                }else {
                    $message = $connectUser;
                }
            }
            
            $title = "Connexion";
            $template = 'View/login.phtml';
        break;
        
        case 'logout' :
            session_destroy();
            redirectTo('index');
        break;

        case 'new_post':
            userNotOnline();
            $error = [];

            $auteurs = $auteurModel->recupAllAuteur();
            $categories = $categorieModel->recupAllCategorie();

            if ($_POST){

                $addPost = $formController->addPostForm($_POST);
                if (!empty($addPost)){
                    $error = $addPost;
                }
            }
            
            $title = "Ajout d'article ";
            $template = 'View/new_post.phtml';
            break;

        case 'edit':
            userNotOnline();
            $error = [];

            $auteurs = $auteurModel->recupAllAuteur();
            $categories = $categorieModel->recupAllCategorie();
            $post = $postModel->recupPost($_GET['idArticle']);

            if ($_POST){

                $editPost = $formController->editPostForm($_POST);

                if (!empty($editPost)){

                    $error = $editPost;
                }
            }
            
            $title = "Modification d'article";
            $template = "View/edit.phtml";
            break;

        case 'chat':

            $error = [];
            
            if ($_POST){

                $addMess = $formController->sendMessage($_POST);
                if (!empty($addMess)) {
                    $error = $addMess;
                }
            }

            $messages = $chatModel->recupMessage();

            
            $title = "Messagerie instantanée";
            $template = 'View/chat.phtml';
            break;
            
        case 'contact':
                
            $title = "Contact";
            $template = 'View/contact.phtml';
            break;

        case 'calendrier':
            
            
            $calendar = $calendarModel->recupCalendar();
            
            $out = array_column($calendar, 'Contenu');
            
            $title = "Calendrier";
            $template = 'View/calendar.phtml';
            break;

        case 'gestcalendrier':
            
            userNotOnline();
            $error = [];
            
            $calendar = $calendarModel->recupCalendar();
            
            $out = array_column($calendar, 'Contenu');
            
            // Il a deux POST dans cette page on doit donc filtrer afin de ne pas faire de requête inutile
            
            if ($_POST){

                if(isset($_POST['idTd'])){

                    if (isset($_POST['mini'])) {
            
                    $editCalendar = $formController->editCalendar($_POST);
                    }else{

                        $eraseCalendar = $formController->eraseCalendar($_POST);

                    }
                    
                }
            
                if (isset($_POST['MAX_FILE_SIZE'])){
    
                    $addImage = $formController->addImage($_POST);
                    if (!empty($addImage)){
                        $error = $addImage;
                    }
                }
                
                header("Location: index.php?a=gestcalendrier");
            }
            
            $photos = $calendarModel->recupAllPhoto();

            $title = "Gestion du Calendrier";
            $template = 'View/gestcalendar.phtml';
            break;           

    }
} else {
    
    $posts = $postModel->recupAllPosts();

    $title = "Maxime Titsaoui - Blog";
    $template = 'View/index.phtml';
}