<?php

// Connexion à la base de données

class Database{

    protected function Dbconnect(){

        try {
            $host = 'localhost';
            $dbname  = 'mtmt';
            $username = 'root';
            $password = '';

            $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$username,$password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->exec('SET NAMES UTF8');
        } catch (PDOException $e){ // Messages d'erreurs plus concrets
        
            echo 'La connexion a échoué.<br >';
            echo '<br> code erreur : [ ', $e->getCode(), '] ';
            echo '<br> message erreur : ' . $e->getMessage();
            echo '<br> ligne erreur : ' . $e->getLine();
            echo '<br> fichier contenant erreur  : ' . $e->getFile();
        }
        return $pdo;
    }
}
