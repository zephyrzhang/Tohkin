<div id="mainbody">
<div id="banner_activity"></div>
	<?php include("content/component_subnav.php");?>
	<div id="right">
		<?php query_posts('cat=7&showposts=-1'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="post">
				<h2><?php the_title(); ?><span class="pmeta">&nbsp;&nbsp;&nbsp;<?php edit_post_link('Edit'); ?></span></h2>
				<?php the_content('Read the rest of this entry &raquo;'); ?><br/>
			</article>
		<?php endwhile; endif; ?>
	</div>
	<dir class="clear"></dir>
</div><!--end mainbody-->
