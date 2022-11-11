<?php
session_start();
$_SESSION['session_id'] = null;
setcookie('session_id', $_SESSION['session_id'], time() - 3600 * 24 * 365, '/');
$serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost");
header("location: http://" . $serverIP . "/moe-yemen/home/");
die();
