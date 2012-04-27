<?php
/*
Template Name: Contact Page Template
*/
?>
<?php get_header(); ?>

<?php agency_breadcrumbs(); ?>

<div class="wrap content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <section class="_1 _no-b">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
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
    <h2><?php bloginfo('name'); ?></h2>
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


<?php endwhile; ?>

<?php else : ?>

<?php 
/**
 * Output no-post content
 */
agency_the_404_content(); 
?>

<?php endif; ?>

</div><!--/.wrap-->

<?php get_footer(); ?>