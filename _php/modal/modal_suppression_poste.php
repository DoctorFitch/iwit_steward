<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$pdo->sql("DELETE FROM postes WHERE postes_id = ?", array($id));

?>