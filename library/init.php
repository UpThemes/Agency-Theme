<?php

/**
 * Initializes Menus  - agency_menu_init()
 * Sidebars           - agency_register_sidebars()
 * Enqueue Styles     - agency_styles()
 * Enqueue Scripts    - agency_scripts()
 * Custom Post Types  - agency_post_types()
 *
 * And their corresponding theme calls.
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
 * @link  http://codex.wordpress.org/Function_Reference/_2          Codex reference: __()
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
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
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
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  ) );

  /**
   * Register Archive Top Dynamic Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Archive Top' ), 'agency' ),
    'id'            => 'archive-top',
    'description'   => 'Top Widget Area on the Archive Templates',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  ) );

  /**
   * Register Single Bottom Dynamic Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Archive Bottom' ), 'agency' ),
    'id'            => 'archive-bottom',
    'description'   => 'Bottom Widget Area on the Archive Templates',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  ) );

  /**
   * Register Single Top Dynamic Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Single Top' ), 'agency' ),
    'id'            => 'single-top',
    'description'   => 'Top Widget Area on the Single Post Templates',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  ) );

  /**
   * Register Single Bottom Dynamic Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Single Bottom' ), 'agency' ),
    'id'            => 'single-bottom',
    'description'   => 'Bottom Widget Area on the Single Post Templates',
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



function agency_register_cpt() {


  function agency_register_portfolio() {

      $labels = array( 
          'name' => _x( 'Portoflio', 'portfolio' ),
          'singular_name' => _x( 'Portfolio Item', 'portfolio' ),
          'add_new' => _x( 'Add New', 'portfolio' ),
          'add_new_item' => _x( 'Add New Portfolio Item', 'portfolio' ),
          'edit_item' => _x( 'Edit Portfolio Item', 'portfolio' ),
          'new_item' => _x( 'New Portfolio Item', 'portfolio' ),
          'view_item' => _x( 'View Portfolio Item', 'portfolio' ),
          'search_items' => _x( 'Search Portfolio', 'portfolio' ),
          'not_found' => _x( 'No Portfolio Items Found', 'portfolio' ),
          'not_found_in_trash' => _x( 'No Portfolio Items Found in Trash', 'portfolio' ),
          'parent_item_colon' => _x( 'Parent Portfolio Item:', 'portfolio' ),
          'menu_name' => _x( 'Portfolio', 'portfolio' ),
      );

      $args = array( 
          'labels' => $labels,
          'hierarchical' => false,
          'description' => 'A post type for portfolio items.',
          'supports' => array( 'title', 'editor', 'revisions' ),
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'menu_position' => 4,
          'menu_icon' => get_template_directory_uri() . '/themelib/images/agency_portfolio_menu.png',
          'show_in_nav_menus' => true,
          'publicly_queryable' => true,
          'exclude_from_search' => false,
          'has_archive' => true,
          'query_var' => true,
          'can_export' => true,
          'rewrite' => true,
          'capability_type' => 'post'
      );

      register_post_type( 'portfolio', $args );

  }
  add_action( 'init', 'agency_register_portfolio' );



  function agency_register_testimonial() {

      $labels = array( 
          'name' => _x( 'Testimonials', 'testimonial' ),
          'singular_name' => _x( 'Testimonial', 'testimonial' ),
          'add_new' => _x( 'Add New', 'testimonial' ),
          'add_new_item' => _x( 'Add New Testimonial', 'testimonial' ),
          'edit_item' => _x( 'Edit Testimonial', 'testimonial' ),
          'new_item' => _x( 'New Testimonial', 'testimonial' ),
          'view_item' => _x( 'View Testimonial', 'testimonial' ),
          'search_items' => _x( 'Search Testimonials', 'testimonial' ),
          'not_found' => _x( 'No Testimonial Found', 'testimonial' ),
          'not_found_in_trash' => _x( 'No Testimonial Found in Trash', 'testimonial' ),
          'parent_item_colon' => _x( 'Parent Testimonial:', 'testimonial' ),
          'menu_name' => _x( 'Testimonials', 'testimonial' ),
      );

      $args = array( 
          'labels' => $labels,
          'hierarchical' => false,
          'description' => 'A post type for testimonials.',
          'supports' => array( 'title', 'editor', 'revisions' ),
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'menu_position' => 4,
          'menu_icon' => get_template_directory_uri() . '/themelib/images/agency_testimonial_menu.png',
          'show_in_nav_menus' => true,
          'publicly_queryable' => true,
          'exclude_from_search' => true,
          'has_archive' => false,
          'query_var' => true,
          'can_export' => true,
          'rewrite' => true,
          'capability_type' => 'post'
      );

      register_post_type( 'testimonial', $args );

  }
  add_action( 'init', 'agency_register_testimonial' );


  function agency_setup_portfolio_metaboxes(){

    $portfoliodata = array( 
      array( 'type' => 'text', 'title' => 'Website URL' ), 
      array( 'type' => 'text', 'title' => 'Launch Date' ), 
      array( 'type' => 'upload', 'title' => 'Portfolio Slide Images', 'description' => 'Requires a files with a size of 968 wide x 260 high.' )
    );

    $args = array(
      'metabox_id' => 'portinfo',
      'metabox_title' => 'Portfolio Information',
      'post_type' => 'portfolio',
      'single' => true,
      'meta_name' => 'portinfo',
      'meta_array' => $portfoliodata
    );

    new WCK_CFC_Wordpress_Creation_Kit( $args );

  }
  add_action('after_setup_theme','agency_setup_portfolio_metaboxes');



  function agency_setup_testimonial_metaboxes(){

    $appdata = array( 
      array( 'type' => 'text', 'title' => 'Testimonial Author' ),
    );

    $args = array(
      'metabox_id' => 'testimonial-info',
      'metabox_title' => 'Testimonial Information',
      'post_type' => 'testimonial',
      'single' => true,
      'meta_name' => 'testimonial-info',
      'meta_array' => $appdata
    );

    new WCK_CFC_Wordpress_Creation_Kit( $args );

  }
  add_action('after_setup_theme','agency_setup_testimonial_metaboxes');


}
agency_register_cpt();


