<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		</a>
	<?php } // if ( ! empty( $header_image ) ) ?>

 *
 * @package WPStrapHero
 * @since WPStrapHero 1.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Rework this function to remove WordPress 3.4 support when WordPress 3.6 is released.
 *
 * @uses wpstraphero_header_style()
 * @uses wpstraphero_admin_header_style()
 * @uses wpstraphero_admin_header_image()
 *
 * @package WPStrapHer
 */
function wpstraphero_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => '0088cc',
		'width'                  => 350,
		'height'                 => 40,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'wpstraphero_header_style',
		'admin-head-callback'    => 'wpstraphero_admin_header_style',
		'admin-preview-callback' => 'wpstraphero_admin_header_image',
	);

	$args = apply_filters( 'wpstraphero_custom_header_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-header', $args );
	} else {
		// Compat: Versions of WordPress prior to 3.4.
		define( 'HEADER_TEXTCOLOR',    $args['default-text-color'] );
		define( 'HEADER_IMAGE',        $args['default-image'] );
		define( 'HEADER_IMAGE_WIDTH',  $args['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $args['height'] );
		add_theme_support('custom-header', $args['wp-head-callback'], $args['admin-head-callback'], $args['admin-preview-callback'] );
	}
}
add_action( 'after_setup_theme', 'wpstraphero_custom_header_setup' );

/**
 * Shiv for get_custom_header().
 *
 * get_custom_header() was introduced to WordPress
 * in version 3.4. To provide backward compatibility
 * with previous versions, we will define our own version
 * of this function.
 *
 * @todo Remove this function when WordPress 3.6 is released.
 * @return stdClass All properties represent attributes of the curent header image.
 *
 * @package WPStrapHero
 * @since WPStrapHero 1.0.0
 */

if ( ! function_exists( 'get_custom_header' ) ) {
	function get_custom_header() {
		return (object) array(
			'url'           => get_header_image(),
			'thumbnail_url' => get_header_image(),
			'width'         => HEADER_IMAGE_WIDTH,
			'height'        => HEADER_IMAGE_HEIGHT,
		);
	}
}

if ( ! function_exists( 'wpstraphero_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see wpstraphero_custom_header_setup().
 *
 * @since WPStrapHero 1.0.0
 */
function wpstraphero_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		.navbar .brand,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.navbar .brand {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // wpstraphero_header_style

if ( ! function_exists( 'wpstraphero_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see wpstraphero_custom_header_setup().
 *
 * @since WPStrapHero 1.0.0
 */
function wpstraphero_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		
		border: none;
		font-family: 'Carrois Gothic', sans-serif;
		padding: 25px;
		text-align: left;
		max-width: 480px;
		max-height: 150px;
	}
	#headimg h1 {
		color: #fff;
		font-size: 30px;
		font-weight: bold;
		line-height: 36px;
		margin: 0;
		padding: 0;
	}
	#headimg h1 a {
		color: #fff;
		text-decoration: none;
	}
	#headimg img {
		width: auto;
		max-height: 150px;
	}
	</style>
<?php
}
endif; // wpstraphero_admin_header_style

if ( ! function_exists( 'wpstraphero_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see wpstraphero_custom_header_setup().
 *
 * @since WPStrapHer 1.0.0
 */
function wpstraphero_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) { ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php } else { ?>
			<h1><a class="brand"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<?php } ?>
	</div>
<?php }
endif; // wpstraphero_admin_header_image