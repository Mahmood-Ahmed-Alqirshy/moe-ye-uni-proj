<?php include("../userCheck.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>الاحصائيات</title>

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
  <?php include("../header.php") ?>
  <main class="container">
    <img src="1.jpg" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <div class="row p-4 mb-3 bg-light rounded">
            <div class=" col-12 col-md-6 col-lg-4 " style="aspect-ratio: 2/1;">
              <h3 class="text-dark w-100 text-center">عدد الطلاب</h3>
              <p class="mx-auto rounded bg-dark text-light d-flex align-items-center justify-content-center py-5" style="font-size: 36px;">1759</p>
            </div>
            <!--  -->
            <div class=" col-12 col-md-6 col-lg-4 " style="aspect-ratio: 2/1;">
              <h3 class="text-dark w-100 text-center">عدد الذكور</h3>
              <p class="mx-auto rounded bg-dark text-light d-flex align-items-center justify-content-center py-5" style="font-size: 36px;">809</p>
            </div>
            <div class=" col-12 col-md-6 col-lg-4 " style="aspect-ratio: 2/1;">
              <h3 class="text-dark w-100 text-center">عدد الاناث</h3>
              <p class="mx-auto rounded bg-dark text-light d-flex align-items-center justify-content-center py-5" style="font-size: 36px;">950</p>
            </div>
            <div class=" col-12 col-md-6 col-lg-4 " style="aspect-ratio: 2/1;">
              <h3 class="text-dark w-100 text-center">عدد الناجحين</h3>
              <p class="mx-auto rounded bg-dark text-light d-flex align-items-center justify-content-center py-5" style="font-size: 36px;">1607</p>
            </div>
            <div class=" col-12 col-md-6 col-lg-4 " style="aspect-ratio: 2/1;">
              <h3 class="text-dark w-100 text-center">عدد الراسبين</h3>
              <p class="mx-auto rounded bg-dark text-light d-flex align-items-center justify-content-center py-5" style="font-size: 36px;">152</p>
            </div>
            <div class=" col-12 col-md-6 col-lg-4 " style="aspect-ratio: 2/1;">
              <h3 class="text-dark w-100 text-center">نسبة النجاح</h3>
              <p class="mx-auto rounded bg-dark text-light d-flex align-items-center justify-content-center py-5" style="font-size: 36px;">%89</p>
            </div>
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