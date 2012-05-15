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



function agency_navigation( $type = 'plain', $endsize = 1, $midsize = 1 ) {

echo '  <div class="paging clearfix">'."\n";
  if( function_exists('wp_pagenavi') ) : ?>

    <?php wp_pagenavi(); ?>

  <?php else :

    global $wp_query, $wp_rewrite;  
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    // Sanitize input argument values
    if ( ! in_array( $type, array( 'plain', 'list', 'array' ) ) ) $type = 'plain';
    $endsize = (int) $endsize;
    $midsize = (int) $midsize;

    // Setup argument array for paginate_links()
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'show_all' => false,
        'end_size' => $endsize,
        'mid_size' => $midsize,
        'type' => $type,
        'prev_text' => '&lt;&lt;',
        'next_text' => '&gt;&gt;'
    );

    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo "<p><strong>" . paginate_links( $pagination ) . "</strong></p>";


  endif;

  echo '  </div>'."\n";
}


function agency_no_post_content(){ ?>

  <h1><?php _e("No Posts Found","agency"); ?></h1>
  <h2><?php _e("We couldn't find any posts that matched your query.","agency"); ?></h2>
  <?php echo '<div class="widget widget_search">';
  get_search_form();
  echo '</div>';

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
  background: -moz-linear-gradient($highlight_color, $gradient_color);\n}\n";
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

      <?php previous_post_link('%link', __('Previous Portfolio Item','agency')); ?>
      <a href="<?php echo home_url('/portfolio'); ?>" class="list-view" title="Portfolio List"><?php _e("Portfolio List View","agency"); ?></a>
      <?php next_post_link('%link', __('Next Portfolio Item','agency')); ?>

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

  if ( $post_img !=null || $slide_imgs != null ) {

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
      echo '<a href="'. $portinfo[0]['website-url'] .'" class="button light-bg left viewer-visit">' . _("Visit Website &rarr;","agency") . '</a>';

  } else { }

}



function agency_portfolio_services($postID){

  $portinfo = get_post_meta($postID,'portinfo',true);

  if ( is_array($portinfo) ){

    if($portinfo[0]['services-provided-paragraph']){
      echo '<h3><strong>' . __("Services Provided","agency") . '</strong></h3>';
      echo '<p>'. $portinfo[0]['services-provided-paragraph'] .'</p>';
    }

  } else { }


}



function agency_portfolio_testimonials($postID){

  $testimonials = get_post_meta($postID, 'porttestimonials', true);

  if(is_array($testimonials)) { // Has Testimonials Associated with Portfolio item
    echo '    <h3><strong>' . __("Testimonials","agency") . '</strong></h3>'."\n"; // Display Section Title

    foreach($testimonials as $testimonial){
      $post_id_and_title = $testimonial["select-associated-testimonial"];
      $post_id_and_title = explode("ID: ",$post_id_and_title);
      $post_id_and_title = explode(" - ", $post_id_and_title[1]);

      $post_ids[] = $post_id_and_title[0];

    }

    $query = new WP_Query(
      array(
        'post_type'       => 'testimonial',
        'post__in'        => $post_ids,
        'posts_per_page'  => '-1'
      )
    );


    if ($query->have_posts() ){
      while ( $query->have_posts() ) : $query->the_post(); ?>

      <div class="testimonial">
        <?php the_content(); ?>
        <em>- <?php the_title() ?></em>
      </div>

<?php endwhile;

      wp_reset_postdata();
    };

  } else {
    return; // No Testimonials, exit
  }


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


      <div <?php post_class("portfolio-item _1-4"); ?>>
        <a href="<?php the_permalink(); ?>">
          <?php
            $post_img =  get_the_post_thumbnail(get_the_ID(),'portfolio-grid');
            if ($post_img):
          ?>
            <?php echo $post_img; ?>
          <?php else: ?>
            <?php agency_placeholder('portfolio'); ?>
          <?php endif; ?>
        </a>

        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        
      </div><!--/.portfolio-item-->
  
    <?php endwhile;
  }

  wp_reset_postdata();

}



// Team member stuff

function agency_team_member_name(){
  global $post;
  $name = get_the_title();
  if( is_singular() ):
    $name = '<a href="' . get_permalink() . '">' . $name . '</a>';
  endif;
  
  echo $name;
}

function agency_team_member_title(){
  global $post;
  $teaminfo = get_post_meta($post->ID,'team-info',false);

  if( count($teaminfo) > 0 )
    echo $teaminfo[0][0]['team-member-job-title'];

}



function agency_team_member_social(){
  global $post;
  $teamsocial = get_post_meta($post->ID,'team-social',false);

  if($teamsocial != null)
    agency_social_links( $teamsocial[0] );

}



