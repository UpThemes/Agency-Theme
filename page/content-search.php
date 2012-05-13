    <div <?php post_class(); ?>>

			<?php the_post_thumbnail('responsive'); ?>

      <h2><?php echo '<a href="' . get_permalink() . '">' ?><?php the_title(); ?><?php echo '</a>' ?></h2>

      <div>
        <?php the_content(); ?>
      </div>

    </div>