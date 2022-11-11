<?php
session_start();

$serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost");
$DB = new PDO('mysql:host=localhost;dbname=moe', 'root', '1234');
$DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

function checkLogin()
{
  $nameQuery = $GLOBALS['DB']->prepare("select student_name as 'Name' from Student_auth join Students on Student_auth.ID = Students.ID where session_id = ?;");
  $nameQuery->execute([$_SESSION['session_id']]);
  if (count($nameQuery->fetchAll()) > 0) {
    header("location: http://" . $GLOBALS['serverIP'] . "/moe-yemen/home/");
    die();
  }
}
if (isset($_SESSION['session_id'])) {
  checkLogin();
} else if (count($_COOKIE) > 0 && isset($_COOKIE['session_id'])) {
  $_SESSION['session_id'] = $_COOKIE['session_id'];
  checkLogin();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if ($_POST["username"] !== "" && $_POST["password"] !== "") {
    $getSesstion = $DB->prepare('select session_id from Student_auth where username = ? and student_password = md5(?);');
    $getSesstion->execute([$_POST["username"], $_POST["password"]]);
    $returnedData = $getSesstion->fetch();
    if ($returnedData) {
      $_SESSION['session_id'] = $returnedData->session_id;
      if (count($_COOKIE) > 0 && isset($_POST['remember-me']))
        setcookie('session_id', $returnedData->session_id, time() + 3600 * 24 * 365, '/');
      if (isset($_GET['location']))
        header("location: http://" . $serverIP . $_GET['location']);
      else
        header("location: http://" . $serverIP . "/moe-yemen/home/");
      die();
    } else {
      $invalid = true;
    }
  } else {
    $invalid = true;
  }
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>تسجيل الدخول</title>

  <?php echo '<link href="http://' . $serverIP . '/moe-yemen/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />' ?>

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
<?php $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost") ?>

<body class="text-center">
  <?php include("../header.php"); ?>

  <div class="body">
    <main class="form-signin">
      <form method="post" action="">
        <img class="mb-4" src=<?php echo '"http://' . $serverIP . '/moe-yemen/logo.png"' ?> alt="" width="128" height="128" />
        <h1 class="h3 mb-3 fw-normal">تسجيل الدخول</h1>
        <!-- <select style="height: 58px;" id="year" class="form-control" name="year" placeholder="السنة الدراسية">
        <option value="" selected>السنة الدراسية</option>
        <option value="2022-2023">2022-2023</option>
        <option value="2021-2022">2021-2022</option>
        <option value="2020-2021">2020-2021</option>
        <option value="2019-2020">2019-2020</option>
      </select>
      <label for="year" hidden>year</label> -->
        <div class="form-floating has-validation">
          <?php
          if (isset($invalid))
            echo '<input type="text" class="form-control is-invalid" id="username" name="username" placeholder="اسم المستخدم" />';
          else
            echo '<input type="text" class="form-control" id="username" name="username" placeholder="اسم المستخدم" />';
          ?>
          <!-- <input type="text" class="form-control" id="username" name="username" placeholder="رقم الجلوس" /> -->
          <label for="username">اسم المستخدم</label>
          <div id="username" class="invalid-feedback">
            اسم المستخدم قد يكون غير صحيح
          </div>
        </div>
        <br>
        <div class="form-floating has-validation">
          <?php
          if (isset($invalid))
            echo '<input type="password" class="form-control is-invalid" id="password" name="password" placeholder="كلمة المرور" />';
          else
            echo '<input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور" />';
          ?>

          <!-- <input type="password" class="form-control is-invalid" id="password" name="password" placeholder="رقم الجلوس" /> -->
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
  <script src=<?php echo '"http://' . $serverIP . '/moe-yemen/dist/js/bootstrap.bundle.min.js"' ?>></script>
</body>

</html>