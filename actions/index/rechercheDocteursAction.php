<?php
require('Database/index_db.php');
if(isset($_POST['recherche'])){
    if(isset($_POST['libelle']) && !empty($_POST['libelle'])){
        $libelle = htmlspecialchars($_POST['libelle']);
        $check = getOneService3($libelle);
        if($check->rowCount() > 0){
            $resultat = getAllDocteurs3($libelle);
        }else{
            $errorMessage = "Aucun resultat trouver !";
        }
    }else{
        $errorMessage = "veuillez remplir le champs !";
    }
}