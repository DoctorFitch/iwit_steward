<?php

include('../ajax/inc/init.php');
$func = new Functions();

$projet_id = $_POST['projet_selection'];
$select_projets_modules = $pdo->sql("select projets_modules_id, projets_modules_nom from projets_modules WHERE projets_id = ? GROUP BY projets_modules_nom", array($projet_id));

$projets_modules_etc = '';
$projets_modules_etc .= '<option value="" disabled selected>Choisir un module</option>';
if (!empty($select_projets_modules)) {
    foreach ($select_projets_modules as $projet_modules) {
        $projets_modules_etc .= '<option value="' . $projet_modules['projets_modules_id'] . '">' . $projet_modules['projets_modules_nom'] . '</option>';
    }
}

echo json_encode(array('html' => $projets_modules_etc));

?>