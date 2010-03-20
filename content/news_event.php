<div id="mainbody">
<div id="banner_media"></div>
<div class="dotline"></div>
	<?php include("content/component_subnav.php");?>
	<div id="right">
		<div id="newslist">
		<!--<p><span>2010-03-20</span><a href="#">东锦集团官方网站改版工作顺利完成</a></p>
		<p><span>2010-01-20</span><a href="#">上海东锦食品有限公司集团大楼结构封顶</a></p>
		<br /><br /><br /><br /><br />-->
		<?php if (have_posts()) : ?>
		
				<?php while (have_posts()) : the_post(); ?>
		
					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
		
						<div class="entry">
							<?php the_content('Read the rest of this entry &raquo;'); ?>
						</div>
		
						<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
					</div>
		
				<?php endwhile; ?>
		
				<div class="">
					<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
				</div>
		
			<?php else : ?>
		
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>
		
			<?php endif; ?>
		
		</div>
	</div>
	<dir class="clear"></dir>
</div><!--end mainbody-->