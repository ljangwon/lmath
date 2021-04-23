<div class="span2">
	<ul class="nav nav-tabs nav-stacked">
	<h4> 학생 명단</h4>
	<p>초등:<?=$st_count_e->cnt?> 명 
	   중등:<?=$st_count_m->cnt?> 명 
		 고등:<?=$st_count_h->cnt?> 명</p>
	<?php
	foreach($students as $entry){
	?>
		<li><a href="<?=site_url()?>/student/get/<?=$entry->id?>"><?=$entry->name?>-<?=$entry->class_name?></a> </li>
	<?php
	}
	?>
	</ul>
</div>