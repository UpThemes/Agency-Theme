<?php
if ( function_exists('upfw_get_options') ){
  global $up_options;
  $up_options = upfw_get_options();
} else $up_options = array();
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

  <!--[if lte IE 7]>
  <style type="text/css">*{behavior: url("<?php echo get_template_directory_uri() ?>/assets/boxsizing.htc")}</style>
  <![endif]-->
  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/selectivizr-min.js"></script>
  <![endif]-->

</head>
<body <?php body_class(); ?>>
  <div id="pagewrap">
    <div id="footerpad" class="clearfix">
  <header>
    <div class="wrap">

      <?php agency_display_custom_header(); ?>

      <?php
      if ( function_exists( 'wp_nav_menu' ) ) {

              $args = array(
                'container'     => 'nav',
                'menu_id'       => 'navigation',
                'theme_location'=> 'header_menu',
                'fallback_cb'   => 'agency_wp_page_menu',
                'link_before'   => '<span>',
                'link_after'    => '</span>',
                'depth'         => 2
              );

        echo wp_nav_menu( $args );

      } else {
        agency_wp_page_menu();
      }
      ?>

      <div class="clear"></div>
    </div><!--/.wrap-->
  </header>