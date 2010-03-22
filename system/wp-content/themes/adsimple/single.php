<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="post">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="pmeta"><?php the_time('m.d.Y') ?> <span>&middot;</span> Posted in <?php the_category(', ') ?><?php edit_post_link('Edit', ' <span>&middot;</span> ', ''); ?></div>
			<div class="entry">
			  <?php the_content(); ?>
			</div>
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<div class="ptags"><?php the_tags('Tags: ', ', ', ''); ?></div>
		</article>

		<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>