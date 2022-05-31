<?php

    function getBDD(){
        $host = "host=localhost";
        $dbName = "adrar_eval_mythologie_php";

        if($host == (null || "")){
            throw new Exception ("Le chemin host est null ou non défini");
        }

        if($dbName == (null || "")){
            throw new Exception("Le nom de la database est incorrect");
        }

        try{
            $db = new PDO("mysql:".$host."; dbname=".$dbName."; charset=utf8", "root", "");
            return $db;
        } catch (Exception $e) {
            die($e -> getMessage());
        }
    }
?>