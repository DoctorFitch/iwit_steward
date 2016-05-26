<?php

include('/inc/init.php');
$func = new Functions();

// Récupération des champs

// description logiciel
$materiel_id = $_POST['materiel_id'];
$ordinateur_ram = $_POST['ordinateur_ram'];
$ordinateur_cg = $_POST['ordinateur_cg'];
$ordinateur_processeur = $_POST['ordinateur_processeur'];
$ordinateur_stockage = $_POST['ordinateur_stockage'];
$ordinateur_cm = $_POST['ordinateur_cm'];
$ordinateur_tailleecran = $_POST['ordinateur_tailleecran'];
$serveur_ram = $_POST['serveur_ram'];
$serveur_processeur = $_POST['serveur_processeur'];
$serveur_stockage = $_POST['serveur_stockage'];
$serveur_cm = $_POST['serveur_cm'];
$serveur_baies = $_POST['serveur_baies'];
$switch_ports = $_POST['switch_ports'];
$switch_interfaceweb = $_POST['switch_interfaceweb'];
$switch_administrable = $_POST['switch_administrable'];
$switch_poe = $_POST['switch_poe'];
$switch_ipacces = $_POST['switch_ipacces'];
$switch_vitesse = $_POST['switch_vitesse'];
$switch_wifi = $_POST['switch_wifi'];
$peripherique_nom = $_POST['peripherique_nom'];
$materiel_reference = $_POST['materiel_reference'];
$materiel_modele = $_POST['materiel_modele'];
$materiel_ean = $_POST['materiel_ean'];
$materiel_prix = $_POST['materiel_prix'];
$materiel_os = $_POST['materiel_os'];
$materiel_garantie = $_POST['materiel_garantie'];
$materiel_description = $_POST['materiel_description'];


$pdo->sql("UPDATE `materiels` SET
`materiels_ordinateur_ram`='$ordinateur_ram',
`materiels_ordinateur_carteGraphique`='$ordinateur_cg',
`materiels_ordinateur_processeur`='$ordinateur_processeur',
`materiels_ordinateur_stockage`='$ordinateur_stockage',
`materiels_ordinateur_carteMere`='$ordinateur_cm',
`materiels_ordinateur_tailleEcran`='$ordinateur_tailleecran',
`materiels_serveur_ram`='$serveur_ram',
`materiels_serveur_processeur`='$serveur_processeur',
`materiels_serveur_stockage`='$serveur_stockage',
`materiels_serveur_carteMere`='$serveur_cm',
`materiels_serveur_baies`='$serveur_baies',
`materiels_switch_ports`='$switch_ports',
`materiels_switch_interfaceWeb`='$switch_interfaceweb',
`materiels_switch_administrable`='$switch_administrable',
`materiels_switch_poe`='$switch_poe',
`materiels_switch_ipAcces`='$switch_ipacces',
`materiels_switch_vitesse`='$switch_vitesse',
`materiels_switch_wifi`='$switch_wifi',
`materiels_peripherique_nom`='$peripherique_nom',
`materiels_reference`='$materiel_reference',
`materiels_modele`='$materiel_modele',
`materiels_ean`='$materiel_ean',
`materiels_prix`='$materiel_prix',
`materiels_os`='$materiel_os',
`materiels_dateM`= NOW(),
`materiels_description`='$materiel_description',
`materiels_dureeGarantie`='$materiel_garantie' WHERE `materiels_id` = '$materiel_id'");

$alert = '0';

echo json_encode(array('retour' => $alert));


?>