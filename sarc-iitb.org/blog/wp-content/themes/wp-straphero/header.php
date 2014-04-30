<?php
/**
 *
 * Default Page Header
 */ 
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
   <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
       <script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js" type="text/javascript"></script>
    <![endif]-->

    
  <?php wp_head(); ?>
    
  </head>

  <body <?php body_class(); ?>>



    <!-- NAVBAR
    ================================================== -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
		  <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
			<?php
			$header_image = get_header_image();
			if ( ! empty( $header_image ) ) { ?>
				<a class="brand" href="<?php esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
				</a>
			<?php } else { ?>
            <h1><a class="brand" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php } ?>
			<!-- Our menu needs to go here -->
			<?php wp_nav_menu( array(
	           'theme_location'		 => 'main-menu',
			   'container_class' => 'nav-collapse',
	           'menu_class'		=>	'nav nav-pills pull-right',
	           'depth'				=>	0,
	           'fallback_cb'		=>	false,
	           'walker'			=>	new WPStrapHero_Nav_Walker,
	           )); 
            ?>
          </div> <!-- /.container -->
		  </div><!-- /.navbar-inner -->
		  
    </div><!-- /.navbar -->
	<div class="jumbotron">
	<?php if ( get_theme_mod( 'wpstraphero_slider_visibility' ) != 0 ) { ?>
	    <?php if ( is_front_page() ) : ?>
		    <?php get_template_part( 'slider' ); ?>
	    <?php endif; ?>
	<?php } ?>
	</div><!--- end --->
	
	<!-- Start of Main Nav Menu section -->
    <div class="navbar container">
        <div class="navbar-inner">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
                        <!-- Our menu needs to go here -->
			<?php wp_nav_menu( array(
	           'theme_location'		 => 'secondary-menu',
			   'container_class' => 'nav-collapse',
	           'menu_class'		=>	'nav nav-pills',
	           'depth'				=>	0,
	           'fallback_cb'		=>	false,
	           'walker'			=>	new WPStrapHero_Nav_Walker,
	           )); 
            ?>
		  </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->
    <!-- End Main Nav section -->