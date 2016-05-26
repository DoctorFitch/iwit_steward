<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$pdo->sql("DELETE FROM projets_modules WHERE projets_modules_id = ?", array($id));
$pdo->sql("DELETE FROM projets_modules_iwit_utilisateurs WHERE projets_modules_id = ?", array($id));

?>