<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$utilisateur = $pdo->sqlValue("SELECT iwit_utilisateur_nomComplet FROM view_suivis WHERE suivis_id = ?", array($id));

$pdo->sql("DELETE FROM suivis WHERE suivis_id = ?", array($id));

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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Suppression d'un suivi par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , '' , 'index.php?p=modules/productions', '3', 'fa-desktop'));

?>