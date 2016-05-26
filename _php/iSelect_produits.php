<?php

include('../ajax/inc/init.php');
$func = new Functions();

$societes_id = $_POST['type_produit'];
$select_produits = $pdo->sql("SELECT produits_id, produits_nom FROM produits WHERE produits_type = ?", array($societes_id));

$produit_etc = '';
$produit_etc .= '<option value="" disabled selected>Selectionnez un produit</option>';
if (!empty($select_produits)) {
    foreach ($select_produits as $produit) {
        $produit_etc .= '<option value="' . $produit['produits_id'] . '">' . $produit['produits_nom'] . '</option>';
    }
}

echo json_encode(array('html' => $produit_etc));

?>