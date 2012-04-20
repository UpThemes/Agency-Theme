<?php
?>  <?php // 
?>  <?php // /*
?>  <?php //  * Assign theme folder name that you want to get information.
?>  <?php //  * make sure theme exist in wp-content/themes/ folder.
?>  <?php //  */
?>  <?php // 
?>  <?php // $theme_name = 'agency'; 
?>  <?php // 
?>  <?php // /*
?>  <?php // * Do not use get_stylesheet_uri() as $theme_filename,
?>  <?php // * it will result in PHP fopen error if allow_url_fopen is set to Off in php.ini,
?>  <?php // * which is what most shared hosting does. You can use get_stylesheet_directory()
?>  <?php // * or get_template_directory() though, because they return local paths.
?>  <?php // */
?>  <?php // 
?>  <?php // $theme_data = get_theme_data( get_theme_root() . '/' . $theme_name . '/style.css' );
?>  <?php // 
?>  <?php // define('THEME_VERSION',$theme_data['Version']);
?>  <?php // 
?>  <?php // // Load UpThemes Framework
?>  <?php // require_once( get_template_directory().'/admin/admin.php' );
?>  <?php // 
?>  <?php // // Set Up Theme
?>  <?php // require_once( get_template_directory().'/library/theme_setup.php' );
?>  <?php // require_once( get_template_directory().'/library/constants.php' );
?>  <?php // 
?>  <?php // // Homepage Slides
?>  <?php // require_once( get_template_directory().'/library/meta_handler.php' );
?>  <?php // require_once( get_template_directory().'/library/slides.php' );
?>  <?php // 
?>  <?php // // Custom Widgets
?>  <?php // require_once( get_template_directory().'/library/widgets.php' );
?>  <?php // 
?>  <?php // // UpThemes Dashboard Widget
?>  <?php // require_once( get_template_directory().'/library/dashboard.php' );
?>  <?php // 
?>  <?php // // Theme Options
?>  <?php // require_once( get_template_directory().'/theme-options/colors-and-images.php' );
?>  <?php // 
?>  <?php // add_action("init", "agency_product_thumbnails_init");
?>  <?php // 
?>  <?php // function agency_product_thumbnails_init() {
?>  <?php // 	add_post_type_support( "wpsc-product", "thumbnail" );
?>  <?php // }
?>  <?php // 
?>  <?php // if ( function_exists('register_sidebar') ) {
?>  <?php // 	register_sidebar(array(
?>  <?php // 		'id' => 'default-sidebar',
?>  <?php // 		'name' => 'Default Sidebar',
?>  <?php // 		'before_widget' => '<div class="sb-widget %2$s">',
?>  <?php // 		'after_widget' => '</div>',
?>  <?php // 		'before_title' => '<h2>',
?>  <?php // 		'after_title' => '</h2>'
?>  <?php // 	));
?>  <?php // 	register_sidebar(array(
?>  <?php // 		'id' => 'footer-1',
?>  <?php // 		'name' => 'Footer 1 (left side)',
?>  <?php // 		'before_widget' => '<div class="block frame">',
?>  <?php // 		'after_widget' => '</div>',
?>  <?php // 		'before_title' => '<h2>',
?>  <?php // 		'after_title' => '</h2>'
?>  <?php // 	));
?>  <?php // 	register_sidebar(array(
?>  <?php // 		'id' => 'footer-2',
?>  <?php // 		'name' => 'Footer 2 (right side)',
?>  <?php // 		'before_widget' => '<div class="block">',
?>  <?php // 		'after_widget' => '</div>',
?>  <?php // 		'before_title' => '<h2>',
?>  <?php // 		'after_title' => '</h2>'
?>  <?php // 	));
?>  <?php // 	register_sidebar(array(
?>  <?php // 		'id' => 'home-1',
?>  <?php // 		'name' => 'Column 1 (homepage)',
?>  <?php // 		'before_widget' => '<div class="widget %2$s">',
?>  <?php // 		'after_widget' => '</div>',
?>  <?php // 		'before_title' => '<h3>',
?>  <?php // 		'after_title' => '</h3>'
?>  <?php // 	));
?>  <?php // 	register_sidebar(array(
?>  <?php // 		'id' => 'home-2',
?>  <?php // 		'name' => 'Column 2 (homepage)',
?>  <?php // 		'before_widget' => '<div class="widget %2$s">',
?>  <?php // 		'after_widget' => '</div>',
?>  <?php // 		'before_title' => '<h3>',
?>  <?php // 		'after_title' => '</h3>'
?>  <?php // 	));
?>  <?php // 	register_sidebar(array(
?>  <?php // 		'id' => 'home-3',
?>  <?php // 		'name' => 'Column 3 (homepage)',
?>  <?php // 		'before_widget' => '<div class="widget %2$s">',
?>  <?php // 		'after_widget' => '</div>',
?>  <?php // 		'before_title' => '<h3>',
?>  <?php // 		'after_title' => '</h3>'
?>  <?php // 	));
?>  <?php // }
?>  <?php // 
?>  <?php // if ( function_exists( 'add_theme_support' ) ) {
?>  <?php // 	add_theme_support( 'post-thumbnails' );
?>  <?php // 	set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
?>  <?php // 	add_image_size('product-thumbnail', 200, 200, true );
?>  <?php // 	add_image_size('cart-thumbnail', 40, 40, true );
?>  <?php // 	add_image_size('sigle-product-thumbnail', 270, 268, true );
?>  <?php // 	add_image_size('small-post-thumbnail', 136, 96, true );
?>  <?php // 	add_image_size('widget-thumbnail', 260, 9999);
?>  <?php // }
?>  <?php // 
?>  <?php // register_nav_menus( array(
?>  <?php // 	'primary' => __( 'Primary Navigation', 'base' ),
?>  <?php // ) );
?>  <?php // 
?>  <?php // add_theme_support( 'post-formats', array( 'link', 'quote', 'image', 'video', 'audio' ) );
?>  <?php // 
?>  <?php // function agency_init(){
?>  <?php // 
?>  <?php // 	if( function_exists('upfw_dbwidget_setup') )
?>  <?php // 		add_action('wp_dashboard_setup', 'upfw_dbwidget_setup' );
?>  <?php // 
?>  <?php // 	register_default_headers( array (
?>  <?php // 		'default' => array (
?>  <?php // 			'url' => '%s/images/logo-agency.png',
?>  <?php // 			'thumbnail_url' => '%s/images/logo-agency.png',
?>  <?php // 			'description' => __( 'Agency Logo', 'agency' ) )
?>  <?php // 		)
?>  <?php // 	);
?>  <?php // 
?>  <?php // 	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'agency_header_image_width', 253 ) );
?>  <?php // 	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'agency_header_image_height',	57 ) );
?>  <?php // 	define( 'HEADER_TEXTCOLOR', apply_filters( 'agency_header_image_textcolor', "#ff4a4b" ) );
?>  <?php // 	
?>  <?php // 	add_custom_image_header('', 'agency_header_image_style','agency_header_image_style_admin');
?>  <?php // 
?>  <?php // }
?>  <?php // 
?>  <?php // add_action("init","agency_init",400);
?>  <?php // 
?>  <?php // function agency_styles(){
?>  <?php // 
?>  <?php // 	$up_options = upfw_get_options();
?>  <?php // 
?>  <?php // 	wp_enqueue_style('style',get_template_directory_uri() . "/style.css", false, THEME_VERSION, 'all');
?>  <?php // 
?>  <?php // 	if( $up_options->disable_custom_fonts == false )
?>  <?php //   	wp_enqueue_style('fonts',get_template_directory_uri() . "/css/fonts.css", array('style'), THEME_VERSION, 'all');
?>  <?php //   	wp_enqueue_style('all',get_template_directory_uri() . "/css/all.css", array('style'), THEME_VERSION, 'all');
?>  <?php //   	wp_enqueue_style('print',get_template_directory_uri() . "/css/print.css", array('style'), THEME_VERSION, 'print');
?>  <?php //   	wp_enqueue_style('form',get_template_directory_uri() . "/css/form.css", array('style'), THEME_VERSION, 'all');
?>  <?php // 
?>  <?php // }
?>  <?php // 
?>  <?php // add_action('wp_enqueue_scripts','agency_styles');
?>  <?php // 
?>  <?php // function agency_scripts(){
?>  <?php // 
?>  <?php // 	wp_enqueue_script("master",get_template_directory_uri() . "/js/jquery.master.js", false, THEME_VERSION, 'all');
?>  <?php // 
?>  <?php // }
?>  <?php // 
?>  <?php // add_action('wp_enqueue_scripts','agency_scripts');
?>  <?php // 
?>  <?php // function agency_header_image_style(){
?>  <?php // 	echo "<style type='text/css'>";
?>  <?php // 	echo "#logo a{";
?>  <?php // 	echo "height: " . HEADER_IMAGE_HEIGHT . "px";
?>  <?php // 	echo "width: " . HEADER_IMAGE_WIDTH . "px";
?>  <?php // 	echo "background-image:"; header_image(); echo ";"; 
?>  <?php // 	echo "}";
?>  <?php // 	echo "</style>";
?>  <?php // 
?>  <?php // }
?>  <?php // 
?>  <?php // function agency_header_image_style_admin(){
?>  <?php // 	echo "<link href='http://fonts.googleapis.com/css?family=Neuton' rel='stylesheet' type='text/css'/>";
?>  <?php // 	echo "<style type='text/css'>";
?>  <?php // 	echo "#logo{";
?>  <?php // 	echo "margin-bottom: 0.3em;";
?>  <?php // 	echo "}";
?>  <?php // 	echo "#logo a{";
?>  <?php // 	echo "height: " . HEADER_IMAGE_HEIGHT . "px";
?>  <?php // 	echo "width: " . HEADER_IMAGE_WIDTH . "px";
?>  <?php // 	echo "background-image:"; header_image(); echo ";"; 
?>  <?php // 	echo "font-family: Neuton;";
?>  <?php // 	echo "color: #ff4a4b;";
?>  <?php // 	echo "font-size: 53px;";
?>  <?php // 	echo "font-weight: normal;";
?>  <?php // 	echo "text-decoration: none;";
?>  <?php // 	echo "}";
?>  <?php // 	echo "p.desc{";
?>  <?php // 	echo "text-transform: uppercase;";
?>  <?php // 	echo "font-family: Neuton;";
?>  <?php // 	echo "font-size: 17px;";
?>  <?php // 	echo "color: #6b6666;";
?>  <?php // 	echo "}";
?>  <?php // 	echo "</style>";
?>  <?php // 	echo "<h1 id='logo'><a href=" . get_bloginfo('url') . ">" . get_bloginfo('name') . "</a></h1>";
?>  <?php // 	echo "<p class='desc'>" . get_bloginfo('description') . "</h1>";
?>  <?php // 
?>  <?php // }
?>  <?php // 
?>  <?php // // register tag [template-url]
?>  <?php // function filter_template_url($text) {
?>  <?php // 	return str_replace('[template-url]',get_bloginfo('template_url'), $text);
?>  <?php // }
?>  <?php // add_filter('the_content', 'filter_template_url');
?>  <?php // add_filter('get_the_content', 'filter_template_url');
?>  <?php // add_filter('widget_text', 'filter_template_url');
?>  <?php // 
?>  <?php // /* Replace Standart WP Menu Classes */
?>  <?php // function change_menu_classes($css_classes) {
?>  <?php //         $css_classes = str_replace("current-menu-item", "active", $css_classes);
?>  <?php //         $css_classes = str_replace("current-menu-parent", "active", $css_classes);
?>  <?php //         return $css_classes;
?>  <?php // }
?>  <?php // add_filter('nav_menu_css_class', 'change_menu_classes');
?>  <?php // 
?>  <?php // function agency_navigation(){
?>  <?php // 
?>  <?php // 	if( function_exists('wp_pagenavi') ) : ?>
?>  <?php // 	<div class="paging">
?>  <?php // 		<div class="paging-holder">
?>  <?php // 			<div class="paging-frame">
?>  <?php // 				<?php wp_pagenavi(); ?>
?>  <?php // 			</div>
?>  <?php // 		</div>
?>  <?php // 	</div>
?>  <?php // 	<?php else : ?>
?>  <?php // 		<div class="navigation">
?>  <?php // 			<div class="next"><?php next_posts_link(__('Older Entries &raquo;','agency')) ?></div>
?>  <?php // 			<div class="prev"><?php previous_posts_link(__('&laquo; Newer Entries','agency')) ?></div>
?>  <?php // 		</div>
?>  <?php // 	<?php endif;
?>  <?php // 
?>  <?php // }
?>  <?php // 
?>  <?php // //allow tags in category description
?>  <?php // $filters = array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description');
?>  <?php // foreach ( $filters as $filter ) {
?>  <?php //     remove_filter($filter, 'wp_filter_kses');
?>  <?php // }
?>  <?php // 
?>  <?php // function agency_get_audio_files($postid){
?>  <?php // 	$attachment = get_children(array(
?>  <?php // 					'post_parent' => $postid,
?>  <?php // 					'post_type' => 'attachment'));
?>  <?php // 	$str = 'audio';
?>  <?php // 	$audio_files = array();
?>  <?php // 	foreach($attachment as $file){
?>  <?php // 		if(substr_count($file -> post_mime_type, $str)){
?>  <?php // 			$audio_files[] = $file -> guid;
?>  <?php // 		}
?>  <?php // 	}
?>  <?php // 	if(!count($attachment)) return false;
?>  <?php // 	else return $audio_files;
?>  <?php // }
?>  <?php // 
?>  <?php // function agency_the_404_content(){ ?>
?>  <?php // 	<h2><?php _e("Not Found","agency"); ?></h2>
?>  <?php // 	<p><?php _e("Sorry, but you are looking for something that isn't here.","agency"); ?></p> <?php
?>  <?php // 	if( is_search() )
?>  <?php // 		get_search_form();
?>  <?php // 	
?>  <?php // }
?>  <?php // 
?>  <?php // function agency_wpsc_pagination($totalpages = '', $per_page = '', $current_page = '', $page_link = '') {
?>  <?php // 	global $wp_query;
?>  <?php // 	$num_paged_links = 4; //amount of links to show on either side of current page
?>  <?php // 
?>  <?php // 	$additional_links = '';
?>  <?php // 
?>  <?php // 	//additional links, items per page and products order
?>  <?php // 	if( get_option('permalink_structure') != '' ){
?>  <?php // 		$additional_links_separator = '?';
?>  <?php // 	}else{
?>  <?php // 		$additional_links_separator = '&';
?>  <?php // 	}
?>  <?php // 	if( !empty( $_GET['items_per_page'] ) ){
?>  <?php // 			$additional_links = $additional_links_separator . 'items_per_page=' . $_GET['items_per_page'];
?>  <?php // 			$additional_links_separator = '&';
?>  <?php // 	}
?>  <?php // 	if( !empty( $_GET['product_order'] ) )
?>  <?php // 		$additional_links .= $additional_links_separator . 'product_order=' . $_GET['product_order'];
?>  <?php // 
?>  <?php // 	$additional_links = apply_filters('wpsc_pagination_additional_links', $additional_links);
?>  <?php // 	//end of additional links
?>  <?php // 
?>  <?php // 	if(empty($totalpages)){
?>  <?php // 			$totalpages = $wp_query->max_num_pages;
?>  <?php // 	}
?>  <?php // 	if(empty($per_page))
?>  <?php // 		$per_page = (int)get_option('wpsc_products_per_page');
?>  <?php // 
?>  <?php // 	$current_page = absint( get_query_var('paged') );
?>  <?php // 	if($current_page == 0)
?>  <?php // 		$current_page = 1;
?>  <?php // 
?>  <?php // 	if(empty($page_link))
?>  <?php // 		$page_link = wpsc_a_page_url();
?>  <?php // 
?>  <?php // 	//if there is no pagination
?>  <?php // 	if(!get_option('permalink_structure')) {
?>  <?php // 		$category = '?';
?>  <?php // 		if(isset($wp_query->query_vars['wpsc_product_category']))
?>  <?php // 			$category = '?wpsc_product_category='.$wp_query->query_vars['wpsc_product_category'];
?>  <?php // 		if(isset($wp_query->query_vars['wpsc_product_category']) && is_string($wp_query->query_vars['wpsc_product_category'])){
?>  <?php // 
?>  <?php // 			$page_link = get_option('blogurl').$category.'&amp;paged';
?>  <?php // 		}else{
?>  <?php // 			$page_link = get_option('product_list_url').$category.'&amp;paged';
?>  <?php // 		}
?>  <?php // 
?>  <?php // 		$separator = '=';
?>  <?php // 	}else{
?>  <?php // 		// This will need changing when we get product categories sorted
?>  <?php // 		if(isset($wp_query->query_vars['wpsc_product_category']))
?>  <?php // 			$page_link = trailingslashit(get_option('product_list_url')).$wp_query->query_vars['wpsc_product_category'].'/';
?>  <?php // 		else
?>  <?php // 			$page_link = trailingslashit(get_option('product_list_url'));
?>  <?php // 
?>  <?php // 		$separator = 'page/';
?>  <?php // 	}
?>  <?php // 
?>  <?php // 	// If there's only one page, return now and don't bother
?>  <?php // 	if($totalpages == 1)
?>  <?php // 		return;
?>  <?php // 	// Pagination Prefix
?>  <?php // 	$output = '';
?>  <?php // 
?>  <?php // 	if(get_option('permalink_structure')){
?>  <?php // 
?>  <?php // 		// Should we show the PREVIOUS PAGE link?
?>  <?php // 		if($current_page > 1) {
?>  <?php // 			$previous_page = $current_page - 1;
?>  <?php // 			if( $previous_page == 1 )
?>  <?php // 				$output .= " <a class='previouspostslink' href=\"". esc_url( $page_link . $additional_links ) . "\" title=\"" . __('Previous Page', 'wpsc') . "\">" . __('Prev', 'wpsc') . "</a>";
?>  <?php // 			else
?>  <?php // 				$output .= " <a class='previouspostslink' href=\"". esc_url( $page_link .$separator. $previous_page . $additional_links ) . "\" title=\"" . __('Previous Page', 'wpsc') . "\">" . __('Prev', 'wpsc') . "</a>";
?>  <?php // 		}
?>  <?php // 		$i =$current_page - $num_paged_links;
?>  <?php // 		$count = 1;
?>  <?php // 		if($i <= 0) $i =1;
?>  <?php // 		while($i < $current_page){
?>  <?php // 			if($count <= $num_paged_links){
?>  <?php // 				if($count == 1)
?>  <?php // 					$output .= " <a href=\"". esc_url( $page_link . $additional_links ) . "\" title=\"" . sprintf( __('Page %s', 'wpsc'), $i ) . " \">".$i."</a>";
?>  <?php // 				else
?>  <?php // 					$output .= " <a href=\"". esc_url( $page_link .$separator. $i . $additional_links ) . "\" title=\"" . sprintf( __('Page %s', 'wpsc'), $i ) . " \">".$i."</a>";
?>  <?php // 			}
?>  <?php // 			$i++;
?>  <?php // 			$count++;
?>  <?php // 		}
?>  <?php // 		// Current Page Number
?>  <?php // 		if($current_page > 0)
?>  <?php // 			$output .= "<span class='current'>$current_page</span>";
?>  <?php // 
?>  <?php // 		//Links after Current Page
?>  <?php // 		$i = $current_page + $num_paged_links;
?>  <?php // 		$count = 1;
?>  <?php // 
?>  <?php // 		if($current_page < $totalpages){
?>  <?php // 			while(($i) > $current_page){
?>  <?php // 
?>  <?php // 				if($count < $num_paged_links && ($count+$current_page) <= $totalpages){
?>  <?php // 						$output .= " <a href=\"". esc_url( $page_link .$separator. ($count+$current_page) .$additional_links ) . "\" title=\"" . sprintf( __('Page %s', 'wpsc'), ($count+$current_page) ) . "\">".($count+$current_page)."</a>";
?>  <?php // 				$i++;
?>  <?php // 				}else{
?>  <?php // 				break;
?>  <?php // 				}
?>  <?php // 				$count ++;
?>  <?php // 			}
?>  <?php // 		}
?>  <?php // 
?>  <?php // 		if($current_page < $totalpages) {
?>  <?php // 			$next_page = $current_page + 1;
?>  <?php // 			$output .= "<a class='nextpostslink' href=\"". esc_url( $page_link  .$separator. $next_page . $additional_links ) . "\" title=\"" . __('Next Page', 'wpsc') . "\">" . __('Next', 'wpsc') . "</a>";
?>  <?php // 		}
?>  <?php // 	} else {
?>  <?php // 		// Should we show the PREVIOUS PAGE link?
?>  <?php // 		if($current_page > 1) {
?>  <?php // 			$previous_page = $current_page - 1;
?>  <?php // 			if( $previous_page == 1 )
?>  <?php // 				$output .= " <a class='previouspostslink' href=\"". remove_query_arg( 'paged' ) . $additional_links . "\" title=\"" . __('Previous Page', 'wpsc') . "\">" . __('Prev', 'wpsc') . "</a>";
?>  <?php // 			else
?>  <?php // 				$output .= " <a class='previouspostslink' href=\"". add_query_arg( 'paged', ($current_page - 1) ) . $additional_links . "\" title=\"" . __('Previous Page', 'wpsc') . "\">" . __('Prev', 'wpsc') . "</a>";
?>  <?php // 		}
?>  <?php // 		$i =$current_page - $num_paged_links;
?>  <?php // 		$count = 1;
?>  <?php // 		if($i <= 0) $i =1;
?>  <?php // 		while($i < $current_page){
?>  <?php // 			if($count <= $num_paged_links){
?>  <?php // 				if($i == 1)
?>  <?php // 					$output .= " <a href=\"". remove_query_arg('paged' ) . "\" title=\"" . sprintf( __('Page %s', 'wpsc'), $i ) . " \">".$i."</a>";
?>  <?php // 				else
?>  <?php // 					$output .= " <a href=\"". add_query_arg('paged', $i ) . "\" title=\"" . sprintf( __('Page %s', 'wpsc'), $i ) . " \">".$i."</a>";
?>  <?php // 			}
?>  <?php // 			$i++;
?>  <?php // 			$count++;
?>  <?php // 		}
?>  <?php // 		// Current Page Number
?>  <?php // 		if($current_page > 0)
?>  <?php // 			$output .= "<span class='current'>$current_page</span>";
?>  <?php // 
?>  <?php // 		//Links after Current Page
?>  <?php // 		$i = $current_page + $num_paged_links;
?>  <?php // 		$count = 1;
?>  <?php // 
?>  <?php // 		if($current_page < $totalpages){
?>  <?php // 			while(($i) > $current_page){
?>  <?php // 
?>  <?php // 				if($count < $num_paged_links && ($count+$current_page) <= $totalpages){
?>  <?php // 						$output .= " <a href=\"". add_query_arg( 'paged', ($count+$current_page) ) . "\" title=\"" . sprintf( __('Page %s', 'wpsc'), ($count+$current_page) ) . "\">".($count+$current_page)."</a>";
?>  <?php // 				$i++;
?>  <?php // 				}else{
?>  <?php // 				break;
?>  <?php // 				}
?>  <?php // 				$count ++;
?>  <?php // 			}
?>  <?php // 		}
?>  <?php // 
?>  <?php // 		if($current_page < $totalpages) {
?>  <?php // 			$next_page = $current_page + 1;
?>  <?php // 			$output .= "<a class='nextpostslink' href=\"". add_query_arg( 'paged', $next_page ) . "\" title=\"" . __('Next Page', 'wpsc') . "\">" . __('Next', 'wpsc') . "</a>";
?>  <?php // 		}
?>  <?php // 	}
?>  <?php // 	// Return the output.
?>  <?php // 	echo $output;
?>  <?php // }
?>  <?php // 
?>  <?php // function agency_get_parameter($url,$param){
?>  <?php // 
?>  <?php // 	$url_components = parse_url($url);
?>  <?php // 
?>  <?php // 	$querystring = $url_components['query'];
?>  <?php // 
?>  <?php //  	parse_str($querystring,$querystring_components);
?>  <?php // 
?>  <?php // 	return $querystring_components[$param];
?>  <?php // 
?>  <?php // }
?>  <?php // 
?>  <?php // function agency_get_vimeo_id($url){
?>  <?php // 
?>  <?php // 	return sscanf(parse_url($url, PHP_URL_PATH), '/%d', $video_id);
?>  <?php // 
?>  <?php // }
?>  <?php // 
?>  <?php // function agency_get_thumbnail_video($url){
?>  <?php // 
?>  <?php // 	$permalink = get_permalink();
?>  <?php // 
?>  <?php // 	if( strpos($url, 'youtube') ){
?>  <?php // 		$id = agency_get_parameter($url,'v');
?>  <?php // 		$url = "http://img.youtube.com/vi/$id/hqdefault.jpg";
?>  <?php // 	} elseif( strpos($url, 'vimeo') ){
?>  <?php // 		$id = agency_get_vimeo_id($url);
?>  <?php // 		$url = file_get_contents("http://vimeo.com/api/v2/video/$id.php");
?>  <?php // 		$url = $url['thumbnail_small'];
?>  <?php // 	}
?>  <?php // 
?>  <?php // 	echo "<a href='$permalink'><img src='$url' style='max-width:100%;height:auto;' alt=''></a>";
?>  <?php // 
?>  <?php // }
?>  <?php // 
?>  <?php // function agency_theme_style($classes){
?>  <?php // 
?>  <?php // 	global $up_options;
?>  <?php // 	$up_options = upfw_get_options();
?>  <?php // 
?>  <?php // 	if( $up_options->theme_color_scheme )
?>  <?php // 		$classes[] = $up_options->theme_color_scheme;
?>  <?php // 
?>  <?php // 	return $classes;
?>  <?php // 
?>  <?php // }
?>  <?php // 
?>  <?php // add_filter('body_class','agency_theme_style');
?>  <?php // 
?>  <?php //