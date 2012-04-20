<?php global $up_options; ?>
<?php
if (function_exists('upfw_get_options'))
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


  <script type="text/javascript">
    $(function(){
      $('.flexslider').flexslider();
      $(".breadcrumb").sticky();

      // Create the dropdown base
      $("<select />").appendTo("header nav");

      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Go to..."
      }).appendTo("nav select");

      // Populate dropdown with menu items
      $("header nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });

      $("header nav select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
    });
  </script>
</head>
<body>
  <header>
    <div class="wrap">
      <a href="#" class="logo">
        <img src="<?php  bloginfo('template_directory') ?>/temp.gif"/>
        <span>Politica</span>
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