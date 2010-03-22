<div id="mainbody">
<div id="banner_contact"></div>
<div class="dotline"></div>
<br />
	<?php query_posts('page_id=144'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="post">
			<?php the_content(); ?>
		</article>
		<?php edit_post_link('Edit', '<p id="edit_link">', '</p>'); ?>
	<?php endwhile; endif; ?>
<div class="clear"></div>
<br />
</div><!--end mainbody-->