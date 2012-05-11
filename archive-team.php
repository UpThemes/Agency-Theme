<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">

  <section class="_1 _no-b">
    <h1>Our Team</h1>
    <?php get_sidebar('team-top'); ?>
  </section>

  <div class="_parent _uniform-children">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php get_template_part('team-members/content',get_post_format()); ?>

  <?php endwhile; ?>
  </div>

  <?php agency_navigation(); ?>

  <?php else : ?>
    <?php agency_no_post_content(); ?>
  <?php endif; ?>

</div><!--/.wrap-->

<?php get_footer(); ?>