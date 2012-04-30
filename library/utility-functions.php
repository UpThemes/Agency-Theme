<?php
// General Stuff
// Portfolio Stuff
// Team member stuff


// General Stuff

function filter_next_post_link($link) {

    global $post;
    $post = get_post($post_id);
    $next_post = get_next_post();
    $title = $next_post->post_title;
    $link = str_replace("rel=", 'class="next" rel=', $link);
    return $link;

}
add_filter('next_post_link', 'filter_next_post_link');



function filter_previous_post_link($link) {

    global $post;
    $post = get_post($post_id);
    $previous_post = get_previous_post();
    $title = $previous_post->post_title;
    $link = str_replace("rel=", 'class="previous" rel=', $link);
    return $link;

}
add_filter('previous_post_link', 'filter_previous_post_link');



function next_posts_link_attributes(){
  return 'class="next"';
}
add_filter('next_posts_link_attributes', 'next_posts_link_attributes');



function prev_posts_link_attributes(){
  return 'class="previous"';
}
add_filter('previous_posts_link_attributes', 'prev_posts_link_attributes');



function agency_navigation(){

  if( function_exists('wp_pagenavi') ) : ?>
  <div class="paging">
    <div class="paging-holder">
      <div class="paging-frame">
        <?php wp_pagenavi(); ?>
      </div>
    </div>
  </div>
  <?php else : ?>
    <div class="navigation">
      <?php next_posts_link(__('Older Entries','agency')) ?>
      <?php previous_posts_link(__('Newer Entries','agency')) ?>
    </div>
  <?php endif;

}


function agency_the_404_content(){ ?>

  <h1><?php _e("Not Found","storefrontal"); ?></h1>
  <h2><?php _e("Sorry, but you are looking for something that isn't here.","storefrontal"); ?></h2> <?php
  get_search_form();

}



function agency_get_theme_option($option) {

  $up_options = upfw_get_options();
  return $up_options->$option;

}



function agency_get_social_footer() {

  $up_options = upfw_get_options();
  $selected_social_footer = $up_options->social_footer_select;

  $selected_social_footer_option = $selected_social_footer."_user";
  $selected_social_value = $up_options->$selected_social_footer_option;

  $link = agency_calculate_social_link($selected_social_footer, $selected_social_value);

  echo "<em>$selected_social_footer</em> <a href=\"" . $link . "\" title=\"Link to $selected_social_value on $selected_social_footer\">$selected_social_value</a>";

}



function agency_social_links($array_of_social_values='') {

  $up_options = upfw_get_options();

  if ($array_of_social_values == '') { // If it's not for members custom post type

    // Array for supported social media sites.
    $social_array = array('twitter', 'facebook', 'vimeo', 'linkedin', 'dribbble', 'flickr', 'forrst');
  
    foreach ($social_array as &$v){
      $s = $v . "_user";
      $u = $up_options->$s;
      if ($u)
        agency_build_social_link($v, $u);
    }
  } else { // If it is for members custom post type

    $index = 0;

    foreach ($array_of_social_values as &$item) {
      foreach ( $item as $k => $v) { // Splice off important array values and prep them for a useful format
        $index += 1;
        if( $index % 2 == 0)
          $u = $v;
        else
          $s = $v;
      }
      agency_build_social_link($s, $u);
    }
  }

}



function agency_calculate_social_link($s, $u){

  if ($s == 'twitter')
    return 'http://twitter.com/'. $u;
  else if ($s == 'facebook')
    return 'http://facebook.com/'. $u;
  else if ($s == 'vimeo')
    return 'http://vimeo.com/'. $u;
  else if ($s == 'linkedin')
    return 'http://linkedin.com/in/'. $u;
  else if ($s == 'dribbble')
    return 'http://dribbble.com/'. $u;
  else if ($s == 'flickr')
    return 'http://flickr.com/people/'. $u;
  else if ($s == 'forrst')
    return 'http://forrst.com/'. $u;
  else
    return;

}



function agency_build_social_link($social_network, $username) {

  $social_network = strtolower($social_network);
  $cap_social_network = strtoupper(substr($social_network, 0, 1)) . substr($social_network, 1);

  $link = agency_calculate_social_link($social_network, $username);

  echo '<li><a href="'. $link .'"><i class="social-'. $social_network . '"></i>' . $cap_social_network . "</a></li>";

}





