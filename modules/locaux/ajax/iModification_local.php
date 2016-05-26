<?php

require_once('../../../lib/config.php');
$func = new Functions();

// Récupération des champs

// description logiciel
$id_local = $_POST['societes_locaux_id'];
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

// On verifie que le produit n'existe déjà pas dans la table (par le nom)
$verificationSocietesLocaux = $pdo->sql("SELECT societes_locaux_id FROM societes_locaux WHERE societes_id = ? AND societes_locaux_nom = ?", array($id_entreprise, $nom_local));
$count = $verificationSocietesLocaux->rowCount();

if ($count > 1) // Si le produit existe
{
    $alert = '1';

} else // Sinon on ajoute
{
    // Insertion du formulaire dans la BD

    $pdo->sql("UPDATE `societes_locaux` SET 
                `societes_id`='$id_entreprise',
                `societes_locaux_nom`='$nom_local',
                `societes_locaux_adresse`='$adresse_local',
                `societes_locaux_ville`='$ville_local',
                `societes_locaux_CP`='$CP_local',
                `societes_locaux_pays`='$pays_local',
                `societes_locaux_telephone`='$telephone_local',
                `societes_locaux_fax`='$fax_local',
                `societes_locaux_email`='$email_local',
                `societes_locaux_dateM`= NOW(),
                `societes_locaux_commentaire`='$commentaire_local' 
                WHERE `societes_locaux_id`='$id_local'");

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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Modification d'un local par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $nom_local , 'index.php?p=modules/locaux', '2', 'fa-building'));
}

echo json_encode(array('retour' => $alert));

?>
