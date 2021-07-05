<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  session_st_id : <?=$this->session->userdata('st_id')?>
	<!-- section start -->
	<form id="st_info_modify" action="<?= site_url() ?>/dashboard/st_modify" method="post">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="main-title">학생 인적사항 </div>
		<div class="btn-toolbar mb-1 mb-md-0">
			<div class="btn-group me-2">
				<a type="button" class="btn btn-sm btn-outline-secondary btn-toggle" data-bs-toggle="collapse" data-bs-target="#main1-collapse" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
					접고펴기
				</a>
				<button type="submit" class="btn btn-sm btn-outline-secondary">
					수정
				</button>
			</div>
		</div>
	</div>

	<!-- collapse start -->
	<div id="main1-collapse" class="row collapse.show">
		<div class="col-sm-1 text-center">
			<label for="" class="form-label">ST_ID</label>
			<input type="text" name="id" class="form-control"  
			placeholder="" value="<?=$student->id?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">이 름</label>
			<input type="text" name="name" class="form-control"  
			placeholder="" value="<?=$student->name?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">학 교</label>
			<input type="text" name="school_name" class="form-control"  
			placeholder="" value="<?=$student->school_name?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label text-nowrap">구 분</label>
			<input type="text" name="grade1" class="form-control"  
			placeholder="" value="<?=$student->grade1?>">
		</div>

		<div class="col-sm-1 text-center text-nowrap">
			<label for="" class="form-label">학 년</label>
			<input type="text" name="grade2" class="form-control"  
			placeholder="" value="<?=$student->grade2?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">수업명</label>
			<input type="text" name="class_name" class="form-control"  
			placeholder="" value="<?=$student->class_name?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">요일1</label>
			<input type="text" name="class_day1" class="form-control"  
			placeholder="" value="<?=$student->class_day1?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">시간1</label>
			<input type="text" name="class_time1" class="form-control"  
			placeholder="" value="<?=$student->class_time1?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">요일2</label>
			<input type="text" name="class_day2" class="form-control"  
			placeholder="" value="<?=$student->class_day2?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">시간2</label>
			<input type="text" name="class_time2" class="form-control"  
			placeholder="" value="<?=$student->class_time2?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">요일3</label>
			<input type="text" name="class_day3" class="form-control"  
			placeholder="" value="<?=$student->class_day3?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">시간3</label>
			<input type="text" name="class_time3" class="form-control"  
			placeholder="" value="<?=$student->class_time3?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">수업료</label>
			<input type="text" name="fees" class="form-control"  
			placeholder="" value="<?=$student->fees?>">
		</div>

		<div class="col-sm-2 text-center">
			<label for="" class="form-label">수강여부</label>
			<input type="text" name="flag" class="form-control"  
			placeholder="" value="<?=$student->flag?>">
		</div>

		<div class="col-sm-6 text-center">
			<label for="" class="form-label">메모</label>
			<textarea name="memo" placeholder="메모"
			 class="form-control text-start" rows="5"><?= $student->memo ?> </textarea>
		</div>
	</form>

	</div>
	<!-- collapse end -->

	<!-- section end -->

	<!-- section start -->
	<form id="st_schedule_modify" action="<?= site_url() ?>/dashboard/schedule_modify" method="post">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="main-title"
		 data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="자기주도학습 시간 기록">
		 자기주도학습 시간계획 </div>
		<div class="btn-toolbar mb-1 mb-md-0">
			<div class="btn-group me-2">
				<a type="button" class="btn btn-sm btn-outline-secondary btn-toggle" data-bs-toggle="collapse" data-bs-target="#main2-1-collapse" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
					접고펴기
				</a>
				<button type="submit" class="btn btn-sm btn-outline-secondary">
					수정
				</button>
           
				<button type="button" onclick="location.href='<?= site_url('/dashboard/schedule_add/')?>'" 
					class="btn btn-sm btn-outline-secondary">
					추가
				</button>
				<button type="button" id="btn_open" class="btn btn-sm btn-outline-secondary"  
				    data-bs-toggle="modal" data-bs-target="#schedule_add">
					modal
				</button>
			</div>
		</div>
	</div>

 <!-- Button trigger modal -->

