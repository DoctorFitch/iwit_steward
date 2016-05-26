<?php require_once("../../../lib/config.php");

$id = $_POST['id'];

$pdo->sql("DELETE FROM maintenances WHERE maintenances_id = ?", array($id));

?>