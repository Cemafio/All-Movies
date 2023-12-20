<?php 
    function bdd() {
        try {
            $bdd = new PDO("mysql:dbname=gnebro;host=localhost", "root", "");
            $bdd ->exec("SET NAMES UTF8");
        }
        catch(PDOException $e){
            echo 'Connexion échouée : ' .$e->getMessage();
        }
        return $bdd;
    }
?>