</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href='<?= base_url() ?>'>
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LeanMath<sup>2</sup></div>
      </a>
      <?php
      $weekString = array("일", "월", "화", "수", "목", "금", "토");
      ?>
      <div class="fw-bold text-center text-white">
        Today : (<?= date("Y-m-d", time()) ?> <?= $weekString[date('w')] ?>)</div>
      <div class="fw-bold text-center text-white">
        St_ID : <span id='side_st_id'> <?= $this->session->userdata('st_id') ?> </span><br>
        St_Name : <span id='side_st_name'> <?= $this->session->userdata('st_name') ?> </span> <br>
        User Name : <?= $this->session->userdata('name') ?> </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-3">

      <!-- Heading -->
      <div class="sidebar-heading">
        즐겨찾기
      </div>
      <!-- Nav Item - Study Time Table -->
      <li class="nav-item">
        <a class="nav-link" href='<?= site_url("student2/screen_timetable") ?>'>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>전체 시간표</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href='<?= site_url("student2/screen_timetable_today") ?>'>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>오늘 시간표</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href='<?= site_url("st_study_c") ?>'>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>학습기록</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href='<?= site_url("main_test_c") ?>'>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>평가기록</span>
        </a>
      </li>

      <!-- Nav Item - Dashboard(old)-->
      <li class="nav-item">
        <a class="nav-link" href='<?= site_url("temp_table_c") ?>'>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>임시-table 화면</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href='<?= site_url("user_new_c") ?>'>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>사용자관리</span>
        </a>
      </li>

      <!-- Nav Item - Student Entire List -->
      <li class="nav-item">
        <a class="nav-link" href='<?= site_url("student2/screen_student_list") ?>'>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>전체 학생목록</span>
        </a>
      </li>



      <!-- Nav Item - 수납현황 -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pay1-1" aria-expanded="true" aria-controls="">
          <i class="fas fa-fw fa-cog"></i>
          <span>수납현황</span>
        </a>
        <div id="pay1-1" class="collapse" aria-labelledby="" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href='<?= site_url("payment2") ?>'> 수납현황 </a>
            <a class="collapse-item" href='<?= site_url("payment3") ?>'> 수납영수증 </a>
          </div>
        </div>
      </li>

      <!-- Nav Item - 교재현황 -->
      <li class="nav-item">
        <a class="nav-link" href='<?= base_url("index.php/book") ?>'>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>교재 현황</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        학생명단
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2-1" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>오늘 학생명단</span>
        </a>
        <div id="collapse2-1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Students List:</h6>
            <?php
            foreach ($students as $entry) {
              if (
                $entry->workspace == $this->session->userdata('workspace') &&
                $entry->status == '재원' &&
                $entry->class_day1 == date('w') |
                $entry->class_day2 == date('w') |
                $entry->class_day3 == date('w')
              ) {
            ?>
                <a class="collapse-item" href="<?= site_url('/student2/get_student/') ?>/<?= $entry->id ?>"><?= $entry->name ?>- <?= $entry->grade1 ?>(<?= $entry->grade2 ?>)-<?= $entry->class_name ?> </a>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2-6" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>대기 학생명단</span>
        </a>
        <div id="collapse2-6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Students List:</h6>
            <?php
            foreach ($students as $entry) {
              if (
                $entry->workspace == $this->session->userdata('workspace') &&
                $entry->status == "대기"
              ) {
            ?>
                <a class="collapse-item" href="<?= site_url('/student2/get_student/') ?>/<?= $entry->id ?>"><?= $entry->name ?>- <?= $entry->grade1 ?>(<?= $entry->grade2 ?>)-<?= $entry->class_name ?> </a>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2-7" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>퇴원 학생명단</span>
        </a>
        <div id="collapse2-7" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Students List:</h6>
            <?php
            foreach ($students as $entry) {
              if (
                $entry->workspace == $this->session->userdata('workspace') &&
                $entry->status == "퇴원"
              ) {
            ?>
                <a class="collapse-item" href="<?= site_url('/student2/get_student/') ?>/<?= $entry->id ?>"><?= $entry->name ?>- <?= $entry->grade1 ?>(<?= $entry->grade2 ?>)-<?= $entry->class_name ?> </a>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse4-2" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>프로세스 관리</span>
        </a>
        <div id="collapse4-2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">시간표 관리:</h6>
            <a class="collapse-item" href="/leanmath/admin/login.html">주간 시간표 </a>
            <a class="collapse-item" href="/leanmath/admin/register.html">결시자 관리 </a>
            <a class="collapse-item" href="/leanmath/admin/forgot-password.html">보충수업 관리 </a>
            <h6 class="collapse-header">입반 프로세스:</h6>
            <a class="collapse-item" href="/leanmath/admin/login.html">대기자 관리</a>
            <a class="collapse-item" href="/leanmath/admin/register.html">모집 공고</a>
            <a class="collapse-item" href="/leanmath/admin/forgot-password.html">레벨평가 관리</a>
            <h6 class="collapse-header">학습 관리:</h6>
            <a class="collapse-item" href="/leanmath/admin/login.html">학습기록 관리</a>
            <a class="collapse-item" href="/leanmath/admin/register.html">교재 관리</a>
            <a class="collapse-item" href="/leanmath/admin/forgot-password.html">평가지 관리</a>
            <a class="collapse-item" href="/leanmath/admin/forgot-password.html">성적 관리</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">내신관리:</h6>
            <a class="collapse-item" href="/leanmath/admin/404.html">내신프로세스관리</a>
            <a class="collapse-item" href="/leanmath/admin/blank.html">모의고사관리</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse4-3" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>시스템 관리</span>
        </a>
        <div id="collapse4-3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login 프로세스:</h6>
            <a class="collapse-item" href="/leanmath/admin/register.html">Register</a>
            <a class="collapse-item" href="/leanmath/admin/login.html">Login</a>
            <a class="collapse-item" href="/leanmath/admin/forgot-password.html">Logout</a>
            <a class="collapse-item" href="/leanmath/admin/forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">환경 설정:</h6>
            <a class="collapse-item" href="/leanmath/admin/404.html">학원코드 설정</a>
            <a class="collapse-item" href="/leanmath/admin/404.html">선생님 등록</a>
            <a class="collapse-item" href="/leanmath/admin/404.html">직원 등록</a>
            <a class="collapse-item" href="/leanmath/admin/404.html">코드관리</a>
            <a class="collapse-item" href="/leanmath/admin/blank.html">환경 설정</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->