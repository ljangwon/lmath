<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

	<div>
		<h3> 학생현황 요약 </h3>

		<p>초4 : <?= $st_count_e4->cnt ?> 명 </p>
		<p>초5 : <?= $st_count_e5->cnt ?> 명 </p>
		<p>초6 : <?= $st_count_e6->cnt ?> 명 </p>
		<p class="d-inline"> 초등 전체 : <div class="d-inline text-primary"> <?= $st_count_e->cnt ?> </div> 명 = 총 <?= number_format($st_fees_sum_e->fees) ?> 원 </P>
		<hr>
		<p>중1 : <?= $st_count_m1->cnt ?> 명 </p>
		<p>중2 : <?= $st_count_m2->cnt ?> 명 </p>
		<p>중3 : <?= $st_count_m3->cnt ?> 명 </p>
		<p class="d-inline"> 중등 전체 : <div class="d-inline text-primary"> <?= $st_count_m->cnt ?> </div> 명 = 총 <?= number_format($st_fees_sum_m->fees) ?> 원 </p>
		<hr>
		<p>고1 : <?= $st_count_h1->cnt ?> 명 </p>
		<p>고2 : <?= $st_count_h2->cnt ?> 명 </p>
		<p>고3 : <?= $st_count_h3->cnt ?> 명 </p>
		<p class="d-inline"> 고등 전체 : <div class="d-inline text-primary"> <?= $st_count_h->cnt ?> </div> 명 = 총 <?= number_format($st_fees_sum_h->fees) ?> 원 </p>
		<hr>
		<p class="d-inline"> 전체 인원 : <div class="d-inline text-primary"> <?= $st_count_e->cnt + $st_count_m->cnt + $st_count_h->cnt ?></div> 명 </p>
		<p class="d-inline"> 전체 매출 : <div class="d-inline text-primary"> <?= number_format($st_fees_sum_e->fees + $st_fees_sum_m->fees + $st_fees_sum_h->fees) ?> </div> 원 </p>
	</div>

</main>