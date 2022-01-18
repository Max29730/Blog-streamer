<?php

class ChatModel extends Database{

    public function sendMessage(){

        if (!empty($_POST["speaker"]) && !empty($_POST["chatcontent"])){

            $pdo = $this->Dbconnect();

            $nom = $_POST["speaker"];
            $message = $_POST["chatcontent"];

            $sql = "INSERT INTO `Chat`(`Pseudo`, `Texte`) VALUES (?,?)";

            $request = $pdo->prepare($sql);

            $request->execute([$nom, $message]);        
        }
    }

    public function recupMessage(){

        $pdo = $this->Dbconnect();

        $messages = array();

        $sql = "SELECT * FROM `Chat` ORDER BY `Id_mess` DESC LIMIT 25";

        $q = $pdo->prepare($sql);

        $q->execute();

        while($all = $q ->fetch(PDO::FETCH_ASSOC)){
            
            $messages[]= $all;
            
        }   

        return $messages;
    }
}