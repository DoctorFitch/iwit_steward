<?php require_once('../../../lib/config.php');

// RECUPERATION DES CHAMPS FORMULAIRES

$documents_id = $_POST['documents_id'];
$commentaire = $_POST['documents_commentaire'];

    $pdo->sql("UPDATE `documents` SET 
                `documents_commentaire`='$commentaire' 
                WHERE `documents_id`='$documents_id'");

    // ON RETOURNE AUCUN PROBLEME A SIGNALER
    $alert = '0';

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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Ajout d'un commentaire par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , "pour le document portant l'id : " . $documents_id , 'index.php?p=modules/locaux', '1', 'fa-pencil-square-o'));

echo json_encode(array('alert' => $alert));

?>