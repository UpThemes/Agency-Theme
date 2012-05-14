    <section <?php post_class("_1"); ?>>
      <?php if ( has_post_thumbnail() ): ?>
        <?php the_post_thumbnail($post->ID, 'responsive'); ?>
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