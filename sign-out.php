<?php
session_start();
$_SESSION['session_id'] = null;
setcookie('session_id', $_SESSION['session_id'], time() - 3600 * 24 * 365, '/');

header("location: http://localhost/home/");
die();
