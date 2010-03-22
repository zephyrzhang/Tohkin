<?php

add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
		$file = TEMPLATEPATH . '/comments-old.php';
	endif;
	return $file;
}


if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Sidebar 1',
        'before_widget' => '<div class="section %2$s">',
        'after_widget' => '</div><!-- .section -->

				',
        'before_title' => '
				<h3>',
        'after_title' => '</h3>',
    ));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Sidebar 2',
        'before_widget' => '<div class="section %2$s">',
        'after_widget' => '</div><!-- .section -->

				',
        'before_title' => '
				<h3>',
        'after_title' => '</h3>',
    ));


function do_excerpt($string, $word_limit) {

	$words = explode(' ', $string, ($word_limit + 1));
	if (count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words).' ...';

}


function navi() {

	global $wp_query;
	$max_page = $wp_query->max_num_pages;
	$nump=6;

	if($max_page > 1) echo '<div class="news_navigation">';

	if ($max_page!=1) {
		$paged = intval(get_query_var('paged'));
		if(empty($paged) || $paged == 0) $paged = 1;

		if($paged!=1)echo '<a href="'.get_pagenum_link($paged-1).'" class="prev" title="Previous">&laquo;</a>';

		if($paged!=1) echo '<a href="'.get_pagenum_link(1).'">01</a>';
		else echo '<span class="news_current">01</span>';

		if($paged-$nump>1) $start=$paged-$nump; else $start=2;
		if($paged+$nump<$max_page) $end=$paged+$nump; else $end=$max_page-1;

		if($start>2) echo " ... ";

		for ($i=$start;$i<=$end;$i++) {
			$zero = '';
			if($i < '10') $zero = '0';
			if($paged!=$i) echo '<a href="'.get_pagenum_link($i).'">'.$zero.$i.'</a>';
			else echo '<span class="news_current">'.$zero.$i.'</span>';
		}

		if($end<$max_page-1) echo " ... ";

		if($paged!=$max_page) echo '<a href="'.get_pagenum_link($paged+1).'" class="next" title="Next">&raquo;</a>';

		if($paged!=$max_page) echo '<a href="'.get_pagenum_link($max_page).'" class="last" title="Last">&raquo;&raquo;</a>';
			else echo '<span class="news_current">'.$max_page.'</span>';
	}

	if($max_page > 1) echo '</div>';

}


function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID(); ?>" class="commentdiv">
		<div class="comment-author vcard">
			<?php echo get_avatar($comment, $size='32'); ?>
			<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
			<div class="commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'&nbsp;&nbsp;','') ?></div>
		</div>
		<div class="ctext">
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.') ?></em>
			<?php endif; ?>
			<?php comment_text() ?>
		</div>
		<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
	</div>
<?php
}

?>