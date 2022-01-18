<?php

class CategorieModel extends Database
{
    // Ajout categorie 
    public function addCategorie($nomCategorie)
    {
        $pdo = $this->Dbconnect();

        $sql = 'INSERT INTO `Categorie`( `Nom_categorie`) VALUES (?)';
        $q = $pdo->prepare($sql);   // preparation 
        $q->execute([$nomCategorie]);  // execution 
    }

    // Recuperer categorie 
    public function recupAllCategorie()
    {
        $pdo = $this->Dbconnect();

        $sql = "SELECT * FROM Categorie";  // requete sql 
        $q = $pdo->prepare($sql);   // preparation 
        $q->execute();  // execution 
        $categories = $q->fetchAll(PDO::FETCH_ASSOC); // execution 

        return $categories;
    }

    // Modifier categorie 
    public function updateCategorie($idCategorie, $nomCategorie)
    {
        $pdo = $this->Dbconnect();

        $sql = 'UPDATE `Categorie` SET `Nom_categorie`=? WHERE `Id_categorie`=?';
        $q = $pdo->prepare($sql);   // preparation 
        $q->execute([
            $idCategorie,
            $nomCategorie
        ]);  // execution 
    }


    // Supprimer categorie 
    public function deleteCategorie($idCategorie)
    {
        $pdo = $this->Dbconnect();

        $sql = 'DELETE FROM `Categorie` WHERE `Id_categorie` = ?';
        $q = $pdo->prepare($sql);   // preparation 
        $q->execute([$idCategorie]);  // execution 


    }
}
