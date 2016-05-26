<?php

include('/inc/init.php');
$func = new Functions();

// Récupération des champs

// description logiciel
$nom_societe = $_POST['nom_societe'];
$statut_juridique = $_POST['statut_juridique'];
$type_contrat = $_POST['type_contrat'];
$adresse_societe = $_POST['adresse_societe'];
$ville_societe = $_POST['ville_societe'];
$code_postal_societe = $_POST['code_postal_societe'];
$pays_societe = $_POST['pays_societe'];
$telephone_societe = $_POST['telephone_societe'];
$fax_societe = $_POST['fax_societe'];
$email_societe = $_POST['email_societe'];
$rcs = $_POST['rcs'];
$tva = $_POST['tva'];
$nom_contact = $_POST['nom_contact'];
$prenom_contact = $_POST['prenom_contact'];
$date_naissance = $func->dateUS($_POST['date_naissance']);
$lieu_naissance = $_POST['lieu_naissance'];
$email_contact = $_POST['email_contact'];
$commentaire_societe = $_POST['commentaire_societe'];

// On verifie que le produit n'existe déjà pas dans la table (par le nom)
$verificationSociete = $pdo->sql("SELECT societes_id FROM societes WHERE societes_nom = '$nom_societe'");
$count = $verificationSociete->rowCount();
if ($count != 0) {
    $alert = '1';
} else {

    $nouvelleSociete = $pdo->sql("INSERT INTO `societes`
                                (`societes_id`, 
                                `societes_typeC`, 
                                `societes_statutJuridique`,
                                `societes_nom`, 
                                `societes_adresse`, 
                                `societes_ville`, 
                                `societes_CP`, 
                                `societes_pays`,
                                `societes_telephone`, 
                                `societes_fax`, 
                                `societes_email`, 
                                `societes_rcs`, 
                                `societes_tva`, 
                                `societes_contact_nom`, 
                                `societes_contact_prenom`, 
                                `societes_contact_dateNaissance`, 
                                `societes_contact_lieuNaissance`, 
                                `societes_contact_email`, 
                                `societes_dateC`, 
                                `societes_dateM`, 
                                `societes_commentaire`) 
                                VALUES (
                                NULL,
                                '$type_contrat',
                                '$statut_juridique',
                                '$nom_societe',
                                '$adresse_societe',
                                '$ville_societe',
                                '$code_postal_societe',
                                '$pays_societe',
                                '$telephone_societe',
                                '$fax_societe',
                                '$email_societe',
                                '$rcs',
                                '$tva',
                                '$nom_contact',
                                '$prenom_contact',
                                '$date_naissance',
                                '$lieu_naissance',
                                '$email_contact',
                                NOW(),
                                NULL,
                                '$commentaire_societe')");

    $idSociete = $pdo->lastInsertId();

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
                '3',
                NOW())", array("Ajout d'une société", ($nom_societe), '#ajax/locaux.php'));



    $rangSociete = $pdo->sqlRow("SELECT * FROM societes WHERE societes_id = ?", array($idSociete));


    $siege_social = $pdo->sql("INSERT INTO `societes_locaux`
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
                                ?,
                                'Siège social',
                                ?,
                                ?,
                                ?,
                                ?,
                                ?,
                                ?,
                                ?,
                                NOW(),
                                NULL,
                                'Local permettant la création des utilisateurs stock et societes')",
                                array
                                (
                                $idSociete,
                                $rangSociete['societes_adresse'],
                                $rangSociete['societes_ville'],
                                $rangSociete['societes_CP'],
                                $rangSociete['societes_pays'],
                                $rangSociete['societes_telephone'],
                                $rangSociete['societes_fax'],
                                $rangSociete['societes_email']
                                ));

    $id_siegeSocial = $pdo->lastInsertId($siege_social);

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
                '5',
                NOW())", array("Ajout d'un local", "Siège social", '#ajax/locaux.php'));
    

    $utilisateurStock = $pdo->sql("INSERT INTO `utilisateurs`
                                    (`utilisateurs_id`, 
                                    `societes_locaux_id`, 
                                    `utilisateurs_fonction`, 
                                    `utilisateurs_nom`, 
                                    `utilisateurs_prenom`, 
                                    `utilisateurs_telephoneF`, 
                                    `utilisateurs_telephoneM`, 
                                    `utilisateurs_email`, 
                                    `utilisateurs_etat`, 
                                    `utilisateurs_service`, 
                                    `utilisateurs_dateEntree`, 
                                    `utilisateurs_dateSortie`, 
                                    `utilisateurs_dateC`, 
                                    `utilisateurs_dateM`, 
                                    `utilisateurs_commentaire`) 
                                    VALUES (
                                    NULL,
                                    '$id_siegeSocial',
                                    'Stock',
                                    '$nom_societe',
                                    'stock',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    NOW(),
                                    NULL,
                                    'Utilisateur permettant la gestion des stocks')");

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
                NOW())", array("Ajout d'un utilisateur", ($nom_societe . ' ' . 'stock'), '#ajax/locaux.php'));

    $utilisateurSociete = $pdo->sql("INSERT INTO `utilisateurs`
                                    (`utilisateurs_id`, 
                                    `societes_locaux_id`, 
                                    `utilisateurs_fonction`, 
                                    `utilisateurs_nom`, 
                                    `utilisateurs_prenom`, 
                                    `utilisateurs_telephoneF`, 
                                    `utilisateurs_telephoneM`, 
                                    `utilisateurs_email`, 
                                    `utilisateurs_etat`, 
                                    `utilisateurs_service`, 
                                    `utilisateurs_dateEntree`, 
                                    `utilisateurs_dateSortie`, 
                                    `utilisateurs_dateC`, 
                                    `utilisateurs_dateM`, 
                                    `utilisateurs_commentaire`) 
                                    VALUES (
                                    NULL,
                                    '$id_siegeSocial',
                                    'Societe',
                                    '$nom_societe',
                                    'societe',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    '',
                                    NOW(),
                                    NULL,
                                    'Utilisateur permettant la gestion de la societe')");

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
                NOW())", array("Ajout d'un utilisateur", ($nom_societe . ' ' . 'societe'), '#ajax/locaux.php'));

    $alert = '0';
}

echo json_encode(array('retour' => $alert));


?>