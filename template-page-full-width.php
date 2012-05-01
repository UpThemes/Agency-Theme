<?php
/*
Template Name: Full Width Page Template
*/
?>
<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">

  <section class="_1 _no-b">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>


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
agency_no_post_content(); 
?>

<?php endif; ?>

  </section>

</div><!--/.wrap-->

<?php get_footer(); ?>