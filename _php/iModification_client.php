<?php

include('../ajax/inc/init.php');
$func = new Functions();

// Récupération des champs

// description logiciel
$societes_id = $_POST['societes_id'];
$nom_societe = $_POST['nom_societe'];
$type_contrat = $_POST['type_contrat'];
$site_web = $_POST['site_web'];
$messagerie = $_POST['messagerie'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$code_postal = $_POST['code_postal'];
$pays = $_POST['pays'];

// On verifie que le produit n'existe déjà pas dans la table (par le nom)

$verificationSocietes = $pdo->sql("SELECT societes_id FROM societes WHERE societes_nom = ? AND societes_id != ?", array($nom_societe, $societes_id));
$count = $verificationSocietes->rowCount();
//    echo json_encode(array('count'=>$count));
if ($count != 0) // Si le produit existe
{
    $alert = '1';
    //  echo json_encode('bonjour');
} else // Sinon on ajoute
{
    // Insertion du formulaire dans la BD

    $modifClient = $pdo->sql("UPDATE `societes` SET
    `societes_nom`='$nom_societe',
    `societes_adresse`='$adresse',
    `societes_ville`='$ville',
    `societes_codePostal`='$code_postal',
    `societes_pays`='$pays',
    `societes_typeContrat`='$type_contrat',
    `societes_siteWeb`='$site_web',
    `messageries_id`='$messagerie',
    `societes_dateM`= NOW()
    WHERE `societes_id`='$societes_id'");

    $alert = '0';
}

echo json_encode(array('retour' => $alert));


?>
