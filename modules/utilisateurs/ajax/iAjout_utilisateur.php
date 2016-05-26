<?php

require_once("../../../lib/config.php");

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
$utilisateur_embauche = (!empty($_POST['utilisateur_embauche'])) ? $func->dateUS($_POST['utilisateur_embauche']) : NULL;
$utilisateur_depart = (!empty($_POST['utilisateur_depart'])) ? $func->dateUS($_POST['utilisateur_depart']) : NULL;

// On verifie que les utilisateurs n'ont pas le meme email
$verificationMail = $pdo->sql("SELECT utilisateurs_id FROM utilisateurs WHERE utilisateurs_email = '$utilisateur_email'");
$count = $verificationMail->rowCount();
if ($count != 0) { // Si le produit existe
    $alert = '1';
} else {

    $alert = 0;

    $pdo->sql("INSERT INTO `utilisateurs`(`utilisateurs_id`, 
                `societes_locaux_id`, 
                `utilisateurs_fonction`,
                `utilisateurs_nom`,
                `utilisateurs_prenom`, 
                `utilisateurs_telephoneF`,
                `utilisateurs_telephoneM`, 
                `utilisateurs_email`, 
                `utilisateurs_etat`, 
                `utilisateurs_service`, 
                `utilisateurs_dateEntree`, 
                `utilisateurs_dateSortie`, 
                `utilisateurs_dateC`, 
                `utilisateurs_dateM`, 
                `utilisateurs_commentaire`) 
                VALUES (
                NULL,
                '$societes_locaux_id',
                '$utilisateur_fonction',
                '$utilisateur_nom',
                '$utilisateur_prenom',
                '$utilisateur_telephoneFixe',
                '$utilisateur_telephoneMobile',
                '$utilisateur_email',
                '$utilisateur_statut',
                '$utilisateur_service',
                ?,
                ?,
                NOW(),
                '',
                '$utilisateur_commentaire')", array($utilisateur_embauche, $utilisateur_depart));

    $pdo->sql("INSERT INTO `historiques` (
                `historiques_id`, 
                `historiques_imgUtilisateur`, 
                `historiques_titre`, 
                `historiques_detail`, 
                `historiques_href`, 
                `historiques_type`, 
                `historiques_fa`,
                `historiques_heure`) 
                VALUES (
                NULL,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Ajout d'un utilisateur par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $projet_nom, 'index.php?p=modules/utilisateurs', '1', 'fa-user'));
}

echo json_encode(array('retour' => $alert));


?>