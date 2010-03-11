<?php
$p = $_GET["p"];
$s = $_GET["s"];
$id = $_GET["id"];
//$site[一级导航][二级导航][页面参数]
$site = array(
		"1" => array( 
					"1" => array("title" => "首页", "link" => "/home", "inc" => 'content/root_home.php')
					),
		"2" => array(
					"0" => array("title" => "关于我们"),
					"1" => array("title" => "欢迎辞", "link" => "/about/welcome", "inc" => 'content/about_welcome.php'),
				 	"2" => array("title" => "集团简介", "link" => "/about/intro", "inc" => 'content/about_intro.php'),
				 	"3" => array("title" => "经营理念", "link" => "/about/principle", "inc" => 'content/about_principle.php'),
				 	"4" => array("title" => "VI介绍", "link" => "/about/vi", "inc" => 'content/about_vi.php')
					),
		"3" => array(
					"0" => array("title" => "集团业务"),
					"1" => array("title" => "贸易", "link" => "/business/trading", "inc" => 'content/business_trading.php'),
				 	"2" => array("title" => "制造", "link" => "/business/manufacture", "inc" => 'content/business_manufacture.php'),
				 	"3" => array("title" => "资产", "link" => "/business/capital", "inc" => 'content/business_capital.php'),
					"4" => array("title" => "服务", "link" => "/business/service", "inc" => 'content/business_service.php')
					),
		"4" => array(
					"0" => array("title" => "社会责任"),
				 	"1" => array("title" => "绿色东锦", "link" => "/duty/green", "inc" => 'content/duty_green.php'),
				 	"2" => array("title" => "持续发展", "link" => "/duty/development", "inc" => 'content/duty_development.php'),
				 	"3" => array("title" => "捐助", "link" => "/duty/contribute", "inc" => 'content/duty_contribute.php')
					),
		"5" => array(
					"0" => array("title" => "新闻中心"),
					"1" => array("title" => "集团动态", "link" => "/news/event", "inc" => 'content/news_event.php'),
					"2" => array("title" => "大事记", "link" => "/news/history", "inc" => 'content/news_history.php'),
					"3" => array("title" => "问答FAQ", "link" => "/news/faq", "inc" => 'content/news_faq.php')
					),
		"6" => array(
					"0" => array("title" => "人力资源"),
					"1" => array("title" => "求职信息", "link" => "/careers/job", "inc" => 'content/careers_job.php'),
					"2" => array("title" => "员工生活", "link" => "/careers/activity", "inc" => 'content/careers_activity.php'),
					"3" => array("title" => "锦园介绍", "link" => "/careers/tohkinpark", "inc" => 'content/careers_tohkinpark.php')
					),
		"7" => array( 
					"1" => array("title" => "联系我们", "link" => "/contact", "inc" => 'content/root_contact.php')
					),
		"8" => array( 
					"1" => array("title" => "法律声明", "link" => "/legal", "inc" => 'content/root_legal.php')
					),
		"9" => array( 
					"1" => array("title" => "网站地图", "link" => "/sitemap", "inc" => 'content/root_sitemap.php')
					)
			);
?>