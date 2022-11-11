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
          <div id="accordion" class="p-3">
            <div class="card">
              <div class="card-header">
                <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                  متى يبدأ العام الدراسي
                </a>
              </div>
              <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
                <div class="card-body">
                  الاول من ديسمبر
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                  متى ستصدر الشهادات
                </a>
              </div>
              <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                <div class="card-body">
                  بعد شهر من الامتحانات
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                  كيف اعرف درجتي
                </a>
              </div>
              <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                <div class="card-body">
                  من قسم الخدمات الالكترونية اختر عرض النتائج ثم اختر سنتك الدراسية
                </div>
              </div>
            </div>

          </div>
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