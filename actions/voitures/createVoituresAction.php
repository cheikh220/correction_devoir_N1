<?php
require('../../Database/voitures_db.php');

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['designation']) && !empty($_POST['annee'])
    && !empty($_POST['chassis']) && !empty($_POST['kilometrage']) && !empty($_POST['type_id']) && !empty($_POST['marque_id'])) {
            extract($_POST);
            addVoiture($designation, $annee, $chassis, $kilometrage, $marque_id, $type_id);
            $message = " Le docteur a ete ajouter avec succes";
            header("Location:voitures.php?message=" . $message);
    } else {
        $errorMessage  = 'Veuillez completez les champs !';
    }
}


