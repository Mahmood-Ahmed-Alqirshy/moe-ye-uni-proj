<?php

require 'UsefullClass.php';
// to get the IP for device on local network
$serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost");
session_start();
$DB = new PDO('mysql:host=localhost;dbname=moe', 'root', '1234');
$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
function fetchUserData()
{
  $sql = "select `name`, `type`, isAdmin from ((SELECT students.student_name as 'name' , 0 as 'isAdmin', 'S' as 'type' , session_id FROM student_auth JOIN students on student_auth.ID = students.ID) union (SELECT employees.employee_name as 'name', employee_auth.is_admin  as 'isAdmin', 'E' as 'type', session_id FROM employee_auth JOIN employees on employee_auth.ID = employees.ID)) as users where session_id = ?;";
  $nameQuery = $GLOBALS['DB']->prepare($sql);
  $nameQuery->execute([UsefullClass\Done::getSession()]);
  return $nameQuery->fetch();
}

if (!isset($_SESSION['session_id']) && (count($_COOKIE) > 0 && isset($_COOKIE['session_id']))) {
  $_SESSION['session_id'] = $_COOKIE['session_id'];
}
if (isset($_SESSION['session_id'])) {
  $userData = fetchUserData();
  $name = explode(' ', $userData->name)[0];
  $isAdmin = $userData->isAdmin;
  $type = $userData->type;
}
