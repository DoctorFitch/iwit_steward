<?php

require_once("../../../lib/config.php");

// Récupération des champs
$produit_id = $_POST['produits_id'];
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
@$photo_produit = $_FILES['photo_produit'];

$produitExistant = $pdo->sql("SELECT produits_id FROM produits WHERE produits_type = ? AND produits_nom = ?", array($type_produit, $nom_produit));
$count = $produitExistant->rowCount();
$url_photo = $pdo->sqlValue("SELECT produits_image FROM produits WHERE produits_id = ?", array($produit_id));

if ($count > 1) {
    $alert = 1;
} else {

    if(!empty($photo_produit)){
        $upload = $func->ajouter_fichier($photo_produit, array(
            "dossier" => 'produit',
            "nom" => false,
            "image" => true,
            "entite" => "Produit"
        ), true, 300, 300);

        if ($upload['retour']) {
            $retour_upload = true;
            $alert = 0;
        } else {
            $retour_upload = false;
            $alert = 2;
        }

        $insertLogiciel = $pdo->sql("UPDATE `produits` SET 
                            `produits_type`='$type_produit',
                            `produits_image`=?,
                            `produits_nom`='$nom_produit',
                            `produits_reference`='$reference_produit',
                            `produits_numeroSerie`='$serie_produit',
                            `produits_EAN`='$ean_produit',
                            `produits_poids`='$poids_produit',
                            `produits_prixAchatHT`='$prix_achat_produit',
                            `produits_prixPublicHT`='$prix_public_produit',
                            `produits_tauxTVA`='$tva_produit',
                            `produits_taxe`='$taxe_produit',
                            `produits_garantie`='$garantie_produit',
                            `produits_dateM`=NOW(),
                            `produits_commentaire`= ? WHERE `produits_id`='$produit_id'", array("./fichiers/produit/". $upload['nom'], $commentaire_produit));
    }

    $insertLogiciel = $pdo->sql("UPDATE `produits` SET 
                            `produits_type`='$type_produit',
                            `produits_nom`='$nom_produit',
                            `produits_reference`='$reference_produit',
                            `produits_numeroSerie`='$serie_produit',
                            `produits_EAN`='$ean_produit',
                            `produits_poids`='$poids_produit',
                            `produits_prixAchatHT`='$prix_achat_produit',
                            `produits_prixPublicHT`='$prix_public_produit',
                            `produits_tauxTVA`='$tva_produit',
                            `produits_taxe`='$taxe_produit',
                            `produits_garantie`='$garantie_produit',
                            `produits_dateM`=NOW(),
                            `produits_commentaire`= ? WHERE `produits_id`='$produit_id'", array($commentaire_produit));

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
                NOW())", array(ASSETS_URL . $_SESSION['utilisateur_photo'], "Modification d'un produit par " . $_SESSION['utilisateur_prenom'] . ' ' . $_SESSION['utilisateur_nom'] , $nom_produit , 'index.php?p=modules/materiel', '2', 'fa-cube'));
}
echo json_encode(array('retour' => $alert));

?>
