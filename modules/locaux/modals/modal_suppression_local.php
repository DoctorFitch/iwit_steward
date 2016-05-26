<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$nom_local = $pdo->sqlRow("SELECT * FROM societes_locaux WHERE societes_locaux_id = ?", array($id));

$id_societe = $pdo->sqlValue("SELECT societes_id FROM societes_locaux WHERE societes_locaux_id = ?", array($id));

$pdo->sql("DELETE FROM societes_locaux WHERE societes_locaux_id = ?", array($id));

// si il s'agit du dernier local egalement supprimer la societes de la table societe
if(!$pdo->sqlValue("SELECT COUNT(societes_locaux_id) FROM societes_locaux WHERE societes_id = ?", array($id_societe))){
    $pdo->sql("DELETE FROM societes WHERE societes_id = ?", array($id_societe));
}


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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Suppression d'un local par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , '' , 'index.php?p=modules/locaux', '3', 'fa-building'));

?>