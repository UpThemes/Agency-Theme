    <section <?php post_class("team-member _1-4"); ?>>
      <?php
        $post_img =  get_the_post_thumbnail($post->ID, 'responsive', true);
        if ($post_img):
      ?>
      <?php echo $post_img; ?>
      <?php endif; ?>
      <h2><?php agency_team_member_name(); ?></h2>
      <?php agency_team_member_title(); ?>
      <?php the_excerpt(); ?>

      <ul class="social">
        <?php agency_team_member_social(); ?>
      </ul>
    </section>