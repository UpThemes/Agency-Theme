    <section <?php post_class("_1"); ?>>
      <?php
        $post_img =  get_the_post_thumbnail($post->ID, 'responsive',array('class' => 'left'));
        if ($post_img):
      ?>
        <?php echo $post_img; ?>
      <?php else: ?>
        <?php agency_placeholder('team'); ?>
      <?php endif; ?>
      <h1><?php the_title(); ?></h1>
      <?php agency_team_member_title($post->ID); ?>
      <div>
        <?php the_content(); ?>
      </div>
      <ul class="social">
        <?php agency_team_member_social($post->ID); ?>
      </ul>

    </section>