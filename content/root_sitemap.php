<div id="mainbody">
<div id="banner_sitemap"></div>
<div id="sitemap">
	<?php
	for($pid=1; $pid < 7; $pid++)
		{
			$s = 1;
			if ($pid==1){
			echo "<div class='sitemapbox'>" . $site[$pid][1][title];
			}
			else {
			echo "<div class='sitemapbox'>" . $site[$pid][0][title];
			}
			echo "<ul class='sitemapul'>";
				for($site[$pid][$s]; isset($site[$pid][$s]); $site[$pid][$s++])
					{
					echo "<li><a href='" . $site[$pid][$s][link] . "' title='" . $site[$pid][$s][title] . "'>" . $site[$pid][$s][title] . "</a></li>";
					}
			echo "</ul>";
			echo "</div>";
		}
	?>
	<div class="clear"></div>
</div>
</div><!--end mainbody-->