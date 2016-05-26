<?php

include('/inc/init.php');
$func = new Functions();

// Récupération des champs

// description logiciel
$materiel_type = $_POST['materiel_type'];
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
$serveur_baies = (!empty($_POST['serveur_baies'])) ? $_POST['$serveur_baies'] : NULL;
$switch_ports = (!empty($_POST['switch_ports'])) ? $_POST['switch_ports'] : NULL;
$switch_interfaceweb = (!empty($_POST['switch_interfaceweb'])) ? $_POST['$switch_interfaceweb'] : NULL;
$switch_administrable = (!empty($_POST['switch_administrable'])) ? $_POST['$switch_administrable'] : NULL;
$switch_poe = (!empty($_POST['switch_poe'])) ? $_POST['switch_poe'] : NULL;
$switch_ipacces = $_POST['switch_ipacces'];
$switch_vitesse = $_POST['switch_vitesse'];
$switch_wifi = (!empty($_POST['switch_wifi'])) ? $_POST['$switch_wifi'] : NULL;
$peripherique_nom = $_POST['peripherique_nom'];
$materiel_reference = $_POST['materiel_reference'];
$materiel_modele = $_POST['materiel_modele'];
$materiel_ean = $_POST['materiel_ean'];
$materiel_prix = $_POST['materiel_prix'];
$materiel_os = $_POST['materiel_os'];
$materiel_garantie = $_POST['materiel_garantie'];
$materiel_description = $_POST['materiel_description'];


$pdo->sql("INSERT INTO `materiels`(`materiels_id`, `type_materiels`, `materiels_ordinateur_ram`, `materiels_ordinateur_carteGraphique`, `materiels_ordinateur_processeur`, `materiels_ordinateur_stockage`, `materiels_ordinateur_carteMere`, `materiels_ordinateur_tailleEcran`, `materiels_serveur_ram`, `materiels_serveur_processeur`, `materiels_serveur_stockage`, `materiels_serveur_carteMere`, `materiels_serveur_baies`, `materiels_switch_ports`, `materiels_switch_interfaceWeb`, `materiels_switch_administrable`, `materiels_switch_poe`, `materiels_switch_ipAcces`, `materiels_switch_vitesse`, `materiels_switch_wifi`, `materiels_peripherique_nom`, `materiels_reference`, `materiels_modele`, `materiels_ean`, `materiels_prix`, `materiels_os`, `materiels_dateC`, `materiels_dateM`, `materiels_description`, `materiels_dureeGarantie`) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),?,?,?)", array(
    NULL,$materiel_type,$ordinateur_ram,$ordinateur_cg,$ordinateur_processeur,$ordinateur_stockage,
    $ordinateur_cm,$ordinateur_tailleecran,$serveur_ram,$serveur_processeur,$serveur_stockage,$serveur_cm,$serveur_baies,
    $switch_ports,$switch_interfaceweb,$switch_administrable,$switch_poe,$switch_ipacces,$switch_vitesse,$switch_wifi,
    $peripherique_nom,$materiel_reference,$materiel_modele,$materiel_ean,$materiel_prix,$materiel_os,'',
    $materiel_description,$materiel_garantie));

$alert = '0';

echo json_encode(array('alert' => $alert));


?>