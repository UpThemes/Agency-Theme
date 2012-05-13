    <section class="_1 <?php agency_get_post_class($post->ID, true); ?>">
      
      <?php
      $post_img =  get_the_post_thumbnail($post->ID, 'responsive',array('class' => 'left'));
      echo $post_img; ?>

      <h1><?php the_title(); ?></h1>
      
      <?php agency_team_member_title($post->ID); ?>

      <div>
        <?php the_content(); ?>
      </div>
      
      <ul class="social">
        <?php agency_team_member_social($post->ID); ?>
      </ul>

    </section>