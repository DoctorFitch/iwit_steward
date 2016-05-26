<?php

require_once('../../../lib/config.php');
// Verification des champs
if(empty($_POST['nom_logiciel']) || empty($_POST['type_licences']) || empty($_POST['prix_logiciel']) || empty($_POST['date_garantie']) || empty($_POST['date_mes']) || empty($_POST['date_echeance']))
{
    // Il ne se passe rien
}
else
{
    // Récupération des champs

    // description logiciel
    $logiciel_id = $_POST['logiciel_id'];
    $nom_logiciel = $_POST['nom_logiciel'];
    $type_licences = $_POST['type_licences'];
    $prix_logiciel = $_POST['prix_logiciel'];
    // date garantie
    $date_garantie = $func->prevInsertBDD($func->dateUS($_POST['date_garantie']));
    // date mise en service
    $date_mes = $func->prevInsertBDD($func->dateUS($_POST['date_mes']));
    // date echeance
    $date_echeance = $func->prevInsertBDD($func->dateUS($_POST['date_echeance']));
    // info complementaires
    $commentaires = $_POST['commentaires'];

    // On verifie que le produit n'existe déjà pas dans la table (par le nom)

    $verificationLogiciel = $pdo->sql("SELECT logiciels_id FROM logiciels WHERE logiciels_nom = '$nom_logiciel' AND logiciels_id != ?", array($logiciel_id));
    $count = $verificationLogiciel->rowCount();
//    echo json_encode(array('count'=>$count));
    if($count != 0) // Si le produit existe
    {
        $alert = '1';
    //  echo json_encode('bonjour');
    }
    else // Sinon on ajoute
    {
        // Insertion du formulaire dans la BD

        $insertLogiciel = $pdo->sql("UPDATE logiciels SET logiciels_nom = '$nom_logiciel',
        logiciels_typeLicence = '$type_licences',
        logiciels_garantie = '$date_garantie',
        logiciels_prix = '$prix_logiciel',
        logiciels_description = '$commentaires',
        logiciels_dateMiseEnService = '$date_mes',
        logiciels_dateEcheance = '$date_echeance',
        logiciels_dateC = NOW()
        WHERE logiciels_id = '$logiciel_id'");

        $alert = '0';
    }

}
echo json_encode(array('retour'=>$alert));



?>
