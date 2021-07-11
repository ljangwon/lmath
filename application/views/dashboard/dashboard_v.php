<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	session_st_id : <?= $this->session->userdata('st_id') ?>

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
					<button type="button" id="btn_st_add" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#student_add">
						학생추가
					</button>
					<button type="button" id="btn_st_del" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#student_del">
						학생삭제
					</button>
				</div>
			</div>
		</div>

		<!-- collapse start -->
		<div id="main1-collapse" class="row collapse">
			<div class="col-sm-1 text-center">
				<label for="" class="form-label">ST_ID</label>
				<input type="text" name="id" class="form-control" placeholder="" value="<?= $student->id ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">이 름</label>
				<input type="text" name="name" class="form-control" placeholder="" value="<?= $student->name ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">학 교</label>
				<input type="text" name="school_name" class="form-control" placeholder="" value="<?= $student->school_name ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label text-nowrap">구 분</label>
				<input type="text" name="grade1" class="form-control" placeholder="" value="<?= $student->grade1 ?>">
			</div>

			<div class="col-sm-1 text-center text-nowrap">
				<label for="" class="form-label">학 년</label>
				<input type="text" name="grade2" class="form-control" placeholder="" value="<?= $student->grade2 ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">수업명</label>
				<input type="text" name="class_name" class="form-control" placeholder="" value="<?= $student->class_name ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">요일1</label>
				<input type="text" name="class_day1" class="form-control" placeholder="" value="<?= $student->class_day1 ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">시간1</label>
				<input type="text" name="class_time1" class="form-control" placeholder="" value="<?= $student->class_time1 ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">요일2</label>
				<input type="text" name="class_day2" class="form-control" placeholder="" value="<?= $student->class_day2 ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">시간2</label>
				<input type="text" name="class_time2" class="form-control" placeholder="" value="<?= $student->class_time2 ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">요일3</label>
				<input type="text" name="class_day3" class="form-control" placeholder="" value="<?= $student->class_day3 ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">시간3</label>
				<input type="text" name="class_time3" class="form-control" placeholder="" value="<?= $student->class_time3 ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">수업료</label>
				<input type="text" name="fees" class="form-control" placeholder="" value="<?= $student->fees ?>">
			</div>

			<div class="col-sm-2 text-center">
				<label for="" class="form-label">수강여부</label>
				<input type="text" name="flag" class="form-control" placeholder="" value="<?= $student->flag ?>">
			</div>

			<div class="col-sm-6 text-center">
				<label for="" class="form-label">메모</label>
				<textarea name="memo" placeholder="메모" class="form-control text-start" rows="5"><?= $student->memo ?> </textarea>
			</div>
		</div>
	</form>

	<!-- Button trigger modal -->
	<!-- Modal1 -->
	<div class="modal fade" id="student_add" aria-labelledby="student_add" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="st_add_Label">학생 추가</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= site_url() ?>/dashboard/st_add" method="post">
						<input type="text" name="name" placeholder="이름" class="span12" />
						<input type="text" name="class_name" placeholder="수업이름" class="span12" />
						<div class="form_control">
							<input class="btn" type="submit" value="학생추가" />
							<a href="<?= site_url('/dashboard') ?>" class="btn">대시보드</a>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Button trigger modal -->
	<!-- Modal2 -->
	<div class="modal fade" id="student_del" aria-labelledby="student_del" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title" id="st_delete_Label">학생 삭제</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<form action="<?= site_url() ?>/dashboard/st_delete" method="post">
						<input type="hidden" name="student_id" value="<?= $student->id ?>" />
						<div class="form_control">
							정말로 <?= $student->name ?> 을 삭제하시겠습니까?
							<br>
							<input class="btn" type="submit" value="학생삭제" />
							<a href="<?= site_url('/dashboard') ?>" class="btn">대시보드</a>
						</div>
					</form>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>

			</div>

		</div>
	</div>

	<!-- collapse end -->
	<!-- section end -->

	<!-- section 2 start -->
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="main-title" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="자기주도학습 시간 기록">
			자기주도학습 시간계획 </div>
		<div class="btn-toolbar mb-1 mb-md-0">
			<div class="btn-group me-2">
				<a type="button" class="btn btn-sm btn-outline-secondary btn-toggle" data-bs-toggle="collapse" data-bs-target="#main2-1-collapse" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
					접고펴기
				</a>
				<button type="button" onclick="location.href='<?= site_url('/dashboard/schedule_add/') ?>'" class="btn btn-sm btn-outline-secondary">
					추가
				</button>
			</div>
		</div>
	</div>

	<!-- collapse start -->
	<div id="main2-1-collapse" class="row collapse.show">

		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr class="d-flex flex-nowrap">
						<th class="col-1 text-center text-nowrap"># </th>
						<th class="col-1 text-center text-nowrap">월</th>
						<th class="col-1 text-center text-nowrap">화</th>
						<th class="col-1 text-center text-nowrap">수</th>
						<th class="col-1 text-center text-nowrap">목</th>
						<th class="col-1 text-center text-nowrap">금</th>
						<th class="col-1 text-center text-nowrap">토</th>
						<th class="col-1 text-center text-nowrap">일</th>
						<th class="col-1 text-center text-nowrap">합계</th>
						<th class="col-1 text-center text-nowrap">시작일</th>
						<th class="col-1 text-center text-nowrap">종료일</th>
						<th class="col-1 text-center text-nowrap">수정/삭제</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$seq = 1;
					foreach ($schedules as $entry) {
						if (
							true
						) {
					?>
							<tr class="d-flex flex-nowrap">
								<form id="schedule_<?$seq?>" action="<?= site_url('dashboard/schedule_modify') ?>" method="post">
									<th class="col-1 text-nowrap"><?= $seq++ ?></th>
									<input type="hidden" name="id" value="<?= $entry->id ?>">
									<input type="hidden" name="st_id" value="<?= $entry->st_id ?>">
									<td class="col-1"><input type="text" size=2 name="mon_s" class="text-center " value="<?= $entry->mon_s ?>"></td>
									<td class="col-1"><input type="text" size=2 name="tue_s" class="text-center" value="<?= $entry->tue_s ?>"></td>
									<td class="col-1"><input type="text" size=2 name="wed_s" class="text-center" value="<?= $entry->wed_s ?>"></td>
									<td class="col-1"><input type="text" size=2 name="thr_s" class="text-center" value="<?= $entry->thr_s ?>"></td>
									<td class="col-1"><input type="text" size=2 name="fri_s" class="text-center" value="<?= $entry->fri_s ?>"></td>
									<td class="col-1"><input type="text" size=2 name="sat_s" class="text-center" value="<?= $entry->sat_s ?>"></td>
									<td class="col-1"><input type="text" size=2 name="sun_s" class="text-center" value="<?= $entry->sun_s ?>"></td>
									<td class="col-1"><input type="text" size=2 name="time_per_week" class="text-center" value="<?= $entry->time_per_week ?>"> </td>
									<td class="col-1"><input type="text" size=20 name="s_date" class="text-left text-nowrap" value="<?= $entry->s_date ?>"></td>
									<td class="col-1"><input type="text" size=20 name="e_date" class="text-left text-nowrap" value="<?= $entry->e_date ?>"></td>
									<td class="col-1 d-flex">
											<input type="submit" class="text-center" value="수정">
											/<input type="button" onclick="location.href='<?= site_url('/dashboard/schedule_delete/' . $entry->id) ?>'" class="text-center" value="삭제">
									</td>

								</form>
							</tr>

					<?php
						}
					}
					?>
				</tbody>
			</table>
		</div>

	</div>

	<!-- collapse end -->

	<!-- section 2 start -->
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="main-title" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="지적사항 메모">
			지적사항 메모 </div>
		<div class="btn-toolbar mb-1 mb-md-0">
			<div class="btn-group me-2">
				<a type="button" class="btn btn-sm btn-outline-secondary btn-toggle" data-bs-toggle="collapse" data-bs-target="#checkmemo-collapse" aria-controls="main-collapse" aria-expanded="false" aria-label="Toggle navigation">
					접고펴기
				</a>
				<button type="button" onclick="location.href='<?= site_url('/dashboard/checkmemo_add/') ?>'" class="btn btn-sm btn-outline-secondary">
					추가
				</button>
			</div>
		</div>
	</div>

	<!-- collapse start -->
	<div id="checkmemo-collapse" class="row collapse">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center text-nowrap">구분 </th>
						<th class="text-center text-nowrap">날짜</th>
						<th class="text-center text-nowrap">지적사항</th>
						<th class="text-center text-nowrap">상태</th>
						<th class="text-center text-nowrap">수정/삭제</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$seq = 1;
					foreach ($checkmemos as $entry) {
						if (
							true
						) {
					?>
						<form id="checkmemo_<?=$seq?>" action="<?= site_url('dashboard/checkmemo_modify') ?>" method="post">
							<tr>
									<th class="text-nowrap"> <?= $seq++ ?> </th>
									<input type="hidden" name="id" value="<?= $entry->id ?>">
									<input type="hidden" name="st_id" value="<?= $entry->st_id ?>">
									<td><input type="text" name="m_date" size=10 class="text-start" placeholder="" value="<?= $entry->m_date ?>"></td>

									<td><textarea name="memo" cols=50 rows="2" class="text-start"><?= $entry->memo ?> </textarea>
									
									<td rowspan=2 ><input type="text" size=5 name="status" class="text-center" placeholder="" value="<?= $entry->status ?>"></td>
									<td rowspan=2 class="col-1 d-flex text-center">
											<input type="submit" class="text-center" value="수정">
											/<input type="button" onclick="location.href='<?= site_url('/dashboard/checkmemo_delete/' . $entry->id) ?>'" class="text-center" value="삭제">
									</td>
							</tr>
							<tr>
									<th class="text-nowrap"> --> </th>
									<td> 조치내용 </td>
									<td><textarea name="f_memo" cols=50 rows="2" class="text-start"><?= $entry->f_memo ?> </textarea>
							</tr>
						</form>

					<?php
						}
					}
					?>
				</tbody>
			</table>
		</div>

	</div>
	<!-- collapse end -->
	<!-- section end -->

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
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

	</div>
	<!-- collapse end -->
	<!-- section end -->

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
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control" placeholder="" value="">
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
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control" placeholder="" value="">
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
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control" placeholder="" value="">
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
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-3">
			<label for="" class="form-label">거주지</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-6 ">
			<label for="" class="form-label">학 교</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

		<div class="col-sm-6 mt-2">
			<label for="" class="form-label">학 년</label>
			<input type="text" class="form-control" placeholder="" value="">
		</div>

	</div>
	<!-- collapse end -->

	<!-- section end -->

</main>