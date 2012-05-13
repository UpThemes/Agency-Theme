    <div <?php post_class(); ?>>

      <i class="post-icon"></i>
      <div class="meta post-pad-left">
        <a href="<?php comments_link(); ?>" title="<?php comments_number(__('0 Comments','agency'), __('1 Comment','agency'), __('% Comments','agency') ); ?>" class="comments"><?php comments_number('0', '1', '%'); ?></a> <?php the_category(', '); ?>
      </div>

      <h2 class="post-pad-left"><?php echo '<a href="' . get_permalink() . '">' ?><?php the_title(); ?><?php echo '</a>' ?></h2>

      <div class="post-meta post-pad-left">
        <?php echo sprintf( __('Posted at %1$s on %2$s by %3$s','agency'), get_the_time( get_option('time_format') ), get_the_time( get_option('date_format') ), get_the_author_link() ); ?>
      </div>

      <div class="post-pad-left">
        <?php the_content(); ?>
      </div>

    </div>

    <?php if ( comments_open() && ! post_password_required() ) comments_template(); ?>