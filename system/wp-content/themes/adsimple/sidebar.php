    </div><!-- end #content -->

    <aside>

      <div id="sidebar1">

<?php	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1') ) : ?>

				<div class="section">
					<h3>Categories</h3>
					<ul>
						<?php wp_list_categories('show_count=1&title_li='); ?>
					</ul>
				</div><!-- .section -->

				<div class="section">
					<h3>Tags</h3>
	      	<div id="tagCloud">
						<?php wp_tag_cloud('smallest=8&largest=12&unit=pt&number=100&orderby=name&order=ASC'); ?>
	      	</div>
				</div><!-- .section -->

				<div class="section">
					<h3>Meta</h3>
					<ul>
	          <?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</div><!-- .section -->

<?php endif; ?>

<?php if ( function_exists('pixel_sitemap')) pixel_sitemap($ps_count = 100); ?>

			</div><!-- end #l-sidebar -->
</aside>