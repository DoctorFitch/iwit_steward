<?php

include('../ajax/inc/init.php');
$func = new Functions();

// Récupération des champs

$projet_id = $_POST['projet_id'];
$projet_societe = $_POST['projet_societe'];
$projet_type = $_POST['projet_type'];
$projet_nom = $_POST['projet_nom'];
$projet_description = $_POST['projet_description'];
$projet_url = $_POST['projet_url'];
$projet_dateDebut = (!empty($_POST['projet_dateDebut'])) ? $func->dateUS($_POST['projet_dateDebut']) : NULL;
$projet_commentaire = $_POST['projet_commentaire'];


// Controle duplicata
$verificationProjet = $pdo->sql("SELECT projets_id FROM projets WHERE projets_nom = ? AND projets_id != ?", array($projet_nom, $projet_id));
$count = $verificationProjet->rowCount();

if ($count != 0) { // Si l'utilisateur existe
    $alert = '1';
} else { // Sinon on ajoute

    // Insertion du formulaire dans la BD

    $insertLogiciel = $pdo->sql("UPDATE `projets` SET 
                                `projets_types`='$projet_type',
                                `projets_nom`='$projet_nom',
                                `projets_description`='$projet_description',
                                `projets_commentaire`='$projet_commentaire',
                                `societes_id`='$projet_societe',
                                `projets_url`='$projet_url',
                                `projets_dateDebut`= ?
                                WHERE `projets_id`='$projet_id'",
                                        array
                                        (
                                            $projet_dateDebut
                                        )
                                );

    $alert = '0';
}

echo json_encode(array('retour' => $alert));

?>
