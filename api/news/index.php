<?php
include('../headers.php');

$DB = new PDO('mysql:host=localhost;dbname=moe', 'root', '1234');
$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$sql = "SELECT ID as id, title, post_date as postDate, cover FROM news ORDER BY post_date;";
$schools = $DB->prepare($sql);
$schools->execute();
$data = $schools->fetchAll();
$data = json_encode($data);
echo $data;
