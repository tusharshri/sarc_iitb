

<?php while (have_posts()) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() && ! is_single() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail('wpstraphero-page-static'); ?>
		</div>
		<?php endif; ?>
	<header class="entry-header">
	<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'wpstraphero' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<div class="entry-meta">
		<?php wpstraphero_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'wpstraphero' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
	    <?php if ( get_theme_mod( 'wpstraphero_blogfeed_excerpts' ) != 0 ) { ?>
		    <?php the_excerpt(); ?>
	    <?php } else { ?>
	        <?php the_content( wpstraphero_read_more() ); ?>
	    <?php } ?>
		<?php wpstraphero_clearboth(); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

    <footer class="entry-meta">
		<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'wpstraphero' ) . '</span>', __( 'One comment so far', 'wpstraphero' ), __( 'View all % comments', 'wpstraphero' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
      
	  <?php wpstraphero_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpstraphero' ), 'after' => '</div>' ) ); ?>
	</footer>
  </article>

<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav id="post-nav">
    <ul class="pager">
      <?php if (get_next_posts_link()) : ?>
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'wpstraphero')); ?></li>
      <?php else: ?>
        <li class="previous disabled"><a><?php _e('&larr; Older posts', 'wpstraphero'); ?></a></li>
      <?php endif; ?>
      <?php if (get_previous_posts_link()) : ?>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'wpstraphero')); ?></li>
      <?php else: ?>
        <li class="next disabled"><a><?php _e('Newer posts &rarr;', 'wpstraphero'); ?></a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>
