<?php

include ('../ajax/inc/init.php');


$ligne_id = $_POST['ligne_id'];
$table_id = $_POST['table_id'];
$valeur_champs = $_POST['valeur'];

switch($table_id){
    case 'logiciels_nom' :
        $verificationLogiciel = $pdo->sql("SELECT logiciels_id FROM logiciels WHERE logiciels_nom = ?", array($valeur_champs));
        $count = $verificationLogiciel->rowCount();
        if($count != 0) // Si le produit existe
        {
            $alert = '1';
            echo json_encode(array('retour'=>$alert));
        }
        else
        {
            $pdo->sql("UPDATE logiciels SET logiciels_nom = ? WHERE logiciels_id = ?", array($valeur_champs, $ligne_id));
            $pdo->sql("UPDATE logiciels SET logiciels_dateM = NOW() WHERE logiciels_id = ?", array($ligne_id));
            $alert = '0';
            echo json_encode(array('retour'=>$alert));
        }

        break;
    case 'logiciels_typeLicence' :
        $verificationLicence = $pdo->sql("SELECT * FROM type_licences");
        $count = $verificationLicence->rowCount();
        if($valeur_champs < 1 || $valeur_champs > $count)
        {
            $alert = '1';
            echo json_encode(array('retour'=>$alert));
        }
        else
        {
            $pdo->sql("UPDATE logiciels SET logiciels_typeLicence = ? WHERE logiciels_id = ?", array($valeur_champs, $ligne_id));
            $pdo->sql("UPDATE logiciels SET logiciels_dateM = NOW() WHERE logiciels_id = ?", array($ligne_id));

            $alert = '0';
            echo json_encode(array('retour'=>$alert));
            break;
        }
    case 'logiciels_garantie' :
        $pdo->sql("UPDATE logiciels SET logiciels_garantie = ? WHERE logiciels_id = ?", array($valeur_champs, $ligne_id));
        $pdo->sql("UPDATE logiciels SET logiciels_dateM = NOW() WHERE logiciels_id = ?", array($ligne_id));
        break;
    case 'logiciels_prix' :
        $pdo->sql("UPDATE logiciels SET logiciels_prix = ? WHERE logiciels_id = ?", array($valeur_champs, $ligne_id));
        $pdo->sql("UPDATE logiciels SET logiciels_dateM = NOW() WHERE logiciels_id = ?", array($ligne_id));
        break;
    case 'logiciels_description' :
        $pdo->sql("UPDATE logiciels SET logiciels_description = ? WHERE logiciels_id = ?", array($valeur_champs, $ligne_id));
        $pdo->sql("UPDATE logiciels SET logiciels_dateM = NOW() WHERE logiciels_id = ?", array($ligne_id));
        break;
    case 'logiciels_dateMiseEnService' :
        $pdo->sql("UPDATE logiciels SET logiciels_dateMiseEnService = ? WHERE logiciels_id = ?", array($valeur_champs, $ligne_id));
        $pdo->sql("UPDATE logiciels SET logiciels_dateM = NOW() WHERE logiciels_id = ?", array($ligne_id));
        break;
    case 'logiciels_dateEcheance' :
        $pdo->sql("UPDATE logiciels SET logiciels_dateEcheance = ? WHERE logiciels_id = ?", array($valeur_champs, $ligne_id));
        $pdo->sql("UPDATE logiciels SET logiciels_dateM = NOW() WHERE logiciels_id = ?", array($ligne_id));
        break;
    case 'logiciels_dateC' :
        $pdo->sql("UPDATE logiciels SET logiciels_dateC = ? WHERE logiciels_id = ?", array($valeur_champs, $ligne_id));
        break;
}



?>