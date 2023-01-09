<?php
include('../headers.php');
$DB = new PDO('mysql:host=localhost;dbname=moe', 'root', '1234');
$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents("php://input"));
  if ($data->status === "accepted") {
    $sql = "update Students_request_to_register set request_status = 2 where ID = ?;";
    $statement = $DB->prepare($sql);
    $statement->execute([$data->data->id]);
    $sql = "INSERT INTO students (student_name, nationality, sex, school, birth_certificate, grade, residence, date_of_birth, address, student_photo, e_mail, phone) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
    $statement = $DB->prepare($sql);
    $statement->execute([$data->data->name, $data->data->nationality, $data->data->sex, $data->data->school, $data->data->birthCertificate, $data->data->grade, $data->data->residence, $data->data->dateOfBirth, $data->data->address, $data->data->studentPhoto, $data->data->eMail, $data->data->phone]);
    //e-mail
    $myfile = fopen("mail.txt", "w");

    $link = "http://localhost/requests/sign-up/?key=" . md5($DB->lastInsertId());
    fwrite($myfile, $link);
    fclose($myfile);
  } else {
    $sql = "update Students_request_to_register set request_status = 3 where ID = ?;";
    $statement = $DB->prepare($sql);
    $statement->execute([$data->id]);
    $sql = "insert into Rejects(request_id, rejection_type, massage) value (?, 1, ?);";
    $statement = $DB->prepare($sql);
    $statement->execute([$data->id, $data->massage]);
  }
} else {
  $sql = "select Students_request_to_register.ID as id, student_name as 'name', Students_request_to_register.nationality as nationality, Nationalities.nationality as nationalityName, Students_request_to_register.sex as sex, Sex.sex as sexName, Students_request_to_register.school as school, Schools.school_name as schoolName, birth_certificate as birthCertificate, Students_request_to_register.grade as grade, Grades.grade as gradeName, Students_request_to_register.residence as residence, concat( Directorates.directorate,', ' ,Governorates.governorate) as residenceName, Students_request_to_register.date_of_birth as dateOfBirth, Students_request_to_register.address, student_photo as studentPhoto, Students_request_to_register.e_mail as eMail, Students_request_to_register.phone from Students_request_to_register left join Nationalities on Students_request_to_register.nationality = Nationalities.ID left join Sex on Students_request_to_register.sex = Sex.ID left join Schools on Students_request_to_register.school = Schools.ID left join Grades on Students_request_to_register.grade = Grades.ID left join Directorates on Students_request_to_register.residence = Directorates.ID left join Governorates on Directorates.governorate = Governorates.ID where request_status = 1;";
  $schools = $DB->prepare($sql);
  $schools->execute();
  $data = $schools->fetchAll();
  $data = json_encode($data);
  echo $data;
}
