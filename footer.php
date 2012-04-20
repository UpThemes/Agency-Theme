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
        <sub>Copyright 2010 Agency. All Rights Reserved.</sub>
      </section>
      <section class="_1-4">
        <h4>Agency</h4>
        555 Main St., Suite 100<br/>
        San Diego, CA 55555-5454
      </section>
      <section class="_1-4">
        <h4>Get In Touch</h4>
        <em>phone</em> (555) 555-5555<br/>
        <em>email</em> <a href="mailto:info@agency.com">info@agency.com</a><br/>
        <em>twitter</em> <a href="#">@agency</a>
      </section>
    </div><!--/.wrap-->
  </footer>
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

  <?php wp_footer(); ?>
</body>
</html>