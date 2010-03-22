<div id="mainbody">
	<div id="slider1">
	    <?php query_posts('page_id=160'); ?>
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    	<article class="post">
	    		<?php the_content(); ?>
	    	</article>
	    <?php endwhile; endif; ?>
	</div>
	<div class="dotline"></div>
		<?php query_posts('page_id=162'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="post">
				<?php the_content(); ?>
			</article>
		<?php endwhile; endif; ?>
	<div class="newszone">
		<div class="newstitle"><a href="/news/event">集团动态&nbsp;<img src="/img/more.png"/></a></div><?php query_posts('cat=1&showposts=3'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li class="separator"></li>
				<article class="post">
					<ul>
						<li>
							<div class="newsdate"><?php the_time('Y年m月d日') ?></div><a href="news/event"><?php the_title(); ?></a>
							<div class="clear"></div>
						</li>
					</ul>
				</article>
			<?php endwhile; endif; ?>
		</div>
	<div class="clear"></div>
</div><!--end mainbody-->