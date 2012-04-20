<?php

$general_tab = array(
	"name" => "general",
	"title" => __("General","agency"),
	'sections' => array(
		'general' => array(
			'name' => 'general',
			'title' => __( 'General', 'agency' ),
			'description' => __( 'Settings that affect the entire theme.','agency' )
		)
	)
);

$options = array(

	'display_logo' => array(
		'tab' => "general",
		"name" => "display_logo",
		"title" => "Display Logo",
		'description' => __( 'Do you want to show your company logo in the header?', 'agency' ),
		'section' => 'general',
		'since' => '1.0',
    "id" => "general",
    "type" => "select",
    "default" => "yes",
    "valid_options" => array(
    	'no' => array(
    		"name" => "no",
    		"title" => __( 'No', 'agency' )
    	),
    	'yes' => array(
    		"name" => "yes",
    		"title" => __( 'Yes', 'agency' )
    	)
    )
	),
	'logo' => array(
		'tab' => "general",
		"name" => "logo",
		"title" => "Logo",
		'description' => __( 'Upload your logo or select from the gallery. (24px x 24px)', 'agency' ),
		'section' => 'general',
		'since' => '1.0',
    "id" => "general",
    "type" => "image",
    "default" => get_template_directory_uri()."/images/essentials/header/title/logo.png"
	),
	'phone_text' => array(
		'tab' => "general",
		"name" => "phone_text",
		"title" => "Footer Phone",
		'description' => __( 'Enter the number you\'d like to have in the footer.', 'agency' ),
		'section' => 'general',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => "555-555-5555"
	),
	'email_text' => array(
		'tab' => "general",
		"name" => "email_text",
		"title" => "Footer Email",
		'description' => __( 'Enter the email you\'d like to have in the footer.', 'agency' ),
		'section' => 'general',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => "info@agency.com"
	),
	'twitter_text' => array(
		'tab' => "general",
		"name" => "twitter_text",
		"title" => "Twitter Text",
		'description' => __( 'Enter the twitter username you\'d like to have in the footer. (Optional)', 'agency' ),
		'section' => 'general',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => "agency"
	),
	'copyright_text' => array(
		'tab' => "general",
		"name" => "copyright_text",
		"title" => "Copyright Text",
		'description' => __( 'Enter the text you\'d like to have in the footer, below the footer nav.', 'agency' ),
		'section' => 'general',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => "Copyright " . date('Y') . " UpThemes.com. All Rights Reserved."
	)

);

register_theme_option_tab($general_tab);
register_theme_options($options);