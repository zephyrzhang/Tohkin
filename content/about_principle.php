<div id="mainbody">
	<div id="banner_principle"></div>
	<div class="dotline"></div>
	<?php include("content/component_subnav.php");?>
	<div id="right">
		<div id="about">
			<?php query_posts('page_id=195'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="post">
					<?php the_content(); ?>
				</article>
			<?php edit_post_link('Edit', '<p id="edit_link">', '</p>'); ?>
			<?php endwhile; endif; ?>
		</div>
	</div><!--end right-->
	<dir class="clear"></dir>	
</div><!--end mainbody-->