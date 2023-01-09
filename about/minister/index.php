<?php include("../../userCheck.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>عن الوزير</title>

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
          الاسم : طارق سالم صالح العكبري.
          العمل الحالي : وزير التربية والتعليم .
          الحالة الإجتماعية : متزوج وأب لأربعة أبناء.<br>
          <h3>مناصب تقلدها :</h3>
          – أمين عام مؤتمر حضرموت الجامع، عضو وفد حضرموت المفاوض لتنفيذ اتفاق الرياض.
          – مستشار في الإدارة المحلية والعديد من المؤسسات.<br>
          <h3>المؤهــــلات العلمية:</h3>
          – بكالوريوس في الشريعة والقانون جامعة العلوم والتكنولوجيا .
          – دبلوم العلوم السياسية والدبلوماسية المنظمة العربية للتنمية.
          – دبلوم العلاقات الخارجية والتعاون الدولي وبرنامج الاعداد الدبلوماسي المنظمة العربية للتنمية بجامعة الدول العربية.
          – دبلوم في إدارة المؤسسات التربوية والتعليمية من معهد التدريب والتأهيل.
          – دبلوم فني في المساحة والطرق، من المعهد التقني الصناعي.
          – دبلوم إدارة أعمال من مركز التدريب واللغات.
          – دبلوم في التقنية وأنظمة الحاسوب.
          – برنامج أساسيات القانون الدولي وعمل المنظمات الدولية من المنظمة العربية للتنمية الإدارية بجامعة الدول العربية
          – برنامج مجلس الأمن والقضايا العربية وقرارات الجزاءات من المنظمة العربية للتنمية الإدارية
          – دورات في دور القائد في البناء المؤسسي، والمدير الناجح في بناء المؤسسات التعليمية.
          – بحث بعنوان قوانين العدالة الانتقالية ( الطبيعة والآثار ) .<br>
          <h3>الخبرات العملية:</h3>
          – قيادي مؤسس في مؤتمر حضرموت الجامع، تولى: عضوية اللجنة السياسية التحضيرية ومقرر لجان الصياغة السياسية والاجتماعية والاقتصادية،
          – أمين عام مساعد لمؤتمر حضرموت الجامع.
          – ناشط في المجال الحقوقي والانساني٠
          – مدير ومؤسس للعديد من فرق العمل في المؤسسات التنموية والثقافية والتعليمية.
          – شخصية اجتماعية ومن وجهاء محافظة حضرموت.<br>
          <h3>المشاركات الخارجية:</h3>
          شارك في العديد من المؤتمرات والورش والمنتديات الخارجية المعنية بمناقشة
          الشأن السياسي اليمني وحل القضية الجنوبية منها:
          – ورشتا عمل حول العملية الانتقالية باليمن، في تونس، تنظيم المنظمة الدولية للديمقراطية (إيديا)
          – منتدى بروكسل للتوافق الجنوبي، تنظيم المعهد الأوروبي للسلام.
          – ورشة عمل حول مسار العملية السياسية في اليمن، في استوكهولم – السويد.
          – منتدى القيادات الشابة من اليمن والخليج بالكويت.
          – حضور توقيع اتفاق الرياض ومشاورات آليات تنفيذه.
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