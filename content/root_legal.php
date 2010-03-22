<div id="mainbody">
<div id="banner_legal"></div>
<div class="dotline"></div>
<br/>
<div id="legallist">
	<?php query_posts('page_id=149'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="post">
			<?php the_content(); ?>
		</article>
		<?php edit_post_link('Edit', '<p id="edit_link">', '</p>'); ?>
	<?php endwhile; endif; ?>
</div>
</div><!--end mainbody-->