<div class="span10">
	<article>
		<h3><?= $student->name ?> 학생 상세화면 </h3>
		<div><?= kdate($student->created) ?>, 학생 ID = <?= $student->id ?>
			<?= $this->session->set_userdata('student_id', $student->id) ?>
			<?= $this->session->set_userdata('st_id', $student->id) ?>
		</div>

		<form action="<?= site_url() ?>/student/modify" method="post">

			<input type="hidden" name="id" value="<?= $student->id ?>" placeholder="아이디" class="span12" />
			<label for="id" class="form-lable">이름</label>
			<input type="text" name="name" value="<?= $student->name ?>" placeholder="이름" class="span12" />
			<label for="grade1" class="form-lable">학년구분1</label>
			<input type="text" name="grade1" value="<?= $student->grade1 ?>" placeholder="학년구분1" class="span12" />
			<label for="grade1" class="form-lable">학교이름</label>
			<input type="text" name="school_name" value="<?= $student->school_name ?>" placeholder="학교이름" class="span12" />
			<label for="grade2" class="form-lable">학년구분2</label>
			<input type="text" name="grade2" value="<?= $student->grade2 ?>" placeholder="학년구분2" class="span12" />
			<label for="class_name" class="form-lable">수업이름</label>
			<input type="text" name="class_name" value="<?= $student->class_name ?>" placeholder="수업이름" class="span12" />
			<label for="fees" class="form-lable">수업료</label>
			<input type="text" name="fees" value="<?= $student->fees ?>" placeholder="수업료" class="span12" />

			<textarea name="memo" placeholder="메모" class="span12" rows="15"> <?= $student->memo ?> </textarea>
			<div class="form_control">
				<input class="btn" type="submit" value="수정" />
			</div>
		</form>

		<ul class="nav nav-tabs nav-stacked">
			<h4> 테스트 결과 </h4>
			<form action="<?= site_url('/test/add') ?>" method="post">
			<input type="hidden" name="st_id" value="<?= $student->id ?>" />
			<input class="btn" type="submit" value="테스트추가" />
			</form>
	
			<?php
			foreach ($tests as $entry) {
			?>
				<li><a href="<?= site_url('/test/get/') ?>/<?= $entry->id ?>">
						ID: <?= $entry->id ?> 
						Grade: <?= $entry->grade ?> 
						Chapter: <?= $entry->chapter ?> 
						score: <?= $entry->score ?> 
						</a>
				</li>
			<?php
			}
			?>
		</ul>

		<form action="<?= site_url('/student/delete') ?>" method="post">
			<input type="hidden" name="student_id" value="<?= $student->id ?>" />
			<input type="submit" class="btn" value="학생삭제" />
			<a href="<?= site_url('/student/add') ?>" class="btn">학생추가</a>
			<a href="<?= site_url('/student') ?>" class="btn">학생명단 메인화면</a>
		</form>
	</article>
</div>