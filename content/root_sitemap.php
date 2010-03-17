<div id="mainbody">
<div id="banner_sitemap"></div>
<div class="dotline"></div>
<div id="sitemap">
	<?php
	for($p=1; $p < 7; $p++)
		{
			$s = 1;
			if ($p==1){
			echo "<div class='sitemapbox'>" . $site[$p][1][title];
			}
			else {
			echo "<div class='sitemapbox'>" . $site[$p][0][title];
			}
			echo "<ul class='sitemapul'>";
				for($site[$p][$s]; isset($site[$p][$s]); $site[$p][$s++])
					{
					echo "<li><a href='" . $site[$p][$s][link] . "' title='" . $site[$p][$s][title] . "'>" . $site[$p][$s][title] . "</a></li>";
					}
			echo "</ul>";
			echo "</div>";
		}
	?>
	<div class="clear"></div>
</div>
</div><!--end mainbody-->