<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php if (function_exists('seo_title_tag')) { seo_title_tag(); } else { bloginfo('name'); wp_title();} ?><?php if ( $cpage < 1 ) {} else { echo (' - comment page '); echo ($cpage);} ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<body>

<div id="wrapper">

	<header>
		<h1 id="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><span><?php bloginfo('description'); ?></span></h1>
		<nav>
			<ul id="nav">
				<li<?php if(is_home()) echo ' class="current_page_item"' ?>><a href="<?php bloginfo('url'); ?>/">Home</a></li>
				<?php wp_list_pages('title_li=&depth=1&include='); ?>
			</ul>
		</nav>
		<form method="get" id="search" action="<?php bloginfo('url'); ?>/">
			<input type="text" name="s" value="Search Keywords" onblur="if(this.value=='') this.value='Search Keywords';" onfocus="if(this.value=='Search Keywords') this.value='';" id="s" />
			<input type="submit" value="Search" id="searchsubmit" />
		</form>
	</header>

	<section>
		<div id="content">


