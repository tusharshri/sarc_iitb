<?php get_header(); ?>
<div class="container">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'kvarken');?></a>
				<?php
				if ( count( get_the_category() ) ) : 
					$kvarken_category = get_the_category(); 
					if($kvarken_category[0]){
						echo '} <a href="' . get_category_link($kvarken_category[0]->term_id ).'">'.$kvarken_category[0]->cat_name.'</a>';
					}
				endif;
				?>
				} <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				<?php
				if ( is_attachment() ) {
					echo '<div class="fullimg">' . wp_get_attachment_image('','full'). '</div>';
					if ( ! empty( $post->post_excerpt ) ) :
							echo '<br /><p>' . the_excerpt() .'</p>';
					endif; 					
					next_image_link();
					previous_image_link();
				} else {
					the_content();
					wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'kvarken' ), 'after' => '</div>' ) ); 
					}
				?>					
				<div class="meta">
					<?php 					
					printf( __('<a href="%1$s">Written by</a> <a href="%3$s" title="%4$s" rel="author">%5$s</a> <a href="%1$s" rel="bookmark">%2$s</a>. ', 'kvarken' ),
					esc_url( get_permalink() ),
					esc_html( get_the_date(get_option('date_format')) ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'kvarken' ), get_the_author() ) ),
					get_the_author()
					);
									
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
					
					// If a user has filled out their description, show a bio and a link to all their entries  
					if ( get_the_author_meta( 'description' ) ) : 
					?>
					<div class="author-info">
						<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), 60); ?></div>
						<div class="author-description">
							<h2><?php printf( __('About %s','kvarken'), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div class="author-link"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) ); ?>">
							<?php printf( __( 'View all posts by %s', 'kvarken' ), get_the_author() ); ?></a>
							</div>
						</div>
					</div>
				<?php 
				endif;
				?>
			</div>
		</div>
<?php
endwhile;
next_post_link('<div class="newer-posts">%link &rarr;</div>');
previous_post_link('<div class="older-posts">&larr; %link </div>');
comments_template( '', true ); 
?>
</div>
<?php
get_sidebar(); 
get_footer(); 
?>