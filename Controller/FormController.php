<?php

class FormController extends Database{

    public function registerForm($data){

        $message = null;
        $errorForm = [];
        
        $pseudo = $data['Pseudo'];
        $email = $data['Email'];
        $password = $data['Password'];
        $passwordConfirm = $data['PasswordConfirm'];

        if (!empty($pseudo) || !empty($email) || !empty($password) || !empty($passwordConfirm)){
            
            // Bonne complétion du formulaire
            
            if (strlen($pseudo) < 2 || strlen($pseudo) > 50){
                $errorForm[] = "Le pseudo doit contenir entre 2 et 50 caractères";
            }
            
            if (stristr($email, '@') === FALSE){
                $errorForm[] = "Adresse email incorrect";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errorForm[] = "Adresse email incorrect";
            }

            if ($password != $passwordConfirm){
                $errorForm[] = "Les mots de passe ne correspondent pas";
            } else {
                // Cryptage mot de passe
                $passwordCrypte = password_hash($password, PASSWORD_DEFAULT);
            }

            // Vérification du mot de passe
            $userModel  = new UserModel();
            $exist = $userModel->existUser($email);

            if ($exist){
                $errorForm = [];
                $errorForm[] = "Un compte avec cette adresse e-mail existe deja";
            }
            
            if (count($errorForm) == 0){

                $message = $userModel->addUser($email, $passwordCrypte, $pseudo);
            }
        } else {
            $errorForm[] = "Veuillez remplir tout les champs";
        }
        
        // Retour des erreurs
        if (count($errorForm) != 0){

            return $errorForm; // tableau 
        
        // Message de connexion
        } else {
            return $message; // message 

        }
    } 

    public function loginForm($data){

        $message = null;

        $email = $data['Email'];
        $password = $data['Password'];

        // Vérification de la bonne complétion et de la base de données (doublons)
        if (!empty($email) || !empty($password)){
            
            $userModel  = new UserModel();
            $user = $userModel->existUser($email);

            if ($user == false){
                $error[] = "Aucun compte avec cette adresse e-mail";
            } else {
                if (password_verify($password, $user['Password'])){
                    
                    $_SESSION['user']['Id_user'] = $user['Id_user'];
                    $_SESSION['user']['Email'] = $user['Email'];
                    $_SESSION['user']['Password'] = $user['Password'];
                    $_SESSION['user']['Pseudo'] = $user['Pseudo'];
                    $_SESSION['user']['Date_creation'] = $user['Date_creation'];
                    $_SESSION['user']['Role'] = $user['Role'];

                    $message = " Vous êtes connecté ". $_SESSION['user']['Pseudo'];

                    return $message;
                } else {
                    $error[] = "Mot de passe incorrect";
                }
            }
        } else {

            $error[] = "Veuillez remplir tous les champs";
        }
        return $error;
    } 
    
    public function addPostForm($data){
        
        $titre = $data['title'];
        $contenu = $data['contenu'];
        $idAuteur = $data['NumAuteur'];
        $idCategorie = $data['NumCategorie'];

        // Vérification de la bonne complétion
        if (empty($titre)){
            $error[] = "Titre manquant";
        }
        if (strlen($contenu) > 999){
            $error[] = "Votre message doit faire moins de 1000 caractères";
        }

        // Contenu vide par défaut autorisé et renseigné 
        if (empty($contenu)){
            $contenu = "Aucun contenu";
        }
        // Vérification de l'existence d'une image et enregistrement
        if ($_FILES['image']['error']){
            $image = null; 
        } else {
            if ((isset($_FILES['image']['name']) && ($_FILES['image']['error'] == UPLOAD_ERR_OK))) {
                $image = $_FILES['image']['name'];
            }
        }
        if (count($error) == 0){

            $postModel = new PostModel();
            $post = $postModel->addPost($titre, $contenu, $idAuteur, $idCategorie, $image);

            $numImage = $post;

            if ($image != null){

                // Création du dossier de la photo et stockage
                $cheminDossierCree = "images/article/" . $numImage;
                mkdir($cheminDossierCree, 0777, TRUE);
                $chemin_destination = 'images/article/' . $numImage . '/';
                move_uploaded_file($_FILES['image']['tmp_name'], $chemin_destination . $_FILES['image']['name']);
            }

            header('Location: index.php?a=post&idArticle=' . $numImage);
            exit;
            

        } else {
            return $error;
        }
    } 
    
    public function editPostForm($data){

        $error = [];
        
        $titre = $data['title'];
        $contenu = $data['contents'];
        $idAuteur = $data['NumAuteur'];
        $idCategorie = $data['NumCategorie'];
        $idPost = $data['idArticle'];

        if (empty($titre)){

            $error[] = "Veuillez renseigner un titre pour votre article";
            $titre = null;
        }

        if (empty($contenu)){

            $error[] = "Veuillez renseigner un contenu pour votre article";
        }

        if (count($error) == 0){

            $postModel = new PostModel();
            $postModel->updatePost($titre, $contenu, $idAuteur, $idCategorie, $idPost);

            redirectTo('admin');
        } else {
            return $error;
        }
    }

    public function sendMessage($data){

        $error = [];

        $nom = $data['speaker'];
        $message = $data['chatcontent'];

        if (empty($message)){

            $error[] = "Veuillez renseigner un message";
        }

        if (count($error) == 0){

            $chatModel = new ChatModel();

            $chatModel->sendMessage($nom, $message);

        } else {
            return $error;
        }
    }

    public function addImage($data){

        $error = [];

        if ($_FILES['image']['error']){
            $error[] = "Pas d'image renseignée";
        } else {
            if ((isset($_FILES['image']['name']) && ($_FILES['image']['error'] == UPLOAD_ERR_OK))) {
                $image = $_FILES['image']['name'];
            }
            
            $calendarModel = new CalendarModel();
            $miniature = $calendarModel->addImage($image);
        }

        if (count($error) == 0){

            // Création du dossier de la photo et stockage
            $chemin_destination = 'images/stock/';
            move_uploaded_file($_FILES['image']['tmp_name'], $chemin_destination . $_FILES['image']['name']);
        }
        else{
            return $error;
        }
        
    }
    
    public function editCalendar($data){
        
        $idTd = $data['idTd'];
        $mini = $data['mini'];
        
        $calendarModel = new CalendarModel();
        $calend = $calendarModel-> editCalendar($idTd, $mini); 
    }

    public function eraseCalendar($data){

        $idTd = $data['idTd'];

        $calendarModel = new CalendarModel();
        $calend = $calendarModel-> eraseCalendar($idTd);
    }

}

    

