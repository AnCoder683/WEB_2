<?php
include 'session.php';
$ss = new Session();

$ss :: delete('username');

$ss :: destroy();

header("Location: ../Login.php");
exit();
?>