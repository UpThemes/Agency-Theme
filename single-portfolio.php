<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>


<?php agency_portfolio_slide_builder($post->ID); ?>



<div class="wrap content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <?php get_template_part( 'portfolio/content', get_post_format() ); ?>

<?php endwhile; ?>

<?php else : ?>

<?php 
/**
 * Output no-post content
 */
agency_no_post_content(); 
?>

<?php endif; ?>


</div><!--/.wrap-->

<?php get_footer(); ?>