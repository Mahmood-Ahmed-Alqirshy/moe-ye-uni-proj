<?php include("../../userCheck.php") ?>
<?php include("../../auth.php") ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  if ($_GET['year'] == 12 && $_GET['term'] == 2) {
    if ($_GET['seat-number'] == "") {
      header('location: http://localhost/requests/results/index.php?error=yes');
      die();
    }
    $isvalidSeatNumberQuery = $DB->prepare("select (select ID from Student_auth where session_id = ?)as 'userID', (select student_ID from Seat_numbers where seat_number = ?) as 'seatNumberID';");
    $isvalidSeatNumberQuery->execute([$_SESSION['session_id'], $_GET['seat-number']]);
    $result = $isvalidSeatNumberQuery->fetch();
    if ($result->userID !== $result->seatNumberID) {
      header('location: http://localhost/requests/results/index.php?error=yes');
      die();
    }
  }
} else {
  header('location: http://localhost/requests/results/index.php?error=yes');
  die();
}
$marks = $DB->prepare("select students_results.ID as id, students_results.mark as mark, subjects.studying_subject as subject from students_results join subjects on students_results.result_subject = subjects.ID where grade = ? and term = ? and student_ID = (select ID from Student_auth where session_id = ?);");
$marks->execute([$_GET['year'], $_GET['term'], $_SESSION['session_id']]);
$data = $marks->fetchAll();
if (count($data) < 1) {
  header('location: http://localhost/requests/results/index.php?error=yes');
  die();
}
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>درجات الطالب</title>

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
    <img src="1.png" class="mb-4 text-white rounded bg-dark cover-img">

    <div class="row">
      <div class="col-md-8">
        <article class="blog-post">
          <form action="/moe-yemen/home" method="get">
            <table class="table">
              <tr>
                <td>المادة</td>
                <td>الدرجة من مائة</td>
              </tr>
              <?php
              foreach ($data as $value) {
                echo '<tr>';
                echo '<td>' . $value->subject . '</td>';
                echo '<td> <label class="mx-3 form-check-label" for="' . $value->id . '">' . $value->mark . '</label><input name="g" id="' . $value->id . '" type="checkbox" class="collapse multi-collapse form-check-input" value="' . $value->id . '">' . '</td>';
              }
              ?>
              <tr>
                <td>المجموع</td>
                <td>
                  <?php
                  $sum = 0;
                  foreach ($data as $value) {
                    $sum += $value->mark;
                  }
                  echo '<p class="mx-3">' . $sum . '</p>';
                  ?>
                </td>
              </tr>
              <tr>
                <td>المحصلة</td>
                <td>
                  <?php
                  $sum = 0;
                  foreach ($data as $value) {
                    $sum += $value->mark;
                  }
                  echo '<p class="mx-3">%' . round($sum / count($data), 2) . '</p>';
                  ?>
                </td>
              </tr>
            </table>
            <button type="button" hidden class="btn btn-primary mx-3" data-bs-toggle="collapse" data-bs-target=".multi-collapse">تظلم</button>
            <button type="submit" class="collapse multi-collapse btn btn-primary" id="www">ارسال</button>
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