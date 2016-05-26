<?php

include ('/inc/init.php');
$func = new Functions();

$logiciel_nom = $_POST['logiciel_nom'];
$logiciel_licence = $_POST['logiciel_licence'];
$logiciel_dureegarantie = $_POST['logiciel_dureegarantie'];
$logiciel_prix = $_POST['logiciel_prix'];
$logiciel_dureelicence = $_POST['logiciel_licence'];
$logiciel_description = $_POST['logiciel_description'];

$pdo->sql("INSERT INTO `logiciels`
(`logiciels_id`, `logiciels_nom`, `logiciels_typeLicence`, `logiciels_garantie`, 
`logiciels_prix`, `logiciels_description`, `logiciels_licence`, `logiciels_dateC`, `logiciels_dateM`) 
VALUES (NULL,'$logiciel_nom','$logiciel_licence','$logiciel_dureegarantie',
'$logiciel_prix','$logiciel_description','$logiciel_dureelicence',NOW(),'')");

$alert = 0 ;

echo json_encode(array('retour'=>$alert));



?>