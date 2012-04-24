<?php

/**
 * Custom Post Types  - agency_register_cpt()
 * Custom Taxonomy    - agency_portfolio_categories()
 */




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
          'supports' => array( 'title', 'editor', 'revisions', 'thumbnail' ),
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'menu_position' => 4,
          'menu_icon' => get_template_directory_uri() . '/themelib/images/agency_portfolio_menu.png',
          'show_in_nav_menus' => true,
          'publicly_queryable' => true,
          'exclude_from_search' => false,
          'taxonomies' => array( 'portfolio_category', 'post_tag'),
          'has_archive' => true,
          'query_var' => true,
          'can_export' => true,
          'rewrite' => true,
          'capability_type' => 'post'
      );

      register_post_type( 'portfolio', $args );

  }
  add_action( 'init', 'agency_register_portfolio' );



  function agency_register_testimonials() {

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
          'taxonomies' => array('post_tag'),
          'has_archive' => false,
          'query_var' => true,
          'can_export' => true,
          'rewrite' => true,
          'capability_type' => 'post'
      );

      register_post_type( 'testimonial', $args );

  }
  add_action( 'init', 'agency_register_testimonials' );



  function agency_register_team_members() {

      $labels = array( 
          'name' => _x( 'Team Members', 'team' ),
          'singular_name' => _x( 'Team Member', 'team' ),
          'add_new' => _x( 'Add New', 'team' ),
          'add_new_item' => _x( 'Add New Team Member', 'team' ),
          'edit_item' => _x( 'Edit Team Member', 'team' ),
          'new_item' => _x( 'New Team Member', 'team' ),
          'view_item' => _x( 'View Team Members', 'team' ),
          'search_items' => _x( 'Search Team Members', 'team' ),
          'not_found' => _x( 'No Team Members Found', 'team' ),
          'not_found_in_trash' => _x( 'No Team Members Found in Trash', 'team' ),
          'parent_item_colon' => _x( 'Parent Team Member:', 'team' ),
          'menu_name' => _x( 'Team Members', 'team' ),
      );

      $args = array( 
          'labels' => $labels,
          'hierarchical' => false,
          'description' => 'A post type for team members.',
          'supports' => array( 'title', 'editor', 'revisions', 'thumbnail' ),
          'public' => true,
          'show_ui' => true,
          'show_in_menu' => true,
          'menu_position' => 4,
          'menu_icon' => get_template_directory_uri() . '/themelib/images/agency_team_menu.png',
          'show_in_nav_menus' => true,
          'publicly_queryable' => true,
          'exclude_from_search' => true,
          'taxonomies' => array('post_tag'),
          'has_archive' => true,
          'query_var' => true,
          'can_export' => true,
          'rewrite' => true,
          'capability_type' => 'post'
      );

      register_post_type( 'team', $args );

  }
  add_action( 'init', 'agency_register_team_members' );



  function agency_setup_portfolio_metaboxes(){

    $portfoliodata = array( 
      array( 'type' => 'text', 'title' => 'Website URL' ), 
      array( 'type' => 'text', 'title' => 'Launch Date' ),
      array( 'type' => 'textarea', 'title' => 'Services Provided Paragraph')
    );

    $args = array(
      'metabox_id' => 'portinfo',
      'metabox_title' => 'Portfolio Item Info',
      'post_type' => 'portfolio',
      'single' => true,
      'meta_name' => 'portinfo',
      'meta_array' => $portfoliodata
    );

    new WCK_CFC_Wordpress_Creation_Kit( $args );


    $portfolioslides = array( 
      array( 'type' => 'upload', 'title' => 'Portfolio Slide Image', 'description' => 'Requires a files with a size of 968 wide x 260 high. (Supports multiple slides.)' )
    );

    $slideargs = array(
      'metabox_id' => 'portslides',
      'metabox_title' => 'Portfolio Item Slides',
      'post_type' => 'portfolio',
      'single' => true,
      'meta_name' => 'portslides',
      'meta_array' => $portfolioslides
    );

    new WCK_CFC_Wordpress_Creation_Kit( $slideargs );

  }
  add_action('after_setup_theme','agency_setup_portfolio_metaboxes');



  function agency_setup_testimonial_metaboxes(){

    $testimonialdata = array( 
      array( 'type' => 'text', 'title' => 'Testimonial Author' )
    );

    $args = array(
      'metabox_id' => 'testimonial-info',
      'metabox_title' => 'Testimonial Information',
      'post_type' => 'testimonial',
      'single' => true,
      'meta_name' => 'testimonial-info',
      'meta_array' => $testimonialdata
    );

    new WCK_CFC_Wordpress_Creation_Kit( $args );

  }
  add_action('after_setup_theme','agency_setup_testimonial_metaboxes');



  function agency_setup_teammember_metaboxes(){

    $teamdata = array( 
      array( 'type' => 'text', 'title' => 'Team Member Job Title' )
    );

    $args = array(
      'metabox_id' => 'team-info',
      'metabox_title' => 'Team Member Information',
      'post_type' => 'team',
      'single' => true,
      'meta_name' => 'team-info',
      'meta_array' => $teamdata
    );

    new WCK_CFC_Wordpress_Creation_Kit( $args );


    $teamsocial = array( 
      array( 'type' => 'select', 'title' => 'Social Network', 'options' => array( 'twitter', 'facebook', 'vimeo', 'linkedin', 'dribbble', 'flickr', 'forrst' ) ),
      array( 'type' => 'text', 'title' => 'Username')
    );

    $socialargs = array(
      'metabox_id' => 'team-social',
      'metabox_title' => 'Team Member Social Information',
      'post_type' => 'team',
      'single' => true,
      'meta_name' => 'team-social',
      'meta_array' => $teamsocial
    );

    new WCK_CFC_Wordpress_Creation_Kit( $socialargs );

  }
  add_action('after_setup_theme','agency_setup_teammember_metaboxes');

}
agency_register_cpt();



function agency_portfolio_categories(){


  $labels = array(
    'name' => _x( 'Portfolio Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Portfolio Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Portfolio Categories' ),
    'all_items' => __( 'All of the Portfolio Categories' ),
    'parent_item' => __( 'Parent Portfolio Category' ),
    'parent_item_colon' => __( 'Parent Portfolio Category:' ),
    'edit_item' => __( 'Edit Portfolio Category' ), 
    'update_item' => __( 'Update Portfolio Category' ),
    'add_new_item' => __( 'Add New Portfolio Category' ),
    'new_item_name' => __( 'New Portfolio Category Name' ),
    'menu_name' => __( 'Portfolio Categories' ),
  );


  register_taxonomy('portfolio_category',array('portfolio'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'portfolio-category' ),
    ));


}
add_action('init', 'agency_portfolio_categories', 0);

