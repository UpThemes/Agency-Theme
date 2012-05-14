    <section <?php post_class("team-member _1-4"); ?>>
      <?php
        $post_img =  get_the_post_thumbnail($post->ID, 'responsive',array('class' => 'left'));
        if ($post_img):
      ?>
      <div class="ratio-wrap ratio-3-2">
        <a href="<?php the_permalink(); ?>"><?php echo $post_img; ?></a>
      </div>
      <?php else: ?>
      <div class="ratio-wrap ratio-3-2">
        <a href="<?php the_permalink(); ?>"><?php agency_placeholder('team'); ?></a>
      </div>
      <?php endif; ?>
      <h2><a href="<?php the_permalink(); ?>"><?php agency_team_member_name(); ?></a></h2>
      <?php agency_team_member_title(); ?>
      <?php the_excerpt(); ?>

      <ul class="social">
        <?php agency_team_member_social(); ?>
      </ul>
    </section>