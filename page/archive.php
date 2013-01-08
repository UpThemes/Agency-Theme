<?php $heading = is_singular() ? 'h1' : 'h2'; ?>

    <article <?php post_class("_1"); ?>>

      <?php the_post_thumbnail('responsive'); ?>

      <<?php echo $heading; ?>><?php if( !is_singular() ) echo '<a href="' . get_permalink() . '">' ?><?php the_title(); ?><?php if( !is_singular() ) echo '</a>' ?></<?php echo $heading; ?>>

      <div>
        <?php the_content(); ?>
      </div>

    </article>


    <div class="_3-5">
      <?php agency_archive_recent(); ?>
    </div>

    <div class="_2-5">
      <?php agency_archive_by_month(); ?>
      <?php agency_archive_by_categoty(); ?>
    </div>


    <?php if ( comments_open() && ! post_password_required() ) comments_template(); ?>