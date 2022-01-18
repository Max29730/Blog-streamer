<?php

class UserModel extends Database{

    public function addUser($email, $passwordCrypte, $pseudo){

        $pdo = $this->Dbconnect();

        $sql = "INSERT INTO `User`(`Email`, `Password`, Pseudo)
        VALUES (?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute([
            $email,
            $passwordCrypte,
            $pseudo
        ]);

        $message = "Compte créé";

        return $message;
    }

    public function recupAllUser(){

        $pdo = $this->Dbconnect();

        $sql = "SELECT * FROM User";
        $q = $pdo->prepare($sql);
        $q->execute(); 
        $users = $q->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function deleteUser($idUser){

        $pdo = $this->Dbconnect();

        $sql = 'DELETE FROM `User` WHERE `Id_user` =?';
        $q = $pdo->prepare($sql);
        $q->execute([$idUser]);
    }

    public function updateUser($role, $idUser){

        $pdo = $this->Dbconnect();

        $sql = 'UPDATE `User` SET `Role`=? WHERE `Id_user` = ?';
        $q = $pdo->prepare($sql);
        $q->execute([
            $role,
            $idUser
        ]);
    }

    public function existUser($email){

        $pdo = $this->Dbconnect();
        $sql = "SELECT * FROM User WHERE Email = ?";
        $q = $pdo->prepare($sql);
        $q->execute([
            $email
        ]);

        $exist = $q->fetch(PDO::FETCH_ASSOC);

        return $exist;
    }
}
