<?php

/*
 * Custom Content Type for Series
 ***********************************************/

function slides_init() {
  
  global $pagenow;
  
  if( $pagenow == 'post.php' || $pagenow == 'post-new.php' ){
    wp_enqueue_script('metab-jquery', get_template_directory_uri() . '/library/scripts/metaboxes.jquery.js', array('jquery'));
    wp_enqueue_script('sundance', get_template_directory_uri() . '/library/scripts/global.js', array('jquery','fancybox'));
    wp_enqueue_style('metaboxes', get_template_directory_uri() . "/library/styles/metaboxes.css", false, false, false);
  }

  $icon =  trailingslashit( get_template_directory_uri() ).'library/images/slides_icon.png';
  
  $show_labels = array(
    'name' => __( 'Slides','storefrontal' ),
    'singular_name' => __( 'Slide','storefrontal' ),
    'add_new' => __( 'Add New','storefrontal' ),
    'add_new_item' => __( 'Add New Slide','storefrontal' ),
    'edit' => __( 'Edit','storefrontal' ),
    'edit_item' => __( 'Edit Slides','storefrontal' ),
    'new_item' => __( 'New Slide','storefrontal' ),
    'view' => __( 'View Slides','storefrontal' ),
    'view_item' => __( 'View Slide','storefrontal' ),
    'search_items' => __( 'Search Slides','storefrontal' ),
    'not_found' => __( 'No slides found','storefrontal' ),
    'not_found_in_trash' => __( 'No slides found in Trash','storefrontal' ),
    'parent' => __( 'Parent Slide','storefrontal' ),
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
        'name' => __('Slide Image','storefrontal'),
        'descr' => __('Upload the slide image.','storefrontal'),
        'type' => 'media_uploader'
         ),
         array(
        'id' => 'slide_related_content',
        'name' => __('Related Post or Product','storefrontal'),
        'descr' => __('Select a post or product to associate with this slide.','storefrontal'),
        'type' => 'related_post',
        'options' => array('post_types' => array('post','wpsc-product'))
        ),
        array(
        'id' => 'slide_blurb',
        'name' => __('Slide Subtitle','storefrontal'),
        'descr' => __('Appears below the title.','storefrontal'),
        'type' => 'textarea'
         ),
        array(
        'id' => 'slide_link',
        'name' => __('Slide links to','storefrontal'),
        'descr' => __('Enter the full URL or where you would like the slide to link','storefrontal'),
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

function slides_custom_meta(){
  add_meta_box( 'slides_metabox', __('Slide Details', 'storefrontal'), 'slides_metabox_output', 'slide' ,'normal', 'high' );
}

function slides_metabox_output(){

  global $post;

  $slides_custom_meta = get_slides_meta();
  ?>
  <p class="meta item">
  Upload an image or select an existing image from the Media Library:
  <a class="button thickbox" href="<?php echo get_admin_url(); ?>media-upload.php?post_id=<?php echo $post->ID; ?>&TB_iframe=1" id="upload-attachments" style="margin:5px;">Set/Update Featured Image</a>
  <br><em>Slide image size: 960px X 340px</em>
  </p>
  <?php
  foreach( $slides_custom_meta as $meta ):
  
    agency_meta_handler($meta);

  endforeach;
  
}

add_action('wp_ajax_get_post_thumbnail','slides_get_post_thumbnail');

function slides_get_post_thumbnail(){

  $id = esc_html($_GET['id']);

  if( $post_thumbnail = wp_get_attachment_image( $id, 'blog' ) ){
    $success = true;
  } else
    $success = false;

  $response = json_encode( array( 'post_id' => $id, 'img' => $post_thumbnail, 'success' => $success ) );

  header( "Content-Type: application/json" );
  echo $response;

  exit;
  
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

function ajax_populate() {
  global $post;
  $post = &get_post($id = $_POST['pid']);
  $guid = get_permalink($_POST['pid']);
  $excerpt = get_post_meta($post->ID,'subtitle',true);
  if(!$excerpt) { $excerpt = substr(strip_tags($post->post_content), 0 , 140) . ' ... '; }
  $x = new WP_Ajax_Response( 
    array(
       'what' => 'autosave',
       'id' => $post->ID,
       'data' => 'Success',
       'supplemental' => array('post_title'=>$post->post_title,'post_ID'=> $post->ID, 'guid'=>$guid, 'content'=>$excerpt)
    ));
  $x->send();
}

add_action('wp_ajax_up_ajax_populate','ajax_populate');
add_action('manage_pages_custom_column',  'slides_columns_output');
add_filter('manage_edit-slide_columns', 'slides_columns');
add_action('save_post','save_slides');

function agency_get_meta_handler( $meta ){

  global $post;

  switch ($meta['type']) {
      case 'text':
        echo '<p class="meta item">';
        echo '<label>' . $meta['name'] . '</label>';
        echo '<input type="text" id="' . $meta['id'] . '" name="' . $meta['id'] . '" value="' . get_post_meta($post->ID,$meta['id'],true) . '">';
        echo '<kbd>' . $meta['descr'] . '</kbd>';
        echo '</p>';
        break;
      case 'textarea':
        echo '<p class="meta item">';
        echo '<label>' . $meta['name'] . '</label>';
        echo '<textarea type="text" cols="60" rows="4" id="' . $meta['id'] . '" name="' . $meta['id'] . '">' . get_post_meta($post->ID,$meta['id'],true) . '</textarea><br/>';
        echo '<kbd>' . $meta['descr'] . '</kbd>';
        echo '</p>';
        break;
      case 'checkbox':
        echo '<p class="meta item">';
        echo '<label>' . $meta['name'] . '</label>';
        echo '<input type="checkbox" value="1" id="' . $meta['id'] . '" name="' . $meta['id'] . '" ';
        if( get_post_meta($post->ID,$meta['id'],true) ) echo "checked";
        echo '>';
        echo '<kbd>' . $meta['descr'] . '</kbd>';
        echo '</p>';
        break;
      case 'video':
        echo '<p class="meta item">';
        echo '<label>' . $meta['name'] . '</label>';
        echo '<input type="text" id="' . $meta['id'] . '" name="' . $meta['id'] . '" value="' . get_post_meta($post->ID,$meta['id'],true) . '">';
        echo '<kbd>' . $meta['descr'] . '</kbd>';
        echo '</p>';
        break;
      case 'related_post':
        echo '<p class="meta item">';
        echo '<label>' .$meta['name'] .'</label>';
        echo '<select name="'.$meta['id'] .'" id="' .$meta['id'] .'">';
        echo '<option value="">Select ... </option>';
        $val = get_post_meta($post->ID,$meta['id'],true);
        $posts = get_posts(array('post_type' => $meta['options']['post_types'], 'post_status' => 'publish','numberposts' => -1));
        foreach($posts as $wepost) {
          $sel = ($val == $wepost->ID) ? 'selected' : '';
          echo '<option value="' .$wepost->ID .'" '.$sel .'>'.$wepost->post_title .'</option>';
        }
        echo '</select>';
        echo '</p>';
        break;
      case 'media_uploader':
        echo '<div class="show-image">';
        if(has_post_thumbnail($post->ID)) { echo get_the_post_thumbnail($post->ID, 'carousel', array('class' => 'meta-box-image')); }
        echo '</div>';
        break;
      
      case 'hidden':
        echo '<input type="hidden" id="' . $meta['id'] . '" name="' . $meta['id'] . '" value="'.$meta['hidden_val'] .'">';
        break;
      
      case 'datepicker':
        $datetime = get_post_meta($post->ID,$meta['id'],true);
        $d = date( "m/d/Y", strtotime($datetime) );
        echo '<p class="meta item">';
        echo '<label>' . $meta['name'] . '</label>';
        echo '<input type="text" id="' . $meta['id'] . '" name="' . $meta['id'] . '" value="' . $d . '">';
        echo '<kbd>' . $meta['descr'] . '</kbd>';
        echo '</p>';
        
        echo '<script type="text/javascript">
      jQuery("#' . $meta['id'] . '").AnyTime_picker({
                hideInput : false,
                placement : "popup",
                askSecond : false,
        askMinute : false,
        askHour   : false,
                format    : "%m/%d/%Y",
                baseYear  : "' . date('Y') . '"
            });
        </script>';
        break;
      
      case 'attachment':
        ?> 
          <script>
          var $ = jQuery.noConflict();
            $("a#refresh-attachments").live('click',function(e) {
              $('select#<?=$meta['id']; ?>').load(location.href+" select#<?=$meta['id']; ?> > *","");
            });
          </script>
        <?php
        echo '<p class="meta item attachment-field">';
        echo '<label>' . $meta['name'] . '</label>';
        $old = get_post_meta($post->ID, $meta['id'],true); 
        $options = get_posts(array('post_type'=>'attachment', 'post_parent'=> $post->ID ));
        if(!$options) { echo '<span>There are currently no attachments to this post</span><br>';}
        else {
        echo '<select id="'.$meta['id'] .'" name="'.$meta['id'].'" class="'.$meta['id'].'" style="float:left;margin:5px;">';
        echo "<option value=''>Select ... </option>";
          foreach($options as $option) {   
            if($option->ID == $old) { $sel = 'selected'; } else { $sel = ''; }
            echo "<option value=\"$option->ID\"  $sel>$option->post_title</option>";  
          } 
        echo '</select>';
        } 
        echo '<a class="button" href="javascript:void(0);" id="refresh-attachments" style="float:left;margin:5px;">Refresh</a>';
        echo '<a class="button thickbox" href="'.get_admin_url().'media-upload.php?post_id='.$_GET['post'].'&TB_iframe=1" id="upload-attachments" style="float:left;margin:5px;">Upload</a>';
        echo '</p>';
        echo '<div class="clear:both;"></div>';
      break;
    }
    
}

function agency_meta_handler( $meta ){
  echo agency_get_meta_handler( $meta );  
}