function agency_custom_styles(){

  function calculate_gradient_offset($six_digit_hexcolor, $six_digit_hex_offset="221211") {


    function catch_neg_color($decimal) {
      $decimal > 0 ? $decimal = $decimal : $decimal = 0;
      $decimal != 0 ? $hex = dechex($decimal) : $hex = "00";
      return $hex;
    }


    $r_color = catch_neg_color(hexdec(substr($six_digit_hexcolor, 1, 2)) - hexdec(substr($six_digit_hex_offset, 0, 2)));
    $g_color = catch_neg_color(hexdec(substr($six_digit_hexcolor, 3, 2)) - hexdec(substr($six_digit_hex_offset, 2, 2)));
    $b_color = catch_neg_color(hexdec(substr($six_digit_hexcolor, 5, 2)) - hexdec(substr($six_digit_hex_offset, 4, 2)));
    $offset_gradient = '#'.$r_color.$g_color.$b_color;

    return $offset_gradient;

  }




  
  global $up_options;
  
  if( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ):
    
    $styles = '<style type="text/css">'."\n";

    if( $up_options->highlight_color ) {
      $highlight_color = $up_options->highlight_color; // Get Set Color



      $gradient_color = calculate_gradient_offset($highlight_color);

      $styles .= "a{ color: $highlight_color; }\n";
      $styles .= ".breadcrumb {
  background: $highlight_color;
  background: -webkit-linear-gradient($highlight_color, $gradient_color);
  background: -moz-linear-gradient($highlight_color, $gradient_color);
}\n";
    }

    if( $up_options->link_color_hover )
      $styles .= "a:hover, header nav ul li a:hover, header nav ul ul li a:hover{ color: {$up_options->link_color_hover}; }\n";

    $styles .= '</style>'."\n";

    echo $styles;

  endif;

}
// Hook agency_custom_styles() into wp_enqueue_scripts
add_action( 'wp_head', 'agency_custom_styles');



// Portfolio Stuff

function agency_portfolio_navigation(){ ?>

      <?php previous_post_link('%link', 'Previous Portfolio Item'); ?>
      <a href="<?php echo home_url('/portfolio'); ?>" class="list-view" title="Portfolio List">Portfolio List View</a>
      <?php next_post_link('%link', 'Next Portfolio Item'); ?>

<?php }


function agency_get_portfolio_slides($slide_imgs_arry){

  foreach ($slide_imgs_arry as &$slide_img) {
    foreach($slide_img as $key => $value) {
     echo '        <li class="slide">' . "\n";
     echo '          <img class="_1" src="' . $value .'" ' . ">\n";
     echo '        </li>' . "\n";
    }
  }


}



function agency_portfolio_slide_builder($postID){

  $slide_imgs = get_post_meta($postID, 'portslides', true);

  $post_img =  get_the_post_thumbnail($postID, 'responsive', array('class' => '_1'));

  if ( $slide_imgs != null ) {

    echo '<section class="rotator">   '."\n";
    echo '  <div class="wrap">        '."\n";
    echo '    <div class="flexslider">'."\n";
    echo '      <ul class="slides">   '."\n";

    if ($post_img){
     echo '        <li class="slide">' . "\n";
     echo '          ' . $post_img . "\n";
     echo '        </li>' . "\n";
    }

    agency_get_portfolio_slides($slide_imgs);
    echo '      </ul>                 '."\n";
    echo '    </div>                  '."\n";
    echo '  </div><!--/.wrap-->       '."\n";
    echo '</section><!--/.rotator-->  '."\n";

  } else {}

}



function agency_portfolio_url($postID){

  $portinfo = get_post_meta($postID,'portinfo',true);

  if ( is_array($portinfo) ){

    if( $portinfo[0]['website-url'] )
      echo '<a href="'. $portinfo[0]['website-url'] .'" class="button light-bg left viewer-visit">Visit Website</a>';

  } else { }

}



function agency_portfolio_services($postID){

  $portinfo = get_post_meta($postID,'portinfo',true);

  if ( is_array($portinfo) ){

    if($portinfo[0]['services-provided-paragraph']){
      echo '<h3><strong>Services Provided</strong></h3>';
      echo '<p>'. $portinfo[0]['services-provided-paragraph'] .'</p>';
    }

  } else { }


}



