<?php include("../userCheck.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>تواصل معنا</title>

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
          <table class="w-100 table">
            <tr>
              <td>البريد الالكتروني :</td>
              <td>عدن المنصورة</td>
            </tr>
            <tr>
              <td>رقم التواصل :</td>
              <td>7777777777</td>
            </tr>
          </table>
          <ul class="mb-1 mb-md-0">
            <li><a href="#" class="nav-link p-1 text-dark">Facebooc</a></li>
            <li><a href="#" class="nav-link p-1 text-dark">Twiter</a></li>
            <li><a href="#" class="nav-link p-1 text-dark">Whatsup</a></li>
            <li><a href="#" class="nav-link p-1 text-dark">Gmail</a></li>
            <li><a href="#" class="nav-link p-1 text-dark">Inestegram</a></li>
          </ul>
          <hr>
          <iframe class="w-100" style="aspect-ratio: 4 / 2 ;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15560.537137332829!2d44.9328395!3d12.834598!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc542ae687e34794a!2z2YjYstin2LHYqSDYp9mE2KrYsdio2YrYqSDZiNin2YTYqti52YTZitmFINin2YTZitmF2YbZitip!5e0!3m2!1sar!2s!4v1668008405582!5m2!1sar!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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