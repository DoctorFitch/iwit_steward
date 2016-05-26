<?php

include('../ajax/inc/init.php');
$func = new Functions();

// Récupération des champs

$societe_id = $_POST['societes_id'];
$nom_societe = $_POST['nom_societe'];
$statut_juridique = $_POST['statut_juridique'];
$type_contrat = $_POST['type_contrat'];
$adresse_societe = $_POST['adresse_societe'];
$ville_societe = $_POST['ville_societe'];
$code_postal_societe = $_POST['code_postal_societe'];
$pays_societe = $_POST['pays_societe'];
$telephone_societe = $_POST['telephone_societe'];
$fax_societe = $_POST['fax_societe'];
$email_societe = $_POST['email_societe'];
$rcs = $_POST['rcs'];
$tva = $_POST['tva'];

$nom_contact = $_POST['nom_contact'];
$prenom_contact = $_POST['prenom_contact'];
$date_naissance = $_POST['date_naissance'];
$lieu_naissance = $_POST['lieu_naissance'];
$email_contact = $_POST['email_contact'];
$commentaire_societe = $_POST['commentaire_societe'];



// On verifie que le produit n'existe déjà pas dans la table (par le nom)
$verificationSociete = $pdo->sql("SELECT societes_id FROM societes WHERE societes_email = ? AND societes_nom != ?", array($email_societe, $nom_societe));
$count = $verificationSociete->rowCount();

if ($count != 0) { // Si l'utilisateur existe
    $alert = '1';
} else { // Sinon on ajoute

    // Insertion du formulaire dans la BD

    $insertLogiciel = $pdo->sql("UPDATE `societes` SET 
                                `societes_typeC`='$type_contrat',
                                `societes_statutJuridique`='$statut_juridique',
                                `societes_nom`='$nom_societe',
                                `societes_adresse`='$adresse_societe',
                                `societes_ville`='$ville_societe',
                                `societes_CP`='$code_postal_societe',
                                `societes_pays`='$pays_societe',
                                `societes_telephone`='$telephone_societe',
                                `societes_fax`='$fax_societe',
                                `societes_email`='$email_societe',
                                `societes_rcs`='$rcs',
                                `societes_tva`='$tva',
                                `societes_contact_nom`='$nom_contact',
                                `societes_contact_prenom`='$prenom_contact',
                                `societes_contact_dateNaissance`='$date_naissance',
                                `societes_contact_lieuNaissance`='$lieu_naissance',
                                `societes_contact_email`='$email_contact',
                                `societes_dateM`=NOW(),
                                `societes_commentaire`='$commentaire_societe' WHERE `societes_id`= ?", array($societe_id));

    $alert = '0';
}

echo json_encode(array('retour' => $alert));

?>
