<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
	
function widget_my_search() {
  echo '<li class="widget widget_search" id=search>';
  include (TEMPLATEPATH . '/searchform.php');
}

if ( function_exists('register_sidebar_widget') ) 
  register_sidebar_widget(__('Search'), 'widget_my_search');
?>
