<?php session_start(); ?>

<?php
// will be deprecated
function is_User($stu, $year)
{
  $users = ["1", "2", "3"];
  $usersy = ["2022-2023", "2022-2023", "2022-2023"];
  for ($i = 0; $i < 3; $i++)
    if ($stu === $users[$i]) {
      if ($year === $usersy[$i]) {
        return true;
      } else {
        return false;
      }
    }
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if ($_POST["student-number"] !== "" || $_POST["year"] !== "") {
    // condition will cahnge
    if (is_User($_POST["student-number"], $_POST["year"])) {
      //will change
      $_SESSION["user"] = "student";
      header("location: http://localhost/moe-yemen/");
      die();
    }
  }
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="تسجيل الدخول الى وزارة التربية والتعليم اليمنية" />
  <title>تسجيل الدخول</title>

  <link href="../dist/css/bootstrap.rtl.min.css" rel="stylesheet" />

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
  <main class="form-signin">
    <form method="post" action="">
      <img class="mb-4" src="logo.png" alt="" width="128" height="128" />
      <h1 class="h3 mb-3 fw-normal">تسجيل الدخول</h1>
      <select style="height: 58px;" id="year" class="form-control" name="year" placeholder="السنة الدراسية">
        <option value="" selected>السنة الدراسية</option>
        <option value="2022-2023">2022-2023</option>
        <option value="2021-2022">2021-2022</option>
        <option value="2020-2021">2020-2021</option>
        <option value="2019-2020">2019-2020</option>
      </select>
      <label for="year" hidden>year</label>

      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="student-number" name="student-number" placeholder="رقم الجلوس" />
        <label for="student-number">رقم الجلوس</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">
        تسجيل
      </button>
    </form>
  </main>
</body>

</html>