<?php

get_header();

$up_options = upfw_get_options();

?>

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
  <section class="_1 _no-b">
    <h1>Our Team</h1>
    <p>Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Curabitur blandit tempus porttitor.</p>
  </section>
  <hr/>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  
    <section class="team-member _1-4">

      <?php
        $post_img =  get_the_post_thumbnail(get_the_ID(), 'responsive', array('class' => 'temp border'));
        if ($post_img):
      ?>
      <?php echo $post_img; ?>
      <?php endif; ?>
      <strong class="big"><?php the_title(); ?></strong>
      <?php agency_team_member_title($post->ID); ?>
      <?php the_excerpt(); ?>

      <ul class="social">
        <?php agency_team_member_social($post->ID); ?>
      </ul>
    </section>

  <?php endwhile; ?>

  <?php agency_navigation(); ?>

  <?php else : ?>
    <?php agency_the_404_content(); ?>
  <?php endif; ?>

</div><!--/.wrap-->

<?php get_footer(); ?>