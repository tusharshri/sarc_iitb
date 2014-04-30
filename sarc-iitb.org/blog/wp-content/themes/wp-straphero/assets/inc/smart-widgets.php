<?php

/*
| -------------------------------------------------------------------
| Registering Widget Sections
| -------------------------------------------------------------------
| */
function wpstraphero_widgets_init() {

  register_sidebar( array(
    'name' => __('Page Sidebar', 'wpstraphero'),
    'id' => 'wpstraphero-sidebar-page',
	'description'   => __('This sidebar appears on pages only. Accepts shortcode.', 'wpstraphero'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
  
  register_sidebar( array(
    'name' => __('Blog Sidebar', 'wpstraphero'),
    'id' => 'wpstraphero-sidebar-blog',
	'description'   => __('This sidebar appears on the index.php and the page-blog.php which lists the latest posts. Accepts shortcode.', 'wpstraphero'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar( array(
    'name' => __('Posts Sidebar', 'wpstraphero'),
    'id' => 'wpstraphero-sidebar-posts',
	'description'   => __('This sidebar appears on single.php - the individual post page. Accepts shortcode.', 'wpstraphero'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
   
  register_sidebar(array(
    'name' => __('Footer Left - One Third', 'wpstraphero'),
    'id'   => 'wpstraphero-footer-left',
    'description'   => __('Left Footer Widget.', 'wpstraphero'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));

  register_sidebar(array(
    'name' => __('Footer Middle - One Third', 'wpstraphero'),
    'id'   => 'wpstraphero-footer-middle',
    'description'   => __('Middle Footer Widget.', 'wpstraphero'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));

  register_sidebar(array(
    'name' => __('Footer Right - One Third', 'wpstraphero'),
    'id'   => 'wpstraphero-footer-right',
    'description'   => __('Right Footer Widget.', 'wpstraphero'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ));
  

}
add_action( 'widgets_init', 'wpstraphero_widgets_init' );
add_filter('widget_text', 'do_shortcode');
add_filter('wp_editor', 'do_shortcode');
add_filter('header_content', 'do_shortcode');