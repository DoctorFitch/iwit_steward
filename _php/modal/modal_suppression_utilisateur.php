<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$utilisateur = $pdo->sqlRow("SELECT * FROM utilisateurs WHERE utilisateurs_id = ?", array($id));

$pdo->sql("DELETE FROM utilisateurs WHERE utilisateurs_id = ?", array($id));

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
                NOW())", array("Suppression d'un utilisateur", ($utilisateur['utilisateurs_prenom'] . ' ' . $utilisateur['utilisateurs_nom']), '#ajax/utilisateurs.php'));

?>