<div class="span10">
	<article>
		<h3><?= $test->id ?> 테스트 상세화면 </h3>
		<div><?= kdate($test->created) ?>, 학생 ID = <?= $test->st_id ?>
			<?= $this->session->set_userdata('test_id', $test->id) ?>
		</div>

		<form action="<?= site_url() ?>/test/modify" method="post" >

			<input type="hidden" name="id" value="<?= $test->id ?>" placeholder="테스트아이디"/>
			<label for="id" class="form-lable">학생ID</label>
			<input type="text" name="st_id" value="<?= $test->st_id ?>" placeholder="학생ID" class="span12" />
			<label for="grade1" class="form-lable">학년구분</label>
			<input type="text" name="grade" value="<?= $test->grade ?>" placeholder="학년구분" class="span12" />
			<label for="grade1" class="form-lable">시험구분</label>
			<input type="text" name="type" value="<?= $test->type ?>" placeholder="시험구분" class="span12" />
			<label for="grade2" class="form-lable">수준</label>
			<input type="text" name="level" value="<?= $test->level ?>" placeholder="수준" class="span12" />
			<label for="class_name" class="form-lable">점수</label>
			<input type="text" name="score" value="<?= $test->score ?>" placeholder="점수" class="span12" />
			<label for="fees" class="form-lable">결과</label>
			<input type="text" name="result" value="<?= $test->result ?>" placeholder="결과" class="span12" />

			<textarea name="memo" placeholder="메모" class="span12" rows="15"> <?= $test->memo ?> </textarea>
			<div class="form_control">
				<input class="btn" type="submit" value="수정" />
			</div>
		</form>

		<form action="<?= site_url('/test/delete') ?>" method="post">
					<input type="hidden" name="test_id" value="<?= $test->id ?>" />
					<input type="hidden" name="st_id" value="<?= $test->st_id ?>" />
					<input type="submit" class="btn" value="테스트삭제" />

					<a href="<?= site_url('/student/get/'.$test->st_id ) ?>" class="btn">학생 상세 화면</a>
		</form>
	</article>
</div>