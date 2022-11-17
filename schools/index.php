<?php include("../userCheck.php") ?>
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
  <?php include("../header.php") ?>
  <main class="container">
    <img src="1.jpg" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post" id="container">
          <!--  -->
          <!-- <div class="p-4 mb-3 bg-light rounded">
            <div class="row">
              <div class="col-12 m-auto col-md-4">
                <img src="1.jpg" alt="school-image" class="w-100 thumbnail-img">
              </div>
              <h4 class="col-12 col-md-8 my-5 mx-auto" style="display:flex; align-items:center; justify-content:center;">
                فوز اليمن بجائز دولية
              </h4>
            </div>
            <hr>
            <div class="collapse" id="school-1">
              <table class="w-100 table">
                <tr>
                  <td>الموقع :</td>
                  <td id="location">عدن المنصورة</td>
                </tr>
                <tr>
                  <td>العنوان :</td>
                  <td id="address"></td>
                </tr>
                <tr>
                  <td>الجنسية :</td>
                  <td id="nationality"></td>
                </tr>
                <tr>
                  <td>النوع :</td>
                  <td id="school_type"></td>
                </tr>
                <tr>
                  <td>الجنس :</td>
                  <td id="gender"></td>
                </tr>
                <tr>
                  <td>البريد الالكتروني :</td>
                  <td id="e-mail"></td>
                </tr>
                <tr>
                  <td>رقم التواصل :</td>
                  <td id="phone"></td>
                </tr>
                <tr>
                  <td colspan="2">مراحل التدريس ورسومها :</td>
                </tr>
                <tr>
                  <td>الابتدائي :</td>
                  <td id="primary">122123</td>
                </tr>
                <tr>
                  <td>الاعدادي :</td>
                  <td id="mid-school">123132</td>
                </tr>
                <tr>
                  <td>الثانوية :</td>
                  <td id="secondary">غير متوفر</td>
                </tr>
              </table>
              <a href="" id="google-map">الخريطة</a>
              <hr>
              <hr>
            </div>
            <a href="#" class="btn mx-5 btn-dark text-light">تسجيل</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#school-1">تفاصيل</button>
          </div> -->
          <!--  -->
        </article>
      </div>

      <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem">
          <div class="p-4 mb-3 bg-light rounded" id="governorate">
            <h3>المحافظات</h3>
            <hr>
            <div class="form-group p-1">
              <input type="checkbox" class="form-check-input" id="aden" value="عدن">
              <label for="aden" class="form-check-label">عدن</label>
            </div>
            <br>
            <div class="form-group p-1">
              <input type="checkbox" class="form-check-input" id="Sanaa" value="صنعاء">
              <label for="Sanaa" class="form-check-label">صنعاء</label>
            </div>
          </div>
          <div class="p-4 mb-3 bg-light rounded" id="type">
            <h3>النوع</h3>
            <hr>
            <div class="form-group p-1">
              <input type="checkbox" class="form-check-input" id="private" value="خاص">
              <label for="private" class="form-check-label">خاص</label>
            </div>
            <br>
            <div class="form-group p-1">
              <input type="checkbox" class="form-check-input" id="public" value="حكومي">
              <label for="public" class="form-check-label">حكومي</label>
            </div>
          </div>
          <div class="p-4 mb-3 bg-light rounded" id="gender">
            <h3>الطلبة</h3>
            <hr>
            <div class="form-group p-1">
              <input type="checkbox" class="form-check-input" id="males" value="ذكور">
              <label for="males" class="form-check-label">ذكور</label>
            </div>
            <br>
            <div class="form-group p-1">
              <input type="checkbox" class="form-check-input" id="females" value="إناث">
              <label for="females" class="form-check-label">إناث</label>
            </div>
            <br>
            <div class="form-group p-1">
              <input type="checkbox" class="form-check-input" id="separate" value="منفصل">
              <label for="separate" class="form-check-label">منفصل</label>
            </div>
            <br>
            <div class="form-group p-1">
              <input type="checkbox" class="form-check-input" id="coeducation" value="مختلط">
              <label for="coeducation" class="form-check-label">مختلط</label>
            </div>
          </div>
          <div class="p-4 mb-3 bg-light rounded" id="prices">
            <h3>الاسعار</h3>
            <hr>
            <div class="form-group p-1">
              <label for="primary" class="form-label">ابتدائي</label>
              <input type="range" class="form-range" id="primary" min="0" max="1000000" step="1000" value="1000000">
              <p class="range-value" id="primary-value">الكل</p>
            </div>
            <br>
            <div class="form-group p-1">
              <label for="middle" class="form-label">اعدادي</label>
              <input type="range" class="form-range" id="middle" min="0" max="1000000" step="1000" value="1000000">
              <p class="range-value" id="middle-value">الكل</p>
            </div>
            <br>
            <div class="form-group p-1">
              <label for="secondary" class="form-label">ثانوي</label>
              <input type="range" class="form-range" id="secondary" min="0" max="1000000" step="1000" value="1000000">
              <p class="range-value" id="secondary-value">الكل</p>
            </div>
          </div>
          <?php include("../newsBox.php") ?>
        </div>
      </div>
  </main>

  <!-- footer -->
  <?php include("../footer.php") ?>
  <script src="main.js"></script>

</body>

</html>