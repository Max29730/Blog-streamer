<?php 

if(array_key_exists('action',$_GET)){

    switch ($_GET['action']){
        
        case 'addAuteur':
            if(!empty($_POST['nomAuteur'])){
                $auteurModel->addAuteur($_POST['nomAuteur']); 
                redirectTo('admin');
            }
            break;

        case 'editAuteur':
            $auteurModel->updateAuteur($_POST['nomAuteur'],$_POST['idAuteur']);
            redirectTo('admin');
            break;

        case 'deleteAuteur':
            $auteurModel->deleteAuteur($_GET['idAuteur']); 
            redirectTo('admin');
            break;
        
        case 'deleteArticle':
            $postModel->deletePost($_GET['idArticle']);
            redirectTo('admin');
            break;

        
        case 'addCategorie':
            if(!empty($_POST['nomCategorie'])){
                $categorieModel->addCategorie($_POST['nomCategorie']); 
                redirectTo('admin');
            }
            break;

        case 'deleteCategorie':
            $categorieModel->deleteCategorie($_GET['idCategorie']);
            redirectTo('admin');
            break;

        case 'editCategorie':
            $categorieModel->updateCategorie($_POST['nomCategorie'],$_POST['idCategorie']);
            redirectTo('admin');
            break;

        case 'deleteUser':
            $userModel->deleteUser($_GET['idUser']);
            redirectTo('admin');
            break;
            
        case 'editUser' :
            $userModel->updateUser($_POST['role'],$_POST['idUser']);
            redirectTo('admin');
            break;
    }
}
