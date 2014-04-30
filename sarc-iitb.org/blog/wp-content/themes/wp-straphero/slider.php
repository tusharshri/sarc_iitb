<?php
// My Custom Slider For WP Strap Code themes
?>

<!-- slideshow -->
<div class="container">
    <div id="myCarousel" class="carousel <?php echo get_theme_mod( 'wpstraphero_slider_transition' ); ?>">
        <div class="carousel-inner">
		
        <?php $firstClass = 'active'; ?> 
        <?php if (have_posts()) : ?>
          
		<?php $wpstraphero_slider_query = new WP_Query(array(
		'category_name'  => get_theme_mod( 'wpstraphero_slide_cat' ), 
		'posts_per_page' => get_theme_mod( 'wpstraphero_slide_number' )
		)); ?>
	
    	<?php while ($wpstraphero_slider_query->have_posts()) : $wpstraphero_slider_query->the_post(); ?>
        
        <div class="item <?php echo $firstClass; ?>">
            <?php $firstClass = ""; ?>
			
            <?php the_post_thumbnail('wpstraphero-page-feature'); ?>
            <div class="carousel-caption">
                <h2><?php the_title(); ?></h2>
                <p class="lead"><?php echo wpstraphero_slider_excerpt(); ?></p>
            </div>
			
        </div>
			
      	<?php endwhile; endif; ?>
        <?php wp_reset_query(); ?>       
        </div>    
        
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    
    </div><!-- #myCarousel -->
</div>