function agency_team_members_home_list(){

  $team_members = new WP_Query(
    array(
      'post_type' => 'team',
      'orderby'   => 'rand',
      'posts_per_page'  => '4'
    )
  );
  
  if ($team_members->have_posts() ){
    while ( $team_members->have_posts() ) : $team_members->the_post(); ?>

      <div <?php post_class("team-member _1-4"); ?>>
        <?php
          $post_img =  get_the_post_thumbnail(get_the_ID(), 'portfolio-grid');
          if ($post_img):
        ?>
        <a href="<?php the_permalink(); ?>"><?php echo $post_img; ?></a>
        <?php else: ?>
        <a href="<?php the_permalink(); ?>"><?php agency_placeholder('team'); ?></a>
        <?php endif; ?>


        <strong><?php the_title(); ?></strong>
        <?php agency_team_member_title(get_the_id()); ?>

      </div><!--/.team-member-->
  
    <?php endwhile;
  }

}



// Misc


function agency_placeholder($type){

  echo '<img src="'. get_template_directory_uri() . '/assets/default-' . $type . '.png" >';

}


function agency_blog_home_list(){

  $query = new WP_Query(
    array(
      'post_type' => 'post',
      'posts_per_page'  => '2'
    )
  );
  
  if ($query->have_posts() ){
    while ( $query->have_posts() ) : $query->the_post(); ?>


    <article <?php post_class(); ?>>
      <?php
        $post_img =  get_the_post_thumbnail(get_the_ID());
        if ($post_img):
      ?>
      <?php echo $post_img; ?>
      <?php endif; ?>
      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
      <p><?php the_excerpt(); ?></p>
      <p><a href="<?php the_permalink(); ?>"><?php _e("Continue Reading &rarr;","agency"); ?></a></p>
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

    <div <?php post_class("testimonial"); ?>>
      <?php the_content(); ?>
      <em>- <?php the_title(); ?></em>
    </div><!--/.testimonial-->

    <?php endwhile;
  }

  wp_reset_postdata();

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
  $up_options = upfw_get_options();

  if ($the_slides) {


  if ( function_exists( 'wp_nav_menu' ) ) {
  
    $args = array(
      'container'     => false,
      'menu_id'       => 'home-slides-nav',
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
      echo "\n";
      echo '          <li class="slide">'."\n\n";
      echo '            <div class="slide-content-wrapper _1-3 clearfix">'."\n";
      if( $up_options->enable_carousel_text != 'false' ){
        echo '              <div class="slide-content">'."\n";
        echo '                <h1>' . $the_slide['title'] ."</h1>\n";
        echo '                <div class="teaser">' . $the_slide['blurb'] . "\n";
        if ($the_slide['link'])
          echo '                <p><a href="' . $the_slide['link'] . '" title="'.$the_slide['title'].'">'.__("Read More &rarr;","agency").'</a></p>'."\n";
        echo '                </div>'."\n";
        echo '                ' . $slides_nav ."\n";
        echo '              </div>'."\n";
      }
      echo '            </div>'."\n";
      echo '          ' . $the_slide['image'] ."\n\n";
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

      $size =  is_single() ? 'responsive-tall' : 'responsive';

      $slidedata = array(
        'title' => get_the_title(),
        'image' => get_the_post_thumbnail(get_the_ID(), $size),
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
    'delimiter'     => '<li class="separator"><i class="icon icon-right-open"></i></li>',
    'home'          => __("Home","agency"),
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


function agency_error_class($error) {
  if(isset($error)) {
    echo 'error ';
  }
}


function agency_error_output($error, $format=''){
  if(isset($error) && $format == true) {
    echo '<span class="error _1-3 ">' . $error . '</span>';
  } else if(isset($error)){
    echo '<span class="error">' . $error . '</span>';
  }

}



function agency_contact_form($error_log, $hasError, $emailSent, $_POST){ ?>


  <?php if(isset($emailSent) && $emailSent == true) { ?>

    <div class="thanks">
      <h1 class="_1 success-notification"><?php _e("Thank you, your email was sent successfully.","agency"); ?></h1>
    </div>

  <?php } else { ?>

    <?php if(isset($hasError) || isset($captchaError)) { ?>
        <h3 class="_1 error-notification"><?php _e("We're sorry, something seems to have gone wrong. Check your errors or reach out on a social media channel.","agency"); ?></h3>
    <?php } ?>

    <form id="contact" action="<?php the_permalink(); ?>" method="post">

      <div class="_1-3 col-no-left col-no-top">

        <input type="text" name="contact-name" id="name" class="<?php agency_error_class($error_log["nameError"]); ?>" placeholder="Name" value="<?php if(isset($_POST['contact-name'])) echo $_POST['contact-name'];?>">
        <?php agency_error_output($error_log["nameError"]); ?>

        <input type="text" name="contact-company" id="company" placeholder="<?php _e("Company","agency"); ?>" value="<?php if(isset($_POST['contact-company'])) echo $_POST['company'];?>">

        <input type="text" name="contact-email-address" id="email-address" class="<?php agency_error_class($error_log["emailError"]); ?>" placeholder="<?php _e("Email Address","agency"); ?>" value="<?php if(isset($_POST['contact-email-address'])) echo $_POST['contact-email-address'];?>">
        <?php agency_error_output($error_log["emailError"]); ?>

        <input type="text" name="contact-phone" id="phone" placeholder="<?php _e("Phone","agency"); ?>" value="<?php if(isset($_POST['contact-phone'])) echo $_POST['contact-phone'];?>">

        <input type="text" name="contact-web-url" id="web-url" placeholder="<?php _e("Web URL","agency"); ?>" value="<?php if(isset($_POST['contact-web-url'])) echo $_POST['contact-web-url'];?>">
      </div>

      <div class="_2-3 col-no-right col-no-top">
        <textarea id="contact-message" class="<?php agency_error_class($error_log["messageError"]); ?>" name="contact-message" placeholder="Your Message Here"><?php if( isset($_POST['contact-message']) ) echo $_POST['contact-message']; ?></textarea>

        <input type="submit" name="send" id="send" value="<?php _e("Send Message","agency"); ?>"/>
        <input type="hidden" id="submitted" name="submitted" value="true" />

      </div>

    </form>

  <?php } 


}



function agency_get_testimonials_list() {

  $query = new WP_Query(
    array(
      'post_type'       => 'testimonial',
      'posts_per_page'  => '-1'
    )
  );
  
  if ($query->have_posts() ){

    $results = array();

    while ( $query->have_posts() ) : $query->the_post();

      $testimonialdata = "ID: " . get_the_ID() . " - " . get_the_title() ;

      $results[] = $testimonialdata;

    endwhile;

  wp_reset_postdata();

  return $results;

  };


}


function agency_wp_page_menu(){
  echo '<nav>';
  wp_page_menu();
  echo '</nav>';
}


function agency_default_sidebar() {
  the_widget('WP_Widget_Categories');
  the_widget('WP_Widget_Search');
}


function agency_archive_recent($number_of_posts=30) {


  $query = new WP_Query(
    array(
      'post_type' => 'post',
      'posts_per_page'  => $number_of_posts
    )
  );
  
  if ($query->have_posts() ){ ?>

      <h3><strong><?php _e("Latest Posts","agency"); ?></strong></h3>
      <ul class="recent-posts"><?php
        while ( $query->have_posts() ) : $query->the_post(); ?>

        <li <?php post_class(); ?>>
          <strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
        </li>
        <?php endwhile; ?>
  
      </ul>
<?php }

  wp_reset_postdata();

}


function agency_archive_by_month() {

$args = array(

);


?>

      <h3><strong><?php _e("Archives by Month","agency"); ?></strong></h3>
      <ul>
      <?php wp_get_archives($args);?>
      </ul>



<?php 

}


function agency_archive_by_categoty() {

$args = array(
  'title_li' => __('')
);

?>

      <h3><strong><?php _e("Archives by Category","agency"); ?></strong></h3>
      <ul class="categories-list">
        <?php wp_list_categories($args); ?>
      </ul>

<?php
}


function calculate_ppp($old_ppp, $columns) {

  if ($old_ppp < $columns) {
    return $columns;
  } else {
    $remainder = $old_ppp % $columns;
    $new_ppp = $old_ppp - $remainder;
    return $new_ppp;
  }

}


function agency_get_custom_ppp($type, $set_ppp) {


  if($type == 'team') {
    $team_ppp = calculate_ppp($set_ppp, 4);
    return $team_ppp;
  } else if ($type == 'portfolio') {
    $port_ppp = calculate_ppp($set_ppp, 3);
    return $port_ppp;
  } else {
    return $set_ppp;
  }


}



function agency_modify_portfolio_posts_query( $query ){

  $post_type = $query->get('post_type');
  $old_ppp = get_option('posts_per_page');

  if ( ( 'portfolio' == $post_type && is_archive() ) || is_tax() ) {
    $new_ppp = agency_get_custom_ppp('portfolio', $old_ppp);
    $query->set('posts_per_page', $new_ppp);
  }

}
add_action('pre_get_posts', 'agency_modify_portfolio_posts_query');


function agency_modify_team_posts_query( $query ){

  $post_type = $query->get('post_type');
  $old_ppp = get_option('posts_per_page');

  if ( 'team' == $post_type && is_archive() ) {
    $new_ppp = agency_get_custom_ppp('team', $old_ppp);
    $query->set('posts_per_page', $new_ppp);
  }

}
add_action('pre_get_posts', 'agency_modify_team_posts_query');



function agency_excerpt_length($length){
  return 20;
}
add_filter( 'excerpt_length', 'agency_excerpt_length', 999 );


function agency_excerpt_more($more){
	return '..';
}
add_filter('excerpt_more', 'agency_excerpt_more');