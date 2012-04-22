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
		agency_the_404_content(); 
		?>
	
		<?php endif; ?>

    
  </section>

  <section class="_1-5">
    <h2>Agency</h2>
    <p>
      555 Main St., Suite 100<br/>
      San Diego, CA 55555-5454<br/>
      <br/>
      <i class="phone"></i>(555) 555-5555<br/>
      <i class="phone"></i><a href="mailto:info@agency.com">info@agency.com</a>
    </p>

    <h2>Social Networking</h2>
    <ul class="social">
      <li><a href="#"><i class="social-vimeo"></i>Vimeo</a></li>
      <li><a href="#"><i class="social-twitter"></i>Twitter</a></li>
      <li><a href="#"><i class="social-linkedin"></i>LinkedIn</a></li>
      <li><a href="#"><i class="social-forrst"></i>Forrst</a></li>
      <li><a href="#"><i class="social-flickr"></i>Flickr</a></li>
      <li><a href="#"><i class="social-facebook"></i>Facebook</a></li>
      <li><a href="#"><i class="social-dribbble"></i>Dribbble</a></li>
    </ul>
  </section>
</div><!--/.wrap-->

<?php get_footer();?>