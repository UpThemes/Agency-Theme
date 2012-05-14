<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">

  <section class="_4-5">

    <?php if ( is_category() ) { ?>
    <h1>
      <span class="fl cat"><?php _e( 'Category Archive:', 'agency' ); ?> <?php echo single_cat_title(); ?></span>
    </h1>        
  
      <?php } elseif ( is_day() ) { ?>
      <h1><?php _e( 'Archive', 'agency' ); ?> | <?php the_time( get_option( 'date_format' ) ); ?></h1>

      <?php } elseif ( is_month() ) { ?>
      <h1><?php _e( 'Archive', 'agency' ); ?> | <?php the_time( 'F, Y' ); ?></h1>

      <?php } elseif ( is_year() ) { ?>
      <h1><?php _e( 'Archive', 'agency' ); ?> | <?php the_time( 'Y' ); ?></h1>

      <?php } elseif ( is_author() ) { ?>
      <h1><?php _e( 'Archive by Author', 'agency' ); ?></h1>

      <?php } elseif ( is_tag() ) { ?>
      <h1><?php _e( 'Tag Archives:', 'agency' ); ?> <?php echo single_tag_title( '', true); ?></h1>
      
    <?php } ?>

    <?php if (have_posts()) : ?>
    <div class="clearfix">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part( 'content', 'default' ); ?>
    <?php endwhile; ?>
    </div>
      <?php agency_navigation(); ?>
    <?php else : ?>
      <?php agency_no_post_content(); ?>
    <?php endif; ?>
  </section>

  <section class="_1-5">
    <?php get_sidebar(); ?>
  </section>

</div><!--/.wrap-->

<?php get_footer(); ?>