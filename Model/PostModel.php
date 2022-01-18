<?php

class PostModel extends Database {

    // Recupération de tous les articles 
    public function recupAllPosts(){

        $pdo = $this->Dbconnect();

        $sql = "SELECT `Id_article`, `Titre_article`, `Contenu_article`, `Auteur_id`, `Category_id`, `Date_article`, `Photo`, Categorie.Nom_categorie, Auteur.Nom_auteur FROM `Articles` INNER JOIN Auteur ON Articles.Auteur_id = Auteur.Id_auteur INNER JOIN Categorie ON Articles.Category_id = Categorie.Id_categorie ORDER BY Date_article DESC";

        $request = $pdo->prepare($sql);
        $request->execute();
        $allPosts = $request->fetchAll(PDO::FETCH_ASSOC);

        return $allPosts;

    }

    public function recupPost($idArticle){

        $pdo = $this->Dbconnect();

        $sql = "SELECT `Id_article`, `Titre_article`, `Contenu_article`, `Auteur_id`, Photo, `Category_id`, 
                `Date_article`, `Nom_auteur`, `Nom_categorie`
                FROM `Articles` 
                INNER JOIN Auteur 
                ON Articles.Auteur_id = Auteur.Id_auteur 
                INNER JOIN Categorie 
                ON Articles.Category_id = Categorie.Id_categorie 
                WHERE Id_article = ?";

        $q = $pdo->prepare($sql);
        $q->execute([$idArticle]);
        $post = $q->fetch(PDO::FETCH_ASSOC);

        return $post;
    }

    // Ajout d'un article
    public function addPost($titre, $contenu, $idAuteur, $idCategorie, $photo){
        $pdo = $this->Dbconnect();

        $sql = "INSERT INTO `Articles`( `Titre_article`, `Contenu_article`, `Auteur_id`, `Category_id`,Photo) 
        VALUES (?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute([
            $titre,
            $contenu,
            $idAuteur,
            $idCategorie,
            $photo
        ]);

        return $pdo->lastInsertId();
    }

    // Modification d'un article
    public function updatePost($titre, $contenu, $idAuteur, $idCategorie, $idPost){
        $pdo = $this->Dbconnect();

        $sql = "UPDATE `Articles` 
            SET 
                `Titre_article`= ?,
                `Contenu_article`= ?,
                `Auteur_id`= ?,
                `Category_id`= ?
                
            WHERE `Id_article`= ?";
        $q = $pdo->prepare($sql);
        $q->execute([
            $titre,
            $contenu,
            $idAuteur,
            $idCategorie,
            $idPost
        ]);
    } 
    
    public function deletePost($idPost){
        $pdo=$this->Dbconnect();

        $sql = 'DELETE FROM `Articles` WHERE `Id_article` = ?';
        $q = $pdo->prepare($sql);
        $q->execute([$idPost]);
    }

}