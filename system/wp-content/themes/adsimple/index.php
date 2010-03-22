<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<article class="post">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="pmeta"><?php the_time('m.d.Y') ?> <span>&middot;</span> Posted in <?php the_category(', ') ?><?php edit_post_link('Edit', ' <span>&middot;</span> ', ''); ?></div>
			<div class="entry">
				<p><?php print do_excerpt(get_the_excerpt(), 55); ?></p>
			</div>
			<div class="ptags"><span class="comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span> <?php the_tags('Tags: ', ', ', ''); ?></div>
		</article>

		<?php endwhile; ?>

  	<?php navi(); ?>

	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>