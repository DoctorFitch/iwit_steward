<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$pdo->sql("DELETE FROM logiciels WHERE logiciels_id = ?", array($id));

?>