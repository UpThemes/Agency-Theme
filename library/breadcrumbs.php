<?php

function make_breadcrumbs($opts = array(
                                    'show_on_home'  => 0,
                                    'delimiter'     => '&raquo;',
                                    'home'          => 'Home',
                                    'showCurrent'   => 1,
                                    'before'        => '<span class="current">',
                                    'after'         => '</span>'
                                  )) {


  

  $showOnHome   = $opts['show_on_home']; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter    = $opts['delimiter']; // delimiter between crumbs
  $home         = $opts['home']; // text for the 'Home' link
  $showCurrent  = $opts['showCurrent']; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before       = $opts['before']; // tag before the current crumb
  $after        = $opts['after']; // tag after the current crumb

  global $post;
  $homeLink = get_bloginfo('url');

  if (is_home() || is_front_page()) {

    if ($showOnHome == 1) echo '<ul><li><a href="' . $homeLink . '">' . $home . '</a></li></ul>';

  } else {

    echo "<ul>\n  <li><a href=\"$homeLink\">$home</a></li>\n  $delimiter". "\n";

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo "  <li>" . get_category_parents($parentCat, TRUE, "</li>\n  $delimiter\n  <li>") ;
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after . "</li>" . "\n";

    } elseif ( is_search() ) {
      echo '  <li>' . $before . 'Search results for "' . get_search_query() . '"' . $after ."</li>" . "\n";

    } elseif ( is_day() ) {
      echo '  <li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . "</a></li>\n" . $delimiter . "\n";
      echo '  <li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . "</a></li>" . "\n" . $delimiter . "\n";
      echo '  <li>' . $before . get_the_time('d') . $after . "</li>\n";

    } elseif ( is_month() ) {
      echo '  <li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . "</a></li>\n" . $delimiter . "\n";
      echo '  <li>' . $before . get_the_time('F') . $after . "</li>\n";

    } elseif ( is_year() ) {
      echo '  <li>' . $before . get_the_time('Y') . $after . "</li>\n";

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '  <li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>' . "\n";
        if ($showCurrent == 1) echo $delimiter . "\n  <li>" . $before . get_the_title() . $after . '</li>' . "\n";
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, "</li>\n  " . $delimiter . "\n  <li>");
        if ($showCurrent == 0) $cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
        echo "<li>" . $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after . '</li>' . "\n";
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo '  <li>' . $before . $post_type->labels->singular_name . $after . '</li>' . "\n";

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      $cats = get_category_parents($cat, TRUE, "</li>\n  " . $delimiter . "\n  <li>");
      if ($showCurrent == 0) $cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
      echo "  <li>" . $cats;
      echo '  <li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>' . "\n";
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . '  <li>'. $before . get_the_title() . $after . '</li>' . "\n";

    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo '  <li>' . $before . get_the_title() . $after . '</li>' . "\n";

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '  <li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>' . "\n";
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb;
      if ($showCurrent == 1) echo $delimiter . "\n  <li>" . $before . get_the_title() . $after . '</li>' . "\n";

    } elseif ( is_tag() ) {
      echo '  <li>' . $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after . '</li>' . "\n";

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo '  <li>' . $before . 'Articles posted by ' . $userdata->display_name . $after . '</li>' . "\n";
 
    } elseif ( is_404() ) {
      echo '  <li>' . $before . 'Error 404' . $after .'</li>' . "\n";
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo "</ul>\n";

  }
}
