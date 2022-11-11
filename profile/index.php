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
  <?php include("http://$serverIP/moe-yemen/header.php") ?>
  <main class="container">
    <img src="1.jpg" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <table class="table">
            <tr>
              <td colspan="">
                <div class="mx-auto w-50 w-lg-25 bg-dark rounded" style="aspect-ratio: 1/1;">
                  <img src="2.jpg" alt="" class="w-100 h-100 rounded" style="object-fit: cover;">
                </div>
              </td>
              <td></td>
            </tr>
            <tr>
              <td>الاسم</td>
              <td></td>
            </tr>
            <tr>
              <td>الجنسية</td>
              <td></td>
            </tr>
            <tr>
              <td>الجنس</td>
              <td></td>
            </tr>
            <tr>
              <td>المدرسة</td>
              <td></td>
            </tr>
            <tr>
              <td>السنة الدراسية</td>
              <td></td>
            </tr>
          </table>
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