<div class="subnav">
<ul>
	<?php
		echo '<li id="subnavtitle">' . $site[$p][0][title] . '</li>';
		$i = 1;
		for ($site[$p][$i]; isset($site[$p][$i]); $site[$p][$i++])
			{
			echo '<li><a href="' . $site[$p][$i][link] . '"';
			if($s == $i){echo 'id="subon"';}
			echo '>' . $site[$p][$i][title] . '</a></li>';
			}
	?>
</ul>
</div><!--end subnav-->