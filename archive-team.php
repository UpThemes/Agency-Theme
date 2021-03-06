<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">

  <section class="_1 _no-b">
    <h1><?php post_type_archive_title(); ?></h1>
    <?php get_sidebar('team-top'); ?>
  </section>

  <div class="_parent _uniform-children clearfix">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php get_template_part('team-members/content','grid'); ?>
    <?php endwhile; ?>
    <?php else : ?>
      <?php agency_no_post_content(); ?>
    <?php endif; ?>
  </div>
  <?php agency_navigation(); ?>
</div><!--/.wrap-->

<?php get_footer(); ?>