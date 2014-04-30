<?php get_header(); ?>

<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
<div class="container marketing">
<div class="row">

<!-- Start Of Our Posts -->
    <div class="span8">
    <?php get_template_part('templates/content', get_post_format()); ?>
	</div>
<!-- End Of Our Posts Section -->

<!-- Insert Our Sidebar -->
    <div class="span4">
    <?php if ( is_active_sidebar( 'wpstraphero-sidebar-blog' ) ) : ?>
	    <?php dynamic_sidebar( 'wpstraphero-sidebar-blog' ); ?>
    <?php endif; // end sidebar widget area ?>
	</div>
<!-- End the sidebar -->

</div><!-- /.row --> 

<?php get_footer(); ?>