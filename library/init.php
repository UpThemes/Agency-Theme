<?php

/**
 * Initializes Menus  - agency_menu_init()
 * Sidebars           - agency_register_sidebars()
 * Enqueue Styles     - agency_styles()
 * Enqueue Scripts    - agency_scripts()
 * Post Image Sizes   - agency_register_image_sizes()
 *
 */




function agency_menu_init(){

  /**
   * Register Theme locations for custom nav menus
   */
  register_nav_menus( array(
    'header_menu' => __( 'Header Navigation', 'agency' ),
    'footer_menu' => __( 'Footer Navigation', 'agency' )
  ) );


  /**
   * Output Navigation menu fallback
   * 
   * Outputs a message if either no custom navigation
   * menu is applied to the current Theme location, or
   * if the wp_nav_menu() function does not exist (i.e.
   * if the current version of WordPress is < 3.0). 
   * 
   * Template files: header.php & footer.php
   * 
   * @link    http://codex.wordpress.org/Function_Reference/_2    __()
   * 
   * @since Agency 1.0
   */
  function agency_nav_callout(){

    echo '<div id="navigation" class="error">' . __( 'Please configure your menu in the admin panel: Appearance > Menus', 'agency' ) . '</div>';

  }


  add_filter('wp_nav_menu_objects', function ($items) {
      $hasSub = function ($menu_item_id, &$items) {
          foreach ($items as $item) {
              if ($item->menu_item_parent && $item->menu_item_parent==$menu_item_id) {
                  return true;
              }
          }
          return false;
      };

      foreach ($items as &$item) {
          if ($hasSub($item->ID, &$items)) {
              $item->classes[] = 'sub';
              break;
          }
      }
      return $items;
  });

}
add_action("after_setup_theme","agency_menu_init");



/**
 * Register Dynamic Sidebars
 * 
 * @link  http://codex.wordpress.org/Function_Reference/_2                  Codex reference: __()
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar    Codex reference: register_sidebar()
 */
function agency_register_sidebars() {

  /**
   * Register Homepage 1 Dynamic Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Homepage 1' ), 'agency' ),
    'id'            => 'home-1',
    'description'   => 'First Widget Area (Left) on Homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="secion-h"><h2 class="widgettitle">',
    'after_title'   => '</h2></div>' 
  ) );

  /**
   * Register Homepage 2 Dynamic Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Homepage 2' ), 'agency' ),
    'id'            => 'home-2',
    'description'   => 'Second Widget Area (Right) on Homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="secion-h"><h2 class="widgettitle">',
    'after_title'   => '</h2></div>' 
  ) );

  /**
   * Register Team Top Dynamic Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Team Top' ), 'agency' ),
    'id'            => 'team-top',
    'description'   => 'Top Widget Area on the Team Archive Template',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  ) );

  /**
   * Register Portfolio Top Dynamic Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Portfolio Top' ), 'agency' ),
    'id'            => 'portfolio-top',
    'description'   => 'Top Widget Area on the Portfolio Archive Template',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  ) );

  /**
   * Register Single Top Dynamic Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Default Top' ), 'agency' ),
    'id'            => 'default-top',
    'description'   => 'Top Widget Area on the Default Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  ) );

  /**
   * Register Single Bottom Dynamic Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Default Bottom' ), 'agency' ),
    'id'            => 'default-bottom',
    'description'   => 'Bottom Widget Area on the Default Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  ) );

}
// Hook into 'widgeets_init'
add_action( 'widgets_init', 'agency_register_sidebars' );



function agency_styles() {

  $up_options = upfw_get_options();
  wp_enqueue_style('style', get_template_directory_uri() . "/style.css", false, THEME_VERSION, 'all');
//  if( $up_options->disable_custom_fonts == false )
    // wp_enqueue_style('fonts',get_template_directory_uri() . "/css/fonts.css", array('style'), THEME_VERSION, 'all');

}
add_action('wp_enqueue_scripts','agency_styles');



function agency_scripts() {

  wp_enqueue_script("jq", "http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, THEME_VERSION, false);
  wp_enqueue_script("sticky", get_template_directory_uri() . "/assets/jquery.sticky.js", false, THEME_VERSION, false);
  wp_enqueue_script("flexslider", get_template_directory_uri() . "/assets/jquery.flexslider-min.js", false, THEME_VERSION, false);

}
add_action('wp_enqueue_scripts','agency_scripts');



if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 100, 100, true ); // Normal post thumbnails
  add_image_size('responsive', 999, 9999, true ); // Bigguns for responsitivity
}

add_theme_support( 'post-formats', array( 'link', 'quote', 'status', 'image', 'video', 'audio', 'gallery' ) );
