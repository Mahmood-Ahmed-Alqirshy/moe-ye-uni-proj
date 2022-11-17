<?php include("../userCheck.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="carousel.rtl.css" rel="stylesheet">
  <title>الصفحة الرئيسية</title>
  <style>
    .bg-color-trans {
      background-color: black;
    }

    .minaster {
      max-height: 360px;
      max-width: 360px;
      border-radius: 50%;
      margin: auto;
    }

    .al {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .al * {
      text-align: center;
      margin: 10px 0;
    }


    .mycover {
      height: 100%;
      object-fit: cover;
    }

    .mytext {
      text-shadow: 0 0 3px black, 0 0 10px black, 0 0 3px black;
      text-align: center;
    }

    .width-100per {

      width: 100%;
    }
  </style>
</head>

<body style="padding: 0;">

  <?php include("../header.php") ?>
  <?php
  if (isset($_GET['code'])) {
    $code = $_GET['code'];
    echo <<< "Success"
      <div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      تم استلام طلبك يمكنك الاستفسار مع المدرسة عن حال قبول طلبك او ستتواصل معك الوزاره عن طريق المعلومات التي ارفقتها
    </div>
    Success;
  }
  ?>

  <main>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <?php
        $sql = "SELECT ID as id, title, post_date as postDate, cover FROM news ORDER BY post_date DESC LIMIT 3;";
        $schools = $DB->prepare($sql);
        $schools->execute();
        $data = $schools->fetchAll();
        for ($i = 0; $i < count($data); $i++) {
          $title = $data[$i]->title;
          $id = $data[$i]->id;
          $cover = $data[$i]->cover;
          $active = (($i <= 0) ? 'active'  : '');
          echo <<< "slide"
                <div class="carousel-item $active">
                  <a href="http://$serverIP/moe-yemen/news/$id">
                    <img src="http://$serverIP/moe-yemen/news/covers/$cover" class="mycover" style="width: 100%;">
                    <div class="container">
                      <div class="carousel-caption text-start d-flex align-items-center justify-content-center mb-5">
                        <h1 class="mytext mb-5 p-3">$title</h1>
                      </div>
                    </div>
                  </a>
                </div>
          slide;
        }
        ?>
      </div>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-color-trans" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-color-trans" aria-hidden="true"></span>
      </button>
    </div>


    <div class="container marketing">

      <div class="row">

        <div class="col-lg-3"></div>
        <div class="col-lg-6 al">
          <img src="2.jpg" class="minaster width-100per" alt="">

          <h2>وزير التربيةوالتعليم/طارق الكعبري</h2>
          <p><a class="btn btn-secondary" href=<?php echo '"http://' . $serverIP . '/moe-yemen/about/minister"' ?>>عرض التفاصيل</a></p>
        </div>
        <div class="col-lg-3"></div>
      </div>



      <hr class="featurette-divider">

      <div class="row featurette" dir="rtl">
        <div class="col-md-7">
          <h2 class="featurette-heading">طلب الدرجات</h2>
          <p class="lead">يمكنك الان معرفة درجاتك من خلال الموقع الخاص بوزارة التربية والتعليم</p>
          <a href=<?php echo '"http://' . $serverIP . '/moe-yemen/requests/results"' ?> class="btn btn-dark text-light">قم بالطلب</a>
        </div>
        <div class="col-md-5">
          <img src="5.png" alt="" class="width-100per" style="border-radius: 15px;">

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7" dir="rtl">
          <h2 class="featurette-heading">طلب إصدار شهادة</h2>
          <p class="lead">يمكنك طلب اصدارة شهادة مختمة ومعتمدة من قبل موقع الوزارة واستلامها من مدرستك</p>
          <a href=<?php echo '"http://' . $serverIP . '/moe-yemen/requests/certificate"' ?> class="btn btn-dark text-light">قم بالطلب</a>
        </div>
        <div class="col-md-5">
          <img src="6.png" alt="" class="width-100per" style="border-radius: 15px;">

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette" dir="rtl">
        <div class="col-md-7">
          <h2 class="featurette-heading">الانشطة والفعاليات</h2>
          <p class="lead">اهم الفعاليات القادمة</p>

          <div id="accordion" class="p-3">
            <div class="card">
              <div class="card-header">
                <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                  معرض الكتاب
                </a>
              </div>
              <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                <div class="card-body">
                  سيقام معرض الكتاب في المدرسة ...... في تاريخ 4 ديسمبر من الساعة 8 صباحا وحتى تاريخ 9 ديسمبر الساعة 2 مساء
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                  الاسبوع الرياضي
                </a>
              </div>
              <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                <div class="card-body">
                  سيبدأ من تاريح 13 ديسمبر وحتى 20 ديسمبر حيث سيقام فيه العديد من البطولات ومسابقات الرياضية
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                  دورة في صيانة الحاسوب
                </a>
              </div>
              <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                <div class="card-body">
                  وستتم في معهد ..... في محافظة عدن من تاريخ 26 ديسمبر و اوقات الدوام تبدأمن الثامنة صباحا وحتى الثانية ظهرا عدا الجمعة والسبت
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-5">
          <img src="7.webp" class="mycover" alt="" style="border-radius: 15px; width: 100%;">

        </div>
      </div>
      <hr class="featurette-divider">
    </div>

    <?php include("../footer.php") ?>
</body>

</html>