<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$materiel = $pdo->sqlRow("SELECT * FROM produits WHERE produits_id = ?", array($id));
$pdo->sql("DELETE FROM produits WHERE produits_id = ?", array($id));


switch ($materiel['produits_type']) {
    case 1:
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
                '23',
                NOW())", array("Suppression d'un logiciel", $materiel['produits_nom'], '#ajax/materiel.php'));
        break;

    case 2:
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
                '8',
                NOW())", array("Suppression d'un materiel", $materiel['produits_nom'], '#ajax/materiel.php'));
        break;

    case 3:
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
                '10',
                NOW())", array("Suppression d'une application", $materiel['produits_nom'], '#ajax/materiel.php'));
        break;

    case 4:
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
                '12',
                NOW())", array("Suppression d'un site web", $materiel['produits_nom'], '#ajax/materiel.php'));
        break;

    case 5:
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
                '14',
                NOW())", array("Suppression d'une maintenance web", $materiel['produits_nom'], '#ajax/materiel.php'));
        break;

    case 6:
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
                '16',
                NOW())", array("Suppression d'une maintenance d'application", $materiel['produits_nom'], '#ajax/materiel.php'));
        break;

    case 7:
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
                '19',
                NOW())", array("Suppression d'un hébérgement", $materiel['produits_nom'], '#ajax/materiel.php'));
        break;

    case 8:
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
                '21',
                NOW())", array("Suppression d'une messagerie", $materiel['produits_nom'], '#ajax/materiel.php'));
        break;
}

?>