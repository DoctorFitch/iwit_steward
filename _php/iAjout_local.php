<?php include('/inc/init.php');
$func = new Functions();

// RECUPERATION DES CHAMPS FORMULAIRES

$id_entreprise = $_POST['id_entreprise'];
$nom_local = $_POST['nom_local'];
$adresse_local = $_POST['adresse_local'];
$ville_local = $_POST['ville_local'];
$CP_local = $_POST['code_postal_local'];
$pays_local = $_POST['pays_local'];
$telephone_local = $_POST['telephone_local'];
$fax_local = $_POST['fax_local'];
$email_local = $_POST['email_local'];
$commentaire_local = $_POST['commentaire_local'];

// ON VERIFIE QUE LE NOM DU LOCAL N'EXISTE DEJA PAS DANS LA BD AVANT L'INSERTION

$verificationLocal = $pdo->sql("SELECT societes_locaux_id FROM societes_locaux WHERE societes_locaux_nom = '$nom_local'");
$count = $verificationLocal->rowCount();

// SI LE LOCAL EXISTE DEJA

if ($count != 0) {
    $alert = '1';
} // SI LE LOCAL N'EXISTE PAS
else {

    $pdo->sql("INSERT INTO `societes_locaux`
                (`societes_locaux_id`,
                `societes_id`, 
                `societes_locaux_nom`, 
                `societes_locaux_adresse`, 
                `societes_locaux_ville`, 
                `societes_locaux_CP`, 
                `societes_locaux_pays`, 
                `societes_locaux_telephone`, 
                `societes_locaux_fax`, 
                `societes_locaux_email`, 
                `societes_locaux_dateC`, 
                `societes_locaux_dateM`, 
                `societes_locaux_commentaire`) 
                VALUES (
                NULL,
                '$id_entreprise',
                '$nom_local',
                '$adresse_local',
                '$ville_local',
                '$CP_local',
                '$pays_local',
                '$telephone_local',
                '$fax_local',
                '$email_local',
                NOW(),
                NULL,
                '$commentaire_local')");

    // ON RETOURNE AUCUN PROBLEME A SIGNALER
    $alert = '0';

} // fin else local n'existe pas

echo json_encode(array('alert' => $alert));

?>