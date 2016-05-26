<?php

include('../ajax/inc/init.php');
$id_projet = $_POST['projet_id'];
$func = new Functions();

$select_utilisateurs = $pdo->sql("SELECT iwit_utilisateur_id, iwit_utilisateur_nomComplet FROM iwit_utilisateurs");
$utilisateur_etc = '';
$utilisateur_etc .= '<option value="" disabled selected>Veuillez sélectionner un utilisateur</option>';
if (!empty($select_utilisateurs)) {
    foreach ($select_utilisateurs as $utilisateurs) {
        $test = [];
        $select_projet_modules_iwit_utilisateurs = $pdo->sqlArray("SELECT iwit_utilisateur_id
                                                                 FROM projets_modules_iwit_utilisateurs, iwit_utilisateurs
                                                                 WHERE projets_modules_iwit_utilisateurs.iwit_utilisateurs_id = iwit_utilisateurs.iwit_utilisateur_id
                                                                 AND projets_modules_iwit_utilisateurs.projets_modules_id = ?", array($id_projet));
        foreach ($select_projet_modules_iwit_utilisateurs as $projet_modules_iwit_utilisateur) {
            $test[] = $projet_modules_iwit_utilisateur['iwit_utilisateur_id'];
        }
        $selected = (in_array($utilisateurs['iwit_utilisateur_id'], $test)) ? 'selected' : '';
        $utilisateur_etc .= '<option ' . $selected . ' value="' . $utilisateurs['iwit_utilisateur_id'] . '">' . $utilisateurs['iwit_utilisateur_nomComplet'] . '</option>';
    }
}

echo json_encode(array('html' => $utilisateur_etc));

?>
