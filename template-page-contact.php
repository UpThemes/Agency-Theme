<?php
/*
Template Name: Contact Page Template
*/
?>
<?php require_once("library/contact_form_handler.php"); ?>
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

    <?php 
    if( isset($emailSent) ) agency_contact_form(false, false, $emailSent);
    elseif( isset($hasError) && $hasError == 1 ) agency_contact_form($error_log, $hasError);
    else agency_contact_form(false,false,false);
    ?>

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