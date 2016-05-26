<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$pdo->sql("DELETE FROM societes WHERE societes_id = ?", array($id));

?>