<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$pdo->sql("DELETE FROM projets_modules WHERE projets_modules_id = ?", array($id));
$pdo->sql("DELETE FROM projets_modules_iwit_utilisateurs WHERE projets_modules_id = ?", array($id));

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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Suppression d'un module par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , '' , 'index.php?p=modules/projets', '3', 'fa-modx'));

?>