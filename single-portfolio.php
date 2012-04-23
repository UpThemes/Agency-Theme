<?php

get_header();

$up_options = upfw_get_options();

?>

<section class="breadcrumb">
  <div class="wrap">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Page title</a></li>
    </ul>
  </div><!--/.wrap-->
</section><!--/.breadcrumb-->

<?php agency_portfolio_slide_builder($post->ID); ?>



<div class="wrap content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <section class="_4-5 _no-b">
    <h1><?php the_title();?> <?php agency_portfolio_url($post->ID); ?></h1>
    <div class="viewer-meta">
      <?php the_category(' - ', $post->ID); ?>
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

    <h3><strong>Testimonials</strong></h3>
    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

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