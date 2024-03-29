<?php
/**
 * Template: Header.php 
 *
 * @package EvoLve
 * @subpackage Template
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--BEGIN html-->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>


<!--BEGIN head-->
<head profile="<?php evlget_profile_uri(); ?>">

	<title><?php wp_title('-', true); ?></title>

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0">

	<?php wp_head(); ?>
 
<!--END head-->  
</head>



<!--BEGIN body-->
<body <?php body_class(); ?>>

<?php $evl_custom_background = evl_get_option('evl_custom_background','0'); if ($evl_custom_background == "1") { ?>
<div id="wrapper">
<?php } ?>

<div id="top"></div>





	<!--BEGIN .header-->
		<div class="header">
    
	<!--BEGIN .container-->
	<div class="container container-header custom-header">
  
  
 <!-- AD Space 1 -->
  
  
  
    <?php $options = get_option('evolve'); 
    
                                         
     if (!empty($options['evl_space_1'])) {    
 $ad_space_1 = $options['evl_space_1']; 
 echo '<div class="ad-1">'.esc_attr($ad_space_1).'</div>';      
 } 

?>                        
  
  
  
  <?php $evl_pos_logo = evl_get_option('evl_pos_logo','left'); if ($evl_pos_logo == "disable") { ?>
  
  <?php } else { ?>
  
    <?php $options = get_option('evolve');
    if (!empty($options['evl_header_logo'])) {
        echo "<a href=".home_url()."><img id='logo-image' src=".$options['evl_header_logo']." /></a>";
    }
      ?>  
     
     <?php } ?> 
     
     
      <?php 
       
     $tagline = '<div id="tagline">'.get_bloginfo( 'description' ).'</div>';
     
     $evl_tagline_pos = evl_get_option('evl_tagline_pos','next');
     
     if (($evl_tagline_pos !== "disable") && ($evl_tagline_pos == "above")) { 
 
     
     echo $tagline;
      
     } ?>
     
     
     <?php $evl_blog_title = evl_get_option('evl_blog_title','0'); if ($evl_blog_title == "1") { ?>
      
     <?php } else { ?> 
     
     
       
			<div id="logo"><span></span></div>
      
      <?php } if (($evl_tagline_pos !== "disable") && (($evl_tagline_pos == "") || ($evl_tagline_pos == "next") || ($evl_tagline_pos == "under")))    
      {
			echo $tagline;
      
      } ?>

	<!--END .container-->
		</div>
    
    		<!--END .header-->
		</div>
    
  
  <div class="menu-container">
          	
	<div class="menu-back">
  
  

  
  <!--BEGIN .container-menu-->
  <div class="container nacked-menu container-menu">

     <?php $evl_main_menu = evl_get_option('evl_main_menu','0'); if ($evl_main_menu == "1") { ?>
    <br /><br />
    
   <?php } else { ?>
   
   <div class="menu-header">

    <?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
 
     
     <?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) ); ?>
      
      <?php } else { ?>
      
      
	        <?php wp_page_menu( 'show_home=1' ); ?>
          
          <?php } ?> 
          
          </div> 
       
       <?php } ?>
       
       
       
       
       </div>


        <!--BEGIN header-content.php -->
        
         <?php $evl_home_header_content = evl_get_option('evl_home_header_content', 'search_social'); 
  if ($evl_home_header_content == "disable") { ?>
  
  <?php } else { ?>
  
  
  <?php get_template_part('header-content', 'header'); ?>
       
       <?php } ?>
       
        <!--END header-content.php -->
        
        
          <?php $evl_widgets_header = evl_get_option('evl_widgets_header','disable');

// if Header widgets exist

  if (($evl_widgets_header == "") || ($evl_widgets_header == "disable"))  
{ } else { ?>
     
  <div class="container widgets-back">  
  
    
        <!--BEGIN .widgets-holder-->
    <div class="widgets-holder widgets-back-inside">
    
    <div class="header-1">
    	<?php	if ( !dynamic_sidebar( 'header-1' )) : ?>
      <?php endif; ?>
      </div>
     
     <div class="header-2"> 
      <?php	if ( !dynamic_sidebar( 'header-2' ) ) : ?>
      <?php endif; ?>
      </div>
    
    <div class="header-3">  
	    <?php	if ( !dynamic_sidebar( 'header-3' ) ) : ?>
      <?php endif; ?>
      </div>      
    
    
    <div class="header-4">  
    	<?php	if ( !dynamic_sidebar( 'header-4' ) ) : ?>
      <?php endif; ?>
      </div>
        
    </div> 
    
    <!--END .widgets-holder--> 
    
   </div>
   
   
   
     <?php } ?>
   
     <!-- AD Space 2 -->
  
  
    <?php $options = get_option('evolve');
    
    
     if (!empty($options['evl_space_2'])) {     
 $ad_space_2 = $options['evl_space_2']; 
echo '<div class="ad-2">'.esc_attr($ad_space_2).'</div>';
 
 } 
?> 
      
      
      </div> 
       
             	<!--BEGIN .content-->
	<div class="content <?php semantic_body(); ?>">  
  
 


       	<!--BEGIN .container-->
	<div class="container container-center">
  
   


		<!--BEGIN #content-->
		<div id="content">
    
    
    


	