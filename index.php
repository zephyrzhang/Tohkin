<?php
require('system/wp-blog-header.php');
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="东锦集团,Tohkin">
	<meta name="description" content="“东锦集团,Tohkin" />
	<?php include("content/component_pagetitle.php");?>
	<link rel="shortcut icon" href="/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/css/global.css"/>
	<link rel="stylesheet" type="text/css" href="/css/galleriffic-5.css"/>
	<link rel="stylesheet" type="text/css" href="/css/white.css"/>
	<link rel="stylesheet" type="text/css" href="/css/thickbox.css" />
	<link rel="stylesheet" type="text/css" href="/css/system.css" />
	<!--[if IE]><link rel="stylesheet" type="text/css" href="css/ie.css"/><![endif]-->
	<script type="text/javascript" src="/js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="/js/thickbox.js"></script>
	<script src="/js/s3Slider.js" type="text/javascript"></script>
	<script src="/js/nestliving.js" type="text/javascript"></script> 
	<script src="/js/superfish.js" type="text/javascript"></script>
	<script src="/js/fancyzoom.js" type="text/javascript"></script>
	<script src="/js/codaeffects.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/jquery.galleriffic.js"></script>
	<script type="text/javascript" src="/js/jquery.opacityrollover.js"></script>
	<?php if($pid==1){include("content/component_js.php");}?>
</head>
<body>
	<div id="wrapper">
		<?php include("content/component_header.php");?>
		<?php include("content/component_mainav.php");?>
		<?php include($site[$pid][$sid][inc]);?>
	</div>
	<?php include("content/component_footer.php");?>
</body>
</html>