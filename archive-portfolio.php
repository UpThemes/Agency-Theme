<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">
  <section class="_1">
    <h1>Our Portfolio</h1>
    <?php get_sidebar('portfolio-top'); ?>
  </section>
  <section class="_1-5">
    <ul class="portfolio-categories">
      <?php agency_list_portfolio_categories(); ?>
    </ul>
  </section>
  <section class="_4-5 _parent _uniform-children">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="_1-3 post">

      <a href="<?php the_permalink(); ?>">
        <?php
          $post_img =  get_the_post_thumbnail(get_the_ID(), 'responsive');
          if ($post_img):
        ?>
        <?php echo $post_img; ?>
        <?php endif; ?>
      </a>
      <strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
      <?php the_excerpt(); ?>

    </div>
  <?php endwhile; ?>

  <?php agency_navigation(); ?>

  <?php else : ?>
    <?php agency_no_post_content(); ?>
  <?php endif; ?>

  </section>
</div><!--/.wrap-->

<?php get_footer(); ?>