<?php

require_once("../../../lib/config.php");

$select_utilisateurs = $pdo->sql("SELECT iwit_utilisateur_id, iwit_utilisateur_nomComplet FROM iwit_utilisateurs GROUP BY iwit_utilisateur_nomComplet");

$utilisateur_etc = '';
$utilisateur_etc .= '<option value="" disabled selected>Veuillez sélectionner un utilisateur</option>';
if (!empty($select_utilisateurs)) {
    foreach ($select_utilisateurs as $utilisateurs) {
        $utilisateur_etc .= '<option value="' . $utilisateurs['iwit_utilisateur_id'] . '">' . $utilisateurs['iwit_utilisateur_nomComplet'] . '</option>';
    }
}


echo json_encode(array('html' => $utilisateur_etc));

?>