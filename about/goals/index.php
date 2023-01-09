<?php include("../../userCheck.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>الاهداف</title>

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
  <?php include("../../header.php") ?>
  <main class="container">
    <img src="1.jpg" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">

          <?php
          $text = '
          <br>
          <h3>الرؤية:</h3>
          تعليم ابتكاري لمجتمع معرفي ريادي عالمي.<br>
          <br>
          <h3>الرسالة:</h3>
          بناء وإدارة نظام تعليمي ابتكاري لمجتمع معرفي ذي تنافسية عالمية يشمل كافة المراحل العمرية ويلبي احتياجات سوق العمل المستقبلية وذلك من خلال ضمان جودة مخرجات وزارة التربية والتعليم وتقديم خدمات متميزة للمتعاملين الداخليين والخارجيين.
          <br>
          <h3>القيم:</h3>
          المواطنة والمسؤولية: تعزيز الهوية الوطنية والمسؤولية الاجتماعية .
          مبادئ وقيم الإسلام: التأكيد على القيم الإنسانية في الحوار والتسامح والاعتدال والسلام والعمل التطوعي .
          الالتزام والشفافية: الالتزام بالمهنية والشفافية في الاداء .
          المشاركة والمساءلة: الالتزام بالشراكة المجتمعية في العملية التربوية والمساءلة .
          التكافؤ والعدالة: تكافؤ الفرص التعليمية للجميع .
          العلوم والتكنولوجيا والابتكار: تحفيز الطاقات البشرية والمؤسسية باتجاه العلوم والتكنولوجيا والابتكار .
        ';
          $text = str_replace('.', '.<br>', $text);
          echo $text;
          ?>
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