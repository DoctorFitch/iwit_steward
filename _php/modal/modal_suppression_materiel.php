<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$pdo->sql("DELETE FROM materiels WHERE materiels_id = ?", array($id));

?>