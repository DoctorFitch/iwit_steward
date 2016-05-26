<?php

include('/inc/init.php');
$func = new Functions();

$projet_societe = $_POST['projet_societe'];
$projet_type = $_POST['projet_type'];
$projet_nom = $_POST['projet_nom'];
$projet_description = $_POST['projet_description'];
$projet_url = $_POST['projet_url'];
$projet_dateDebut = (!empty($_POST['projet_dateDebut'])) ? $func->dateUS($_POST['projet_dateDebut']) : NULL;
$projet_commentaire = $_POST['projet_commentaire'];

// On verifie les doublons
$verificationProjet = $pdo->sql("SELECT projets_id FROM projets WHERE projets_nom = '$projet_nom'");
$count = $verificationProjet->rowCount();
if ($count != 0) { // Si le produit existe
    $alert = '1';
} else {

    $alert = 0;

    $pdo->sql("INSERT INTO `projets`
                (`projets_id`, 
                `projets_types`, 
                `projets_dateC`, 
                `projets_nom`, 
                `projets_description`, 
                `projets_commentaire`, 
                `societes_id`, 
                `projets_url`, 
                `projets_dateDebut`) 
                VALUES (
                NULL,
                '$projet_type',
                NOW(),
                '$projet_nom',
                '$projet_description',
                '$projet_commentaire',
                '$projet_societe',
                '$projet_url',
                ?)", array($projet_dateDebut));

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
                '1',
                NOW())", array("Ajout d'un projet", $projet_nom, '#ajax/projets.php'));
}

echo json_encode(array('retour' => $alert));


?>