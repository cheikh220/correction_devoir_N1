<?php
require('db_connection.php');

function getOneService3($libelle){
    global $connexion;
    $query = "SELECT * FROM services
    INNER JOIN docteurs
    ON service_id = services.id WHERE libelle = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($libelle));
    return $stmt;
}

function getAllDocteurs3($libelle){
    global $connexion;

    $query = "SELECT docteurs.id as id, nom, prenom,email, tel,adresse, libelle 
    FROM services 
    INNER JOIN docteurs
     ON service_id = services.id WHERE libelle = ?" ;
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($libelle));
    return $stmt;
}

