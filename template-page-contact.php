<?php
/*
Template Name: Contact Page Template
*/
?>
<?php get_header(); ?>

<section class="breadcrumb">
  <div class="wrap">
    <ul>
      <li><a href="#">Home</a></li>
      <li class="seperator">&#9654;</li>
      <li><a href="#">Page title</a></li>
    </ul>
  </div><!--/.wrap-->
</section><!--/.breadcrumb-->
<div class="wrap content">
  <section class="_1 _no-b">
    <h1>Contact Us</h1>
  </section>
  <hr/>
  <section class="_4-5 _parent">
    <form id="contact">
      <div class="_1-3 col-no-left col-no-top">
        <input type="text" name="name" id="name" placeholder="Name"/>
        <input type="text" name="company" id="company" placeholder="Company"/>
        <input type="text" name="email-address" id="email-address" placeholder="Email Address"/>
        <input type="text" name="phone" id="phone" placeholder="Phone"/>
        <input type="text" name="web-url" id="web-url" placeholder="Web URL"/>
      </div>
      <div class="_2-3 col-no-right col-no-top">
        <textarea id="message"></textarea>
        <input type="submit" id="send" value="Send Message"/>
      </div>
    </form>
  </section>
  <section class="_1-5">
    <h2>Agency</h2>
    <p>
      <?php echo agency_get_theme_option('address_text1'); ?><br />
      <?php echo agency_get_theme_option('address_text2'); ?><br /><br />
      <span title="Call us!"><?php echo agency_get_theme_option('phone_text'); ?></span><br/>
      <a href="mailto:<?php echo agency_get_theme_option('email_text'); ?>"><?php echo agency_get_theme_option('email_text'); ?></a>
    </p>

    <h2>Social Networking</h2>
    <ul class="social">
      <?php agency_social_links(); ?>
    </ul>
  </section>
</div><!--/.wrap-->

<?php get_footer(); ?>