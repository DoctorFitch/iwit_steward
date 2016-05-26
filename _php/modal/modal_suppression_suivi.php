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
                `historiques_heure`) 
                VALUES (
                NULL,
                './img/avatars/1.png',
                ?,
                ?,
                ?,
                '2',
                NOW())", array("Suppression d'un suivis", $utilisateur, '#ajax/utilisateurs.php'));

?>