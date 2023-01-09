<?php include("../userCheck.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>الاخبار</title>

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
          <h1>الاخبار</h1>
          <?php
          $sql = "SELECT ID as id, title, post_date as postDate, cover FROM news ORDER BY post_date DESC;";
          $schools = $DB->prepare($sql);
          $schools->execute();
          $data = $schools->fetchAll();
          for ($i = 0; $i < count($data); $i++) {
            $title = $data[$i]->title;
            $id = $data[$i]->id;
            $cover = $data[$i]->cover;
            $postDate = $data[$i]->postDate;
            $active = (($i <= 0) ? 'active'  : '');
            echo <<< "news"
            <a href="http://localhost/news/$id" style="text-decoration: none; color:black;">
              <div class="p-4 mb-3 bg-light rounded">
                <div class="row">
                  <div class="col-12 m-auto col-md-4">
                    <img src="http://localhost/news/covers/$cover" alt="school-image" class="w-100 thumbnail-img">
                  </div>
                  <h4 class="col-12 col-md-8 my-5 mx-auto" style="display:flex; align-items:center; justify-content:center;">
                    $title
                  </h4>
                  <p>$postDate</p>
                </div>
              </div>
            </a>
            news;
          }
          ?>
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