<?php include('/inc/init.php');
$func = new Functions();

// RECUPERATION DES CHAMPS FORMULAIRES

$documents_id = $_POST['documents_id'];
$commentaire = $_POST['documents_commentaire'];

    $pdo->sql("UPDATE `documents` SET 
                `documents_commentaire`='$commentaire' 
                WHERE `documents_id`='$documents_id'");

    // ON RETOURNE AUCUN PROBLEME A SIGNALER
    $alert = '0';

echo json_encode(array('alert' => $alert));

?>