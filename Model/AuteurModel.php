<?php

class AuteurModel extends Database{

    public function addAuteur($nomAuteur){

        $pdo = $this->Dbconnect();

        $sql = 'INSERT INTO `Auteur`( `Nom_auteur`) VALUES (?)';
        $q = $pdo->prepare($sql);
        $q->execute([
            $nomAuteur
        ]);
    }

    public function recupAllAuteur(){

        $pdo = $this->Dbconnect();

        $sql = "SELECT * FROM Auteur";
        $q = $pdo->prepare($sql);
        $q->execute();
        $auteurs = $q->fetchAll(PDO::FETCH_ASSOC);

        return $auteurs;
    }
     
    public function updateAuteur($nomAuteur, $idAuteur){

        $pdo = $this->Dbconnect();

        $sql = 'UPDATE `Auteur` SET `Nom_auteur`=? WHERE `Id_auteur`=?';
        $q = $pdo->prepare($sql);
        $q->execute([
            $nomAuteur,
            $idAuteur
        ]);
    }

    public function deleteAuteur($idAuteur){

        $pdo = $this->Dbconnect();

        $sql = 'DELETE FROM `Auteur` WHERE `Id_auteur` = ?';
        $q = $pdo->prepare($sql);
        $q->execute([$idAuteur]);
    }
}
