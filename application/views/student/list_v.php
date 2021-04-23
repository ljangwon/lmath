<div class="span2">
	<ul class="nav nav-tabs nav-stacked">
	<h4> 학생 명단</h4>
	<p>초등:<?=$st_count_e->cnt?> 명 <?=number_format($st_fees_sum_e->fees)?> 원 </P>
	<p>중등:<?=$st_count_m->cnt?> 명 <?=number_format($st_fees_sum_m->fees)?> 원 </p>
	<p>고등:<?=$st_count_h->cnt?> 명 <?=number_format($st_fees_sum_h->fees)?> 원 </p>
	<?php
	foreach($students as $entry){
	?>
		<li><a href="<?=site_url()?>/student/get/<?=$entry->id?>">
		
		<?=$entry->name?>- <?=$entry->grade1?>(<?=$entry->grade2?>)-<?=$entry->class_name ?></a> </li>
	<?php
	}
	?>
	</ul>
</div>