<?php
	echo "<title>东锦集团 | " . $site[$pid][0][title];
	if ( $pid != 1 & $pid != 7 & $pid != 8 & $pid != 9){ echo " | ";}
	echo $site[$pid][$sid][title] . "</title>";
?>