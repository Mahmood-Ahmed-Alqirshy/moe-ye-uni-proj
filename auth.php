<?php
if (!isset($name)) {
  $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost");
  header('location: http://' . $serverIP . '/moe-yemen/sign-in/?location=' . $_SERVER['REQUEST_URI']);
  die();
}
