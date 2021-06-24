<div class="span10 ">
	<?php
	$weekString = array("일", "월", "화", "수", "목", "금", "토");
	?>
	<div class="row">
		<h3><?= $student->name ?> 금일 (<?= date("Y-m-d", time()) ?> <?= $weekString[date('w')] ?> ) 활동 기록 </h3>
	</div>


	<?= $this->session->set_userdata('student_id', $student->id) ?>
	<?= $this->session->set_userdata('st_id', $student->id) ?>

	<!-- 학생정보 title end  -->


	<form action="<?= site_url() ?>/student/modify" method="post">

		<!-- 학생정보 입력정보 시작 -->
		<div class="row">
			<input type="hidden" name="id" value="<?= $student->id ?>" />

			<div class="col">
				<label for="id" class="form-lable">이름</label>
				<input type="text" name="name" value="<?= $student->name ?>" placeholder="이름" class="span3" />
			</div>

		</div>
	</form>


	<form>

		<div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-2">
				<input type="email" class="form-control" id="inputEmail3">
			</div>
		</div>

		<div class="form-group row">
			<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-2">
				<input type="password" class="form-control" id="inputPassword3">
			</div>
		</div>

		<fieldset class="form-group row">
			<legend class="col-form-label col-sm-2 float-sm-left pt-0">Radios</legend>
			<div class="col-sm-10">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
					<label class="form-check-label" for="gridRadios1">
						First radio
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
					<label class="form-check-label" for="gridRadios2">
						Second radio
					</label>
				</div>
				<div class="form-check disabled">
					<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
					<label class="form-check-label" for="gridRadios3">
						Third disabled radio
					</label>
				</div>
			</div>
		</fieldset>

		<div class="form-group row">
			<div class="col-sm-10 offset-sm-2">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="gridCheck1">
					<label class="form-check-label" for="gridCheck1">
						Example checkbox
					</label>
				</div>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Sign in</button>
			</div>
		</div>

	</form>

</div>