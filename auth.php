<?php

use function PHPSTORM_META\type;

if (!isset($name)) {
  
  if ($type !== "S") {
    header('location: http://localhost/sign-in/?location=' . $_SERVER['REQUEST_URI']);
    die();
  }
}
