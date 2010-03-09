<?php
$p = $_GET["p"];
$s = $_GET["s"];
$id = $_GET["id"];

//$site[一级导航][二级导航][页面参数]
$site = array(
		"1" => array( 
					"1" => array("title" => "首页", "link" => "/home", "include" => 'content/home.php')
					),
		"2" => array(
					"0" => array("title" => "关于我们"),
					"1" => array("title" => "欢迎辞", "link" => "/about/welcome", "include" => 'content/welcome.php'),
				 	"2" => array("title" => "集团简介", "link" => "/about/intro", "include" => 'content/intro.php'),
				 	"3" => array("title" => "经营理念", "link" => "/about/principle", "include" => 'content/principle.php'),
				 	"4" => array("title" => "VI介绍", "link" => "/about/vi", "include" => 'content/vi.php')
					),
		"3" => array(
					"0" => array("title" => "集团业务"),
					"1" => array("title" => "贸易", "link" => "/business/trading", "include" => 'content/trading.php'),
				 	"2" => array("title" => "制造", "link" => "/business/manufacture", "include" => 'content/manufacture.php'),
				 	"3" => array("title" => "资产", "link" => "/business/capital", "include" => 'content/capital.php'),
					"4" => array("title" => "服务", "link" => "/business/service", "include" => 'content/service.php')
					),
		"4" => array(
					"0" => array("title" => "社会责任"),
				 	"1" => array("title" => "绿色东锦", "link" => "/duty/green", "3" => 'content/green.php'),
				 	"2" => array("title" => "持续发展", "link" => "/duty/development", "3" => 'content/development.php'),
				 	"3" => array("title" => "捐助", "link" => "/duty/contribute", "3" => 'content/contribute.php')
					),
		"5" => array(
					"0" => array("title" => "新闻中心"),
					"1" => array("title" => "集团动态", "link" => "/news/event", "3" => 'content/news.php'),
					"2" => array("title" => "大事记", "link" => "/news/history", "3" => 'content/history.php'),
					"3" => array("title" => "问答FAQ", "link" => "/news/faq", "3" => 'content/faq.php')
					),
		"6" => array(
					"0" => array("title" => "人力资源"),
					"1" => array("title" => "求职信息", "link" => "/careers/job", "3" => 'content/job.php'),
					"2" => array("title" => "员工生活", "link" => "/careers/activity", "3" => 'content/activity.php'),
					"3" => array("title" => "锦园介绍", "link" => "/careers/tohkinpark", "3" => 'content/tohkinpark.php')
					),
		"8" => array( 
					"1" => array("title" => "联系我们", "link" => "/contact", "3" => 'content/contact.php')
					),
		"9" => array( 
					"1" => array("title" => "法律声明", "link" => "/legal", "3" => 'content/legal.php')
					),
		"10" => array( 
					"1" => array("title" => "网站地图", "link" => "/sitemap", "3" => 'content/sitemap.php')
					)
			);
?>