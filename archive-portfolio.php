<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">
  <section class="_1">
    <h1><?php post_type_archive_title(); ?></h1>
    <?php get_sidebar('portfolio-top'); ?>
  </section>
  <section class="_1-5">
    <ul class="portfolio-categories">
      <?php agency_list_portfolio_categories(); ?>
    </ul>
  </section>
  <section class="_4-5 _parent _uniform-children">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php get_template_part('portfolio/content','grid'); ?>
  <?php endwhile; ?>

  <?php agency_navigation(); ?>

  <?php else : ?>
    <?php agency_no_post_content(); ?>
  <?php endif; ?>

  </section>
</div><!--/.wrap-->

<?php get_footer(); ?>