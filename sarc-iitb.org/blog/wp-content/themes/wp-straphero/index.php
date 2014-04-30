<?php
/**
 *
 * Description: Default Index template to display loop of blog posts
 *
 */

get_header(); ?>

<!-- Wrap the rest of the page in another container to center all the content. -->
<div class="container marketing">

<div class="row">
<?php if (!have_posts()) : ?>
<div class="span12">
<article id="post-0" class="post hentry error404 not-found">
<div class="entry-content">
    <p><?php _e('Sorry, no results were found for that search term.', 'wpstrapgrid'); ?></p>
	<p><?php _e('You could try searching again with different keywords or navigate thorugh the site via the menu above.', 'wpstrapgrid'); ?></p>
    <?php get_search_form(); ?>
</div><!-- .entry-content -->
</article><!-- #post-0 .post .error404 .not-found -->
</div>
<?php endif; ?>
<!-- Start Of Our Posts -->
    <div class="span8">
    <?php get_template_part('templates/content', get_post_format()); ?>
	</div>
<!-- End Of Our Posts Section -->

<!-- Insert Our Sidebar -->
    <div class="span4">
    <?php if ( is_active_sidebar( 'wpstraphero-sidebar-blog' ) ) : ?>
	    <?php dynamic_sidebar( 'wpstraphero-sidebar-blog' ); ?>
    <?php endif; // end sidebar widget area ?>
	</div>
<!-- End the sidebar -->

</div><!-- /.row --> 

<?php get_footer(); ?>