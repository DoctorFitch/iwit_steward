<?php

include('../ajax/inc/init.php');
$func = new Functions();

// Récupération des champs

$utilisateur_id = $_POST['utilisateurs_id'];
$societes_locaux_id = $_POST['id_local'];
$utilisateur_service = $_POST['utilisateur_service'];
$utilisateur_nom = $_POST['utilisateur_nom'];
$utilisateur_prenom = $_POST['utilisateur_prenom'];
$utilisateur_telephoneFixe = $_POST['utilisateur_telephoneFixe'];
$utilisateur_telephoneMobile = $_POST['utilisateur_telephoneMobile'];
$utilisateur_email = $_POST['utilisateur_email'];
$utilisateur_fonction = $_POST['utilisateur_fonction'];
$utilisateur_statut = $_POST['utilisateur_statut'];
$utilisateur_commentaire = $_POST['utilisateur_commentaire'];
$utilisateur_entree = (!empty($_POST['utilisateur_embauche'])) ? $func->dateUS($_POST['utilisateur_embauche']) : NULL;
$utilisateur_sortie = (!empty($_POST['utilisateur_depart'])) ? $func->dateUS($_POST['utilisateur_depart']) : NULL;


// On verifie que le produit n'existe déjà pas dans la table (par le nom)
$verificationUtilisateurs = $pdo->sql("SELECT utilisateurs_id FROM utilisateurs WHERE utilisateurs_email = ? AND utilisateurs_id != ?", array($utilisateur_email, $utilisateur_id));
$count = $verificationUtilisateurs->rowCount();

if ($count != 0) { // Si l'utilisateur existe
    $alert = '1';
} else { // Sinon on ajoute

    // Insertion du formulaire dans la BD

    $insertLogiciel = $pdo->sql("UPDATE `utilisateurs` SET 
                                `societes_locaux_id`='$societes_locaux_id',
                                `utilisateurs_fonction`='$utilisateur_fonction',
                                `utilisateurs_nom`='$utilisateur_nom',
                                `utilisateurs_prenom`='$utilisateur_prenom',
                                `utilisateurs_telephoneF`='$utilisateur_telephoneFixe',
                                `utilisateurs_telephoneM`='$utilisateur_telephoneMobile',
                                `utilisateurs_email`='$utilisateur_email',
                                `utilisateurs_etat`='$utilisateur_statut',
                                `utilisateurs_service`='$utilisateur_service',
                                `utilisateurs_dateEntree`= ?,
                                `utilisateurs_dateSortie`= ?,
                                `utilisateurs_dateM`= NOW(),
                                `utilisateurs_commentaire`='$utilisateur_commentaire' 
                                WHERE `utilisateurs_id` = '$utilisateur_id'", array($utilisateur_entree, $utilisateur_sortie));

    $alert = '0';
}

echo json_encode(array('retour' => $alert));

?>
