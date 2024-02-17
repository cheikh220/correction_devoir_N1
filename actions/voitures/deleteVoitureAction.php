<?php
    require ('../../Database/voitures_db.php');


    if(isset($_GET['id']) && !empty($_GET['id']) AND filter_var($_GET['id'], FILTER_VALIDATE_INT, array('nin_range' => 1 ))) {
        $result = getOneVoiture($_GET['id']);
        if($result->rowCount() > 0 ){
            $docteur = $result->fetch();
                deleteVoiture($docteur['id']);
                $message = " Le docteur a ete supprimer avec succes";
            header("Location:/views/voitures/voitures.php?message=".$message);
        }else{
            $errorMessage = 'Ce docteur n\'existe pas !';
        }
    }else{
        $errorMessage = 'l\'id du docteur a modifier dolis etre un entiier valide superieur ou egal a 1';
    }
