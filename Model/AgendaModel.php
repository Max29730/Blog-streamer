<?php

class AgendaModel extends Database{

    public function recupAgenda() {

        $pdo = $this->Dbconnect();

        $sql = "SELECT * FROM `agenda` ORDER BY `Id_td` ASC";
        $q = $pdo->prepare($sql);
        $q->execute();
        $agenda = $q->fetchALL(PDO::FETCH_ASSOC);

        return $agenda;
    }
    
    public function editAgenda($idTd, $tache){
        
        
        $pdo = $this->Dbconnect();

        $sql = "UPDATE `agenda` SET `taches`= ? WHERE `Id_td`= ?";
        $q = $pdo->prepare($sql);
        $q->execute([
            $tache,
            $idTd
        ]);
    }    

}