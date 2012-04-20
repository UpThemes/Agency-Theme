<?php

function agency_get_portfolio_slides($slide_imgs_arry){

  foreach ($slide_imgs_arry as &$slide_img) {
    foreach($slide_img as $key => $value) {
     echo '        <li class="slide">' . "\n";
     echo '          <img class="_1" src="' . $value .'" ' . ">\n";
     echo '        </li>' . "\n";
    }
  }

}

function agency_portfolio_slide_builder($postID){

  $slide_imgs = get_post_meta($postID, 'portslides', true);


  if ( $slide_imgs != null ) {

    echo '<section class="rotator">   '."\n";
    echo '  <div class="wrap">        '."\n";
    echo '    <div class="flexslider">'."\n";
    echo '      <ul class="slides">   '."\n";
    agency_get_portfolio_slides($slide_imgs);
    echo '      </ul>                 '."\n";
    echo '    </div>                  '."\n";
    echo '  </div><!--/.wrap-->       '."\n";
    echo '</section><!--/.rotator-->  '."\n";

  } else {}

}

function agency_portfolio_url($postID){

  $portinfo = get_post_meta($postID,'portinfo',true);

  if($portinfo[0]['website-url'])
    echo '<a href="'. $portinfo[0]['website-url'] .'" class="button light-bg left viewer-visit">Visit Website</a>';

}

function agency_portfolio_services($postID){

  $portinfo = get_post_meta($postID,'portinfo',true);

  if($portinfo[0]['services-provided-paragraph']){
    echo '<h3><strong>Services Provided</strong></h3>';
    echo '<p>'. $portinfo[0]['services-provided-paragraph'] .'</p>';
  }


}


function agency_portfolio_launch_date($postID){

  $portinfo = get_post_meta($postID,'portinfo',true);

  if($portinfo[0]['launch-date'])
    echo '<em>'. $portinfo[0]['launch-date'] .'</em>';

}
