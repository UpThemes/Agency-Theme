<?php get_header(); ?>

<section class="breadcrumb">
  <div class="wrap">
    <ul>
      <li><a href="#">Home</a></li>
      <li class="seperator">&#9654;</li>
      <li><a href="#">Page title</a></li>
    </ul>
  </div><!--/.wrap-->
</section><!--/.breadcrumb-->
<div class="wrap content">
  <section class="_1">
    <h1>Our Portfolio</h1>
    <p>Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Curabitur blandit tempus porttitor.</p>
    <hr/>
  </section>
  <section class="_1-5">
    <ul class="portfolio-categories">
      <?php agency_list_portfolio_categories(); ?>
    </ul>
  </section>
  <section class="_4-5 _parent">
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
    <?php agency_the_404_content(); ?>
  <?php endif; ?>

  </section>
</div><!--/.wrap-->

<?php get_footer(); ?>