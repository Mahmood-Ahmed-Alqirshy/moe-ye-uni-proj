<?php
session_start();


require '../UsefullClass.php';

$DB = new PDO('mysql:host=localhost;dbname=moe', 'root', '1234');
$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


UsefullClass\Done::checkLogin($DB, "Employee_auth", 'http://localhost/home');
$isvalid = true;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $sql = "select session_id from ((SELECT *, 0 as is_admin FROM student_auth) union (SELECT * FROM employee_auth)) as users where username = ? and user_password = md5(?);";
  $toGoTo = 'http://localhost' . ((isset($_GET['location'])) ? $_GET['location'] : '/home');
  $isvalid = UsefullClass\Done::signIn($DB, $sql, $_POST['username'], $_POST['password'], isset($_POST['remember-me']), $toGoTo);
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>تسجيل الدخول</title>

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
  <?php include("../header.php"); ?>

  <div class="body">
    <main class="form-signin">
      <form method="post" action="">
        <img class="mb-4" src="http://localhost/logo.png" alt="" width="128" height="128" />
        <h1 class="h3 mb-3 fw-normal">تسجيل الدخول</h1>
        <div class="form-floating has-validation">
          <?php
          if ($isvalid)
            echo '<input type="text" class="form-control" id="username" name="username" placeholder="اسم المستخدم" />';
          else
            echo '<input type="text" class="form-control is-invalid" id="username" name="username" placeholder="اسم المستخدم" />';
          ?>
          <label for="username">اسم المستخدم</label>
          <div id="username" class="invalid-feedback">
            اسم المستخدم قد يكون غير صحيح
          </div>
        </div>
        <br>
        <div class="form-floating has-validation">
          <?php
          if ($isvalid)
            echo '<input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور" />';
          else
            echo '<input type="password" class="form-control is-invalid" id="password" name="password" placeholder="كلمة المرور" />';
          ?>

          <label for="password">كلمة المرور</label>
          <div id="password" class="invalid-feedback">
            كلمة المرور ربما تكون غير صحيحة
          </div>
          <div>
            <input type="checkbox" class="form-check-input" name="remember-me" id="remember-me" value="yes">
            <label class="form-check-label" title="لن تحتاج لتسجيل الدخول في كل مره اذا حددت عليه" for="remember-me">تذكرني</label>
          </div>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">
          تسجيل
        </button>
      </form>
    </main>
  </div>
  <script src="http://localhost/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>