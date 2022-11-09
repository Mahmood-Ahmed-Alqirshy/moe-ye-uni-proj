<!DOCTYPE html>
<html lang="ar" dir="rtl">
<?php $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost") ?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>page</title>

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

    table {
      opacity: 1;
      /* height: auto; */
    }

    .wt {
      transition: all 1s;

    }

    .not-show {
      display: none;
      position: absolute;
      transition: all 1s;
      opacity: 0;
      height: 0 !important;
    }

    .not-show {
      display: block;
      position: static;
      transition: all 1s;
      opacity: 0;
      height: 0 !important;
    }
  </style>

  <?php echo '<link href="http://' . $serverIP . '/moe-yemen/news/blog.rtl.css" rel="stylesheet" />' ?>
</head>

<body>
  <?php include("http://$serverIP/moe-yemen/header.php") ?>
  <main class="container">
    <img src="1.jpg" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <!--  -->
          <div class="p-4 mb-3 bg-light rounded">
            <div class="row">

              <h4 class="col-12 my-5 mx-auto" style="display:flex; align-items:center; justify-content:center;">
                الوظيفة المطلوبة
              </h4>
            </div>
            <hr>
            <div class="collapse" id="job-1">
              <table class="w-100 table">
                <tr>
                  <td>نوع الوظيفة :</td>
                  <td>معلم</td>
                </tr>
                <tr>
                  <td>محل العمل :</td>
                  <td>عدن المنصورة</td>
                </tr>
                <tr>
                  <td>الموقع :</td>
                  <td>عدن المنصورة</td>
                </tr>
                <tr>
                  <td>العنوان :</td>
                  <td></td>
                </tr>
                <tr>
                  <td>البريد الالكتروني :</td>
                  <td></td>
                </tr>
                <tr>
                  <td>رقم التواصل :</td>
                  <td></td>
                </tr>
              </table>
              <a href="">الخريطة</a>
              <hr>
              <p>وصف</p>
              <hr>
            </div>
            <a href="#" class="btn mx-5 btn-dark text-light">تسجيل</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#job-1">تفاصيل</button>
          </div>
          <!--  -->
        </article>
      </div>

      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem">
          <?php include("http://$serverIP/moe-yemen/newsBox.php") ?>
        </div>
      </div>
  </main>

  <!-- footer -->
  <?php include("http://$serverIP/moe-yemen/footer.php") ?>


</body>

</html>