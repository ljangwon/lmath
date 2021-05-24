<div class="span10">
	<article>
		<h3><?= $student->name ?> 학생 상세화면 </h3>
		<div><?= kdate($student->created) ?>, 학생 ID = <?= $student->id ?>
			<?= $this->session->set_userdata('student_id', $student->id) ?>
			<?= $this->session->set_userdata('st_id', $student->id) ?>
		</div>

		<form  action="<?= site_url() ?>/student/modify" method="post">

			<input type="hidden" name="id" value="<?= $student->id ?>" />

			<label for="id" class="form-lable">이름</label>
			<input type="text" name="name" value="<?= $student->name ?>" placeholder="이름" class="span3" />

			<label for="grade1" class="form-lable">학년구분1</label>
			<input type="text" name="grade1" value="<?= $student->grade1 ?>" placeholder="학년구분1" class="span3" />


			<label for="grade1" class="form-lable">학교이름</label>
			<input type="text" name="school_name" value="<?= $student->school_name ?>" placeholder="학교이름" class="span3" />

			<label for="grade2" class="form-lable">학년구분2</label>
			<input type="text" name="grade2" value="<?= $student->grade2 ?>" placeholder="학년구분2" class="span3" />

			
			<label for="class_name" class="form-lable">수업이름</label>
			<input type="text" name="class_name" value="<?= $student->class_name ?>" placeholder="수업이름" class="span12" />
			<label for="fees" class="form-lable">수업료</label>
			<input type="text" name="fees" value="<?= $student->fees ?>" placeholder="수업료" class="span12" />
			<label for="memo" class="form-lable">메모</label>
			<textarea name="memo" placeholder="메모" class="span12" rows="5"> <?= $student->memo ?> </textarea>
			<div class="form_control">
				<input class="btn" type="submit" value="수정" />
			</div>
		</form>

		<ul class="nav nav-tabs nav-stacked">


		</ul>

		<div class="table-responsive">
			<h4> 테스트 결과 </h4>
			<form action="<?= site_url('/test/add') ?>" method="post">
				<input type="hidden" name="st_id" value="<?= $student->id ?>" />
				<input class="btn" type="submit" value="테스트추가" />
			</form>
			<table class="table table-striped table-hover table-sm table align-middle">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">시험구분</th>
						<th scope="col">과정</th>
						<th scope="col">수준</th>
						<th scope="col">단원</th>
						<th scope="col">점수</th>
						<th scope="col">결과</th>
						<th scope="col">날짜</th>
						<th scope="col">메모</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					foreach ($tests as $entry) {
					?>
						<tr class="align-middle">
							<th scope="row"><a href="<?= site_url('/test/get/') ?>/<?= $entry->id ?>"><?= $i ?></a></th>
							<td class="align-middle"><?= $entry->type ?></td>
							<td class="align-middle"><?= $entry->grade ?></td>
							<td class="align-middle"><?= $entry->level ?></td>
							<td class="align-middle"><?= $entry->chapter ?></td>
							<?php
							if ($entry->total_num == 0) {
								$score = 0;
							} else {
								$score = ($entry->corrt_num / $entry->total_num) * 100;
							}
							?>
							<td class="align-middle">
								<p><?= $entry->corrt_num ?>/<?= $entry->total_num ?></p>
								<p>( <?= number_format($score, 2) ?>점 )</p>
							</td>
							<td class="align-middle"><?= $entry->result ?></td>
							<td class="align-middle"><?php $date = date_create($entry->test_date);
																				echo date_format($date, 'Y/m/d'); ?></td>
							<td class="align-middle"><?= $entry->memo ?></td>
						</tr>
					<?php
						$i++;
					}
					?>
				</tbody>
			</table>
		</div>

		<form action="<?= site_url('/student/delete') ?>" method="post">
			<input type="hidden" name="student_id" value="<?= $student->id ?>" />
			<input type="submit" class="btn" value="학생삭제" />
			<a href="<?= site_url('/student/add') ?>" class="btn">학생추가</a>
			<a href="<?= site_url('/student') ?>" class="btn">학생명단 메인화면</a>
		</form>
	</article>
</div>