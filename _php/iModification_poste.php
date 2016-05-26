<?php

include('../ajax/inc/init.php');
$func = new Functions();

// Récupération des champs

$poste_id = $_POST['poste_id'];
$poste_id_locaux = $_POST['poste_id_locaux'];
$poste_nom = $_POST['poste_nom'];
$poste_type = $_POST['poste_type'];
$poste_statut = $_POST['poste_statut'];
$poste_dateAchat = $func->dateUS($_POST['poste_dateAchat']);
$poste_dateMiseEnService = $func->dateUS($_POST['poste_dateMiseEnService']);
$poste_description = $_POST['poste_description'];

//$societes_locaux_id = $pdo->sqlValue("SELECT societes_id where ");
// Insertion du formulaire dans la BD

$insertLogiciel = $pdo->sql("UPDATE `postes` SET 
`postes_id_locaux`='$poste_id_locaux',
`postes_nom`='$poste_nom',
`postes_type`='$poste_type',
`postes_statut`='$poste_statut',
`postes_dateAchat`='$poste_dateAchat',
`postes_dateMiseEnService`='$poste_dateMiseEnService',
`postes_description`='$poste_description',
`postes_dateM`= NOW()
 WHERE `postes_id`= '$poste_id'");

$alert = '0';

echo json_encode(array('retour' => $alert));

?>
