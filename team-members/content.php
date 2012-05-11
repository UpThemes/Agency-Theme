    <section <?php post_class("team-member _1-4"); ?>>
      <?php
        $post_img =  get_the_post_thumbnail(get_the_ID(), 'responsive', array('class' => 'temp border'));
        if ($post_img):
      ?>
      <?php echo $post_img; ?>
      <?php endif; ?>
      <strong class="big"><?php the_title(); ?></strong>
      <?php agency_team_member_title($post->ID); ?>
      <?php the_excerpt(); ?>

      <ul class="social">
        <?php agency_team_member_social($post->ID); ?>
      </ul>
    </section>