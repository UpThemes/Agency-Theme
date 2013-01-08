    <div <?php post_class("_1-3"); ?>>

      <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ): ?>
          <?php the_post_thumbnail($post->ID, 'portfolio-grid'); ?>
        <?php else: ?>
          <?php agency_placeholder('portfolio'); ?>
        <?php endif; ?>
      </a>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      
      <?php the_excerpt(); ?>

    </div>