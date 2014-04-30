<div id="right">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	<a href="http://www.google.com">link</a>
	<div class="sdb-content">
			<h3>Categories</h3>
		<ul>
			<?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
		</ul>
	</div>
	<div class="sdb-content">
		<h3>Archives</h3>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</div>
	<div class="sdb-content">
		<h3>Links</h3>
		<ul>
			<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
		</ul>
	</div>
	<div class="sdb-content">
		<h3>Meta</h3>
		<ul>
			<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
             		<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
			<li><a href="http://www.wordpress.org" title="Powered by WordPress">WordPress</a></li>
			<li><?php wp_loginout(); ?></li>
		</ul>
	</div>
	<?php endif; ?>
</div>