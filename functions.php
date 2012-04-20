<?php

/*
 * Assign theme folder name that you want to get information.
 * make sure theme exist in wp-content/themes/ folder.
 */

$theme_name = 'agency'; 

/*
* Do not use get_stylesheet_uri() as $theme_filename,
* it will result in PHP fopen error if allow_url_fopen is set to Off in php.ini,
* which is what most shared hosting does. You can use get_stylesheet_directory()
* or get_template_directory() though, because they return local paths.
*/

$theme_data = get_theme_data( get_theme_root() . '/' . $theme_name . '/style.css' );

define('THEME_VERSION',$theme_data['Version']);

// Load UpThemes Framework
require_once( get_template_directory().'/admin/admin.php' );

// Load WP ThemeLib.
require_once( get_template_directory().'/lib/load.php');

// Load Theme Specific Goodies
require_once( get_template_directory().'/library/load.php');

