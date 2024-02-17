<?php
    $hote = "127.0.0.1";
    $user = "root";
    $password = "";

    $dbName = "sunu_devoir_db";
    $dsn = "mysql:host=$hote;dbname=$dbName;charset=utf8";

    try{
        $connexion = new PDO($dsn, $user, $password);
    }catch(PDOException $e){
        die("Erreur de connexion a la base de donnees:".$e->getMessage());
    }
?>