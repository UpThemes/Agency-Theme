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
      'description' => __('Settings related to the contact info.', 'agency')
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

  'highlight_color' => array(
    'tab' => "general",
    "name" => "highlight_color",
    "title" => "Link & Highlight Color",
    'description' => __( 'Enter the highlight color you\'d like to use for links & other theme highlights.', 'agency' ),
    'section' => 'general',
    'since' => '1.0',
    "id" => "general",
    "type" => "color",
    "default" => "#7CBBBF"
  ),
  'link_color_hover' => array(
    'tab' => "general",
    "name" => "link_color_hover",
    "title" => "Link Hover Color",
    'description' => __( 'Enter the color you\'d like to have for link hover effects.', 'agency' ),
    'section' => 'general',
    'since' => '1.0',
    "id" => "general",
    "type" => "color",
    "default" => "#468B8F"
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
    'description' => __( 'Enter your twitter username', 'agency' ),
    'section' => 'social',
    'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => ""
  ),
  'vimeo_user' => array(
    'tab' => "social-media",
    "name" => "vimeo_user",
    "title" => "Vimeo URL Number (i.e.&nbsp;'user12345')",
    'description' => __( 'Enter the vimeo user number (e.g. \'user12345\')', 'agency' ),
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
    'description' => __( 'Enter your linkedin public profile link', 'agency' ),
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
    'description' => __( 'Enter your dribbble username', 'agency' ),
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
    'description' => __( 'Enter your facebook username', 'agency' ),
    'section' => 'social',
    'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => ""
  ),
  'flickr_user' => array(
    'tab' => "social-media",
    "name" => "flickr_user",
    "title" => "Flickr Username",
    'description' => __( 'Enter your flickr username', 'agency' ),
    'section' => 'social',
    'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => ""
  ),
  'forrst_user' => array(
    'tab' => "social-media",
    "name" => "forrst_user",
    "title" => "Forrst Username",
    'description' => __( 'Enter your forrst username', 'agency' ),
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