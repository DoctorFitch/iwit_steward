<?php

include('../ajax/inc/init.php');
$func = new Functions();

$local_id = $_POST['poste_id_locaux'];
$select_poste = $pdo->sql("SELECT postes_id, postes_nom FROM postes WHERE postes_id_locaux = ?", array($local_id));

$poste_etc = '';
$poste_etc .= '<option value="" disabled selected>Selectionnez un/des utilisateur(s)</option>';
if (!empty($select_poste)) {
    foreach ($select_poste as $poste) {
        $poste_etc .= '<option value="' . $poste['postes_id'] . '">' . $poste['postes_nom'] . '</option>';
    }
}


echo json_encode(array('html' => $poste_etc));

?>