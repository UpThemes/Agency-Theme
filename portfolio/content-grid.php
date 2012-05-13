    <div <?php post_class("_1-3"); ?>>

      <a href="<?php the_permalink(); ?>">
        <?php
          $post_img =  get_the_post_thumbnail(get_the_ID(), 'portfolio-grid');
          if ($post_img):
        ?>
        <?php echo $post_img; ?>
        <?php endif; ?>
      </a>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      
      <?php the_excerpt(); ?>

    </div>