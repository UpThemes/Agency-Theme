<?php

get_header();

$up_options = upfw_get_options();

?>

<?php agency_breadcrumbs(); ?>


<?php agency_portfolio_slide_builder($post->ID); ?>



<div class="wrap content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <section class="_4-5 _no-b">
    <h1><?php the_title();?> <?php agency_portfolio_url($post->ID); ?></h1>
    <div class="viewer-meta">
      <?php the_terms( $post->ID, 'portfolio_category', '<span class="portfolio-category">', ' - ', '</span>' ); ?>
      <?php agency_portfolio_launch_date($post->ID); ?>
    </div>
  </section>
  <section class="_1-5">
    <div class="viewer-controls">

      <?php agency_portfolio_navigation(); ?>

    </div>
  </section>
  <hr/>

  <section class="_2-3">
    <h3><strong>About</strong></h3>
    <?php the_content(); ?>
  </section>

  <section class="_1-3">


    <?php agency_portfolio_services($post->ID); ?>

    <?php agency_portfolio_testimonials($post->ID); ?>

  </section>

<?php endwhile; ?>

<?php else : ?>

<?php 
/**
 * Output no-post content
 */
agency_the_404_content(); 
?>

<?php endif; ?>


</div><!--/.wrap-->

<?php get_footer(); ?>