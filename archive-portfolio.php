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
  <section class="_4-5 _parent">
    <div class="_parent _uniform-children portfolio-listing clearfix">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('portfolio/content','grid'); ?>
      <?php endwhile; ?>
      <?php else : ?>
        <?php agency_no_post_content(); ?>
      <?php endif; ?>
    </div>
    <?php agency_navigation(); ?>
  </section>

</div><!--/.wrap-->

<?php get_footer(); ?>