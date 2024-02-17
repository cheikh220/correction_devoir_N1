<?php
require ('db_connection.php');

    
function getAllTypes(){
    global $connexion;
    $query = "SELECT * FROM types";
    $resultat = $connexion->query($query);
    return $resultat;
}