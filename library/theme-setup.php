<?php

/**
 * Tell WordPress to run agency_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'agency_setup' );

if ( ! function_exists( 'agency_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override agency_setup() in a child theme, add your own agency_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Agency 1.0
 */
function agency_setup() {

	/* Make Agency available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Agency, use a find and replace
	 * to change 'agency' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'agency', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	// Add support for custom backgrounds
	add_custom_background();

	// Add Agency custom image sizes
  add_image_size('responsive', 999, 380, true ); // Bigguns for responsitivity

	// Normal post thumbnails
  set_post_thumbnail_size( 100, 100, true );

	add_theme_support( 'post-formats', array( 'link', 'quote', 'status', 'image', 'video', 'audio', 'gallery' ) );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	// The next four constants set how Agency supports custom headers.

	// The default header text color
	define( 'HEADER_TEXTCOLOR', 'FFF' );

	// By leaving empty, we allow for random image rotation.
	define( 'HEADER_IMAGE', '%s/assets/logo.png' );

	// The height and width of your custom header.
	// Add a filter to agency_header_image_width and agency_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'agency_header_image_width', 130 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'agency_header_image_height', 90 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See agency_admin_header_style(), below.
	add_theme_support( 'custom-header', array( 'flex-width' => true,'flex-height' => true ) );
	
	add_custom_image_header( 'agency_header_style', 'agency_admin_header_style', 'agency_admin_header_image' );

}
endif; // agency_setup

function agency_display_custom_header(){

	$header_img = get_header_image(); ?>
	<a href="<?php echo home_url('/'); ?>" class="logo">
	<?php if( $header_img ): ?>
		<?php echo "<img src=\"$header_img\" alt =\"\" style=\"max-width:220px; height:auto;\">"; ?>
	<?php else: ?>
	  <span><?php bloginfo('name'); ?></span>
	<?php endif; ?>
		<small><?php bloginfo('description'); ?></small>
	</a>
<?php
}

if ( ! function_exists( 'agency_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Agency 1.0
 */
function agency_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
<style type="text/css">
<?php if ( get_header_image() ): ?>
header{
	padding: 1em 0;
}
header nav ul{
	padding-top: 12px;
}
header .logo,
header .logo img{
	display: block;
}
<?php
endif;

	// If the user has set a custom color for the text use that
	if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
?>
	.logo span{
		color: #<?php echo get_header_textcolor(); ?>;
	}
<?php endif; ?>
</style>

	<?php
}
endif; // agency_header_style

if ( ! function_exists( 'agency_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in agency_setup().
 *
 * @since Agency 1.0
 */
function agency_admin_header_style() {
?>
	<style type="text/css">
	td .wrapper {
		background: url("assets/header-bg.png"), -moz-linear-gradient(#303030, #171717);
		background: url("assets/header-bg.png"), -webkit-linear-gradient(#303030, #171717);
		background: url("assets/header-bg.png"), -moz-linear-gradient(#303030, #171717);
		box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.1);
		padding: 2em 0;
		z-index: 5;
	}
	.wrapper a.logo {
		font-size: 24px;
		line-height: 24px;
		font-weight: normal;
		color: white;
		text-transform: uppercase;
		text-decoration: none;
		margin-left: 20px;
	}
	.wrapper a.logo,
	.wrapper a.logo img{
		display: block;
	}
	<?php if ( get_header_image() ): ?>
	td .wrapper{
		padding: 1em 0;
	}
	<?php endif; ?>
	<?php
		// If the user has set a custom color for the text use that
		if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
	?>
		.logo span{
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>
	</style>
<?php
}
endif; // agency_admin_header_style

if ( ! function_exists( 'agency_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in agency_setup().
 *
 * @since Agency 1.0
 */
function agency_admin_header_image() { ?>

<div class="wrapper">

	<?php
	if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
		$style = ' style="display:none;"';
	else
		$style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
	?>

	<a href="<?php echo home_url('/'); ?>" class="logo">
	<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) : ?>
		<img src="<?php echo esc_url( $header_image ); ?>" style="max-width:220px; height:auto;" alt="<?php bloginfo('name') ?>" />
	<?php else: ?>
		<span><?php bloginfo('name'); ?></span>
	<?php endif; ?>

	<small><?php bloginfo('description'); ?></small>

	</a>
		
</div>
		
<?php }
endif; // agency_admin_header_image