<?php
 ?>
<link rel="icon" href="favicon.ico" type="image/ico">
<link rel="stylesheet" href="http://localhost/dist/css/bootstrap.rtl.min.css">
<style>
  .hdr {
    box-shadow: 0px 5px 20px -5px #00044352;
    width: 100%;
  }

  .myul {
    margin: auto;
    height: 100%;
  }

  .narflex {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
</style>
<nav class="navbar navbar-expand-xl p-3  navbar-light hdr" style="margin-bottom: 25px;background-color: #2f2b38;">
  <div class="container-fluid narflex">
    <a href="http://localhost/home" class="d-flex align-items-center mx-lg-5 mb-2 mb-lg-0 text-white text-decoration-none">
      <img src="http://localhost/logo.png" alt="logo" style="height: 64px; width: 64px;">

    </a>
    <div class="text-end mx-lg-5">
      <?php
      if (!isset($name))
        echo '<a href=' . '"http://localhost/sign-in"' . ' class="btn btn-outline-secondary me-2" style="text-decoration: none;">تسجيل الدخول</a>';
      else {
        $userType = (($type === 'S') ? "الطالب" : "الموظف");
        echo <<< "isIn"
        <div class="dropdown">
          <button type="button" class="dropdown-toggle text-light btn btn-outline-secondary" data-bs-toggle="dropdown">
            $name
          </button>
          <ul class="dropdown-menu bg-dark bg-dark">
            <li><a class="dropdown-item  text-light" href="http://localhost/profile">معلومات $userType</a></li>
            <li><a class="dropdown-item text-light" href="http://localhost/sign-out.php">تسجيل الخروج</a></li>
          </ul>
        </div>
        isIn;
      }
      ?>
    </div>
    <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample05">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li><a href="http://localhost/home" class="nav-link px-2 text-light">الرئيسي</a></li>
        <li>
          <div class="dropdown">
            <button type="button" class="btn text-light dropdown-toggle" data-bs-toggle="dropdown">
              عن الوزارة
            </button>
            <ul class="dropdown-menu bg-dark bg-dark">
              <li><a class="dropdown-item  text-light" href="http://localhost/about/ministry">عن وزارة التربية والتعليم</a></li>
              <li><a class="dropdown-item text-light" href="http://localhost/about/minister">عن الوزير</a></li>
              <li><a class="dropdown-item text-light" href="http://localhost/about/goals">أهداف الوزارة</a></li>
            </ul>
          </div>
        </li>
        <li><a href="http://localhost/statistics" class="nav-link px-2 text-light">الإحصائيات</a></li>
        <?php
        if (!isset($type) || $type === "S") {
          echo <<< "studentServices"
          <li>
            <div class="dropdown">
              <button type="button" class="btn text-light dropdown-toggle" data-bs-toggle="dropdown">
              خدمات الكترونية
              </button>
              <ul class="dropdown-menu bg-dark">
                <li><a class="dropdown-item text-light" href="http://localhost/requests/results">عرض النتائج</a></li>
                <li><a class="dropdown-item text-light" href="http://localhost/requests/certificate">طلب اصدار شهادة</a></li>
                <li><a class="dropdown-item text-light" href="http://localhost/requests/scholarship">طلب بعثة دراسية</a></li>
                <li><a class="dropdown-item text-light" href="http://localhost/requests/equation">معادلة شهادة</a></li>
                <li><a class="dropdown-item text-light" href="http://localhost/books">تحميل المنهج</a></li>
              </ul>
            </div>
          </li>
          studentServices;
        } else if (isset($type) && @$type === "E" && @$isAdmin == true) {
          echo <<< "studentServices"
          <li>
            <div class="dropdown">
              <button type="button" class="btn text-light dropdown-toggle" data-bs-toggle="dropdown">
              مراجعة الطلبات
              </button>
              <ul class="dropdown-menu bg-dark">
              <li><a class="dropdown-item text-light" href="http://localhost/review/registers">طلبات تسجيل الطلاب</a></li>
                <li><a class="dropdown-item text-light" href="#">طلبات اصدار شهادة</a></li>
                <li><a class="dropdown-item text-light" href="#">طلبات بعثة دراسية</a></li>
                <li><a class="dropdown-item text-light" href="#">طلبات معادلة شهادة</a></li>
              </ul>
            </div>
          </li>
          studentServices;
        }
        ?>

        <li><a href="http://localhost/news" class="nav-link px-2 text-light">الأخبار</a></li>
        <li>
          <div class="dropdown">
            <button type="button" class="btn text-light dropdown-toggle" data-bs-toggle="dropdown">
              برامج ودورات
            </button>
            <ul class="dropdown-menu bg-dark">
              <li><a class="dropdown-item text-light" href="http://localhost/calendar">جدول السنة الدراسية</a></li>
              <li><a class="dropdown-item text-light" href="http://localhost/courses">البرامج والدورات</a></li>
            </ul>
          </div>
        </li>
        <li><a href="http://localhost/schools" class="nav-link px-2 text-light">قائمة المدارس</a></li>
        <!-- <li><a href="http://localhost/jobs"class="nav-link px-2 text-light">الوظائف</a></li> -->
        <li>
          <div class="dropdown">
            <button type="button" class="btn text-light dropdown-toggle" data-bs-toggle="dropdown">
              تواصل
            </button>
            <ul class="dropdown-menu bg-dark">
              <li><a class="dropdown-item text-light" href="http://localhost/contact">معلومات التواصل</a></li>
              <li><a class="dropdown-item text-light" href="http://localhost/csi">الشكاوي والاقتراحات والاستعلامات</a></li>
              <li><a class="dropdown-item text-light" href="http://localhost/faq">أسئلة متكررة</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>