<?php

include('../ajax/inc/init.php');
$func = new Functions();

$societes_id = $_POST['select_entreprise'];
$select_societes_locaux = $pdo->sql("SELECT societes_locaux_id, societes_locaux_nom FROM societes_locaux WHERE societes_id = ?", array($societes_id));

$i = 0;
$societes_etc = '';
$societes_etc .= '<option value="" disabled selected>Selectionnez un élement</option>';
if (!empty($select_societes_locaux)) {
    foreach ($select_societes_locaux as $societes_locaux) {
        $societes_etc .= '<option value="' . $societes_locaux['societes_locaux_id'] . '">' . $societes_locaux['societes_locaux_nom'] . '</option>';
    }
}

echo json_encode(array('html' => $societes_etc));

?>