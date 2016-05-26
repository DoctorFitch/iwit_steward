<?php

include ('/inc/init.php');
$func = new Functions();

$logiciel_id = $_POST['logiciel_id'];
$logiciel_nom = $_POST['logiciel_nom'];
$logiciel_licence = $_POST['logiciel_licence'];
$logiciel_dureegarantie = $_POST['logiciel_dureegarantie'];
$logiciel_prix = $_POST['logiciel_prix'];
$logiciel_dureelicence = $_POST['logiciel_dureelicence'];
$logiciel_description = $_POST['logiciel_description'];

$pdo->sql("UPDATE `logiciels` SET
`logiciels_nom`='$logiciel_nom',
`logiciels_typeLicence`='$logiciel_licence',
`logiciels_garantie`='$logiciel_dureegarantie',
`logiciels_prix`='$logiciel_prix',
`logiciels_description`='$logiciel_description',
`logiciels_licence`='$logiciel_dureelicence',
`logiciels_dateM`=NOW() WHERE `logiciels_id`='$logiciel_id'");

$alert = 0 ;

echo json_encode(array('retour'=>$alert));

?>