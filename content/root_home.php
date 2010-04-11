<div id="mainbody">
	<div id="slider1">
	    <ul id="slider1Content">
	    	<li class="slider1Image"><img src="/img/main01.jpg" /><span class="hiddentxt">产品品质</span></li>
	    	<li class="slider1Image"><img src="/img/main02.jpg" /><span class="hiddentxt">精益求精</span></li>
	    	<li class="slider1Image"><img src="/img/main03.jpg" /><span class="hiddentxt">科技研发</span></li>
	    	<li class="slider1Image"></li>
	    </ul>
	</div>
<!--<div class="dotline"></div>-->
		<ul class="featured">
			<li class="featured01"><a href="<?php echo $site[2][2][link]?>" ><span class="hiddentxt">集团简介</span></a></li>
			<li class="featured02"><a href="<?php echo $site[3][2][link]?>" ><span class="hiddentxt">东锦饮品</span></a></li>
			<li class="featured03"><a href="<?php echo $site[2][5][link]?>" ><span class="hiddentxt">锦园展示</span></a></li>
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
