<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">

  <section class="_4-5">

    <h1 class="archive-title">
    <?php if ( is_category() ) { ?>
      <span class="fl cat"><?php _e( 'Category Archive:', 'agency' ); ?> <?php echo single_cat_title(); ?></span>
        <?php } elseif ( is_day() ) { ?>
      <?php _e( 'Archive', 'agency' ); ?> | <?php the_time( get_option( 'date_format' ) ); ?>
      <?php } elseif ( is_month() ) { ?>
      <?php _e( 'Archive', 'agency' ); ?> | <?php the_time( 'F, Y' ); ?>
      <?php } elseif ( is_year() ) { ?>
      <?php _e( 'Archive', 'agency' ); ?> | <?php the_time( 'Y' ); ?>
      <?php } elseif ( is_author() ) { ?>
      <?php _e( 'Archive by Author', 'agency' ); ?>
      <?php } elseif ( is_tag() ) { ?>
      <?php _e( 'Tag Archives:', 'agency' ); ?> <?php echo single_tag_title( '', true); ?>
    <?php } ?>
    </h1>
  
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