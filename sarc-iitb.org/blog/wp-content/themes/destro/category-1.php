<?php get_header(); ?>

								
                    <!-- Inner Content Section starts here -->
                    <div id="inner_content_section">
                    
                    
               			<?php if(of_get_option('custom_header_home') == 'true') : ?>                      
                        <div id="featured_section_header">                            
                            	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
                        </div>              
                        <?php endif; ?>

               			<?php if( !of_get_option('custom_header_home') || of_get_option('custom_header_home') == 'false' ) : ?>                      
							<?php if(!of_get_option('show_magpro_slider_archive') || of_get_option('show_magpro_slider_archive') == 'true') : ?>  
                            <?php get_template_part( 'slider', 'wilto' ); ?>                
                            <?php endif; ?>
                        <?php endif; ?>
                                            

                        	             
                        <!-- Main Content Section starts here -->
                        <div id="main_content_section_mag">
                        
                        				<div class="archiveheading">
                                        
											<h2>
											
											<?php _e('Archives for : ', 'Destro') ?>
                                        
                                            <?php 
                                            
                                            if ( is_category() ) {
                                                echo single_cat_title(); 
                                            }elseif ( is_tag() ) {
                                                echo single_tag_title();	
                                            }elseif ( is_date() ) {
                                                echo single_month_title();	
                                            }
                                            
                                            
                                            ?>
                                            
                                            </h2>                                         
                                        
                                        </div>                        
                
                                   <?php if (have_posts()) : ?>
									<?php $count = 0; while (have_posts()) : the_post(); $count++; ?>									
										<div <?php post_class('mag_post') ?> id="post-<?php the_ID(); ?>">
										
											<div class="mag_post_title">
												<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'Destro' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											</div>
                                            <?php if ( function_exists('the_ratings') && (!of_get_option('show_ratings_mag') || of_get_option('show_ratings_mag') == 'true')) : ?>
											<div class="mag_post_ratings">
												<?php the_ratings(); ?>
											</div>
											<?php endif; ?>
											<div class="mag_post_excerpt">
												<?php if ( has_post_thumbnail() && (!of_get_option('show_postthumbnail_mag') || of_get_option('show_postthumbnail_mag') == 'true')) : ?>
												<?php 
													$magthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'Destrothumb', false, '' ); 
												?>
                                                <div class="mag_post_excerpt_img">
												<img src="<?php echo $magthumb[0]; ?>" alt="<?php echo Destro_get_limited_string(get_the_title(), 40, '...') ?>" />
												</div>
												<?php endif; ?>
                                                
                                                <div class="mag_post_excerpt_p">
													<p><?php echo Destro_get_limited_string(get_the_excerpt(), 150, '...') ?></p>
                                                    <p class="mag_post_excerpt_more"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'Destro' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Read More</a></p>                                                
                                                </div>
                                               
                                                
											</div>																						
																						
										</div>
									<?php endwhile; ?>
									
												<?php 
													$next_page = get_next_posts_link(__('Previous', 'Destro')); 
													$prev_pages = get_previous_posts_link(__('Next', 'Destro'));
													if(!empty($next_page) || !empty($prev_pages)) :
													?>
													<div class="pagination">
														<?php if(!function_exists('wp_pagenavi')) : ?>
														<div class="al"><?php echo $next_page; ?></div>
														<div class="ar"><?php echo $prev_pages; ?></div>
														<?php else : wp_pagenavi(); endif; ?>
													</div><!-- /pagination -->
													<?php endif; ?>
													
												<?php else : ?>
													<div class="nopost">
														<p><?php _e('Sorry, but you are looking for something that isn\'t here.', 'Destro') ?></p>
													 </div><!-- /nopost -->
												<?php endif; ?>
                
                
                        </div>	
                        <!-- Main Content Section ends here -->

                        <!-- Sidebar Section starts here -->
                        <?php get_sidebar(); ?> 
                        <!-- Sidebar Section ends here -->





                    </div>	
                    <!-- Inner Content Section ends here -->
                    
                    <?php get_footer(); ?>
							
								
									
