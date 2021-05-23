<div class="span10">
	<article>
		<h3><?= $test->id ?> 테스트 상세화면 </h3>
		<div><?= kdate($test->created) ?>, 학생 ID = <?= $test->st_id ?>
			<?= $this->session->set_userdata('test_id', $test->id) ?>
		</div>

		<form action="<?= site_url() ?>/test/modify" method="post" >

			<input type="hidden" name="id" value="<?= $test->id ?>" placeholder="테스트아이디"/>
			<label for="st_id" class="form-lable">학생ID</label>
			<input type="text" name="st_id" value="<?= $test->st_id ?>" placeholder="학생ID" class="span12" />
			<label for="type" class="form-lable">시험구분</label>
			<select name='type' id='type' class="form-select" aria-label="Default select example">
			<?php
				if( $test->type == '단원평가') {
					echo "
					<option value='단원평가'selected >단원평가</option>
					<option value='내신평가'>내신평가</option>
					<option value='과정평가'>과정평가</option>
					<option value='레벨평가'>레벨평가</option>
					";
				}
				elseif ($test->type == '내신평가' ) {
					echo "
					<option value='단원평가'>단원평가</option>
					<option value='내신평가' selected >내신평가</option>
					<option value='과정평가'>과정평가</option>
					<option value='레벨평가'>레벨평가</option>
					";
				}
				elseif ($test->type == '과정평가' ) {
					echo "
					<option value='단원평가'>단원평가</option>
					<option value='내신평가'>내신평가</option>
					<option value='과정평가' selected >과정평가</option>
					<option value='레벨평가'>레벨평가</option>
					";
				}
				elseif ($test->type == '레벨평가' ) {
					echo "
					<option value='단원평가'>단원평가</option>
					<option value='내신평가'>내신평가</option>
					<option value='과정평가'>과정평가</option>
					<option value='레벨평가' selected >레벨평가</option>
					";
				}
				else {
					echo "
					<option value='단원평가' selected >단원평가</option>
					<option value='내신평가'>내신평가</option>
					<option value='과정평가'>과정평가</option>
					<option value='레벨평가'>레벨평가</option>
					";
				} ?>
			</select>
			<label for="grade" class="form-lable">학년구분</label>
			<input type="text" name="grade" value="<?= $test->grade ?>" placeholder="학년구분" class="span12" />
			<label for="chapter" class="form-lable">단원구분</label>
			<input type="text" name="chapter" value="<?= $test->chapter ?>" placeholder="단원구분" class="span12" />
			<label for="level" class="form-lable">수준구분</label>
			<input type="text" name="level" value="<?= $test->level ?>" placeholder="수준구분" class="span12" />
			<label for="corrt_num" class="form-lable">맞은개수</label>
			<input type="text" name="corrt_num" value="<?= $test->corrt_num ?>" placeholder="맞은개수" class="span12" />
			<label for="total_num" class="form-lable">문항수</label>
			<input type="text" name="total_num" value="<?= $test->total_num ?>" placeholder="문항수" class="span12" />
			<label for="score" class="form-lable">점수</label>
			<input type="text" name="score" value="<?= $test->score ?>" placeholder="점수" class="span12" />
			<label for="result" class="form-lable">결과</label>
			<input type="text" name="result" value="<?= $test->result ?>" placeholder="결과" class="span12" />

			<label for="test_date" class="form-lable">시험날짜</label>
			<input type="date" name="test_date" value="<?php $date=date_create($test->test_date); echo date_format($date,'Y/m/d'); ?>"			
			    placeholder="시험날짜" class="span12" />		
			<label for="memo" class="form-lable">메모</label>
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