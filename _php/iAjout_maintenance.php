<?php

include('/inc/init.php');
$func = new Functions();

$maintenance_type = $_POST['maintenance_type'];
$maintenance_categorie = $_POST['maintenance_categorie'];
$select_societe = (!empty($_POST['select_societe'])) ? $_POST['select_societe'] : NULL;
$select_application = (!empty($_POST['select_application'])) ? $_POST['select_application'] : NULL;
$select_utilisateur = (!empty($_POST['select_utilisateur'])) ? $_POST['select_utilisateur'] : NULL;
$maintenance_date = $_POST['maintenance_date'];
$maintenance_heure = $_POST['maintenance_heure'];
$maintenance_duree = $_POST['maintenance_duree'];
$maintenance_statut = $_POST['maintenance_statut'];
$maintenance_commentaire = $_POST['maintenance_commentaire'];

$date = $func->dateUS($maintenance_date) . ' ' . $maintenance_heure;

$pdo->sql("INSERT INTO `maintenances`(
                `maintenances_id`, 
                `maintenances_type`,
                `maintenances_categories`,
                `societes_id`, 
                `utilisateurs_id`, 
                `projets_id`, 
                `maintenances_date`, 
                `maintenances_duree`, 
                `maintenances_commentaire`, 
                `maintenances_statut`) VALUES (
                NULL,
                '$maintenance_type',
                '$maintenance_categorie',
                '$select_societe',
                '$select_utilisateur',
                '$select_application',
                '$date',
                '$maintenance_duree',
                '$maintenance_commentaire',
                '$maintenance_statut')");

echo json_encode(array("retour" => '0'));

?>