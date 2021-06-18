<div class="span2">
	<ul class="nav nav-tabs nav-stacked">
	<h4> 사이드바 </h4>
	
	<?php
	foreach($students as $entry){
	?>
		<li><a href="<?=site_url('/student/get/')?>/<?=$entry->id?>">
		
		<?=$entry->name?>- <?=$entry->grade1?>(<?=$entry->grade2?>)-<?=$entry->class_name ?></a> </li>
	<?php
	}
	?>
	</ul>
</div>