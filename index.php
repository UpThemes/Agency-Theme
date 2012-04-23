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
      <a href="#"><i class="link"></i>view complete portfolio</a>
    </div><!--/.section-h-->
    <div class="_1 _parent _no-t">
      <div class="portfolio-item _1-4">
        <a href="#">
          <img src="temp.gif">
          GoBible Downloads
        </a>
      </div><!--/.portfolio-item-->
      <div class="portfolio-item _1-4">
        <a href="#">
          <img src="temp.gif">
          GoBible Downloads
        </a>
      </div><!--/.portfolio-item-->
      <div class="portfolio-item _1-4">
        <a href="#">
          <img src="temp.gif">
          GoBible Downloads
        </a>
      </div><!--/.portfolio-item-->
      <div class="portfolio-item _1-4">
        <a href="#">
          <img src="temp.gif">
          GoBible Downloads
        </a>
      </div><!--/.portfolio-item-->
    </div>
  </section><!--/.portfolio-module-->
<hr/>
  <section class="blog-module _1-2">
    <div class="section-h">
      <h2>Recently on the Blog</h2>
      <a href="#"><i class="link"></i>Read the Blog</a>
    </div><!--/.section-h-->
    <article href="#" class="blog-post">
      <img src="temp.gif"/>
      <h4>Check Out Our New Office!</h4>
      <p>We just recently moved into our new office in seattle and we wanted to share some pics of the new space!</p>
      <a href="#">continue reading</a>
    </article><!--/.blog-post-->
    <article href="#" class="blog-post">
      <img src="temp.gif"/>
      <h4>How Awesome are We?</h4>
      <p>Yea, I just wanted to make sure you realize how awesome I am.</p>
      <a href="#">continue reading</a>
    </article><!--/.blog-post-->
  </section><!--/.blog-module-->
  <section class="testimonial-module _1-2">
    <div class="section-h">
      <h2>Testimonials</h2>
    </div><!--/.section-h-->
    <div class="testimonial">
      <p>These guys are the best in the business. I wouldn't trust my website to anyone else. Seriously, they rock and it shows in their work. These guys are the best in the business. I wouldn't trust my website to anyone else. Seriously, they rock and it shows in their work.</p>
      <em>- Rhys Marsh, FOTC</em>
    </div><!--/.testimonial-->
    <div class="testimonial">
      <p>We contacted Agency hoping to get an idea of where to take our business over the next 5-10 years on the web. Little did we know, these guys have planned our next steps for the next 30 years.</p>
      <em>- Rhys Marsh, FOTC</em>
    </div><!--/.testimonial-->
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