<div id="mainbody">
<div id="banner_media"></div>
<div class="dotline"></div>
	<?php include("content/component_subnav.php");?>
	<div id="right">
		<div id="newslist">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="post">
					<h2><?php the_title(); ?>--<span class="pmeta"><?php the_time('Y/m/d') ?>&nbsp;&nbsp;&nbsp;<?php edit_post_link('Edit'); ?></span></h2>
					<?php the_content('Read the rest of this entry &raquo;'); ?><br/>
				</article>
			<?php endwhile; endif; ?>
		</div><!--end newslist-->
		<?php navi(); ?>
	</div>
	<dir class="clear"></dir>
</div><!--end mainbody-->