<?php include("../userCheck.php") ?>
<?php include("../auth.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<?php $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost") ?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>حساب الطالب</title>

  <!-- Bootstrap core CSS -->
  <!-- <link href="../dist/css/bootstrap.rtl.min.css" rel="stylesheet" /> -->

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <?php echo '<link href="http://' . $serverIP . '/moe-yemen/news/blog.rtl.css" rel="stylesheet" />' ?>
</head>

<body>
  <?php include("../header.php") ?>
  <main class="container">
    <img src="1.jpg" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <?php
          if ($type === "S") {
            $sql = "select student_name as 'name', Nationalities.nationality as nationality, Sex.sex as sex, Schools.school_name as school, Grades.grade as grade, Directorates.directorate as residence, Governorates.governorate as governorate, date_of_birth as 'dateOfBirth', student_photo as studentPhoto from Students left join Nationalities on Students.nationality = Nationalities.ID left join Sex on Students.sex = Sex.ID left join Schools on Students.school = Schools.ID left join Grades on Students.grade = Grades.ID left join Directorates on Students.residence = Directorates.ID left join Governorates on Directorates.governorate = Governorates.ID where Students.ID = (select ID from Student_auth where session_id = ?);";
            $studentData = UsefullClass\Done::query($DB, $sql, UsefullClass\Done::getSession())[0];
            $studentPhoto = "http://" . $serverIP . "/moe-yemen/images/students-photos/$studentData->studentPhoto";
            echo <<< "student"
            <table class="table">
            <tr>
              <td colspan="2">
                <div class="mx-auto w-50 w-lg-25 bg-dark rounded" style="aspect-ratio: 1/1;">
                  <img src="$studentPhoto" alt="" class="w-100 h-100 rounded" style="object-fit: cover;">
                </div>
              </td>
            </tr>
            <tr>
              <td>الاسم</td>
              <td>$studentData->name</td>
            </tr>
            <tr>
              <td>الجنسية</td>
              <td>$studentData->nationality</td>
            </tr>
            <tr>
              <td>الجنس</td>
              <td>$studentData->sex</td>
            </tr>
            <tr>
              <td>المدرسة</td>
              <td>$studentData->school</td>
            </tr>
            <tr>
              <td>السنة الدراسية</td>
              <td>$studentData->grade</td>
            </tr>
            <tr>
              <td>الاقامة</td>
              <td>$studentData->governorate, $studentData->residence</td>
            </tr>
            <tr>
              <td>تاريخ الميلاد</td>
              <td>$studentData->dateOfBirth</td>
            </tr>
          </table>
          student;
          } else {
            $sql = "select employee_name as 'name', Job_types.job_type as 'job', Schools.school_name 'workplace', salary from Employees left join Job_types on Employees.job_type = Job_types.ID left join Schools on Employees.workplace = Schools.ID where Employees.ID = (select ID from Employee_auth where session_id = ?);";
            $emloyeeData = UsefullClass\Done::query($DB, $sql, UsefullClass\Done::getSession())[0];
            $employeeType = (($isAdmin) ? "مسؤول" : "موظف");
            echo <<< "employee"
            <table class="table">
              <tr>
                <td>الاسم</td>
                <td>$emloyeeData->name</td>
              </tr>
              <tr>
                <td>الوظيفة</td>
                <td>$emloyeeData->job</td>
              </tr>
              <tr>
                <td>المؤسسة</td>
                <td>$emloyeeData->workplace</td>
              </tr>
              <tr>
                <td>الراتب</td>
                <td>$emloyeeData->salary</td>
              </tr>
              <tr>
                <td>نوع الحساب</td>
                <td>$employeeType</td>
              </tr>
            </table>
            employee;
          }
          ?>
        </article>
      </div>

      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem">
          <?php include("../newsBox.php") ?>
        </div>
      </div>
  </main>

  <!-- footer -->
  <?php include("../footer.php") ?>
</body>

</html>