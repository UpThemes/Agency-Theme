    <section <?php post_class("team-member _1-4"); ?>>
      <?php if ( has_post_thumbnail() ): ?>
      <a class="team-photo" href="<?php the_permalink(); ?>"><?php the_post_thumbnail($post->ID, 'portfolio-grid'); ?></a>
      <?php else: ?>
      <a class="team-photo" href="<?php the_permalink(); ?>"><?php agency_placeholder('team'); ?></a>
      <?php endif; ?>
      <h2><a href="<?php the_permalink(); ?>"><?php agency_team_member_name(); ?></a></h2>
      <?php agency_team_member_title(); ?>
      <?php the_excerpt(); ?>

      <ul class="social">
        <?php agency_team_member_social(); ?>
      </ul>
    </section>