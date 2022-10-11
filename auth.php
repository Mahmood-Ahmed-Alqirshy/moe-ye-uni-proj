<?php
//condition will change
if (!isset($_SESSION["user"]) || $_SESSION["user"] !== "student") {
  header("location: http://localhost/moe-yemen/sign-in/");
  die();
}
