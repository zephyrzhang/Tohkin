<div id="mainbody">
	<div id="slider1">
	    <ul id="slider1Content">
	    	<li class="slider1Image"><img src="/img/main05.png" /><span class="hiddentxt">产品品质</span></li>
	    	<li class="slider1Image"><img src="/img/main06.png" /><span class="hiddentxt">精益求精</span></li>
	    	<li class="slider1Image"><img src="/img/main07.png" /><span class="hiddentxt">科技研发</span></li>
	    	<li class="slider1Image"><img src="/img/main04.png" /><span class="hiddentxt">产品展示</span></li>
	    	<li class="slider1Image"></li>
	    </ul>
	</div>
<!--<div class="dotline"></div>-->
		<ul class="featured">
			<li class="featured01"><a href="http://www.ichimore.com/" target="black"><span class="hiddentxt">日加满</span></a></li>
			<li class="featured02"><a href="http://www.ichimorelady.com/" target="black"><span class="hiddentxt">娇源</span></a></li>
			<li class="featured03"><a href="http://www.tohzen.com/" target="black"><span class="hiddentxt">利弗兰酒</span></a></li>
			<div class="clear"></div>
		</ul>
	<div class="newszone">
		<div class="newstitle"><a href="/news/event">集团动态&nbsp;<img src="/img/more.png"/></a></div>
		<!--<div class="separator"></div>-->
			<?php query_posts('cat=1&showposts=3'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="post">
					<ul>
						<li>
							<div class="newsdate"><?php the_time('Y-m-d') ?></div><a href="news/event"><?php the_title(); ?></a>
							<div class="clear"></div>
							<!--<div class="separator"></div>-->
						</li>
					</ul>
				</article>
			<?php endwhile; endif; ?>
		</div>
	<div class="clear"></div>
</div><!--end mainbody-->