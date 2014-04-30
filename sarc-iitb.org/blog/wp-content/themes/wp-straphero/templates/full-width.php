<?php 
/**
 * Template Name: Full-width Page Template, No Sidebar
*/

get_header(); ?>
<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
<div class="container marketing">
   	<div class="row">
       	<div class="span12">
		<div class="well">
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- Begin the first div -->
		<header class="entry-header">
	        <h1 class="entry-title"><?php the_title(); ?></h1>
	    </header><!-- .entry-header -->
			
			<!-- Display the Page's Content in a div box. -->
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
	
		<!-- Closes the first div -->
	
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<div class="alert-box error">
			<?php _e('Sorry, no posts matched your criteria.', 'wpstraphero' ); ?>
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
	<!-- end row -->
</div>
<!-- end container -->
<?php get_footer(); ?>
