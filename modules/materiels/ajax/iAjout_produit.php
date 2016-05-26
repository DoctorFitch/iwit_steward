<?php require_once("../../../lib/config.php");

$nom_produit = $_POST['nom_produit'];
$type_produit = $_POST['type_produit'];
$reference_produit = $_POST['reference_produit'];
$serie_produit = $_POST['serie_produit'];
$ean_produit = $_POST['ean_produit'];
$poids_produit = $_POST['poids_produit'];
$prix_achat_produit = $_POST['prix_achat_produit'];
$prix_public_produit = $_POST['prix_public_produit'];
$tva_produit = $_POST['tva_produit'];
$taxe_produit = $_POST['taxe_produit'];
$garantie_produit = $_POST['garantie_produit'];
$commentaire_produit = $_POST['commentaire_produit'];
$photo_produit = $_FILES['photo_produit'];

$produitExistant = $pdo->sql("SELECT produits_id FROM produits WHERE produits_type = ? AND produits_nom = ?", array($type_produit, $nom_produit));
$count = $produitExistant->rowCount();

if ($count != 0) {
    $alert = 1;
} else {

    $upload = $func->ajouter_fichier($photo_produit, array(
        "dossier" => 'produit',
        "nom" => false,
        "image" => true,
        "entite" => "Produit"
    ), true, 500, 500);

    if ($upload['retour']) {
        $retour_upload = true;
        $alert = 0;
    } else {
        $retour_upload = false;
        $alert = 2;
    }


    $pdo->sql("INSERT INTO `produits`(
                `produits_id`, 
                `produits_type`, 
                `produits_image`, 
                `produits_nom`, 
                `produits_reference`, 
                `produits_numeroSerie`, 
                `produits_EAN`, 
                `produits_poids`, 
                `produits_prixAchatHT`, 
                `produits_prixPublicHT`, 
                `produits_tauxTVA`, 
                `produits_taxe`, 
                `produits_garantie`, 
                `produits_dateC`, 
                `produits_dateM`, 
                `produits_commentaire`) 
                VALUES (
                NULL,
                '$type_produit',
                ?,
                '$nom_produit',
                '$reference_produit',
                '$serie_produit',
                '$ean_produit',
                '$poids_produit',
                '$prix_achat_produit',
                '$prix_public_produit',
                '$tva_produit',
                '$taxe_produit',
                '$garantie_produit',
                NOW(),
                NULL,
                '$commentaire_produit')", array("./fichiers/produit/". $upload['nom']));

    switch ($type_produit){
        case 1:
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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Ajout d'un logiciel par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $nom_produit , 'index.php?p=modules/materiel', '1', 'fa-cube'));
            break;

        case 2:
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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "\"Ajout de materiel par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $nom_produit , 'index.php?p=modules/materiel', '1', 'fa-cube'));
            break;

        case 3:
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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Ajout d'une application par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $nom_produit , 'index.php?p=modules/materiel', '1', 'fa-cube'));
            break;

        case 4:
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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Ajout d'un site web par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $nom_produit , 'index.php?p=modules/materiel', '1', 'fa-cube'));
            break;

        case 5:
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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Ajout d'une maintenance web " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $nom_produit , 'index.php?p=modules/materiel', '1', 'fa-cube'));
            break;

        case 6:
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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Ajout d'une maintenance d'application par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $nom_produit , 'index.php?p=modules/materiel', '1', 'fa-cube'));
            break;

        case 7:
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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Ajout d'un hébérgement par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $nom_produit , 'index.php?p=modules/materiel', '1', 'fa-cube'));
            break;

        case 8:
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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Ajout d'une messagerie par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $nom_produit , 'index.php?p=modules/materiel', '1', 'fa-cube'));
            break;
    }
}

echo json_encode(array("retour" => $alert));

?>