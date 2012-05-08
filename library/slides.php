<?php

/*
 * Custom Content Type for Slides
 ***********************************************/

function slides_init() {

if (is_admin()){
  wp_enqueue_script('metab-jquery', get_template_directory_uri() . '/library/scripts/metaboxes.jquery.js', array('jquery'));
  wp_enqueue_script('sundance', get_template_directory_uri() . '/library/scripts/global.js', array('jquery','fancybox'));
  wp_enqueue_style('metaboxes', get_template_directory_uri() . "/library/styles/metaboxes.css", false, false, false);
}
  $icon =  trailingslashit( get_template_directory_uri() ).'library/images/slides_icon.png';

  $show_labels = array(
    'name' => __( 'Home Slides','agency' ),
    'singular_name' => __( 'Home Slide','agency' ),
    'add_new' => __( 'Add New','agency' ),
    'add_new_item' => __( 'Add New Slide','agency' ),
    'edit' => __( 'Edit','agency' ),
    'edit_item' => __( 'Edit Slides','agency' ),
    'new_item' => __( 'New Slide','agency' ),
    'view' => __( 'View Slides','agency' ),
    'view_item' => __( 'View Slide','agency' ),
    'search_items' => __( 'Search Slides','agency' ),
    'not_found' => __( 'No slides found','agency' ),
    'not_found_in_trash' => __( 'No slides found in Trash','agency' ),
    'parent' => __( 'Parent Slide','agency' ),
  );
  
  $args = array(
    'labels' => $show_labels,
    'menu_icon' => $icon,
    'public' => false,
    'show_ui' => true,
    'capability_type' => 'page',
    'hierarchical' => true,
    'menu_position' => 10,
    'register_meta_box_cb' => 'slides_custom_meta',
    'taxonomies' => array(),
    'rewrite' => false,
    'supports' => array('title', 'thumbnail', 'page-attributes')
  );

  register_post_type( 'slide' , $args );

}

add_action( 'init', 'slides_init' );

function get_slides_meta(){

  return array(
        array(
        'id' => 'slide_uploader',
        'name' => __('Slide Image','agency'),
        'descr' => __('Upload the slide image.','agency'),
        'type' => 'media_uploader'
         ),
         array(
        'id' => 'slide_related_content',
        'name' => __('Related Post, Team Member or Portfolio Item','agency'),
        'descr' => __('Select a post, team member or portfolio item to associate with this slide.','agency'),
        'type' => 'related_post',
        'options' => array('post_types' => array('post','portfolio', 'team'))
        ),
        array(
        'id' => 'slide_blurb',
        'name' => __('Slide Subtitle','agency'),
        'descr' => __('Appears below the title.','agency'),
        'type' => 'textarea'
         ),
        array(
        'id' => 'slide_link',
        'name' => __('Slide links to','agency'),
        'descr' => __('Enter the full URL or where you would like the slide to link','agency'),
        'type' => 'text',
        ),
        array(
        'id' => 'slide_hidden',
        'name'=>'',
        'descr'=>'',
        'type'=>'hidden',
        'hidden_val'=>get_admin_url()
        )
        );
        
}

function slides_custom_init(){

  if( get_post_type($_REQUEST['post']) == 'slide' ):
      wp_enqueue_style('metaboxes');
    wp_enqueue_script('metab-jquery');
  endif;

}

add_action("admin_print_styles-post.php", 'slides_custom_init',0);  
add_action("admin_print_styles-post-new.php", 'slides_custom_init',0);  

function slides_custom_meta(){
  add_meta_box( 'slides_metabox', __('Slide Details', 'agency'), 'slides_metabox_output', 'slide' ,'normal', 'high' );
}

function slides_metabox_output(){

  global $post;

  $slides_custom_meta = get_slides_meta();
  ?>
  <p class="meta item">
  Upload an image or select an existing image from the Media Library:
  <a class="button thickbox" href="<?php echo get_admin_url(); ?>media-upload.php?post_id=<?php echo $post->ID; ?>&TB_iframe=1" id="upload-attachments" style="margin:5px;">Set/Update Featured Image</a>
  </p>
  <?php
  foreach( $slides_custom_meta as $meta ):
  
    meta_handler($meta);

  endforeach;
  
}

function save_slides(){

  global $post;

  $slides_custom_meta = get_slides_meta();

  if($_REQUEST['action'] != 'autosave'):
  
    foreach( $slides_custom_meta as $meta ):
        update_post_meta($post->ID, $meta['id'], $_REQUEST[$meta['id']]);
    endforeach;
    
  endif;
  
}

function slides_columns($columns) {
    unset($columns['categories']); 
    $columns['slides_image'] = 'Slide';
    $columns['menu_order'] = 'Order';
    return $columns;
}

function slides_columns_output($name) {
    global $post;
    switch ($name) {
        case 'slides_image':
          $img = get_the_post_thumbnail($post->ID, 'carousel', array('class'=>'edit-columns-slide-image'));
            echo $img;
           break;
         case 'menu_order':
          echo $post->menu_order;
          break;
    }
}

function ajaxPopulate() {
  global $post;
  $post = &get_post($id = $_POST['pid']);
  $guid = get_permalink($_POST['pid']);
  $excerpt = get_post_meta($post->ID,'subtitle',true);
  if(!$excerpt) { $excerpt = substr(strip_tags($post->post_content), 0 , 100) . ' ... '; }
  $x = new WP_Ajax_Response( 
    array(
       'what' => 'autosave',
       'id' => $post->ID,
       'data' => 'Success',
       'supplemental' => array('post_title'=>$post->post_title,'post_ID'=> $post->ID, 'guid'=>$guid, 'content'=>$excerpt)
    ));
  $x->send();
}

add_action('wp_ajax_up_ajax_populate','ajaxPopulate');
add_action('manage_pages_custom_column',  'slides_columns_output');
add_filter('manage_edit-slides_columns', 'slides_columns');
add_action('save_post','save_slides');