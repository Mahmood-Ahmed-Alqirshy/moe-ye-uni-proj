<?php
header("Content-Type: application/json; charset=UTF-8");

$DB = new PDO('mysql:host=localhost;dbname=moe', 'root', '1234');
$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$sql = "(select username from Employee_auth) union (select username from Student_auth);";
$schools = $DB->prepare($sql);
$schools->execute();
$data = $schools->fetchAll();
$usernames = [];
for ($i = 0; $i < count($data); $i++) {
  $usernames[] = $data[$i]->username;
}
echo json_encode($usernames);
