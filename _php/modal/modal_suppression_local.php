<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$nom_local = $pdo->sqlRow("SELECT * FROM societes_locaux WHERE societes_locaux_id = ?", array($id));
$pdo->sql("DELETE FROM societes_locaux WHERE societes_locaux_id = ?", array($id));


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
                '6',
                NOW())", array("Suppression d'un local", $nom_local['societes_locaux_nom'], '#ajax/locaux.php'));

?>