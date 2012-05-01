<?php


// Simple form handler & mailer for the contact page template
if(isset($_POST['submitted'])) {

  $error_log = array();

  if(trim($_POST['contact-name']) === '') {

    $error_log["nameError"] = 'Please enter your name.';
    $hasError = true;

  } else {

    $name = trim($_POST['contact-name']);

  }

  if(trim($_POST['contact-email-address']) === '')  {

    $error_log["emailError"] = 'Please enter your email address.';
    $hasError = true;

  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['contact-email-address']))) {

    $error_log["emailError"] = 'You entered an invalid email address.';
    $hasError = true;

  } else {

    $email = trim($_POST['contact-email-address']);

  }

  if(trim($_POST['contact-message']) === '') {

    $error_log["messageError"] = 'Please enter a message.';
    $hasError = true;

  } else {

    if(function_exists('stripslashes')) {
      $message = stripslashes(trim($_POST['contact-message']));
    } else {
      $message = trim($_POST['contact-message']);
    }

  }


  if(!isset($hasError)) {
    $emailTo = agency_get_theme_option('agency_email');
    $domain = parse_url(site_url());
    $domain = $domain[host];
    if (!isset($emailTo) || ($emailTo == '') ) { $emailTo = get_option('admin_email'); }
    $subject = '[Contact Form Entry] From '. $name;
    $body = "Name: $name \n\nEmail: $email \n\nComments: $message";
      $headers = 'From: ' . get_option('blogname').' <mail@'.$domain.'>' . "\r\n" . 'Reply-To: ' . $email;

    wp_mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
  } else {}



} else {}