function agency_portfolio_testimonials($postID){

  $testimonial = get_post_meta(get_the_ID(), 'portfolio_related_testimonial', true);
  echo $testimonial;
//
//  $the_tags = get_the_tags($postID);
//
//  if ($the_tags) {
//
//    $tag_array = array();
//    foreach ( $the_tags as $tag ){
//      array_push($tag_array, $tag->name);
//    }
//
//    $query = new WP_Query(
//      array(
//        'post_type' => 'testimonial',
//        'posts_per_page'  => -1
//        
//      )
//    );
//
//  }
//
//  $testimonial_title = 0;
//
//  if ( $query != null && $query->have_posts() ){
//    while ( $query->have_posts() ) : $query->the_post();
//
//      if (has_tag($tag_array) && $testimonial_title == 0) {
//
//        $testimonial_title = 1;
//        echo '    <h3><strong>Testimonials</strong></h3>'."\n";
      
//
//        <div class="testimonial">
//           the_content();
//          <em>- the_title(); </em>
//        </div>
//  
//       // } else if (has_tag($tag_array)) { 
//
//        <div class="testimonial">
//           the_content();
//          <em>-  the_title(); </em>
//        </div>

// }

//    endwhile;

//}

//  wp_reset_postdata();

}



function agency_portfolio_launch_date($postID){

  $portinfo = get_post_meta($postID,'portinfo',true);


  if ( is_array($portinfo) ){

    if($portinfo[0]['launch-date'])
      echo '<em>'. $portinfo[0]['launch-date'] .'</em>';

  } else { }


}



function agency_list_portfolio_categories(){

  $args = array(
    'taxonomy' => 'portfolio_category',
    'title_li' => ''
  );

  return wp_list_categories( $args );

}



function agency_portfolio_home_list(){

  $query = new WP_Query(
    array(
      'post_type' => 'portfolio',
      'orderby'   => 'rand',
      'posts_per_page'  => '4'
    )
  );
  
  if ($query->have_posts() ){
    while ( $query->have_posts() ) : $query->the_post(); ?>


      <div class="portfolio-item _1-4">
        <a href="<?php the_permalink(); ?>">
          <?php
            $post_img =  get_the_post_thumbnail(get_the_ID());
            if ($post_img):
          ?>
          <?php echo $post_img; ?>
          <?php endif; ?>

          <?php the_title(); ?>
        </a>
      </div><!--/.portfolio-item-->
  
    <?php endwhile;
  }

  wp_reset_postdata();

}



// Team member stuff



function agency_team_member_title($postID){

  $teaminfo = get_post_meta($postID,'team-info',false);

  if( count($teaminfo) > 0 )
    echo '<em>'. $teaminfo[0][0]['team-member-job-title'] .'</em>';

}



function agency_team_member_social($postID){

  $teamsocial = get_post_meta($postID,'team-social',false);

  if($teamsocial != null)
    agency_social_links( $teamsocial[0] );

}



function agency_team_members_home_list(){

  $query = new WP_Query(
    array(
      'post_type' => 'team',
      'orderby'   => 'rand',
      'posts_per_page'  => '4'
    )
  );
  
  if ($query->have_posts() ){
    while ( $query->have_posts() ) : $query->the_post(); ?>

      <div class="team-member _1-4">
        
        
        <?php
          $post_img =  get_the_post_thumbnail(get_the_ID(), 'responsive');
          if ($post_img):
        ?>
        <a href="<?php the_permalink(); ?>"><?php echo $post_img; ?></a>
        <?php endif; ?>
        <strong><?php the_title(); ?></strong>
        <?php agency_team_member_title(get_the_id()); ?>

      </div><!--/.team-member-->
  
    <?php endwhile;
  }

  wp_reset_postdata();

}



// Misc

function agency_blog_home_list(){

  $query = new WP_Query(
    array(
      'post_type' => 'post',
      'posts_per_page'  => '2'
    )
  );
  
  if ($query->have_posts() ){
    while ( $query->have_posts() ) : $query->the_post(); ?>


    <article class="blog-post">
      <?php
        $post_img =  get_the_post_thumbnail(get_the_ID());
        if ($post_img):
      ?>
      <?php echo $post_img; ?>
      <?php endif; ?>
      <h4><?php the_title(); ?></h4>
      <p>Yea, I just wanted to make sure you realize how awesome I am.</p>
      <a href="<?php the_permalink(); ?>">continue reading</a>
    </article><!--/.blog-post-->

    <?php endwhile;
  }

  wp_reset_postdata();

}



