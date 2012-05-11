<?php $heading = is_singular() ? 'h1' : 'h2'; ?>

    <article class="_1 <?php agency_get_post_class($post->ID, true); ?>">

			<?php the_post_thumbnail('responsive'); ?>

      <<?php echo $heading; ?>><?php if( !is_singular() ) echo '<a href="' . get_permalink() . '">' ?><?php the_title(); ?><?php if( !is_singular() ) echo '</a>' ?></<?php echo $heading; ?>>

      <div>
        <?php the_content(); ?>
      </div>

    </article>

		<?php if ( comments_open() && ! post_password_required() ) comments_template(); ?>