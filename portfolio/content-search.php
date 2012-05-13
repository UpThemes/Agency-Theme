    <div <?php post_class(); ?>>

      <a href="<?php the_permalink(); ?>">
        <?php
          $post_img =  get_the_post_thumbnail(get_the_ID(), 'responsive');
          if ($post_img):
        ?>
        <?php echo $post_img; ?>
        <?php endif; ?>
      </a>
      <strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
      
      <?php the_excerpt(); ?>

    </div>