<?php
/*
Template Name: All posts
*/
?>
<?php get_header(); ?>
<?php
$debut = 0; //The first article to be displayed
?>
<?php while(have_posts()) : the_post(); ?>
<h2><?php the_title(); ?></h2>
<p>My entire blog archive, enjoy!</p>
<ul>
<?php
$myposts = get_posts('numberposts=-1&offset=$debut');
foreach($myposts as $post) :
?>
<li><?php the_time('d/m/y') ?>: <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach; ?>
</ul>
<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
