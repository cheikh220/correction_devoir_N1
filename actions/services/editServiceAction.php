<?php
    require ('../../Database/services_db.php');

    if(isset($_GET['id']) && !empty($_GET['id']) AND filter_var($_GET['id'], FILTER_VALIDATE_INT, array('nin_range' => 1 ))) {
        $result = getOneService($_GET['id']);
        if($result->rowCount() > 0 ){
            $service = $result->fetch();
            $libelle = $service['libelle']; 
        }else{
            $errorMessage = 'Ce service n\'existe pas !';
        }
    }else{
        $errorMessage = 'l\'id du service a modifier dolis etre un entiier valide superieur ou egal a 1';
    }


    if(isset($_POST['envoyer'])){
        if(isset($_POST['libelle']) && !empty($_POST['libelle'])){
            $libelle=htmlspecialchars($_POST['libelle']); 
            updateService($service['id'], $libelle);
            $message = " Le service a ete modifier avec succes";
            header("Location:services.php?message=".$message);
        }else{
          $errorMessage  = 'Le libelle est obligatoire !';
        }
    }