<?php get_header(); ?>

<section class="rotator">
  <div class="wrap">
    <div class="flexslider">
      <ul class="slides">
        <li class="slide">
          <img src="temp.gif" class="_1-2"/>
          <div class="slide-content _1-2">
            <h1>We are Agency.</h1>
            <h3>We're a design company that builds websites of pure awesomeness.</h3>
            <a href="#" class="button">Our Portfolio</a>
            <a href="#" class="button">Services</a>
          </div><!--/.slide-content-->
        </li>
        <li class="slide">
          <img src="temp.gif" class="_1-2"/>
          <div class="slide-content _1-2">
            <h1>We are Agency.</h1>
            <h3>We're a design company that builds websites of pure awesomeness.</h3>
            <a href="#" class="button">Our Portfolio</a>
            <a href="#" class="button">Services</a>
          </div><!--/.slide-content-->
        </li>
      </ul>
    </div>
  </div><!--/.wrap-->
</section><!--/.rotator-->
<div class="wrap content">
  <section class="portfolio-module">
    <div class="section-h _1 _no-b">
      <h2>Selections from the Portfolio</h2>
      <a href="<?php echo home_url('/portfolio/'); ?>"><i class="link"></i>view complete portfolio</a>
    </div><!--/.section-h-->
    <div class="_1 _parent _no-t">

      <?php agency_portfolio_home_list(); ?>

    </div>
  </section><!--/.portfolio-module-->
<hr/>
  <section class="blog-module _1-2">
    <div class="section-h">
      <h2>Recently on the Blog</h2>
      <a href="<?php agency_posts_url(); ?>"><i class="link"></i>Read the Blog</a>
    </div><!--/.section-h-->

    <?php agency_blog_home_list(); ?>

  </section><!--/.blog-module-->
  <section class="testimonial-module _1-2">
    <div class="section-h">
      <h2>Testimonials</h2>
    </div><!--/.section-h-->

    <?php agency_testimonial_home_list(); ?>

  </section><!--/.testimonial-module-->
<hr/>
  <section class="team-module">

    <?php agency_team_members_home_list(); ?>

  </section><!--/.team-module-->

  <hr/>

  <section class="about-module _1-2">
    <?php get_sidebar('home-1'); ?>
  </section><!--/.about-module-->
  <section class="office-module _1-2">
    <?php get_sidebar('home-2'); ?>
  </section><!--/.office-module-->
</div><!--/.wrap-->

<?php get_footer(); ?>