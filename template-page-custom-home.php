<? 
/* Template Name: Custom Home Page */
?>

<?php get_header(); ?>

<?php agency_home_slide_builder($post->ID); ?>

<div class="wrap content">
  <section class="portfolio-module">
    <div class="section-h _1 _no-b">
      <h2><?php _e('Selections from the Portfolio','agency'); ?></h2>
      <a href="<?php echo home_url('/portfolio/'); ?>"><?php _e('view complete portfolio','agency'); ?></a>
    </div><!--/.section-h-->
    <div class="_1 _parent _no-t">

      <?php agency_portfolio_home_list(); ?>

    </div>
  </section><!--/.portfolio-module-->

  <section class="blog-module _1-2">
    <div class="section-h">
      <h2><?php _e('Recently on the Blog','agency'); ?></h2>
      <a href="<?php agency_posts_url(); ?>"><?php _e('Read the Blog','agency'); ?></a>
    </div><!--/.section-h-->

    <?php agency_blog_home_list(); ?>

  </section><!--/.blog-module-->

  <section class="testimonial-module _1-2">
    <div class="section-h">
      <h2><?php _e('Testimonials','agency'); ?></h2>
    </div><!--/.section-h-->

    <?php agency_testimonial_home_list(); ?>

  </section><!--/.testimonial-module-->

  <section class="team-module clear">

    <h2><?php _e("Our Team","agency"); ?>
    <?php agency_team_members_home_list(); ?>

  </section><!--/.team-module-->

  <section class="about-module _1-2">
    <?php get_sidebar('home-1'); ?>
  </section><!--/.about-module-->

  <section class="office-module _1-2">
    <?php get_sidebar('home-2'); ?>
  </section><!--/.office-module-->

</div><!--/.wrap-->

<?php get_footer(); ?>
