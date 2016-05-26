<?php require_once("../inc/init.php");


$func = new Functions();
$retour = 0;



$tableauCheckBox = $_POST["check_delete"];

if (!empty($tableauCheckBox)){
    foreach($tableauCheckBox as $value){
        $pdo->sql("DELETE FROM logiciels WHERE logiciels_id = ?", $value);
    }
} else {
    $retour = 1;
}


echo json_encode(array('retour' => $retour));


?>