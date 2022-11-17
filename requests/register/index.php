<?php include("../../userCheck.php") ?>
<?php $serverIP = (strlen($_SERVER['SERVER_ADDR']) > 5 ? $_SERVER['SERVER_ADDR'] : "localhost") ?>
<?php
function saveFiles($name, $fileDist)
{
  $file = $_FILES[$name];
  $allowed = ['jpg', 'jpeg', 'png', 'pdf'];
  $ext = explode('.', $file['name']);
  $extension = strtolower(end($ext));
  if (
    $file['error'] <= 0
    && (strpos($file['type'], 'image') !== false)
    && $file['size'] <= 5 * 1024 * 1024
    && in_array($extension, $allowed)
  ) {
    $newName = uniqid('', true) . '.' . $extension;
    $fileDir = $fileDist . $newName;
    move_uploaded_file($file['tmp_name'], $fileDir);
    return $newName;
  } else {
    return null;
  }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $addData = $DB->prepare("insert into Students_request_to_register(student_name, nationality, sex, school, birth_certificate, grade, residence, date_of_birth, address, student_photo, e_mail, phone) value (?,?,?,?,?,?,?,?,?,?,?,?);");
  $dataToSend = [];
  $dataToSend[] = $_POST['name'];
  $dataToSend[] = $_POST['nationality'];
  $dataToSend[] = $_POST['sex'];
  $dataToSend[] = $_GET['school'];
  $birthCertificate = saveFiles('birth-certificate', "../../birth certificates/");
  if (!$birthCertificate) {
    header('location: http://' . $serverIP . '/moe-yemen/schools');
    die();
  }
  $dataToSend[] = $birthCertificate;
  $dataToSend[] = $_POST['year'];
  $dataToSend[] = $_POST['directorate'];
  $dataToSend[] = $_POST['date-of-birth'];
  $dataToSend[] = (($_POST['address']) ? $_POST['address'] : null);
  $dataToSend[] = saveFiles('photo', "../../students photos/");
  $dataToSend[] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE);
  $dataToSend[] = (($_POST['phone']) ? $_POST['phone'] : null);
  $addData->execute($dataToSend);
  header('location: http://' . $serverIP . '/moe-yemen/home/?code=1');
  die();
}
?>

<?php
if (!isset($_GET['school'])) {
  header('location: http://' . $serverIP . '/moe-yemen/schools');
  die();
}
?>
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
  </style>

  <?php echo '<link href="http://' . $serverIP . '/moe-yemen/news/blog.rtl.css" rel="stylesheet" />' ?>
</head>

<body>
  <?php include("../../header.php") ?>

  <main class="container">
    <img src="1.png" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <h1>تسجيل في <?php echo $_GET['name'] ?></h1>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group my-3">
              <label for="name" class="form-label">الاسم</label>
              <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="الاسم">
            </div>
            <div class="form-group my-3">
              <label class="form-label" for="sex">الجنس</label>
              <select class="form-control form-control-lg" id="sex" name="sex">
                <option value="1">ذكر</option>
                <option value="2">انثى</option>
              </select>
            </div>
            <div class="form-group my-3">
              <label class="form-label" for="nationality">الجنسية</label>
              <select class="form-control form-control-lg" id="nationality" name="nationality">
                <option value="1">يمنية</option>
                <option value="2">سعودية</option>
                <option value="3">مصرية</option>
                <option value="4">اردنية</option>
              </select>
            </div>
            <div class="form-group my-3">
              <label class="form-label" for="years">المرحلة الدراسية</label>
              <select class="form-control form-control-lg" id="years" name="year">
                <option value="1">اول ابتدائي</option>
                <option value="2">ثاني ابتدائي</option>
                <option value="3">ثالث ابتدائي</option>
                <option value="4">رابع ابتدائي</option>
                <option value="5">خامس ابتدائي</option>
                <option value="6">سادس ابتدائي</option>
                <option value="7">اول اعدادي</option>
                <option value="8">ثاني اعدادي</option>
                <option value="9">ثالث اعدادي</option>
                <option value="10">اول ثانوي</option>
                <option value="11">ثاني ثانوي</option>
                <option value="12">ثالث ثانوي</option>
              </select>
            </div>
            <div class="form-group my-3">
              <label class="form-label" for="directorate">المديرية</label>
              <select class="form-control form-control-lg" id="directorate" name="directorate">
                <option value="1">المنصورة</option>
                <option value="2">الشيخ عثمان</option>
                <option value="3">نهم</option>
                <option value="4">همدان</option>
              </select>
            </div>
            <div class="form-group my-3">
              <label class="form-label" for="date-of-birth">تاريخ الميلاد</label>
              <input type="date" class="form-control form-control-lg" id="date-of-birth" name="date-of-birth">
            </div>
            <div class="form-group my-3">
              <label class="form-label" for="address">العنوان</label>
              <input type="text" class="form-control form-control-lg" id="address" name="address" placeholder="العنوان">
            </div>
            <div class="form-group my-3">
              <label class="form-label" for="email">البريد الالكتروني</label>
              <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="البريد الالكتروني">
            </div>
            <div class="form-group my-3">
              <label class="form-label" for="phone">رقم الهاتف</label>
              <input type="text" class="form-control form-control-lg" id="phone" name="phone" placeholder="رقم الهاتف">
            </div>
            <div class="form-group my-3">
              <label class="form-label" for="photo">صورة شخصية</label>
              <input type="file" class="form-control form-control-lg" id="photo" name="photo">
            </div>
            <div class="form-group my-3">
              <label class="form-label" for="birth-certificate">شهادة الميلاد</label>
              <input type="file" class="form-control form-control-lg my-3" id="birth-certificate" name="birth-certificate">
            </div>
            <br>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">ارسال</button>
            </div>
          </form>
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