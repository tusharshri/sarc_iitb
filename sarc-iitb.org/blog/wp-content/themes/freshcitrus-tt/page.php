<?php get_header(); ?>
		<div id="main-wrapper">
			<div id="left">
				<?php if (have_posts()) : ?>

					<?php while (have_posts()) : the_post(); ?>
				
			        	<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
						<div class="entry">
						<?php the_content(); ?>
						<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
						<?php edit_post_link('Edit', '<p>', '</p>'); ?>
						</div>

					<?php endwhile; ?>
						
				<?php else : ?>

					<h2>Not Found</h2>
					<p>Sorry, but you are looking for something that isn't here.</p>

				<?php endif; ?>
				
			</div>
			<?php get_sidebar();?>
		</div>
		<?php get_footer(); ?>