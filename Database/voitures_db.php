<?php
    require('db_connection.php');

    function getAllVoitures(){
        global $connexion;
        $query ="SELECT voitures.id as id, voitures.designation, voitures.annee, voitures.numero_chassis,
         voitures.kilometrage, marques.designation as marque,Types.designation as types
         FROM voitures, types , marques
        WHERE marque_id = marques.id AND
        type_id = types.id";
        $resultat = $connexion->query($query);
        return $resultat;
    }


   function addVoiture($designation, $annee, $chassis, $kilometrage, $marque, $type) {
        global $connexion;
        $query = "INSERT INTO voitures(designation, annee, numero_chassis, kilometrage, marque_id, type_id) VALUES (?,?,?,?,?,?)";
        $stmt = $connexion->prepare($query);
        $stmt->execute(array($designation, $annee, $chassis, $kilometrage, $marque, $type));
        $stmt->closeCursor();
    }

     function getOneVoiture($id){
        global $connexion; 
        $query = "SELECT * FROM voitures
                  WHERE id = ?";
        $stmt = $connexion->prepare($query);
        $stmt->execute(array($id));
    
        return $stmt;
    }
    

    function deleteVoiture($id) {
        global $connexion;

        $query = "DELETE FROM voitures WHERE id = ?";
        $stmt = $connexion->prepare($query);
        $stmt->execute(array($id));
        $stmt->closeCursor();
    }

   /* function updateDocteur($nom,$prenom,$email,$adresse,$tel,$service_id,$id){
        global $connexion;

        $query = "UPDATE docteurs SET nom = ?, prenom = ?, email = ?,adresse = ?,tel = ?,service_id = ? WHERE id = ?";
        $stmt = $connexion->prepare($query);
        $stmt->execute(array($nom,$prenom,$email,$adresse,$tel,$service_id, $id));
        $stmt->closeCursor();
    }
*/
?>