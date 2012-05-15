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
    'header_menu'       => __( 'Header Navigation', 'agency' ),
    'home_slides_menu'  => __( 'Home Slideshow Navigation', 'agency' ),
    'footer_menu'       => __( 'Footer Navigation', 'agency' )
  ) );

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
 * Creates Agency Walker Nav Menu
 *
 * This class extends the base Walker_Nav_Menu to create
 * a Agency Walker Nav for slideshow nav.
 *
 * @class Agency_Walker_Nav_Menu()
 * @extends Walker_Nav_Menu()
 *
 */
class Agency_Walker_Nav_Menu extends Walker_Nav_Menu {

  function start_lvl( &$output, $depth ) {

    //In a child UL, add the 'dropdown-menu' class
    $indent = str_repeat( "\t", $depth );
    $output    .= "\n$indent<ul class=\"dropdown-menu\">\n";

  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    //Add class and attribute to LI element that contains a submenu UL.
    if ($args->has_children){
      $classes[]    = 'dropdown';
      $li_attributes .= 'data-dropdown="dropdown"';
    }
    $classes[] = 'menu-item-' . $item->ID;
    //If we are on the current page, add the active class to that menu item.
    $classes[] = ($item->current) ? 'active' : '';

    //Make sure you still add all of the WordPress classes.
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = ' class="' . esc_attr( $class_names ) . '"';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

    //Add attributes to link element.
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn ) ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= 'class="button "';
    $attributes .= ($args->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' : ''; 

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= ($args->has_children) ? ' <b class="caret"></b> ' : ''; 
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  //Overwrite display_element function to add has_children attribute. Not needed in >= Wordpress 3.4
  function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

    if ( !$element )
      return;

    $id_field = $this->db_fields['id'];

    //display this element
    if ( is_array( $args[0] ) ) 
      $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
    else if ( is_object( $args[0] ) ) 
      $args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
    $cb_args = array_merge( array(&$output, $element, $depth), $args);
    call_user_func_array(array(&$this, 'start_el'), $cb_args);

    $id = $element->$id_field;

    // descend only when the depth is right and there are childrens for this element
    if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

      foreach( $children_elements[ $id ] as $child ){

        if ( !isset($newlevel) ) {
          $newlevel = true;
          //start the child delimiter
          $cb_args = array_merge( array(&$output, $depth), $args);
          call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
        }
        $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
      }
        unset( $children_elements[ $id ] );
    }

    if ( isset($newlevel) && $newlevel ){
      //end the child delimiter
      $cb_args = array_merge( array(&$output, $depth), $args);
      call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
    }

    //end this element
    $cb_args = array_merge( array(&$output, $element, $depth), $args);
    call_user_func_array(array(&$this, 'end_el'), $cb_args);

  }

}

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
   * Register Sidebar
   */
  register_sidebar( array(
    'name'          => sprintf( __( 'Default Sidebar' ), 'agency' ),
    'id'            => 'default',
    'description'   => 'Widget Area on the Default Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  ) );


}
// Hook into 'widgets_init'
add_action( 'widgets_init', 'agency_register_sidebars' );

function agency_styles() {

  $up_options = upfw_get_options();
  wp_enqueue_style('style', get_template_directory_uri() . "/style.css", false, THEME_VERSION, 'all');

}
add_action('wp_enqueue_scripts','agency_styles');



function agency_scripts() {

  wp_enqueue_script("jq", "http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, THEME_VERSION, false);
  wp_enqueue_script("sticky", get_template_directory_uri() . "/assets/jquery.sticky.js", false, THEME_VERSION, false);
  wp_enqueue_script("flexslider", get_template_directory_uri() . "/assets/jquery.flexslider-min.js", false, THEME_VERSION, false);
  wp_enqueue_script("view-js", get_template_directory_uri() . "/assets/view.min.js", false, THEME_VERSION, false);
  wp_enqueue_script("main", get_template_directory_uri() . "/assets/main.js", false, THEME_VERSION, false);

}
add_action('wp_enqueue_scripts','agency_scripts');