<div class="span10">
	<ul class="nav nav-tabs nav-stacked">
	<h4> 학생 명단</h4>
	<a href="<?= site_url('/student/add') ?>" class="btn">학생추가</a>
	<?php
	foreach($students as $entry){
	?>
		
		<li>
			<div  >
				<div style="display:inline" >
					<a href="<?=site_url('/student/get/')?>/<?=$entry->id?>">
						<?=$entry->name?>- <?=$entry->grade1?>(<?=$entry->grade2?>)-<?=$entry->class_name ?></a> 
				</div> 
				<div style="display:inline-block" >
					<form action="<?= site_url('/student/delete') ?>" method="post">
						<input type="hidden" name="student_id" value="<?= $entry->id ?>" />
						<input type="submit" class="btn"  value="삭제" />
					</form>
				</div>
			</div>
		</li>

	<?php
	}
	?>
	</ul>
</div>