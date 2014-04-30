<?php get_header(); ?>
		<div id="main-wrapper">
			<div id="left">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					
			        	<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<div class="meta-data">
							<span class="auth-date">Author: <a href="http://www.sarc-iitb.org" target="_blank"><?php the_author();?></a>&nbsp;&nbsp;|&nbsp;&nbsp; Posted: <?php the_time('d-m-Y \&\n\b\s\p\;\&\n\b\s\p\; h:i a'); ?></span>
						</div>
						<hr />

						<div class="entry">
							<?php the_content('Continue reading &raquo;'); ?>
							<div class="comments-no" id="comments-no-<?php the_ID(); ?>"><?php comments_popup_link ('No Comments. Be the first','1 Comment','% Comments','none'); ?></div><br />
							<div class="comment-intensedebate" id="comment-intensedebate-<?php the_ID(); ?>">
								<?php comments_template(); ?>
							</div>
						</div>
						<br /><br />
					<?php endwhile; ?>
					
						<div id="post-links">
							<span class="prev-entries"><?php next_posts_link('Previous Entries') ?></span> 
							<span class="next-entries"><?php previous_posts_link('Next Entries') ?></span>
						</div>
						
				<?php else : ?>

					<h2>Not Found</h2>
					<p>Sorry, but you are looking for something that isn't here.</p>

				<?php endif; ?>
				
			</div>
			<?php get_sidebar();?>
		</div>
		<?php get_footer(); ?>