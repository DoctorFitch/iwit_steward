<?php

include('/inc/init.php');
$func = new Functions();

$projet_id = $_POST['projet_id'];
$id_societe = $_POST['id_societe'];
$module_nom = $_POST['module_nom'];
$module_description = $_POST['module_description'];
$module_refDevis = $_POST['module_refDevis'];
$module_montantDevis = $_POST['module_montantDevis'];
$module_debut = (!empty($_POST['module_debut'])) ? $func->dateUS($_POST['module_debut']) : NULL;
$module_fin = (!empty($_POST['module_fin'])) ? $func->dateUS($_POST['module_fin']) : NULL;
$module_delaisRealisation = $_POST['module_delaisRealisation'];
$commentaire_local = $_POST['commentaire_local'];
$iwit_utilisateur_id = $_POST['id_utilisateurs'];

// On verifie les doublons
$verificationProjetModule = $pdo->sql("SELECT projets_modules_id FROM projets_modules WHERE projets_modules_nom = '$module_nom'");
$count = $verificationProjetModule->rowCount();
if ($count != 0) { // Si le produit existe
    $alert = '1addmodule';
} else {

    $alert = 0;

    $pdo->sql("INSERT INTO `projets_modules`(
                `projets_modules_id`, 
                `projets_modules_dateC`, 
                `projets_modules_dateM`, 
                `projets_modules_nom`, 
                `projets_modules_description`, 
                `projets_modules_refDevis`, 
                `projets_modules_montantDevis`, 
                `projets_modules_dateDebut`, 
                `projets_modules_dateFin`, 
                `projets_modules_delaisRealisation`, 
                `projets_modules_commentaires`, 
                `projets_id`) VALUES (
                NULL,
                NOW(),
                NULL,
                '$module_nom',
                '$module_description',
                '$module_refDevis',
                '$module_montantDevis',
                '$module_debut',
                '$module_fin',
                '$module_delaisRealisation',
                '$commentaire_local',
                '$projet_id')");

    $module_id = $pdo->lastInsertId();

    if (!empty($iwit_utilisateur_id)) {
        foreach ($iwit_utilisateur_id as $utilisateur) {

            $verificationUtilisateurs = $pdo->sql("SELECT iwit_utilisateurs_id FROM projets_modules_iwit_utilisateurs WHERE projets_modules_id = ? AND iwit_utilisateurs_id = ?", array($module_id, $utilisateur));
            $count = $verificationUtilisateurs->rowCount();

            if ($count != 0) {
                $alert = '1addutil';
            } else {
                $pdo->sql("INSERT INTO `projets_modules_iwit_utilisateurs`(`projets_modules_iwit_utilisateurs_id`, `projets_modules_id`, `iwit_utilisateurs_id`) VALUES (NULL,?,?)", array($module_id, $utilisateur));
                $alert = '0';
            }
        }
    }
    
    $pdo->sql("INSERT INTO `historiques` (
                `historiques_id`, 
                `historiques_imgUtilisateur`, 
                `historiques_titre`, 
                `historiques_detail`, 
                `historiques_href`, 
                `historiques_type`, 
                `historiques_heure`) 
                VALUES (
                NULL,
                './img/avatars/1.png',
                ?,
                ?,
                ?,
                '1',
                NOW())", array("Ajout d'un module", $module_nom, '#ajax/projets.php'));
}

echo json_encode(array('retour' => $alert));


?>
