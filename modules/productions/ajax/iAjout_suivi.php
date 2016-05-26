<?php

require_once('../../../lib/config.php');

$select_utilisateurs = $_POST['select_utilisateurs'];
$projet_selection = $_POST['projet_selection'];
$module_selection = $_POST['module_selection'];
$categorie_selection = $_POST['categorie_selection'];
$suivi_date = (!empty($_POST['suivi_date'])) ? $func->dateUS($_POST['suivi_date']) : NULL;
$suivi_duree = $_POST['suivi_duree'];
$suivi_commentaire = $_POST['suivi_commentaire'];

$alert = 0;

$pdo->sql("INSERT INTO `suivis`(
            `suivis_id`, 
            `suivis_dateC`, 
            `suivis_dateM`, 
            `iwit_utilisateurs_id`, 
            `projets_modules_id`, 
            `suivis_categories_id`, 
            `suivis_date`, 
            `suivis_duree`, 
            `suivis_description`) 
            VALUES (
            NULL,
            NOW(),
            NULL,
            '$select_utilisateurs',
            '$module_selection',
            '$categorie_selection',
            '$suivi_date',
            '$suivi_duree',
            '$suivi_commentaire')");

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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Ajout d'un suivi par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $module_selection , 'index.php?p=modules/productions', '1', 'fa-desktop'));

echo json_encode(array('retour' => $alert));


?>