<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">

  <section class="_4-5 _parent">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php get_template_part( 'team-members/content', 'full' ); ?>
    <?php endwhile; ?>
      <?php agency_navigation(); ?>
    <?php else : ?>
      <?php agency_no_post_content(); ?>
    <?php endif; ?>
  </section>

  <section class="_1-5">
    <?php get_sidebar(); ?>
  </section>

</div><!--/.wrap-->

<?php get_footer();?>