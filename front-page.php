<?php
  if( get_option( 'show_on_front' ) != 'page' ) {
    require_once("home.php");
  } else {

//  global $up_options;
//  $up_options = upfw_get_options();

?>


<?php get_header(); ?>

<section class="rotator">
  <div class="wrap">
    <div class="flexslider">
      <div class="slide-content _1-2">
        <h1><?php echo agency_get_theme_option('home_slides_title'); ?></h1>
        <h3><?php echo agency_get_theme_option('home_slides_blurb'); ?></h3>

        <?php if ( function_exists( 'wp_nav_menu' ) ) {

                  $args = array(
                    'container'     => false,
                    'menu_id'       => 'slide-nav',
                    'theme_location'=> 'home_slides_menu',
                    'fallback_cb'   => 'agency_nav_callout',
                    'link_before'   => '',
                    'link_after'    => '',
                    'depth'         => 1
                  );

            echo wp_nav_menu( $args );

          } else {
            agency_nav_callout();
          } ?>
      </div>

      <ul class="slides">
        <?php agency_home_slide_builder($post->ID); ?>
      </ul>
    </div>
  </div><!--/.wrap-->
</section><!--/.rotator-->
<div class="wrap content">
  <section class="portfolio-module">
    <div class="section-h _1 _no-b">
      <h2>Selections from the Portfolio</h2>
      <a href="<?php echo home_url('/portfolio/'); ?>"><i class="link"></i>view complete portfolio</a>
    </div><!--/.section-h-->
    <div class="_1 _parent _no-t">

      <?php agency_portfolio_home_list(); ?>

    </div>
  </section><!--/.portfolio-module-->
<hr/>
  <section class="blog-module _1-2">
    <div class="section-h">
      <h2>Recently on the Blog</h2>
      <a href="<?php agency_posts_url(); ?>"><i class="link"></i>Read the Blog</a>
    </div><!--/.section-h-->

    <?php agency_blog_home_list(); ?>

  </section><!--/.blog-module-->
  <section class="testimonial-module _1-2">
    <div class="section-h">
      <h2>Testimonials</h2>
    </div><!--/.section-h-->

    <?php agency_testimonial_home_list(); ?>

  </section><!--/.testimonial-module-->
<hr/>
  <section class="team-module">

    <?php agency_team_members_home_list(); ?>

  </section><!--/.team-module-->

  <hr/>

  <section class="about-module _1-2">
    <?php get_sidebar('home-1'); ?>
  </section><!--/.about-module-->
  <section class="office-module _1-2">
    <?php get_sidebar('home-2'); ?>
  </section><!--/.office-module-->
</div><!--/.wrap-->

<?php get_footer(); ?>


<?php  } ?>