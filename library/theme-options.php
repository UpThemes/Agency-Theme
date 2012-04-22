<?php

$general_tab = array(
	"name" => "general",
	"title" => __("General","agency"),
	'sections' => array(
		'general' => array(
			'name' => 'general',
			'title' => __( 'General', 'agency' ),
			'description' => __( 'Settings related to the entire theme.','agency' )
		),
		'contact' => array(
		  'name' => 'contact',
		  'title' => __('Contact', 'agency'),
		  'description' => __('Settings related to contact.', 'agency')
		)
	)
);

$social_media_tab = array(
	"name" => "social-media",
	"title" => __("Social Media","agency"),
	'sections' => array(
		'social' => array(
			'name' => 'social',
			'title' => __( 'Social Media', 'agency' ),
			'description' => __( 'Your social media settings','agency' )
		),
		'social-footer' => array(
		  'name' => 'social-footer',
		  'title' => __('Social Footer', 'agency'),
		  'description' => __('Which social media link in footer', 'agency')
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
	),
	'address_text1' => array(
		'tab' => "general",
		"name" => "address_text1",
		"title" => "Address - Street",
		'description' => __( 'Enter your Street Address', 'agency' ),
		'section' => 'contact',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => "555 Main St., Suite 100"
	),
	'address_text2' => array(
		'tab' => "general",
		"name" => "address_text2",
		"title" => "Address - City, State, Zip",
		'description' => __( 'Enter your City, State, Zip', 'agency' ),
		'section' => 'contact',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => "San Diego, CA 55555-5454"
	),
	'phone_text' => array(
		'tab' => "general",
		"name" => "phone_text",
		"title" => "Footer Phone",
		'description' => __( 'Enter the number you\'d like to have in the footer.', 'agency' ),
		'section' => 'contact',
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
		'section' => 'contact',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => "info@agency.com"
	),
	'twitter_user' => array(
		'tab' => "social-media",
		"name" => "twitter_user",
		"title" => "Twitter Username",
		'description' => __( 'Enter the twitter username you\'d like to have in the footer. (Optional)', 'agency' ),
		'section' => 'social',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => ""
	),
	'vimeo_user' => array(
		'tab' => "social-media",
		"name" => "vimeo_user",
		"title" => "Vimeo Username",
		'description' => __( 'Enter the vimeo username you\'d like to have in the footer. (Optional)', 'agency' ),
		'section' => 'social',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => ""
	),
	'linkedin_user' => array(
		'tab' => "social-media",
		"name" => "linkedin_user",
		"title" => "LinkedIn Username",
		'description' => __( 'Enter the linkedin username you\'d like to have in the footer. (Optional)', 'agency' ),
		'section' => 'social',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => ""
	),
	'dribbble_user' => array(
		'tab' => "social-media",
		"name" => "dribbble_user",
		"title" => "Dribbble Username",
		'description' => __( 'Enter the dribbble username you\'d like to have in the footer. (Optional)', 'agency' ),
		'section' => 'social',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => ""
	),
	'facebook_user' => array(
		'tab' => "social-media",
		"name" => "facebook_user",
		"title" => "Facebook Username",
		'description' => __( 'Enter the facebook username you\'d like to have in the footer. (Optional)', 'agency' ),
		'section' => 'social',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => ""
	),
	'flickr_user' => array(
		'tab' => "social-media",
		"name" => "dribbbleflickr_user",
		"title" => "Flickr Username",
		'description' => __( 'Enter the flickr username you\'d like to have in the footer. (Optional)', 'agency' ),
		'section' => 'social',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => ""
	),
	'forrst_user' => array(
		'tab' => "social-media",
		"name" => "forst_user",
		"title" => "Forst Username",
		'description' => __( 'Enter the forst username you\'d like to have in the footer. (Optional)', 'agency' ),
		'section' => 'social',
		'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => ""
	),
	'social_footer_select' => array(
		'tab' => "social-media",
		"name" => "social_footer_select",
		"title" => "Social Media Footer Select",
		'description' => __( 'Which social media link do you want in your footer?', 'agency' ),
		'section' => 'social-footer',
		'since' => '1.0',
    "id" => "social-footer",
    "type" => "select",
    "default" => "twitter",
    "valid_options" => array(
    	'Twitter' => array(
    		"name" => "twitter",
    		"title" => __( 'Twitter', 'agency' )
    	),
    	'LinkedIn' => array(
    		"name" => "linkedin",
    		"title" => __( 'LinkedIn', 'agency' )
    	),
    	'Facebook' => array(
    		"name" => "facebook",
    		"title" => __( 'Facebook', 'agency' )
    	),
    	'Dribbble' => array(
    		"name" => "dribbble",
    		"title" => __( 'Dribbble', 'agency' )
    	),
    	'Vimeo' => array(
    		"name" => "vimeo",
    		"title" => __( 'Vimeo', 'agency' )
    	),
    	'Flickr' => array(
    		"name" => "flickr",
    		"title" => __( 'Flickr', 'agency' )
    	),
    	'Forrst' => array(
    		"name" => "forrst",
    		"title" => __( 'Forst', 'agency' )
    	)
    )
	),

);

register_theme_option_tab($general_tab);
register_theme_option_tab($social_media_tab);
register_theme_options($options);