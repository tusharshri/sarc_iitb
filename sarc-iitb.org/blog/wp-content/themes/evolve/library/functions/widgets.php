<?php

$evl_layout = evl_get_option('evl_layout','2cr');
$evl_widgets_header = evl_get_option('evl_widgets_header','disable');
$evl_widgets_footer = evl_get_option('evl_widgets_num','disable');

if (($evl_layout == "2cr" || $evl_layout == "2cl" || $evl_layout == "3cr" || $evl_layout == "3cl" || $evl_layout == "3cm"))  
{

if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar 1',
'id' => 'sidebar-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
} else {
register_sidebar(array(
'name' => 'Sidebar Widgets Disabled',
'id' => 'sidebar-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
'description' => __('You are using one column layout. Please visit theme settings page and change layout to enable sidebar widgets. Widgets placed on this area won\'t be active.', 'pure-line'),
));
}

if (($evl_layout == "3cr" || $evl_layout == "3cl" || $evl_layout == "3cm"))  
{
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar 2',
'id' => 'sidebar-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
}


function evl_header1() {
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 1',
'id' => 'header-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_header2() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 2',
'id' => 'header-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_header3() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 3',
'id' => 'header-3',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_header4() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Header 4',
'id' => 'header-4',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
}

function evl_footer1() {
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 1',
'id' => 'footer-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_footer2() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 2',
'id' => 'footer-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_footer3() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 3',
'id' => 'footer-3',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function evl_footer4() { if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Footer 4',
'id' => 'footer-4',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
}

// Header widgets

  if (($evl_widgets_header == "one"))  
{
evl_header1();
}
  if (($evl_widgets_header == "two"))  
{
evl_header1();
evl_header2();
}
  if (($evl_widgets_header == "three"))  
{
evl_header1();
evl_header2();
evl_header3();
}
  if (($evl_widgets_header == "four"))  
{
evl_header1();
evl_header2();
evl_header3();
evl_header4();
} else {}

// Footer widgets

  if (($evl_widgets_footer == "one"))  
{
evl_footer1();
}
  if (($evl_widgets_footer == "two"))  
{
evl_footer1();
evl_footer2();
}
  if (($evl_widgets_footer == "three"))  
{
evl_footer1();
evl_footer2();
evl_footer3();
}
  if (($evl_widgets_footer == "four"))  
{
evl_footer1();
evl_footer2();
evl_footer3();
evl_footer4();
} else {}

function evlwidget_area_active( $index ) {
	global $wp_registered_sidebars;
	
	$widgetarea = wp_get_sidebars_widgets();
	if ( isset($widgetarea[$index]) ) return true;
	
	return false;
}

function evolve_widget_area( $name = false ) {
	if ( !isset($name) ) {
		$widget[] = "widget.php";
	} else {
		$widget[] = "widget-{$name}.php";
	}
	locate_template( $widget, true );
}




function evlwidget_before_title() { ?>

<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">

<?php }

function evlwidget_after_title() { ?>

</h3></div>

<?php }

function evlwidget_before_widget() { ?>

<div class="widget"><div class="widget-content">

<?php }

function evlwidget_after_widget() { ?>

</div></div>

<?php }


function evlwidget_text($args, $number = 1) {
extract($args);
$options = get_option('evlwidget_text');
$title = $options[$number]['title'];
if ( empty($title) )
$title = '';  }

?>
