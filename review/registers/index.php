<?php include("../../userCheck.php") ?>
<?php

$isAdminEmp = (isset($type) && isset($isAdmin) && $isAdmin && $type === "E");
UsefullClass\Done::auth($isAdminEmp, 'location: http://localhost/sign-in/');
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>مراجعة طلبات التسجيل</title>

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

  <link href="http://localhost/news/blog.rtl.css" rel="stylesheet" />
</head>

<body>
  <?php include("../../header.php") ?>

  <main class="container">
    <img src="1.png" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <table class="table">
            <tr>
              <td colspan="2" id="student-photo"></td>
            </tr>
            <tr>
              <td>الاسم</td>
              <td id="name"></td>
            </tr>
            <tr>
              <td>الجنس</td>
              <td id="sex"></td>
            </tr>
            <tr>
              <td>الجنسية</td>
              <td id="nationality"></td>
            </tr>
            <tr>
              <td>سنة الميلاد</td>
              <td id="date-of-birth"></td>
            </tr>
            <tr>
              <td>السنة الدراسية</td>
              <td id="grade"></td>
            </tr>
            <tr>
              <td>المدرسة</td>
              <td id="school"></td>
            </tr>
            <tr>
              <td>الاقامة</td>
              <td id="residence"></td>
            </tr>
            <tr>
              <td colspan="2" id="birth-certificate"></td>
            </tr>
          </table>
          <div class="w-100 row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary w-100 h-100 senders" disabled id="accept" value="accept">قبول</button>

            </div>
            <div class="col-8">
              <button type="submit" class="btn btn-primary w-100 p-3 mb-4 senders" disabled id="reject" value="reject">رفض</button>
              <div class="form-group">
                <label for="reject-massage">رسالة الرفض</label>
                <textarea class="form-control senders" id="reject-massage" disabled rows="3"></textarea>
              </div>
            </div>
          </div>
        </article>
      </div>

      <div class="col-md-4">
        <div class="position-sticky" id="requests" style="top: 2rem">

        </div>
      </div>
  </main>


  <!-- footer -->
  <?php include("../../footer.php") ?>
  <script src="main.js"></script>
</body>

</html>