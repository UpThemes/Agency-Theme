    <div <?php post_class(); ?>>

      <a href="<?php the_permalink(); ?>">
         <?php if ( has_post_thumbnail() ): ?>
           <?php the_post_thumbnail($post->ID, 'responsive'); ?>
         <?php else: ?>
          <?php agency_placeholder('portfolio'); ?>
        <?php endif; ?>
      </a>
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      
      <?php the_excerpt(); ?>

    </div>