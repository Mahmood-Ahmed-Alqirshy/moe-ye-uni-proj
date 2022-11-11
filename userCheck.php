<?php
session_start();

$DB = new PDO('mysql:host=localhost;dbname=moe', 'root', '1234');
$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
function fetchName($session_id)
{
  $nameQuery = $GLOBALS['DB']->prepare("select student_name as 'Name' from Student_auth join Students on Student_auth.ID = Students.ID where session_id = ?;");
  $nameQuery->execute([$session_id]);
  return explode(' ', $nameQuery->fetch()->Name)[0];
}
if (isset($_SESSION['session_id'])) {
  $name = fetchName($_SESSION['session_id']);
} else if (count($_COOKIE) > 0 && isset($_COOKIE['session_id'])) {
  $_SESSION['session_id'] = $_COOKIE['session_id'];
  $name = fetchName($_COOKIE['session_id']);
}