function agency_testimonial_home_list(){

  $query = new WP_Query(
    array(
      'post_type' => 'testimonial',
      'orderby'   => 'rand',
      'posts_per_page'  => '2'
    )
  );
  
  if ($query->have_posts() ){
    while ( $query->have_posts() ) : $query->the_post(); ?>

    <div class="testimonial">
      <?php the_content(); ?>
      <em>- <?php the_title(); ?></em>
    </div><!--/.testimonial-->

    <?php endwhile;
  }

  wp_reset_postdata();

}


function agency_get_post_class($postID){

  $post_format =  get_post_format($postID);
  if (!$post_format) {
    echo ' post-standard ';
  } else if ($post_format == 'link') {
    echo ' post-link ';
  } else if ($post_format == 'quote') {
    echo ' post-quote ';  
  } else if ($post_format == 'status') {
    echo ' post-status ';  
  } else if ($post_format == 'image') {
    echo ' post-image ';  
  } else if ($post_format == 'video') {
    echo ' post-video ';  
  } else if ($post_format == 'audio') {
    echo ' post-audio ';  
  } else if ($post_format == 'gallery') {
    echo ' post-gallery ';  
  } else { }

}



function agency_posts_url() {

  if( get_option( 'show_on_front' ) == 'page' )
    echo get_permalink( get_option('page_for_posts' ) );
  else
    echo bloginfo('url');

}


function agency_home_slide_builder() {

  global $post;
  $the_slides = agency_get_home_slides();

  if ($the_slides) {


  if ( function_exists( 'wp_nav_menu' ) ) {
  
    $args = array(
      'container'     => false,
      'menu_id'       => 'slide-nav',
      'theme_location'=> 'home_slides_menu',
      'fallback_cb'   => 'agency_nav_callout',
      'link_before'   => '',
      'link_after'    => '',
      'echo'          => false,
      'depth'         => 1,
      'walker'        => new Agency_Walker_Nav_Menu()
    );

    $slides_nav =  wp_nav_menu( $args );

  } else {
    $slides_nav = agency_nav_callout();
  }

?>


<section class="rotator">
  <div class="wrap">
    <div class="flexslider">


      <ul class="slides">
  <?php

    foreach ($the_slides as $the_slide) {
      echo "\n".'          <li class="slide">'."\n";
      echo '            <div class="slide-content-wrapper _1-2 clearfix">'."\n";
      echo '              <div class="slide-content">'."\n";
      echo '                <h1>' . $the_slide['title'] ."</h1>\n";
      echo '                <h3>' . $the_slide['blurb'] . "\n";
      if ($the_slide['link'])
        echo '                <a href="' . $the_slide['link'] . '" title="'.$the_slide['title'].'">See more</a>'."\n";
      echo '                </h3>'."\n";
      echo '                ' . $slides_nav ."\n";
      echo '              </div>'."\n";
      echo '            </div>'."\n";
      echo '          ' . $the_slide['image'] ."\n";
      echo '        </li>'."\n";

    } ?>

      </ul>
    </div>
  </div><!--/.wrap-->
</section><!--/.rotator-->

<?php 

  } else { }


}

function agency_get_home_slides() {


  $query = new WP_Query(
    array(
      'post_type'       => 'slide',
      'orderby'         => 'menu_order',
      'order'           => 'ASC',
      'posts_per_page'  => '-1'
    )
  );
  
  if ($query->have_posts() ){

    $results = array();

    while ( $query->have_posts() ) : $query->the_post();

      $slidedata = array(
        'title' => get_the_title(),
        'image' => get_the_post_thumbnail(get_the_ID(), 'responsive'),
        'blurb' => get_post_meta(get_the_ID(), 'slide_blurb',true),
        'link'  => get_post_meta(get_the_ID(), 'slide_link', true),
        'id'    => get_the_ID()
      );

      $results[] = $slidedata;


    endwhile;

  wp_reset_postdata();

  return $results;


  };


}


function agency_breadcrumbs() {

  $args = array(
    'show_on_home'  => 0,
    'delimiter'     => '<li class="seperator">&#9654;</li>',
    'home'          => 'Home',
    'showCurrent'   => 1,
    'before'        => '<span class="current">',
    'after'         => '</span>'
  ); ?>


<section class="breadcrumb">
  <div class="wrap">
<?php  make_breadcrumbs($args); ?>
  </div><!--/.wrap-->
</section><!--/.breadcrumb-->


<?php }