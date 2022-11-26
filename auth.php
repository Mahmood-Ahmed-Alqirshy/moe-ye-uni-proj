<?php

use function PHPSTORM_META\type;

if (!isset($name)) {
  $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost");
  if ($type !== "S") {
    header('location: http://' . $serverIP . '/moe-yemen/sign-in/?location=' . $_SERVER['REQUEST_URI']);
    die();
  }
}
