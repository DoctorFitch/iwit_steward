<?php

require_once('../../../lib/config.php');

$maintenance_id = $_POST['maintenance_id'];

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

$pdo->sql("UPDATE `maintenances` SET 
            `maintenances_type`='$maintenance_type',
            `maintenances_categories`='$maintenance_categorie',
            `societes_id`='$select_societe',
            `utilisateurs_id`='$select_utilisateur',
            `projets_id`='$select_application',
            `maintenances_date`='$date',
            `maintenances_duree`=$maintenance_duree,
            `maintenances_commentaire`='$maintenance_commentaire',
            `maintenances_statut`='$maintenance_statut' WHERE `maintenances_id`='$maintenance_id'");

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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Modification d'une maintenance par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $maintenance_categorie , 'index.php?p=modules/maintenance', '2', 'fa-wrench'));

echo json_encode(array("retour" => '0'));

?>