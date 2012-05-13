<?php $heading = is_singular() ? 'h1' : 'h2'; ?>

    <article class="_1 <?php agency_get_post_class($post->ID, true); ?>">

      <i class="post-icon"></i>

      <<?php echo $heading; ?> class="post-pad-left"><?php if( !is_singular() ) echo '<a href="' . get_permalink() . '">' ?><?php the_title(); ?><?php if( !is_singular() ) echo '</a>' ?></<?php echo $heading; ?>>

      <div class="post-meta post-pad-left">
        <?php echo sprintf( __('Posted at %1$s on %2$s by %3$s','agency'), get_the_time( get_option('time_format') ), get_the_time( get_option('date_format') ), get_the_author_link() ); ?>
      </div>

      <div class="post-pad-left">
        <?php the_content(); ?>
      </div>

      <div class="meta post-pad-left">
        <a href="<?php comments_link(); ?>" title="<?php comments_number(__('0 Comments','agency'), __('1 Comment','agency'), __('% Comments','agency') ); ?>" class="comments"><?php comments_number('0', '1', '%'); ?></a> <?php the_category(', '); ?>
      </div>

    </article>

    <?php if ( comments_open() && ! post_password_required() ) comments_template(); ?>