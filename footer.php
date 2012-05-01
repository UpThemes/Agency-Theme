</div>
</div>
  <footer>
    <div class="wrap">
      <section class="_1-2">
        <?php

        if ( function_exists( 'wp_nav_menu' ) ) {
        
                $args = array(
                  'container'     => false,
                  'menu_id'       => 'navigation',
                  'theme_location'=> 'footer_menu',
                  'fallback_cb'   => 'agency_nav_callout',
                  'link_before'   => '<span>',
                  'link_after'    => '</span>',
                  'depth'         => 1
                );

          echo wp_nav_menu( $args );

        } else {
          agency_nav_callout();
        }

        ?>
        <sub><?php echo agency_get_theme_option('copyright_text'); ?></sub>
      </section>
      <section class="_1-4">
        <h4><?php bloginfo('name'); ?></h4>
        <?php echo agency_get_theme_option('address_text1'); ?><br/>
        <?php echo agency_get_theme_option('address_text2'); ?>
      </section>
      <section class="_1-4">
        <h4>Get In Touch</h4>
        <em>phone</em> <?php echo agency_get_theme_option('phone_text'); ?><br/>
        <em>email</em> <a href="mailto:<?php echo agency_get_theme_option('email_text'); ?>">
                        <?php echo agency_get_theme_option('email_text'); ?>
                       </a><br/>
        <?php agency_get_social_footer(); ?>
      </section>
    </div><!--/.wrap-->
  </footer>

  <?php wp_footer(); ?>
</body>
</html>