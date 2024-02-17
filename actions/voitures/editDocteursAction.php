<?php
    require ('../../Database/docteurs_db.php');

    if(isset($_GET['id']) && !empty($_GET['id']) AND filter_var($_GET['id'], FILTER_VALIDATE_INT, array('nin_range' => 1 ))) {
        $result = getOneDocteur($_GET['id']);
        if($result->rowCount() > 0 ){
            $docteur = $result->fetch();
            $id = $docteur['id'];
            $nom = $docteur['nom'];
            $prenom = $docteur['prenom']; 
            $Email = $docteur['email']; 
            $adresse = $docteur['adresse']; 
            $tel = $docteur['tel'];
            $service_id = $docteur['service_id'];
            $libelle = $docteur['libelle'];
        }else{
            $errorMessage = 'Ce docteur n\'existe pas !';
        }
    }else{
        $errorMessage = 'l\'id du docteur a modifier dois etre un entier valide superieur ou egal a 1';
    }

    if(isset($_POST['envoyer'])){
        if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['email']) && !empty($_POST['email']) 
        && isset($_POST['adresse']) && !empty($_POST['adresse']) && isset($_POST['tel']) && !empty($_POST['tel']) && isset($_POST['service_id']) && !empty($_POST['service_id'])){
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']); 
            $email=htmlspecialchars($_POST['email']);
            $adresse=htmlspecialchars($_POST['adresse']);
            $tel=htmlspecialchars($_POST['tel']);
            $service_id=htmlspecialchars($_POST['service_id']);
            updateDocteur($nom, $prenom, $email, $adresse, $tel, $service_id, $id);
            $message = " Le docteur a ete modifier avec succes";
            header("Location:docteurs.php?message=".$message);
        }else{
          $errorMessage  = 'Tous les champs sont obligatoire';
        }
    }