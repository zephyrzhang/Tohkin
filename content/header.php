<?php include("config.php");?>
<div id="header">
	<form action="http://www.google.com/cse" id="searchform">
	    <input type="hidden" name="cx" value="012859103066027536000:illn_n-idde" />
	    <input type="hidden" name="ie" value="UTF-8" />
	    <input id="searchinput" type="text" name="q" size="20" />
	    <input id="searchbutton" type="image" name="sa" value="Search" src="img/searchbt.png" style="margin-bottom:0px;">
	    <div class="clear"></div>
	</form>
</div><!--end header-->
<?php
switch ($p)
	{
	case 1: $status01 = 'id="navon"'; break;
	case 2: $status02 = 'id="navon"'; break;
	case 3: $status03 = 'id="navon"'; break;
	case 4: $status04 = 'id="navon"'; break;
	case 5: $status05 = 'id="navon"'; break;
	case 6: $status06 = 'id="navon"'; break;
	case 7: $status07 = 'id="navon"'; break;
	case 8: break;
	case 9: break;
	case 10: break;
	default: break;
	}
?>
<div class="nav">
	<ul>
		<li class="dropdown"><a href="<?php echo $site[1][1][link]?>"<?php echo $status01;?>><?php echo $site[1][1][title]?></a></li>
		<li class="dropdown"><a href="<?php echo $site[2][1][link]?>"<?php echo $status02;?>><?php echo $site[2][0][title]?></a>
			<ul>
				<li><a href="<?php echo $site[2][1][link]?>"><?php echo $site[2][0][title]?></a></li>
				<li><a href="<?php echo $site[2][1][link]?>"><?php echo $site[2][1][title]?></a></li>
				<li><a href="<?php echo $site[2][2][link]?>"><?php echo $site[2][2][title]?></a></li>
				<li><a href="<?php echo $site[2][3][link]?>"><?php echo $site[2][3][title]?></a></li>
				<li><a href="<?php echo $site[2][4][link]?>"><?php echo $site[2][4][title]?></a></li>
			</ul>
		</li>
		<li class="dropdown"><a href="<?php echo $site[3][1][link]?>"<?php echo $status03;?>><?php echo $site[3][0][title]?></a>
			<ul>
				<li><a href="<?php echo $site[3][1][link]?>"><?php echo $site[3][0][title]?></a></li>
				<li><a href="<?php echo $site[3][1][link]?>"><?php echo $site[3][1][title]?></a></li>
				<li><a href="<?php echo $site[3][2][link]?>"><?php echo $site[3][2][title]?></a></li>
				<li><a href="<?php echo $site[3][3][link]?>"><?php echo $site[3][3][title]?></a></li>
				<li><a href="<?php echo $site[3][4][link]?>"><?php echo $site[3][4][title]?></a></li>
			</ul>
		</li>
		<li class="dropdown"><a href="<?php echo $site[4][1][link]?>"<?php echo $status04;?>><?php echo $site[4][0][title]?></a>
			<ul>
				<li><a href="<?php echo $site[4][1][link]?>"><?php echo $site[4][0][title]?></a></li>
				<li><a href="<?php echo $site[4][1][link]?>"><?php echo $site[4][1][title]?></a></li>
				<li><a href="<?php echo $site[4][2][link]?>"><?php echo $site[4][2][title]?></a></li>
				<li><a href="<?php echo $site[4][3][link]?>"><?php echo $site[4][3][title]?></a></li>
			</ul>
		</li>
		<li class="dropdown"><a href="<?php echo $site[5][1][link]?>"<?php echo $status05;?>><?php echo $site[5][0][title]?></a>
			<ul>
				<li><a href="<?php echo $site[5][1][link]?>"><?php echo $site[5][0][title]?></a></li>
				<li><a href="<?php echo $site[5][1][link]?>"><?php echo $site[5][1][title]?></a></li>
				<li><a href="<?php echo $site[5][2][link]?>"><?php echo $site[5][2][title]?></a></li>
				<li><a href="<?php echo $site[5][3][link]?>"><?php echo $site[5][3][title]?></a></li>
			</ul>
		</li>
		<li class="dropdown"><a href="<?php echo $site[6][1][link]?>"<?php echo $status06;?>><?php echo $site[6][0][title]?></a>
			<ul>
				<li><a href="<?php echo $site[6][1][link]?>"><?php echo $site[6][0][title]?></a></li>
				<li><a href="<?php echo $site[6][1][link]?>"><?php echo $site[6][1][title]?></a></li>
				<li><a href="<?php echo $site[6][2][link]?>"><?php echo $site[6][2][title]?></a></li>
				<li><a href="<?php echo $site[6][3][link]?>"><?php echo $site[6][3][title]?></a></li>
			</ul>
		</li>
	</ul>
</div><!--end nav-->