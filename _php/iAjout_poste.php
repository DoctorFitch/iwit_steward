<?php

include('/inc/init.php');
$func = new Functions();

// Récupération des champs

// description logiciel
$poste_nom = $_POST['poste_nom'];
$societes_locaux = $_POST['societes_locaux'];
$poste_statut = $_POST['poste_statut'];
$poste_dateAchat = $func->dateUS($_POST['poste_dateAchat']);
$poste_dateMiseEnService = $func->dateUS($_POST['poste_dateMiseEnService']);
$poste_description = $_POST['poste_description'];
$utilisateur_id = $_POST['utilisateur_id'];


// On verifie que le produit n'existe déjà pas dans la table (par le nom)
$verificationPoste = $pdo->sql("SELECT postes_id FROM postes WHERE postes_nom = '$poste_nom'");
$count = $verificationPoste->rowCount();
if ($count != 0) { // Si le produit existe
    $alert = '1';
} else { // Sinon on ajoute
    foreach ($utilisateur_id as $utilisateur) {

        $poste = $pdo->sql("INSERT INTO `postes`(`postes_id`, `postes_id_locaux`, `postes_nom`, `postes_statut`, `postes_utilisateur`, `postes_dateAchat`, 
`postes_dateMiseEnService`, `postes_description`, `postes_dateC`, `postes_dateM`) VALUES (?,?,?,?,?,?,?,?,?,?)", array(
            'NULL',
            $societes_locaux,
            $poste_nom,
            $poste_statut,
            $utilisateur,
            $poste_dateAchat,
            $poste_dateMiseEnService,
            $poste_description,
            'NOW()',
            'NULL'
        ));
    }

    $alert = '0';
}
echo json_encode(array('alert' => $alert));


?>