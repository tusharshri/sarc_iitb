<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Superhero
 * @since Superhero 1.0
 */

get_header(); ?>
<div class="container marketing">
<div class="row-fluid">

<!--BEGIN: content div-->
<div class="span12">

		<div id="content" role="main">

			<article id="post-0" class="post hentry error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Yaiks! The content you are looking for can&rsquo;t be found.', 'wpstraphero' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'We are sorry, but it looks like the content you are looking for is no longer at this location - it may have been moved, had a title change or deleted. You could try searching for it in the search box below or click one of the links below?', 'wpstraphero' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content .site-content -->


	<div id="not-found-secondary" role="complementary">
	   <div class="span4">
		<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
		</div>
		<div class="widget span4">
			<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'wpstraphero' ); ?></h2>
			<ul>
			<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
			</ul>
		</div><!-- .widget -->
        <div class="span4">
		<?php
		/* translators: %1$s: smilie */
		$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'wpstraphero' ), convert_smilies( ':)' ) ) . '</p>';
		the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
		?>
		</div>
	</div><!-- #secondary .widget-area -->
</div>
<!--END: content div-->

</div>
<?php get_footer(); ?>