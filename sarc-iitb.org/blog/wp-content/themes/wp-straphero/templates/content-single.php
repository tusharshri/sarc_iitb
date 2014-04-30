<?php
/**
 * @package Superhero
 * @since Superhero 1.0
 */
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-single">
	<div class="entry-thumbnail">
	    <?php if ( has_post_thumbnail() ) ?>
        <?php the_post_thumbnail('wpstraphero-page-static');?>
	</div>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
		    <?php wpstraphero_entry_meta(); ?>
		    <?php edit_post_link( __( 'Edit', 'wpstraphero' ), '<span class="edit-link">', '</span>' ); ?>
	    </div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="single-content">
		<?php the_content(); ?>
		<?php wpstraphero_clearboth(); ?>
	</div>
</div><!-- .entry-content -->
    <!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<div class="alert-box error">
			<?php _e('Sorry, no posts matched your criteria.', 'wpstraphero' ); ?>
		</div>
	
	<!--End the loop -->
	<?php endif; ?>
	<footer class="span8">
		<?php wpstraphero_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpstraphero' ), 'after' => '</div>' ) ); ?>
	</footer>
	<?php wpstraphero_clearboth(); ?>

</article><!-- #post-<?php the_ID(); ?> -->