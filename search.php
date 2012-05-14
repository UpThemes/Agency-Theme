<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">

  <section class="_4-5">

    <h1><?php printf( __( 'Search Results for: `%s`', 'agency' ), get_search_query() ); ?></h1>

    <?php if (have_posts()) : ?>
    <div class="clearfix">
    <?php while (have_posts()) : the_post(); ?>
    <?php 
    switch( get_post_type() ):
      default:
        get_template_part( 'content', 'search' );
        break;
      case 'team':
        get_template_part( 'team-members/content', 'search' );
        break;
      case 'portfolio':
        get_template_part( 'portfolio/content', 'search' );
        break;
      case 'page':
        get_template_part( 'page/content', 'search' );
        break;
    endswitch;
    ?>
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