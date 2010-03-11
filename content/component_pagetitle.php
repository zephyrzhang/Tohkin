<?php
	echo "<title>东锦集团 | " . $site[$p][0][title];
	if ( $p != 1 & $p != 7 & $p != 8 & $p != 9){ echo " | ";}
	echo $site[$p][$s][title] . "</title>";
?>