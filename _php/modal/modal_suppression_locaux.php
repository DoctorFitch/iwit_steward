<?php require_once("../inc/init.php");


$func = new Functions();
$retour = 0;

$tableauCheckBox = $_POST["check_delete"];

if (!empty($tableauCheckBox)){
    foreach($tableauCheckBox as $value){
        $pdo->sql("DELETE FROM societes_locaux WHERE societes_locaux_id = ?", $value);

    }
} else {
    $retour = 1;
}


echo json_encode(array('retour' => $retour));


?>