<!-- Modal1 -->
<div class="modal fade" id="schedule_add" tabindex="-1" 
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">스케줄 추가</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        스케줄을 추가합니다.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

	<!-- collapse start -->
	<div id="main2-1-collapse" class="row collapse.show">
		<div class="table-responsive">
			<table class="table-sm">
				<thead>
					<tr>
						<th scope="col" class="text-center text-nowrap"># </th>
						<th scope="col" class="text-center text-nowrap">월</th>
						<th scope="col" class="text-center text-nowrap">화</th>
						<th scope="col" class="text-center text-nowrap">수</th>
						<th scope="col" class="text-center text-nowrap">목</th>
						<th scope="col" class="text-center text-nowrap">금</th>
						<th scope="col" class="text-center text-nowrap">토</th>
						<th scope="col" class="text-center text-nowrap">일</th>
						<th scope="col" class="text-center text-nowrap">합계</th>
						<th scope="col" class="text-center text-nowrap">시작일</th>
						<th scope="col" class="text-center text-nowrap">종료일</th>
						<th scope="col" class="text-center text-nowrap">삭제</th>

					</tr>
				</thead>

				<tbody>
				<?php
        foreach ($schedules as $entry) {
          if (
							true
          ) {
        ?>
					<tr>
						<td class="text-nowrap">자기주도</td>
						<td><input type="text" name="mon_s"
						class="form-control text-center " placeholder="" value="<?=$entry->mon_s?>"></td>
						<td><input type="text" name="tue_s"
						class="form-control text-center"  placeholder="" value="<?=$entry->tue_s?>"></td>
						<td><input type="text" name="wed_s"
						class="form-control text-center"  placeholder="" value="<?=$entry->wed_s?>"></td>
						<td><input type="text" name="thr_s"
						class="form-control text-center"  placeholder="" value="<?=$entry->thr_s?>"></td>
						<td><input type="text" name="fri_s"
						class="form-control text-center"  placeholder="" value="<?=$entry->fri_s?>"></td>
						<td><input type="text" name="sat_s"
						class="form-control text-center"  placeholder="" value="<?=$entry->sat_s?>"></td>
						<td><input type="text" name="sun_s"
						class="form-control text-center"  placeholder="" value="<?=$entry->sun_s?>"></td>
						<td><input type="text" name="time_per_week"
						class="form-control text-center"  placeholder="" value="<?=$entry->time_per_week?>"> </td>
						<td ><input size=100 type="text" name="s_date"
						class="form-control text-center text-nowrap"  placeholder="" value="<?=$entry->s_date?>"></td>
						<td><input size=100 type="text" name="e_date"
						 class="form-control text-center text-nowrap"  placeholder="" value="<?=$entry->e_date?>"></td>
						<td><input type="button" onclick="location.href='<?= site_url('/dashboard/schedule_delete/'. $entry->id )?>'" 
						class="form-control text-center"  placeholder="" value="삭제"></td>
					</tr>

        <?php
          }
        }
        ?>

					
				</tbody>
			</table>
		</div>

	</div>
	</form>
	<!-- collapse end -->

	

	<!-- section start -->
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="main-title"> 과제 검사 기록 </div>
		<div class="btn-toolbar mb-1 mb-md-0">
			<div class="btn-group me-2">
				<a type="button" class="btn btn-sm btn-outline-secondary btn-toggle" data-bs-toggle="collapse" data-bs-target="#main2-2-collapse" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
					접고펴기
				</a>
				<button type="button" class="btn btn-sm btn-outline-secondary">
					버튼
				</button>
			</div>
		</div>
	</div>

	<!-- collapse start -->
	<div id="main2-2-collapse" class="row collapse">
		<div class="col-sm-3">
			<label for="" class="form-label">이 름</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

	</div>
	<!-- collapse end -->


	<!-- section start -->
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="main-title">지적사항 메모 </div>
		<div class="btn-toolbar mb-1 mb-md-0">
			<div class="btn-group me-2">
				<a type="button" class="btn btn-sm btn-outline-secondary btn-toggle" data-bs-toggle="collapse" data-bs-target="#main3-1-collapse" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
					접고펴기
				</a>
				<button type="button" class="btn btn-sm btn-outline-secondary">
					버튼
				</button>
			</div>
		</div>
	</div>

	<!-- collapse start -->
	<div id="main3-1-collapse" class="row collapse">
		<div class="col-sm-3">
			<label for="" class="form-label">이 름</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

	</div>
	<!-- collapse end -->

	<!-- section start -->
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="main-title">지각결석 메모 </div>
		<div class="btn-toolbar mb-1 mb-md-0">
			<div class="btn-group me-2">
				<a type="button" class="btn btn-sm btn-outline-secondary btn-toggle" data-bs-toggle="collapse" data-bs-target="#main3-2-collapse" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
					접고펴기
				</a>
				<button type="button" class="btn btn-sm btn-outline-secondary">
					버튼
				</button>
			</div>
		</div>
	</div>

	<!-- collapse start -->
	<div id="main3-2-collapse" class="row collapse">
		<div class="col-sm-3">
			<label for="" class="form-label">이 름</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

	</div>
	<!-- collapse end -->

	<!-- section end -->

	<!-- section start -->
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="main-title">학습 교재 이력 (최근 6개월) </div>
		<div class="btn-toolbar mb-1 mb-md-0">
			<div class="btn-group me-2">
				<a type="button" class="btn btn-sm btn-outline-secondary btn-toggle" data-bs-toggle="collapse" data-bs-target="#main4-1-collapse" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
					접고펴기
				</a>
				<button type="button" class="btn btn-sm btn-outline-secondary">
					버튼
				</button>
			</div>
		</div>
	</div>

	<!-- collapse start -->
	<div id="main4-1-collapse" class="row collapse">
		<div class="col-sm-3">
			<label for="" class="form-label">이 름</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>


	</div>
	<!-- collapse end -->

	<!-- section end -->

	<!-- section start -->
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="main-title"> 진행 중인 학습 기록 </div>
		<div class="btn-toolbar mb-1 mb-md-0">
			<div class="btn-group me-2">
				<a type="button" class="btn btn-sm btn-outline-secondary btn-toggle" data-bs-toggle="collapse" data-bs-target="#main4-2-collapse" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
					접고펴기
				</a>
				<button type="button" class="btn btn-sm btn-outline-secondary">
					버튼
				</button>
			</div>
		</div>
	</div>

	<!-- collapse start -->
	<div id="main4-2-collapse" class="row collapse">
		<div class="col-sm-3">
			<label for="" class="form-label">이 름</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

	</div>
	<!-- collapse end -->

	<!-- section end -->

	<!-- section start -->
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="main-title"> 테스트 결과 기록 </div>
		<div class="btn-toolbar mb-1 mb-md-0">
			<div class="btn-group me-2">
				<a type="button" class="btn btn-sm btn-outline-secondary btn-toggle" data-bs-toggle="collapse" data-bs-target="#main5-1-collapse" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
					접고펴기
				</a>
				<button type="button" class="btn btn-sm btn-outline-secondary">
					버튼
				</button>
			</div>
		</div>
	</div>

	<!-- collapse start -->
	<div id="main5-1-collapse" class="row collapse">
		<div class="col-sm-3">
			<label for="" class="form-label">이 름</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control"  placeholder="" value="">
		</div>

	</div>
	<!-- collapse end -->

	<!-- section end -->

</main>