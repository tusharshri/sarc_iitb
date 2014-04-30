<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Superhero
 * @since Superhero 1.0
 */

get_header(); ?>

<div class="container marketing">
<div class="row">

<div class="span8">
    <?php get_template_part('templates/content', 'single'); ?>


    <!-- Begin Comments -->
	<div class="well">
	<?php comments_template('/templates/comments.php'); ?>
	</div>
	<!-- End Comments -->
		
	<nav class="post-nav">
        <ul class="pager">
	        <li class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'wpstraphero' ) . '</span> %title' ); ?></li>
	        <li class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'wpstraphero' ) . '</span>' ); ?></li>
        </ul>
    </nav><!-- .nav-single -->
</div><!-- #content .site-content -->
<div class="span4">
    <?php if ( is_active_sidebar( 'wpstraphero-sidebar-posts' ) ) : ?>
	    <?php dynamic_sidebar( 'wpstraphero-sidebar-posts' ); ?>
    <?php endif; // end sidebar widget area ?>
</div>
</div><!-- end row -->
<?php get_footer(); ?>