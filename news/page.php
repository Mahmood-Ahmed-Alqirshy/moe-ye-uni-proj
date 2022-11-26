<?php include("../userCheck.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<?php $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost");
if (!isset($_GET['id'])) {
  header('location: http://' . $serverIP . '/moe-yemen/notFound.php');
  die();
}
$sql = "SELECT ID as id, title, post_date as postDate, cover, content FROM news where id = ?;";
$schools = $DB->prepare($sql);
$schools->execute([$_GET['id']]);
$data = $schools->fetch();
if ($data) {
  $title = $data->title;
  $cover = $data->cover;
  $postDate = $data->postDate;
  $content = $data->content;
} else {
  header('location: http://' . $serverIP . '/moe-yemen/notFound.php');
  die();
}
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $title ?></title>

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
    <img src=<?php echo '"http://' . $serverIP . '/moe-yemen/news/covers/' . $cover . '"' ?> class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <?php



          echo <<< "news"
          <h2 class="blog-post-title">$title</h2>
          <p class="blog-post-meta">
            $postDate
          </p>
          <p>
            $content
          </p>
          news;
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