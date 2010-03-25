<div id="mainbody">
	<div id="banner_culture"></div>
	<?php include("content/component_subnav.php");?>
	<div id="right">
		<div id="about">
			<?php query_posts('page_id=197'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="post">
					<?php the_content(); ?>
				</article>
			<?php edit_post_link('Edit', '<p id="edit_link">', '</p>'); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
	<dir class="clear"></dir>	
</div><!--end mainbody-->