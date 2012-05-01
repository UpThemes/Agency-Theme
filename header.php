<?php
if (function_exists('upfw_get_options'))
  global $up_options;
  $up_options = upfw_get_options();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
  <title><?php 
  
  if( class_exists('All_in_One_SEO_Pack') ):
    wp_title(); 
  else:
    if( is_front_page() ) echo get_bloginfo('name') . " / " . get_bloginfo('description'); wp_title('',true,'left'); 
  endif;
  
  ?></title>

  <?php 
  if( isset($up_options->favicon ))
    echo '<link rel="shortcut icon" href="' . $up_options->favicon . '">';
  ?>

  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes" />  


  <?php wp_head(); ?>


  <!--[if lt IE 7]>
  <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script>
  <![endif]-->
  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/selectivizr-min.js"></script>
  <![endif]-->

</head>
<body>
  <div id="pagewrap">
    <div id="footerpad" class="clearfix">
  <header>
    <div class="wrap">
      <a href="<?php echo home_url('/'); ?>" class="logo">
        <span><?php bloginfo('name'); ?></span>
      </a>
      <nav>
      <?php

      if ( function_exists( 'wp_nav_menu' ) ) {
      
              $args = array(
                'container'     => false,
                'menu_id'       => 'navigation',
                'theme_location'=> 'header_menu',
                'fallback_cb'   => 'agency_nav_callout',
                'link_before'   => '<span>',
                'link_after'    => '</span>',
                'depth'         => 2
              );
              
        echo wp_nav_menu( $args );
      
      } else {
        agency_nav_callout();
      }
      ?>
      </nav>

      <div class="clear"></div>
    </div><!--/.wrap-->
  </header>