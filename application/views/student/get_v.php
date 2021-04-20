<div class="span10">
	<article>
		<h3><?=$student->name?> 학생 상세화면 </h3>
		<div>
			<div><?=kdate($student->created)?></div>
			<div>학생 ID = <?=$student->id?>
			<?php   
				$this->session->set_userdata( 'student_id', $student->id );			
			?>
		</div>
	
	<form action="<?=site_url()?>/student/modify" method="post" class="span10">
		<input type="hidden" name="id" value="<?=$student->id?>" placeholder="아이디" class="span12" />
		<input type="text" name="name" value="<?=$student->name?>" placeholder="이름" class="span12" />
		<input type="text" name="grade1" value="<?=$student->grade1?>" placeholder="학년구분1" class="span12" />
		<input type="text" name="grade2" value="<?=$student->grade2?>" placeholder="학년구분2" class="span12" />
		<input type="text" name="class_name" value="<?=$student->class_name?>" placeholder="수업이름" class="span12" />
		
		<textarea name="memo"  placeholder="메모" class="span12" rows="15" > <?=$student->memo?> </textarea>
		<div class="form_control">
			<input class="btn" type="submit" value="수정" />
		</div>
`</form>


	<div>     
    <form action="<?=site_url()?>/student/delete" method="post">
        <input type="hidden" name="student_id" value="<?=$student->id?>" />
        <a href="<?=site_url()?>/student/add" class="btn">학생추가</a>       
        <input type="submit" class="btn" value="학생삭제" />
    </form>
	</div>
	</article>
</div>