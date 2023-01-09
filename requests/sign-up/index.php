<?php

if (!isset($_GET['key'])) {
  header("location: http://localhost/home/");
  die();
}
$DB = new PDO('mysql:host=localhost;dbname=moe', 'root', '1234');
$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$isInDB = $DB->prepare("select md5(ID) from Student_auth where md5(ID) = ?;");
$isInDB->execute([$_GET['key']]);
if ($isInDB->fetch()) {
  header("location: http://localhost/home/");
  die();
}
$validUser = true;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sql = "(select username from Employee_auth) union (select username from Student_auth);";
  $schools = $DB->prepare($sql);
  $schools->execute();
  $data = $schools->fetchAll();
  $usernames = [];
  for ($i = 0; $i < count($data); $i++) {
    $usernames[] = $data[$i]->username;
  }
  if (in_array(trim($_POST['username']), $usernames) || strlen(trim($_POST['username'])) === 0 || strlen(trim($_POST['password'])) < 6 || $_POST['password'] !== $_POST['repassword']) {
    $validUser = false;
  }
  if ($validUser) {
    $sql = "insert into Student_auth(ID,username,user_password,session_id) values((select ID from Students where md5(ID) = ?), ?, md5(?), uuid());";
    $statement = $DB->prepare($sql);
    $statement->execute([$_GET['key'], trim($_POST['username']), trim($_POST['password'])]);
    header("location: http://localhost/sign-in/");
    die();
  }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>تسجيل حساب</title>

  <link href="http://localhost/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />

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
  <link href="signin.css" rel="stylesheet" />
</head>


<body class="text-center">
  <?php include("../../header.php"); ?>

  <div class="body">
    <main class="form-signin">
      <form method="POST" action="">
        <img class="mb-4" src="http://localhost/logo.png" alt="" width="128" height="128" />
        <h1 class="h3 mb-3 fw-normal">تسجيل حساب</h1>
        <?php
        if (!$validUser) {
          echo '<h2 class="text-danger">خطأ في البيانات ربما الاسم ماخوذ او كلمة المرور ضعيفة </h2>';
        }
        ?>
        <div class="form-floating has-validation">
          <input type="text" class="form-control" id="username" required name="username" placeholder="اسم المستخدم" />
          <label for="username">اسم المستخدم</label>
          <div id="username" class="invalid-feedback">
            اسم المستخدم مأخوذ
          </div>
        </div>
        <br>
        <div class="form-floating has-validation">
          <input type="password" class="form-control" id="password" required name="password" placeholder="كلمة المرور" />
          <label for="password">كلمة المرور</label>
          <div id="password" class="invalid-feedback">
            كلمة المرور يجب ان تتكون من 6 خانات على الاقل وتحتوي على ارقام ورموز
          </div>
        </div>
        <div class="form-floating has-validation">
          <input type="password" class="form-control" id="repassword" required name="repassword" placeholder="كلمة المرور مرة اخرى" />
          <label for="repassword">كلمة المرور مرة اخرى</label>
          <div id="repassword" class="invalid-feedback">
            يجب ان تتماثل كلمتا المرور
          </div>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" id="submit" type="submit">
          تسجيل
        </button>
      </form>
    </main>
  </div>
  <script src="http://localhost/dist/js/bootstrap.bundle.min.js"></script>
  <script src="main.js"></script>
</body>

</html>