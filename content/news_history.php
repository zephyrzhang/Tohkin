<div id="mainbody">
<div id="banner_milestone"></div>
<div class="dotline"></div>
<?php include("content/component_subnav.php");?>
<div id="right">
	<ul id="toolbar">
		<li id="future">ddd</li>
		<li id="ten-tab" class="active"><a href="#ten-pane" onclick="ScrollSection('ten-pane', 'scroller', 'ten-pane'); return false">2010</a></li>
		<li id="nine-tab" class="inactive"><a href="#nine-pane" onclick="ScrollSection('nine-pane', 'scroller', 'ten-pane'); return false">2009</a></li>
		<li id="eight-tab" class="inactive"><a href="#eight-pane" onclick="ScrollSection('eight-pane', 'scroller', 'ten-pane'); return false">2008</a></li>
		<li id="seven-tab" class="inactive"><a href="#seven-pane" onclick="ScrollSection('seven-pane', 'scroller', 'ten-pane'); return false">2007</a></li>
	</ul>
	<div id="scroller">
		<div id="content">
			<div class="section" id="ten-pane">
				<div id="newslist">
				<?php query_posts('page_id=113'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="post">
						<?php the_content(); ?>
					</article>
					<?php edit_post_link('Edit', '<p id="edit_link">', '</p>'); ?>
				<?php endwhile; endif; ?>
				</div>
			</div>
			<div class="section" id="nine-pane">	
				<div id="newslist">			
				<?php query_posts('page_id=115'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="post">
						<?php the_content(); ?>
					</article>
					<?php edit_post_link('Edit', '<p id="edit_link">', '</p>'); ?>
				<?php endwhile; endif; ?>
				</div>
			</div>
			<div class="section" id="eight-pane">
				<div id="newslist">
				<?php query_posts('page_id=117'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="post">
						<?php the_content(); ?>
					</article>
					<?php edit_post_link('Edit', '<p id="edit_link">', '</p>'); ?>
				<?php endwhile; endif; ?>
				</div>
			</div>						
			<div class="section" id="seven-pane">
				<div id="newslist">
				<?php query_posts('page_id=120'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="post">
						<?php the_content(); ?>
					</article>
					<?php edit_post_link('Edit', '<p id="edit_link">', '</p>'); ?>
				<?php endwhile; endif; ?>
				</div>
			</div>
			<dir class="clear"></dir>
		</div>
	</div><!--end scroller-->
</div><!--end right-->
<dir class="clear"></dir>
</div><!--end mainbody-->