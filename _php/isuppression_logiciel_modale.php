<?php
include('../ajax/inc/init.php');
$func = new Functions();

$id = $_POST['id'];

$pdo->sql("DELETE FROM logiciels WHERE logiciels_id = ?", array($id));
?>