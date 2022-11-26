<?php
$serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost");
header("location: http://$serverIP/moe-yemen/notFound.php");
die();
