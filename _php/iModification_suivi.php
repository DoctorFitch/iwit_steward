<?php

include('../ajax/inc/init.php');
$func = new Functions();

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


echo json_encode(array('retour' => $alert));

?>
