<?php

require_once('../../../lib/config.php');

// Récupération des champs
$projet_id = $_POST['projet_id'];
$id_societe = $_POST['id_societe'];
$module_nom = $_POST['module_nom'];
$module_description = $_POST['module_description'];
$module_refDevis = $_POST['module_refDevis'];
$module_montantDevis = $_POST['module_montantDevis'];
$module_debut = $_POST['module_debut'];
$module_fin = $_POST['module_fin'];
$module_delaisRealisation = $_POST['module_delaisRealisation'];
$id_utilisateurs = $_POST['id_utilisateurs'];
$commentaire_module = $_POST['commentaire_module'];

$alert = '1';

if (!empty($id_utilisateurs)) {

    $del = $pdo->sql('DELETE FROM projets_modules_iwit_utilisateurs WHERE projets_modules_id = ?', array($projet_id));
    $lol = [];
    foreach ($id_utilisateurs as $utilisateur) {

        $lol[] = $pdo->sql("INSERT INTO `projets_modules_iwit_utilisateurs`(`projets_modules_iwit_utilisateurs_id`, `projets_modules_id`,     `iwit_utilisateurs_id`) VALUES (NULL,?,?)", array($projet_id, $utilisateur));

    }
}

// Si pas vide ET nombre d'utilisateurs == nombre de requête d'insert
if (!empty($lol) && (count($id_utilisateurs) == count($lol))) {
    $alert = '0';
}

$pdo->sql("UPDATE `projets_modules` SET 
                `projets_modules_dateM`= NOW(),
                `projets_modules_nom`= ?,
                `projets_modules_description`= ?,
                `projets_modules_refDevis`= ?,
                `projets_modules_montantDevis`= ?,
                `projets_modules_dateDebut`= ?,
                `projets_modules_dateFin`= ?,
                `projets_modules_delaisRealisation`= ?,
                `projets_modules_commentaires`= ? WHERE `projets_modules_id`='$projet_id'",
                array($module_nom,
                    $module_description,
                    $module_refDevis,
                    $module_montantDevis,
                    $module_debut,
                    $module_fin,
                    $module_delaisRealisation,
                    $commentaire_module));

$module_id = $pdo->lastInsertId();

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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Modification d'un module par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $module_nom, 'index.php?p=modules/projets', '2', 'fa-book'));


echo json_encode(array('retour' => $alert));

?>
