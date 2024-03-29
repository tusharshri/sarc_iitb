<?php
/**
 * jetpack.php
 *
 * Jetpack support
 *
 * @package Boozurk
 * @since 2.05
 */


class Boozurk_For_Jetpack {

	function __construct() {

		add_action( 'init', array( $this, 'init' ) );

	}


	function init() {

		if ( boozurk_is_mobile() ) return;

		//Sharedaddy
		if ( function_exists( 'sharing_display' ) ) {
			remove_filter( 'the_content'					, 'sharing_display', 19 );
			remove_filter( 'the_excerpt'					, 'sharing_display', 19 );
			add_action( 'boozurk_hook_entry_bottom'			, array( $this, 'sharedaddy_display' ) );
			add_filter( 'boozurk_option_boozurk_plusone'	, '__return_false' );
		}

		//Likes
		if ( class_exists( 'Jetpack_Likes' ) ) {
			add_action		( 'boozurk_hook_entry_bottom'			, array( $this, 'likes' ) );
			remove_filter	( 'the_content'							, array( Jetpack_Likes::init(), 'post_likes' ), 30, 1);
			add_filter		( 'boozurk_filter_likes'				, array( Jetpack_Likes::init(), 'post_likes' ), 30, 1);
		}

		//Infinite Scroll
		$type = boozurk_get_opt( 'boozurk_infinite_scroll_type' ) == 'auto' ? 'scroll' : 'click';
		add_theme_support( 'infinite-scroll', array(
			'type'		=> $type,
			'container'	=> 'posts_content',
			'render'	=> array( $this, 'infinite_scroll_render' ),
		) );

		if ( class_exists( 'The_Neverending_Home_Page' ) ) {
			add_filter( 'boozurk_option_boozurk_infinite_scroll'	, '__return_false' );
			add_filter( 'infinite_scroll_results'					, array( $this, 'infinite_scroll_encode' ), 11, 1 );
		}

		//Carousel
		if ( class_exists( 'Jetpack_Carousel' ) ) {
			remove_filter( 'post_gallery'							, 'boozurk_gallery_shortcode', 10, 2 );
			add_filter( 'boozurk_option_boozurk_js_thickbox'		, '__return_false' );
		}

	}


	//print the "likes" button after post content
	function likes() {

		echo '<br class="fixfloat">' . apply_filters('boozurk_filter_likes','') . '<br class="fixfloat">';

	}


	//Set the code to be rendered on for calling posts,
	function infinite_scroll_render() {

		if ( isset( $_GET['page'] ) && $page = (int) $_GET['page'] )
			echo '<div class="page-reminder"><span>' . sprintf( __('Page %s','boozurk'), $page ) . '</span></div>';

		get_template_part( 'loop' );
	}


	//encodes html result to UTF8 (jetpack bug?)
	//http://localhost/wordpress/?infinity=scrolling&action=infinite_scroll&page=5&order=DESC
	function infinite_scroll_encode( $results ) {

		$results['html'] = utf8_encode( utf8_decode( $results['html'] ) );

		return $results;
	}


	//print the sharedaddy buttons after post content
	function sharedaddy_display() {

		echo sharing_display();

	}

}

new Boozurk_For_Jetpack;