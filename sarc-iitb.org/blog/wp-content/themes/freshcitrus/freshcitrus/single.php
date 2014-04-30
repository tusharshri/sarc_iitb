<?php get_header(); ?>
		<div id="main-wrapper">
			<div id="left">
				<?php if (have_posts()) : ?>

					<?php while (have_posts()) : the_post(); ?>
				
			        	<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
						
						<div class="meta-data">
							<span class="auth-date">Author: <?php the_author();?> | Posted: <?php the_time('d-m-Y'); ?> | Category: <?php the_category(', ') ?></span>
						</div>

						<div class="entry">
							<?php the_content(); ?>
							<p class="postmetadata"><?php _e('Category&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><?php edit_post_link('Edit', ' &#124; ', ''); ?></p>
						</div>
						<?php comments_template(); ?>

					<?php endwhile; ?>
						
				<?php else : ?>

					<h2>Not Found</h2>
					<p>Sorry, but you are looking for something that isn't here.</p>

				<?php endif; ?>
				
			</div>
			<?php get_sidebar();?>
		</div>
		<?php get_footer(); ?>