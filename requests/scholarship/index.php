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
          <h1>طلب بعثة دراسية</h1>
          <form action="">
            <div class="form-group p-3">
              <label for="seat-number">رقم الجلوس</label>
              <input type="file" class="form-control form-control-lg my-3" id="seat-number" name="seat-number">
            </div>
            <div class="form-group p-3">
              <label class="form-label" for="passport-image">جواز السفر</label>
              <input type="file" class="form-control form-control-lg" id="passport-image" required>
            </div>
            <div class="form-group p-3">
              <label class="form-label" for="certificate-of-good-conduct">شعادة حسن سيرة وسلوك</label>
              <input type="file" class="form-control form-control-lg" id="certificate-of-good-conduct" required>
            </div>
            <br>
            <div class="form-group p-3">
              <button type="submit" class="btn btn-primary">ارسال</button>
            </div>
          </form>
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