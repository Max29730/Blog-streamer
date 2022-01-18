<?php

class CalendarModel extends Database{

    public function recupCalendar() {

        $pdo = $this->Dbconnect();

        $sql = "SELECT * FROM `Calendrier` ORDER BY `Id_td` ASC";
        $q = $pdo->prepare($sql);
        $q->execute();
        $calendar = $q->fetchALL(PDO::FETCH_ASSOC);

        return $calendar;
    }
    
    public function editCalendar($idTd, $mini){
        
        
        $pdo = $this->Dbconnect();

        $sql = "UPDATE `Calendrier` SET `Contenu`= ? WHERE `Id_td`= ?";
        $q = $pdo->prepare($sql);
        $q->execute([
            $mini,
            $idTd
        ]);
    }

    public function eraseCalendar($idTd)
    {

        $pdo = $this->Dbconnect();

        $sql = "UPDATE `Calendrier` SET `Contenu`= NULL WHERE `Id_td`= ?";
        $q = $pdo->prepare($sql);
        $q->execute([
            $idTd
        ]);
    } 

    public function recupAllPhoto() {

        $pdo = $this->Dbconnect();
        
        $photos = array();

        $sql = "SELECT * FROM `StockPhotos`";

        $q = $pdo->prepare($sql);
        
        $q->execute();
        
        while($all = $q ->fetch(PDO::FETCH_ASSOC)){
            
            $photos[]= $all;
            
        }  

        return $photos;
    }

    public function addImage($image){
        $pdo = $this->Dbconnect();

        $sql = "INSERT INTO `StockPhotos`(`Photo`) 
        VALUES (?)";
        $q = $pdo->prepare($sql);
        $q->execute([$image]);
    }

}