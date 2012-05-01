<?php get_header(); ?>


<?php agency_breadcrumbs(); ?>



<div class="wrap content">
  <section class="_4-5">

  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  	<div id="post-<?php the_ID(); ?>" <?php post_class('postwrapper'); ?>>

      <h1><?php the_title(); ?></h1>
  
      <?php the_content(); ?>

			<?php wp_link_pages(); ?>

		</div><!-- /.postwrapper -->

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

  <section class="_1-5">
    <?php get_sidebar('default-top'); ?>
    <?php get_sidebar('default-bottom'); ?>
  </section>

</div><!--/.wrap-->

<?php get_footer();?>