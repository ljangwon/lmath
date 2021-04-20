<div class="span2">
	<ul class="nav nav-tabs nav-stacked">
	<?php
	




	foreach($students as $entry){
	?>
		<li><a href="<?=site_url()?>/student/get/<?=$entry->id?>"><?=$entry->name?></a></li>
	<?php
	}
	?>
	</ul>
</div>