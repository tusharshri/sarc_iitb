<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Default Page
 * Description: Page template with a content container and right sidebar
 *
 */

get_header(); ?>

<div class="container marketing">
    <div class="row">
    <div class="span8">
	   	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- Begin the first div -->
		<div class="well">
	    <header class="entry-header">
	        <h1 class="entry-title"><?php the_title(); ?></h1>
	    </header><!-- .entry-header -->
			
			<!-- Display the Page's Content in a div box. -->
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpstraphero' ), 'after' => '</div>' ) ); ?>
			</div>
	
		<!-- Closes the first div -->
	
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<div class="alert-box error">
			<?php _e('Sorry, no posts matched your criteria.', 'wpstraprid' ); ?>
		</div>
	
	<!--End the loop -->
	<?php endif; ?>
	</div> 
	<!-- Begin Comments -->
	<div class="well">
	<?php comments_template('/templates/comments.php'); ?>
	</div>
	<!-- End Comments -->
    </div>
    <div class="span4">
       <?php if ( is_active_sidebar( 'wpstraphero-sidebar-page' ) ) : ?>
	    <?php dynamic_sidebar( 'wpstraphero-sidebar-page' ); ?>
    <?php endif; // end sidebar widget area ?>
    </div>

	
</div><!-- end row -->   
<?php get_footer(); ?>