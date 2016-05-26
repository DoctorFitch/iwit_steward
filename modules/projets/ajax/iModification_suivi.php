<?php

require_once('../../../lib/config.php');

// Récupération des champs
$id_suivi = $_POST['id_suivi'];
$select_utilisateurs = $_POST['select_utilisateurs'];
$projet_selection = $_POST['projet_selection'];
$module_selection = $_POST['module_selection'];
$categorie_selection = $_POST['categorie_selection'];
$suivi_date = (!empty($_POST['suivi_date'])) ? $func->dateUS($_POST['suivi_date']) : NULL;
$suivi_duree = $_POST['suivi_duree'];
$suivi_commentaire = $_POST['suivi_commentaire'];


$updateSuivi = $pdo->sql("UPDATE `suivis` SET 
                            `suivis_dateM`= NOW(),
                            `iwit_utilisateurs_id`='$select_utilisateurs',
                            `projets_modules_id`='$module_selection',
                            `suivis_categories_id`='$categorie_selection',
                            `suivis_date`='$suivi_date',
                            `suivis_duree`='$suivi_duree',
                            `suivis_description`='$suivi_commentaire' WHERE `suivis_id`='$id_suivi'");

$alert = '0';

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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Modification d'un suivi par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $projet_nom, 'index.php?p=modules/projets', '2', 'fa-heartbeat'));

echo json_encode(array('retour' => $alert));

?>
