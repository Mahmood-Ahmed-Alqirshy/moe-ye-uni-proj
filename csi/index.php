<?php include("../userCheck.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">


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

    form {
      font-size: 22px;
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
          <h2>الشكاوي والاقتراحات والاستفسارات</h2>
          <form action="">
            <br>
            <div class="form-group">
              <label for="e-mail">البريد الالكتروني</label>
              <input type="email" class="form-control" id="e-mail" placeholder="name@example.com">
            </div>
            <br>
            <div class="form-group">
              <label for="text">المحتوى</label>
              <textarea class="form-control" id="text" rows="6"></textarea>
            </div>
            <br>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="ارسال">
            </div>
          </form>
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