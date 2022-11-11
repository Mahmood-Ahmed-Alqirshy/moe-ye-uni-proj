<?php include("../../userCheck.php") ?>
<?php include("../../auth.php") ?>
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
          <table class="table">
            <tr>
              <td>المادة</td>
              <td>الدرجة من مائة</td>
            </tr>
            <tr>
              <td>رياضايات</td>
              <td>22</td>
            </tr>
            <tr>
              <td>احياء</td>
              <td>1233</td>
            </tr>
            <tr>
              <td>كيمياء</td>
              <td>123</td>
            </tr>
            <tr>
              <td>فيزياء</td>
              <td>123</td>
            </tr>
            <tr>
              <td>قران</td>
              <td>331</td>
            </tr>
            <tr>
              <td>اسلامية</td>
              <td>321</td>
            </tr>
            <tr>
              <td>المجموع</td>
              <td>133</td>
            </tr>
          </table>
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
</body>

</html>