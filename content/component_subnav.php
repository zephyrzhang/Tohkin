<div class="subnav">
<ul>
	<?php
		echo '<li id="subnavtitle">' . $site[$pid][0][title] . '</li>';
		$i = 1;
		for ($site[$p][$i]; isset($site[$pid][$i]); $site[$p][$i++])
			{
			echo '<li><a href="' . $site[$pid][$i][link] . '"';
			if($sid == $i){echo 'id="subon"';}
			echo '>' . $site[$pid][$i][title] . '</a></li>';
			}
	?>
</ul>
</div><!--end subnav-->