<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">

  <section class="_4-5">
    <?php if (have_posts()) : ?>
    <div class="clearfix">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part( 'content', get_post_format() ); ?>
    <?php endwhile; ?>
    </div>
      <?php agency_navigation(); ?>
    <?php else : ?>
      <?php agency_no_post_content(); ?>
    <?php endif; ?>
  </section>

  <section class="_1-5">
    <?php get_sidebar(); ?>
  </section>

</div><!--/.wrap-->

<?php get_footer(); ?>