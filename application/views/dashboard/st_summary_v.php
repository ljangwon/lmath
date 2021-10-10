<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <div>
    <h3> 학생현황 요약 </h3>

    <p>초4 : <?= $st_count_e4->cnt ?> 명 </p>
    <p>초5 : <?= $st_count_e5->cnt ?> 명 </p>
    <p>초6 : <?= $st_count_e6->cnt ?> 명 </p>
    <p class="d-inline"> 초등 전체 :
    <div class="d-inline text-primary"> <?= $st_count_e->cnt ?> </div> 명 = 총 <?= number_format($st_fees_sum_e->fees) ?> 원 </P>
    <hr>
    <p>중1 : <?= $st_count_m1->cnt ?> 명 </p>
    <p>중2 : <?= $st_count_m2->cnt ?> 명 </p>
    <p>중3 : <?= $st_count_m3->cnt ?> 명 </p>
    <p class="d-inline"> 중등 전체 :
    <div class="d-inline text-primary"> <?= $st_count_m->cnt ?> </div> 명 = 총 <?= number_format($st_fees_sum_m->fees) ?> 원 </p>
    <hr>
    <p>고1 : <?= $st_count_h1->cnt ?> 명 </p>
    <p>고2 : <?= $st_count_h2->cnt ?> 명 </p>
    <p>고3 : <?= $st_count_h3->cnt ?> 명 </p>
    <p class="d-inline"> 고등 전체 :
    <div class="d-inline text-primary"> <?= $st_count_h->cnt ?> </div> 명 = 총 <?= number_format($st_fees_sum_h->fees) ?> 원 </p>
    <hr>
    <p class="d-inline"> 전체 인원 :
    <div class="d-inline text-primary"> <?= $st_count_e->cnt + $st_count_m->cnt + $st_count_h->cnt ?></div> 명 </p>
    <p class="d-inline"> 전체 매출 :
    <div class="d-inline text-primary"> <?= number_format($st_fees_sum_e->fees + $st_fees_sum_m->fees + $st_fees_sum_h->fees) ?> </div> 원 </p>
  </div>

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
    <ul class="nav flex-column mb-2 list">
      월금 수업
      <?php
      foreach ($students as $entry) {
        if (
          $entry->flag == "1" &&
          $entry->class_day1 ==  '1' &&
          $entry->class_day2 ==  '5'
        ) {
      ?>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('/dashboard/dashboard_get/') ?>/<?= $entry->id ?>">
              <span style="font-size:1.5rem"> <?= $entry->name ?>- <?= $entry->grade1 ?>(<?= $entry->grade2 ?>)-<?= $entry->class_name ?>-수강료:<?= $entry->fees ?></a>
            </span>
            </a>

          </li>

      <?php
        }
      }
      ?>
    </ul>
    <!-- nav-item end  -->

    <!-- nav item start -->
    <ul class="nav flex-column mb-2 list">
      화목 수업
      <?php
      foreach ($students as $entry) {
        if (
          $entry->flag == "1" &&
          $entry->class_day1 ==  '2' &&
          $entry->class_day2 ==  '4'
        ) {
      ?>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('/dashboard/dashboard_get/') ?>/<?= $entry->id ?>">
              <span style="font-size:1.5rem"> <?= $entry->name ?>- <?= $entry->grade1 ?>(<?= $entry->grade2 ?>)-<?= $entry->class_name ?>-수강료:<?= $entry->fees ?></a>
            </span>
            </a>

          </li>

      <?php
        }
      }
      ?>
    </ul>
    <!-- nav-item end  -->

    <!-- nav item start -->
    <ul class="nav flex-column mb-2 list">
      수토 수업

      <?php
      foreach ($students as $entry) {
        if (
          $entry->flag == "1" &&
          $entry->class_day1 ==  '3' &&
          $entry->class_day2 ==  '6'
        ) {
      ?>

          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('/dashboard/dashboard_get/') ?>/<?= $entry->id ?>">
              <span style="font-size:1.5rem"> <?= $entry->name ?>- <?= $entry->grade1 ?>(<?= $entry->grade2 ?>)-<?= $entry->class_name ?>-수강료:<?= $entry->fees ?></a>
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
  <!-- nav list2 end  -->

</main>

<script type="text/javascript">
  $(document).ready(function() {
    let ul = $('.list');
    ul.css('font-size', 'x-large');
  });
</script>