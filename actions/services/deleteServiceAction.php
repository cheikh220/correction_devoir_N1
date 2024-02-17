<?php
    require ('../../Database/services_db.php');


    if(isset($_GET['id']) && !empty($_GET['id']) AND filter_var($_GET['id'], FILTER_VALIDATE_INT, array('nin_range' => 1 ))) {
        $result = getOneService2($_GET['id']);
        if($result->rowCount() > 0 ){
            $service = $result->fetch();
            $check = getOneServiceAllDocteurs($service['id']);
            if($check->rowCount() > 0){
               
                
                $message = 'Ce service ne peut etre supprimer puisqu\'il a des docteurs !';
                
            }else{
                deleteService($service['id']);
                $message = " Le service a ete supprimer avec succes";
                
            }
            header("Location:/views/services/services.php?message=".$message);
        }else{
            $errorMessage = 'Ce service n\'existe pas !';
        }
    }else{
        $errorMessage = 'l\'id du service a modifier dolis etre un entiier valide superieur ou egal a 1';
    }
