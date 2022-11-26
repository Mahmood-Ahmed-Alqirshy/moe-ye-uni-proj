<?php include("../../userCheck.php") ?>
<?php include("../../auth.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<?php $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost") ?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>طلب الدرجات</title>

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
  <?php include("../../header.php") ?>
  <main class="container">
    <img src="1.png" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">


          <h1>طلب عرض النتائج</h1>
          <?php
          if (isset($_GET['error'])) {
            echo '<h2 class="text-danger">بياناتك غير صحيحة</h2>';
          }
          ?>
          <form action=<?php echo '"http://' . $serverIP . '/moe-yemen/requests/results/result.php"' ?> method="GET">
            <div class="row">
              <div class="form-group col-12 col-md-8">
                <label for="years">المرحلة الدراسية</label>
                <select class="form-control form-control-lg" id="years" name="year">
                  <option value="1">اول ابتدائي</option>
                  <option value="2">ثاني ابتدائي</option>
                  <option value="3">ثالث ابتدائي</option>
                  <option value="4">رابع ابتدائي</option>
                  <option value="5">خامس ابتدائي</option>
                  <option value="6">سادس ابتدائي</option>
                  <option value="7">اول اعدادي</option>
                  <option value="8">ثاني اعدادي</option>
                  <option value="9">ثالث اعدادي</option>
                  <option value="10">اول ثانوي</option>
                  <option value="11">ثاني ثانوي</option>
                  <option value="12">ثالث ثانوي</option>
                </select>
              </div>
              <div class="form-group col-12 col-md-4 ">
                <label for="term">الفصل الدراسية</label>
                <select class="form-control form-control-lg" id="term" name="term">
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group d-none" id="seat-number-display">
              <label for="seat-number">رقم الجلوس</label>
              <input name="seat-number" type="text" class="form-control form-control-lg" id="seat-number" value="" placeholder="رقم الجلوس">
            </div>
            <br>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">ارسال</button>
            </div>
          </form>


          <!--  -->

        </article>
      </div>

      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem">
          <?php include("../../newsBox.php") ?>
        </div>
      </div>
  </main>

  <!-- footer -->
  <?php include("../../footer.php") ?>
  <script src="main.js"></script>
</body>

</html>