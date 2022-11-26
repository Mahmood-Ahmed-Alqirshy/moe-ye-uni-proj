<?php include("../userCheck.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<?php $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost") ?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>الدورات</title>

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
    <img src="1.png" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <!--  -->
          <!--  -->
          <div class="p-4 mb-3 bg-light rounded">
            <div class="row">
              <div class="col-12 m-auto col-md-2">
                <p class="text-center">2022</p>
                <p class="bg-dark p-3 text-light text-center rounded" style="font-size: 36px;">11</p>
                <p class="text-center">February</p>
              </div>
              <h4 class="col-12 col-md-8 my-5 mx-auto" style="display:flex; align-items:center; justify-content:center;">
                دورة لغة انجليزية
              </h4>
              <div class="col-12 m-auto col-md-2">
                <p class="bg-dark p-3 text-light text-center rounded" style="font-size: 36px;">15</p>
                <p class="text-center">ساعة</p>
              </div>
            </div>
            <hr>
            <p>دورة لتعلم الانجليزي مقدمة من معهد جمبردج</p>
            <p>السعر : 2000ريال</p>
            <p>المحافظة : عدن</p>
            <p style="font-size: 18px;"><a href="#">المكان</a></p>
          </div>

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