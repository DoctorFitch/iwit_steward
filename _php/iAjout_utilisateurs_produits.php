<?php include('/inc/init.php');
$func = new Functions();

// POST
$utilisateurs_produits_id = $_POST['utilisateurs_produits_id'];
$type_produit = $_POST['type_produit'];
$produit = $_POST['produit'];
$licence = $_POST['licence'];
$date_installation = (!empty($_POST['date_installation'])) ? $func->dateUS($_POST['date_installation']) : NULL;
$adresse_messagerie = $_POST['adresse_messagerie'];
$login = $_POST['login'];
$password = $_POST['password'];
$url = $_POST['url'];
$adresse_ftp = $_POST['adresse_ftp'];
$login_ftp = $_POST['login_ftp'];
$pass_ftp = $_POST['pass_ftp'];
$adresse_bd = $_POST['adresse_bd'];
$login_bd = $_POST['login_bd'];
$pass_bd = $_POST['pass_bd'];
$motif_maintenance = $_POST['motif_maintenance'];
$date_maintenance = (!empty($_POST['date_maintenance'])) ? $func->dateUS($_POST['date_maintenance']) : NULL;
$maintenance_debut = $_POST['maintenance_debut'];
$maintenance_fin = $_POST['maintenance_fin'];
$commentaire = $_POST['commentaire'];
$heureDebut = $date_maintenance . ' ' . $maintenance_debut;
$heureFin = $date_maintenance . ' ' . $maintenance_fin;
$href = "http://localhost/www/iwit_infra/#ajax/modification_utilisateur.php?id=" . $utilisateurs_produits_id;


$verificationProduits = $pdo->sql("SELECT produits_id FROM utilisateurs_produits WHERE utilisateurs_id = ? AND produits_id = ?", array($utilisateurs_produits_id, $produit));
$utilisateur = $pdo->sqlRow("SELECT * FROM utilisateurs WHERE utilisateurs_id = ? ", array($utilisateurs_produits_id));
$nomProduit = $pdo->sqlRow("SELECT * FROM produits WHERE produits_id = ? ", array($produit));
$count = $verificationProduits->rowCount();

if ($count != 0) { // Si le produit existe
    $alert = '1';
} else {

    if($type_produit = $_POST['type_produit'] == 5 || $type_produit = $_POST['type_produit'] == 6) // dans le cas d'une maintenance web ou applicative
    {
        $date_installation = $date_maintenance;
    }
    $pdo->sql("INSERT INTO `utilisateurs_produits`
                (`utilisateurs_produits_id`, 
                `utilisateurs_id`, 
                `produits_id`, 
                `utilisateurs_produits_numLicence`, 
                `utilisateurs_produits_login`, 
                `utilisateurs_produits_password`, 
                `utilisateurs_produits_dateInstallation`, 
                `utilisateurs_produits_URL`, 
                `utilisateurs_produits_adresseMessagerie`, 
                `utilisateurs_hebergement_adresseFTP`, 
                `utilisateurs_hebergement_loginFTP`, 
                `utilisateurs_hebergement_passFTP`, 
                `utilisateurs_hebergement_adresseBD`, 
                `utilisateurs_hebergement_loginBD`, 
                `utilisateurs_hebergement_passBD`, 
                `utilisateurs_maintenance_motif`, 
                `utilisateurs_maintenance_heureDebut`, 
                `utilisateurs_maintenance_heureFin`, 
                `utilisateurs_produits_commentaire`) 
                VALUES (
                NULL,
                '$utilisateurs_produits_id',
                '$produit',
                '$licence',
                '$login',
                '$password',
                ?,
                '$url',
                '$adresse_messagerie',
                '$adresse_ftp',
                '$login_ftp',
                '$pass_ftp',
                '$adresse_bd',
                '$login_bd',
                '$pass_bd',
                '$motif_maintenance',
                ?,
                ?,
                '$commentaire')", array($date_installation, $heureDebut, $heureFin));

    $pdo->sql("INSERT INTO `historiques`
                (`historiques_id`, 
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
                '$href',
                '24',
                NOW())",
        array
        (
            "Ajout d'un produit à un utilisateur",
            "Ajout de " . $nomProduit['produits_nom'] . "pour " .$utilisateur['utilisateurs_prenom'] . ' ' . $utilisateur['utilisateurs_nom']
        )
    );

    $alert = 0;
}
echo json_encode(array('retour' => $alert));


?>