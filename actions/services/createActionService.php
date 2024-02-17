<?php
    require ('../../Database/services_db.php');

    if(isset($_POST['envoyer'])){
        if(isset($_POST['libelle']) && !empty($_POST['libelle'])){
            $libelle=htmlspecialchars($_POST['libelle']); 
            addService($libelle);
            $message = " Le service a ete ajouter avec succes";
            header("Location:services.php?message=".$message);
        }else{
          $errorMessage  = 'Le libelle est obliqatoire !';
        }
    }
    
    ?>