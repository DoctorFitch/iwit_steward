<?php

include('../ajax/inc/init.php');
$func = new Functions();

$poste_id = $_POST['poste_id'];
$utilisateur_id = $_POST['utilisateur_id'];

if (!empty($utilisateur_id)) {
    foreach ($utilisateur_id as $utilisateur) {

        $verificationUtilisateurs = $pdo->sql("SELECT utilisateurs_id FROM postes_utilisateurs WHERE postes_id = ? AND utilisateurs_id = ?", array($poste_id, $utilisateur));
        $count = $verificationUtilisateurs->rowCount();

        if ($count != 0) {
            $alert = '1';
        } else {
            $pdo->sql("INSERT INTO `postes_utilisateurs`(`postes_id`, `utilisateurs_id`) VALUES (?,?)", array($poste_id, $utilisateur));
            $alert = '0';
        }
    }
}

echo json_encode(array('retour' => $alert));

?>