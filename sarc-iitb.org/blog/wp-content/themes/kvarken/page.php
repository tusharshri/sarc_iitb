<?php get_header(); ?>
<div class="container">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<span class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'kvarken');?></a>	} <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
				<?php
				the_content();
				wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'kvarken' ), 'after' => '</div>' ) );
				?>					
				<br />
				<div class="page-link"><?php edit_post_link( __( 'Edit', 'kvarken' ) ); ?></div>
			</div>
<?php
endwhile;
comments_template( '', true );
?>
</div>
<?php
get_sidebar(); 
get_footer(); 
?>