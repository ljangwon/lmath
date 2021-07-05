<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse overflow-auto">
  <div class="position-sticky pt-3">
    <?php
    $weekString = array("일", "월", "화", "수", "목", "금", "토");
    ?>
    <div class="fw-bold text-center"> ( Today: <?= date("Y-m-d", time() ) ?> <?= $weekString[date('w')] ?> )</div>

    <div class="fs-5 fw-bolder text-decoration-underline text-center mt-2"> 학생명단 </div>

    <!-- Sidebar List 1 start  -->
    <!-- list Title -->
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <a class="link-secondary" data-bs-toggle="collapse" data-bs-target="#nav1-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span data-feather="users"></span>
      </a>
      <span>오늘 학생 리스트 </span>
    </h6>

    <!-- collapse wrapping start -->
    <div id="nav1-collapse" class="table-responsive collapse">

      <!-- nav item start -->
      <ul class="nav flex-column mb-2 overflow-auto">

        <?php
        foreach ($students as $entry) {
          if (
            $entry->class_day1 == date('w') |
            $entry->class_day2 == date('w') |
            $entry->class_day3 == date('w')
          ) {
        ?>

            <li class="nav-item">

            <a class="nav-link" href="<?= site_url('/dashboard/dashboard_get/') ?>/<?= $entry->id ?>">
              <span style="font-size:0.7rem"> <?= $entry->name ?>- <?= $entry->grade1 ?>(<?= $entry->grade2 ?>)-<?= $entry->class_name ?></a>
              </span>
            </a>

            </li>

        <?php
          }
        }
        ?>
      </ul>
      <!-- nav-item end  -->

    </div>
    <!-- collapse wrapping end -->
    <!-- nav list end  -->

    <!-- Sidebar List 2 start  -->
    <!-- list Title -->
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <a class="link-secondary" data-bs-toggle="collapse" data-bs-target="#nav2-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span data-feather="users"></span>
      </a>
      <span>전체 학생 리스트 </span>
    </h6>

    <!-- collapse wrapping start -->
    <div id="nav2-collapse" class="table-responsive collapse">

      <!-- nav item start -->
      <ul class="nav flex-column mb-2" >

        <?php
        foreach ($students as $entry) {
          if (
            $entry->flag == "1"
          ) {
        ?>

            <li class="nav-item">
            <?= site_url('/dashboard/dashboard_get/') ?>/<?= $entry->id ?><?= site_url('/dashboard/dashboard_get/') ?>/<?= $entry->id ?>">
                <span style="font-size:0.7rem"> <?= $entry->name ?>- <?= $entry->grade1 ?>(<?= $entry->grade2 ?>)-<?= $entry->class_name ?></a>
              </span>
              </a>

            </li>

        <?php
          }
        }
        ?>
      </ul>
      <!-- nav-item end  -->

    </div>
    <!-- collapse wrapping end -->
    <!-- nav list end  -->


    <!-- Nav List 3 start  -->
    <!-- nav list Title -->
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <a class="link-secondary" data-bs-toggle="collapse" data-bs-target="#nav3-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span data-feather="users"></span>
      </a>
      <span>학년별 학생 리스트 </span>
    </h6>

    <!-- collapse wrapping start -->
    <div id="nav3-collapse" class="table-responsive collapse">

      <!-- nav item start -->
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="#">
            학생1
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            학생2
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            학생3
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            학생4
          </a>
        </li>
      </ul>
      <!-- nav-item end  -->

    </div>
    <!-- collapse wrapping end -->

    <!-- nav list end  -->
</nav>
