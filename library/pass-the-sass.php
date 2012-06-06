<?php


/**
 * This is the Integration file for Pass the Sass
 *
 *
 * It will ultimately, replace the style.css file's content
 * with the returned post curl api call, which is a recompiled
 * version with the updated variables set in theme options.
 *
 * ^1.  Check for any updated theme options.
 * ^2.  Build curl request, get result.
 * ^3.  Save result into style.css
 *
 */



/* ^1. */


/* ^2. */


  $url = 'http://localhost:9393/api';


  $sass_dir = get_template_directory() . "/sass";


  $post = array(
    "domain"  => THEME_NAME . "-" . THEME_VERSION,
    "sass"    => "@$sass_dir/style.scss",

    "deps[0]"  => "@$sass_dir/_flexslider.scss",
    "deps[1]"  => "@$sass_dir/_grind.scss",
    "deps[2]"  => "@$sass_dir/_icons.scss",
    "deps[3]"  => "@$sass_dir/_normalize.scss",
    "deps[4]"  => "@$sass_dir/_notifications.scss",
    "deps[5]"  => "@$sass_dir/_wordpress.scss",

    "vars[0]"   => "\$body-color: #333",
    "vars[1]"   => "\$accent-color: #F00"
  );

  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

  $response = curl_exec($ch);
  curl_close($ch);

/* ^3. */

  // Let's check out what's currently in our css file.
  $css = get_template_directory() . "/test.css";

  // Result & current css are different
  if ( is_wp_error( $response ) ) {
    file_put_contents( $css, "Error" );
  } else {
    file_put_contents( $css, $response );
  }

