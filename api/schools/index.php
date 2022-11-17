<?php
include('../headers.php');

$DB = new PDO('mysql:host=localhost;dbname=moe', 'root', '1234');
$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$sql = "select Schools.ID as ID, school_name as 'name', Directorates.directorate as directorate, Governorates.governorate as governorate, Nationalities.nationality as nationality, Genders.gender as gender, School_types.school_type as 'schoolType', e_mail as eMail, address, phone, google_map as googleMap, primary_school as 'primary', middle_school as middle, secondary_school as 'secondary' from Schools left join Directorates on Schools.directorate = Directorates.ID left join Governorates on Directorates.governorate = Governorates.ID left join Nationalities on Schools.nationality = Nationalities.ID left join Genders on Schools.gender = Genders.ID left join School_types on Schools.school_type = School_types.ID;";
$schools = $DB->prepare($sql);
$schools->execute();
$data = $schools->fetchAll();
$data = json_encode($data);
echo $data;
