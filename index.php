<?php include("config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php include("content/component_pagetitle.php");?>
	<link rel="shortcut icon" href="/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/css/global.css"/>
	<!--[if IE]><link rel="stylesheet" type="text/css" href="css/ie.css"/><![endif]-->
	<script src="/js/jquery-1.2.6.min.js" type="text/javascript"></script>
	<script src="/js/s3Slider.js" type="text/javascript"></script>
	<script src="/js/nestliving.js" type="text/javascript"></script> 
	<script src="/js/superfish.js" type="text/javascript"></script>
	<script src="/js/fancyzoom.js" type="text/javascript"></script>
	<script src="/js/codaeffects.js" type="text/javascript"></script>
	<script type="text/javascript">$(document).ready(function() {$('#slider1').s3Slider({timeOut: 6000});});</script>
</head>
<body>
	<div id="wrapper">
		<?php include("content/component_header.php");?>
		<?php include("content/component_mainav.php");?>
		<?php include($site[$p][$s][inc]);?>
	</div>
	<?php include("content/component_footer.php");?>
</body>
</html>