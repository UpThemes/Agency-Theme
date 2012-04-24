<?php get_header(); ?>

<section class="breadcrumb">
  <div class="wrap">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Page title</a></li>
    </ul>
  </div><!--/.wrap-->
</section><!--/.breadcrumb-->

<div class="wrap content">


  <section class="_4-5">

  <?php

  $counter = 0;

  if (have_posts()) : while (have_posts()) : the_post();

    if($counter != 0){
      echo '     <hr/><br/><br/>'."\n";
    }

    $counter++;

   ?>

    <div>
      <article class="<?php agency_get_post_class($post->ID); ?>">
        <i class="post-icon"></i>
        <div class="meta post-pad-left">
          <a href="<?php comments_link(); ?>" title="<?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>" class="comments"><?php comments_number('0', '1', '%'); ?></a> <?php the_category(', '); ?>
        </div>

        <h1 class="post-pad-left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <h4 class="post-pad-left">Posted at <?php the_time(); ?> on <?php the_date(); ?> by <?php the_author_posts_link(); ?></h4>

        <div class="post-pad-left">
          <?php the_content(); ?>
        </div>

      </article>
    </div>

<?php endwhile; ?>

<?php else : ?>

<?php 
/**
 * Output no-post content
 */
agency_the_404_content(); 
?>

<?php endif; ?>

  </section>


  <section class="_1-5">
    <?php get_sidebar(); ?>
  </section>


</div><!--/.wrap-->

<?php get_footer(); ?>