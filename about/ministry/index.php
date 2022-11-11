<?php include("../../userCheck.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<?php $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost") ?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>page</title>

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
    <img src="1.jpg" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <p style="font-size: 18px;">
            عملت الوزارة على توفير منظومة تعلم ذكية ومنصات رقمية، عالية الجودة، بجانب التطوير المستمر في المناهج الدراسية بمعايير تعلم وطنية، وسياسة تقييمية قائمة على القياس من أجل التعلم، وأعلى درجات الجودة لتحاكي أفضل الممارسات العالمية، فضلاً عن توفير مسارات تعليمية متنوعة تدعم قدرات ومهارات الطلبة، وتسهم في تحقيق استراتيجية الدولة لتشجيع ثقافة الإبداع والابتكار من خلال إكساب الطلبة مهارات القرن الحادي والعشرين، وحفزهم على التحلي بالأفكار الجديدة التي تتصل بالواقع، وتستشرف المستقبل للمساهمة في إيجاد الحلول الجذرية المستدامة للقضايا الحيوية، وتحسين القدرة على التنافسية، ودعم الحكومة الذكية؛ سعيًا لمواكبة التطورات العالمية، والنهوض بالتعليم والدفع به إلى آفاق واسعة من التميز والريادة والتنافسية.
          </p>
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