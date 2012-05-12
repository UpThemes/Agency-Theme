    <div <?php post_class("_1-3 post"); ?>>

      <a href="<?php the_permalink(); ?>">
        <?php
          $post_img =  get_the_post_thumbnail(get_the_ID(), 'portfolio-grid');
          if ($post_img):
        ?>
        <?php echo $post_img; ?>
        <?php endif; ?>
      </a>
      <strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
      
      <?php the_excerpt(); ?>

    </div>