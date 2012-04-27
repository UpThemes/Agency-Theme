<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>


<div class="wrap content">


  <section class="_4-5 _parent">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article class="_1 <?php agency_get_post_class($post->ID); ?>">
      <i class="post-icon"></i>
      <div class="meta post-pad-left">
        <a href="<?php comments_link(); ?>" title="<?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>" class="comments"><?php comments_number('0', '1', '%'); ?></a> <?php the_category(', '); ?>
      </div>


      <h1 class="post-pad-left"><?php the_title(); ?></h1>
      <h4 class="post-pad-left">Posted at <?php the_time(); ?> on <?php the_date(); ?> by <?php the_author_posts_link(); ?></h4>

      <div class="post-pad-left">
        <?php the_content(); ?>
      </div>
    </article>
    <hr/>



<?php 
		if ( comments_open() && ! post_password_required() ) {
			/**
			 * Include the comments template
			 * 
			 * Includes the comments.php template part file
			 */
			comments_template(); 
		}
		?>

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
    <?php get_sidebar('default-top'); ?>
    <?php get_sidebar('default-bottom'); ?>
  </section>
</div><!--/.wrap-->

<?php get_footer(); ?>