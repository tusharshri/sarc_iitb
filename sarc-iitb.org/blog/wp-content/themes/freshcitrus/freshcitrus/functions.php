<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div id="%1$s" class="sdb-content %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
?>
<?php function widget_freshcitrus_search() {
	?>

	<?php
}
if (function_exists('register_sidebar_widget'))
	register_sidebar_widget(__('Search'), 'widget_freshcitrus_search');
?>
<?php function widget_freshcitrus_calendar() {
	?>
	<div class="sdb-content">
		<h3>Calendar</h3>
		<div class="center">
			<?php get_calendar(); ?>
		</div>
	</div>
	<?php
}
if (function_exists('register_sidebar_widget'))
	register_sidebar_widget(__('Calendar'), 'widget_freshcitrus_calendar');
?>