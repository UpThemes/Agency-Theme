<?php

get_header();

$up_options = upfw_get_options();

?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">
  <section class="_1 _no-b">
    <h1>Our Team</h1>
    <?php get_sidebar('team-top'); ?>
  </section>


  <div class="_parent _uniform-children">
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
  </div>

  <?php agency_navigation(); ?>

  <?php else : ?>
    <?php agency_no_post_content(); ?>
  <?php endif; ?>

</div><!--/.wrap-->

<?php get_footer(); ?>