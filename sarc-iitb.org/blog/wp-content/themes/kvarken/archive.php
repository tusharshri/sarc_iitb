<?php get_header(); ?>
<div class="container">
		<h1 class="archive-title">
		<?php 
		if ( is_day() ) :  printf( __( 'Daily Archives: %s', 'kvarken' ), get_the_date(get_option('date_format')) ); 
		elseif ( is_month() ) : printf( __( 'Monthly Archives: %s', 'kvarken' ), get_the_date('F Y') ); 
		elseif ( is_year() ) : printf( __( 'Yearly Archives: %s', 'kvarken' ), get_the_date('Y') ); 
		elseif ( is_tag() ) : printf( __( 'Tag Archives: %s', 'kvarken' ), single_tag_title( '', false ) );
		elseif ( is_category() ) : printf( __( 'Category Archives: %s', 'kvarken' ), single_cat_title( '', false ));
		else : _e( 'Archive:', 'kvarken' ); 
		endif; 
		?>
		</h1><br />
		<?php
		while ( have_posts() ) : the_post(); ?> 
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			    <div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'kvarken');?></a>
				<?php
				if ( count( get_the_category() ) ) : 
					$kvarken_category = get_the_category(); 
					if($kvarken_category[0]){
						echo '} <a href="' . get_category_link($kvarken_category[0]->term_id ).'">'.$kvarken_category[0]->cat_name.'</a>';
					}
				endif;
				?>
				} <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>	
					<?php
					if (strpos($post->post_content,'[gallery') === false){
					   if ( has_post_thumbnail()) {
							the_post_thumbnail();
					   }
					}
					the_content(); 
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'kvarken' ), 'after' => '</div>' ) ); 
					?>						
				<div class="meta">
					<?php printf( __('<a href="%1$s">Written by</a> <a href="%3$s" title="%4$s" rel="author">%5$s</a> <a href="%1$s" rel="bookmark">%2$s</a>. ', 'kvarken' ),
					esc_url( get_permalink() ),
					esc_html( get_the_date(get_option('date_format')) ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'kvarken' ), get_the_author() ) ),
					get_the_author()
					);
					
					if ( comments_open() ) :
						comments_popup_link();
						echo '.';					
					endif;
					
					if ( count( get_the_category() ) ) : 
					?>
						<span class="cat-links"><?php printf( __( 'Category: %1s', 'kvarken' ), get_the_category_list(', ')); ?>. </span>
					<?php 
					endif; 
					    if(get_the_tag_list()) {
							$kvarken_tags_list = get_the_tag_list( '', ', ' );
							printf( __( 'Tagged: %1$s. ', 'kvarken' ), $kvarken_tags_list );
						} 
						edit_post_link( __( 'Edit', 'kvarken' ) );
					?>
				</div>
			</div>
<?php
endwhile; 
 
next_posts_link('<div class="newer-posts">'. __('Next page &rarr;', 'kvarken') . '</div>'); 
previous_posts_link('<div class="older-posts">' . __('&larr; Previous page','kvarken') . '</div>'); 
?>
</div>
<?php
get_sidebar(); 
get_footer();
?> 