<?php

define('DSS_THEME_DIR',         trailingslashit( get_template_directory() ));

define('DSS_THEME_URI',         trailingslashit( get_template_directory_uri() ));


define('DSS_THEME_ASSETS',      DSS_THEME_DIR .'assets/');

define('DSS_THEME_ASSETS_URI',  DSS_THEME_URI .'assets/');

define('DSS_THEME_INCLUDES',    DSS_THEME_DIR .'includes/');

define('DSS_THEME_LIB',         DSS_THEME_DIR .'lib/');



if ( ! isset( $content_width ) ) $content_width = 960;



if( !class_exists('Dss_Toolkit') ){

	if(!defined('DSS_TOOLKIT_PATH'))   define( 'DSS_TOOLKIT_PATH', DSS_THEME_DIR . 'lib/dss-toolkit/' );

	if(!defined('DSS_TOOLKIT_URI'))    define( 'DSS_TOOLKIT_URI', DSS_THEME_URI . 'lib/dss-toolkit/' );

	require_once (DSS_THEME_LIB . 'dss-toolkit/plugin-base.php');

}




/**
 * Exclude external scripts from WP Rocket’s file optimization.
 * @param  array  $external_js Array of script URL fragments
 * @return array               Extended array of script URL fragments
 */
function __fix_wprocket_excluded_external_js( $external_js ) {

	/**
	 * Replace with your external script URL part.
	 */

	$external_js[] = 'pagead2.googlesyndication.com';
	return $external_js;
}
add_filter( 'rocket_minify_excluded_external_js', '__fix_wprocket_excluded_external_js' );


// function dss_theme_setup_lang(){

	load_theme_textdomain('dss_theme', get_template_directory() . '/languages');

// }

// add_action('after_setup_theme', 'dss_theme_setup_lang', 20);



/**

 * Safe add_query_arg

 *

 * Safe add_query_arg, using esc_url

 *

 * @param $param1 string|array Either newkey or an associative_array.

 * @param $param2 string Either newvalue or oldquery or URI. 

 * @param $param3 string Old query or URI.

 * @return string 

 */

function dss_add_query_arg(){

	$args       = func_get_args();

	$total_args = count( $args );

	$uri        = $_SERVER['REQUEST_URI'];



	if( 3 <= $total_args ){

		$uri = add_query_arg( $args[0], $args[1], $args[2] );

	}

	elseif( 2 == $total_args ){

		$uri = add_query_arg( $args[0], $args[1] );

	}

	elseif( 1 == $total_args ){

		$uri = add_query_arg( $args[0] );

	}



	return esc_url( $uri );

}



/**

 * Safe remove_query_arg

 *

 * Safe remove_query_arg, using esc_url

 *

 * @param $key string|array Query key or keys to remove.

 * @param $query bool|string When false uses the $_SERVER value.

 * @return string 

 */

function dss_remove_query_arg( $key, $query = false ){

	return esc_url( remove_query_arg($key, $query) );

}



require_once (DSS_THEME_INCLUDES . 'register/scripts.php');

require_once (DSS_THEME_INCLUDES . 'register/menus.php');

require_once (DSS_THEME_INCLUDES . 'register/sidebars.php');

require_once (DSS_THEME_INCLUDES . 'register/theme-support.php');





require_once (DSS_THEME_INCLUDES . 'aq_resizer.php');

require_once (DSS_THEME_INCLUDES . 'page-title.php');

require_once (DSS_THEME_INCLUDES . 'related-posts.php');

require_once (DSS_THEME_INCLUDES . 'members-list.php');

require_once (DSS_THEME_INCLUDES . 'comments/comment-template.php');

require_once (DSS_THEME_INCLUDES . 'comments/comments-form.php');



require_once (DSS_THEME_LIB . 'mod/user/base.php');

require_once (DSS_THEME_INCLUDES . 'awards.php');



require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-abstract.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-settings.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-cpt.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-search.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-functions.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-init.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-filter.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-metabox.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-slugs.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/submit-tutoriel.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/all-user-tutoriels.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-shortcodes.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/feature-tutoriel.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-update.php');

require_once (DSS_THEME_LIB . 'mod/tutoriels/tutoriels-rating.php');



require_once (DSS_THEME_LIB . 'mod/print-tutoriel/print-tutoriel.php');



require_once (DSS_THEME_LIB . 'mod/mark-post/mark-post.php');

require_once (DSS_THEME_LIB . 'mod/mark-post/mark-post-ajax.php');

require_once (DSS_THEME_LIB . 'mod/mark-post/favorite.php');

require_once (DSS_THEME_LIB . 'mod/mark-post/like.php');



//Activities

require_once (DSS_THEME_LIB . 'mod/activities/activities-cpt.php');

require_once (DSS_THEME_LIB . 'mod/activities/activities-init.php');

require_once (DSS_THEME_LIB . 'mod/activities/activities-functions.php');

require_once (DSS_THEME_INCLUDES . 'get-activity.php');



// Reputation log

require_once (DSS_THEME_INCLUDES . 'get-user-reputation-log.php');



// Keywords Index

require_once (DSS_THEME_INCLUDES . 'keywords-index.php');



// Page builder

require_once (DSS_THEME_INCLUDES . 'page-builder/init.php');



// Widgets

require_once (DSS_THEME_INCLUDES . 'widgets/tutoriel-categories.php');

require_once (DSS_THEME_INCLUDES . 'widgets/tutoriels-list.php');

require_once (DSS_THEME_INCLUDES . 'widgets/top-users.php');

require_once (DSS_THEME_INCLUDES . 'widgets/widget-follow-social.php');

require_once (DSS_THEME_INCLUDES . 'widgets/widget-image.php');



function dss_theme_register_widgets() {

	register_widget( 'Dss_Tutoriels_Categories' );

	register_widget( 'Dss_Tutoriels_List' );

	register_widget( 'Dss_Widget_Top_Users' );

	register_widget( 'Dss_Theme_WidgetFollowSocial' );

	register_widget( 'Dss_Theme_WidgetImage' );

}

add_action( 'widgets_init', 'dss_theme_register_widgets' );



require_once (DSS_THEME_INCLUDES . 'bbpress.php');

if( ! function_exists('lessc') ){

	require_once (DSS_THEME_INCLUDES . 'lessc.inc.php');

}

require_once (DSS_THEME_INCLUDES . 'theme-settings-panel.php');

require_once (DSS_THEME_INCLUDES . 'page-settings-meta.php');

require_once (DSS_THEME_INCLUDES . 'woocommerce-support.php');



/*

-------------------------------------------------------------------------------

Site preparation

-------------------------------------------------------------------------------

*/

/* Site preparation on activation

------------------------------------------------*/

function dss_theme_activation() {

	// Allow subscribers to upload files

	$subscriber = get_role('subscriber');

	if( is_object($subscriber) ){

		$subscriber->add_cap('upload_files');

	}



	// Allow contributors to upload files

	$contributor = get_role('contributor');

	if( is_object($contributor) ){

		$contributor->add_cap('upload_files');

	}



	//Rewrite rules to allow tutoriels CPT pretty permalinks

	flush_rewrite_rules();

}

add_action('after_switch_theme', 'dss_theme_activation');



/* Site preparation on deactivation

------------------------------------------------*/

function dss_theme_deactivation() {

	// Allow subscribers to upload files

	$subscriber = get_role('subscriber');

	if( is_object($subscriber) ){

		$subscriber->remove_cap('upload_files');

	}

	// Allow contributors to upload files

	$contributor = get_role('contributor');

	if( is_object($contributor) ){

		$contributor->remove_cap('upload_files');

	}

	//Rewrite rules to allow tutoriels CPT pretty permalinks

	flush_rewrite_rules();

}

add_action('switch_theme', 'dss_theme_deactivation');



/* Allow uploader via SSL

------------------------------------------------*/

function dss_theme_fix_ssl_attachment_url( $url ) {

	if ( is_ssl() )

		$url = str_replace( array( 'http://', 'https://' ), '//', $url );

	return $url;

}

add_filter( 'wp_get_attachment_url', 'dss_theme_fix_ssl_attachment_url' );



/* Show admin bar

------------------------------------------------*/

function dss_admin_bar_filter($content) {

	return ( current_user_can( 'manage_options' ) ) ? $content : false;

}

add_filter( 'show_admin_bar' , 'dss_admin_bar_filter');



/* If current user is not an admin do not allow access to wp admin and redirect it to the website homepage

------------------------------------------------*/

// function dss_disallow_admin_access(){

// 	if( is_user_logged_in() && ! current_user_can( 'manage_options' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX )  ){

// 		wp_safe_redirect( site_url() );

// 	}

// }

// add_action( 'init' , 'dss_disallow_admin_access');



/* Limit users to be able to select only their uploads, not others.

------------------------------------------------*/

function dss_attachments_wpquery_where( $where ){

	$current_user_id = Dss_Theme_User::currentUserId();



	if( is_user_logged_in() && ( ! current_user_can('edit_others_posts') ) ){

		// we spreken over een ingelogde user

		if( isset( $_POST['action'] ) ){

			// library query

			if( $_POST['action'] == 'query-attachments' ){

				$where .= ' AND post_author='. $current_user_id;

			}

		}

	}



	return $where;

}

add_filter( 'posts_where', 'dss_attachments_wpquery_where' );



/* Theme title tag backward compatibility.

------------------------------------------------*/

if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function dss_theme_slug_render_title() {

?>

<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php

	}

	add_action( 'wp_head', 'dss_theme_slug_render_title' );

}



/*

-------------------------------------------------------------------------------

Next functions

-------------------------------------------------------------------------------

*/

if( !function_exists('dss_theme_resize') ){

	function dss_theme_resize($url, $width = null, $height = null, $crop = null, $single = true, $upscale = true){

		if( function_exists('aq_resize') ){

			$resized = aq_resize($url, $width, $height, $crop, $single, $upscale);

			if( $resized && isset($resized) && !empty($resized) ){

				return $resized;

			}

			else{

				return $url;

			}

		}

		else{

			return $url;

		}

	}

}



if( !function_exists('dss_theme_post_image_url') ){

	function dss_theme_post_image_url(){

		$url = false;

		if ( has_post_thumbnail() ) {

			$url = wp_get_attachment_url( get_post_thumbnail_id() );

		} 

		return $url;

	}

}



if( !function_exists('dss_theme_sidebar') ){

	function dss_theme_sidebar(){

		return get_template_part("tpl/the", "sidebar");

	}

}





/**

 * Theme View

 *

 * Include a file and(optionally) pass arguments to it.

 *

 * @param string $file The file path, relative to theme root

 * @param array $args The arguments to pass to this file. Optional.

 * Default empty array.

 *

 * @return object Use render() method to display the content.

 */

if ( ! class_exists('Dss_ThemeView') ) {

	class Dss_ThemeView{

		private $args;

		private $file;

 

		public function __get($name) {

			return $this->args[$name];

		}

 

		public function __construct($file, $args = array()) {

			$this->file = $file;

			$this->args = $args;

		}

 

		public function __isset($name){

			return isset( $this->args[$name] );

		}

 

		public function render() {

			if( locate_template($this->file) ){

				include( locate_template($this->file) );//Theme Check free. Child themes support.

			}

		}

	}

}



//------------------------------------//--------------------------------------//



/**

 * Dss Get Template Part

 *

 * An alternative to the native WP function `get_template_part`

 *

 * @see PHP class Dss_ThemeView

 * @param string $file The file path, relative to theme root

 * @param array $args The arguments to pass to this file. Optional.

 * Default empty array.

 * 

 * @return string The HTML from $file

 */

if( ! function_exists('dss_get_template_part') ){

	function dss_get_template_part($file, $args = array()){

		$template = new Dss_ThemeView($file, $args);

		$template->render();

	}

}



if( !function_exists('dss_theme_allowed_tags') ){

	function dss_theme_allowed_tags() {

		global $allowedtags;

		$allowed = array();

		foreach ( (array) $allowedtags as $tag => $attributes ) {

			$this_tag = '';

			$this_tag .= '<'.$tag;

			if ( 0 < count($attributes) ) {

				foreach ( $attributes as $attribute => $limits ) {

					$this_tag .= ' '.$attribute.'=""';

				}

			}

			$this_tag .= '> ';

			$this_tag = htmlentities($this_tag);

			$allowed[] = $this_tag;

		}

		return implode('<br />', $allowed);

	}

}







if( ! function_exists('dss_theme_excerpt') ){

	function dss_theme_excerpt($len=20, $trim="&hellip;", $echo = true, $post_id = false){

		$excerpt = '';



		if( $post_id ){

			$the_post = get_post( $post_id, ARRAY_A );

			if ( empty( $post_id ) ) {

				$excerpt = '';

			}

			elseif ( post_password_required() ) {

				$excerpt = __( 'There is no excerpt because this is a protected post.', 'dss_theme' );

			}

			else{

				$excerpt = strip_tags( $the_post['post_content'] );

			}

		}

		else{

			$excerpt = get_the_excerpt();

		}



		$limit     = $len + 1;

		$excerpt   = explode(' ', $excerpt, $limit);

		$num_words = count($excerpt);

		if($num_words >= $len){

			$last_item = array_pop( $excerpt );

		}

		else{

			$trim = '';

		}

		$excerpt = implode(" ", $excerpt) . $trim;



		if( $echo ){ echo $excerpt; } else { return $excerpt; }

	}

}



//------------------------------------//--------------------------------------//



/**

 * Oputputs the sanitized HTML class

 *

 * Return the HTML classes from a string or from an array

 *

 * @param $the_classes string|array The string class name or an array of classes.

 * @return string The classes separated by a space.

 */

function dss_html_class($the_classes = false){

	

	// Get CSS classes

	if( is_array($the_classes) ){

		$all_classes = array();

		foreach ($the_classes as $class) {

			//If is not string or is a number skip to the next value

			if( is_numeric($class) || ! is_string($class) ) continue;

			$all_classes[] = sanitize_html_class($class);

		}

		$classes = join(' ', $all_classes);

	}

	elseif( is_string($the_classes) ){

		$classes = sanitize_html_class($the_classes);

	}

	else{

		$classes = false;

	}



	return $classes;



}



//------------------------------------//--------------------------------------//



/**

 * Oputputs the HTML class attribute wuth the sanitized classes

 *

 * Return the HTML class attribute with the classes from a string or from an array

 *

 * @param $the_classes string|array The string class name or an array of classes.

 * @return string The classes separated by a space in a class="" attribute.

 */

function dss_html_class_attr($the_classes = false){

	

	// Get CSS classes

	$classes = dss_html_class($the_classes);

	

	//Construct the class attribute if possible

	if($classes && !empty($classes)) {

		$class = ' class="'. $classes .'"';

	}

	else{

		$class = false;

	}

	return $class;



}



function dss_user_role_is( $role, $user_id = null ) {

	if ( is_numeric( $user_id ) ){

		$user = get_userdata( $user_id );

	}

	else{

		$user = wp_get_current_user();

	}



	if ( empty( $user ) ){

		return false;

	}



	return in_array( $role, (array) $user->roles );

}



//------------------------------------//--------------------------------------//



/**

 * Comments number link

 *

 * Display the comments number link. 

 * !!! Must be used within loop.

 *

 * @param $show_as_link bool Show as link or just plain text

 * @param $link_classes array|string The CSS classes or class if is string 

 * @param $echo bool Echo or return. Default true, ECHO.

 * @return string The formated link.

 */

function dss_comments_number_link( $show_as_link = true, $link_classes = false, $echo = true ){

	

	// Get CSS classes

	if( ! $class = dss_html_class_attr($link_classes) ){

		$class = '';

	}



	//Output the link

	ob_start();

	if( $show_as_link ) echo ' <a href="'. get_comments_link() .'"'. $class .'>';

		comments_number(

			__( 'No Comments', 'dss_theme' ), 

			__( '1 Comment', 'dss_theme' ), 

			__( '% Comments', 'dss_theme' ) 

		); 

	if( $show_as_link ) echo '</a>';

	$link = ob_get_contents();

	ob_end_clean();

	if( $echo ){

		echo $link;

	}

	else{

		return $link;

	}



}



//------------------------------------//--------------------------------------//



/**

 * Post author link

 *

 * Return or echo the author link of the current post

 * !!! Must be used within loop.

 *

 * @param $name string The author name. According to get_the_author_meta() function

 * See for more info: http://codex.wordpress.org/Function_Reference/get_the_author_meta#Parameters

 * @param $classes string|array Add HTML classes to author link.

 * @param $echo bool Echo or return. Default true, ECHO.

 * @return string The formated link.

 */

function dss_post_author_link($name = false, $classes = false, $echo = true){



	// If first arg is an array, then ignore other args and get them from array

	if( is_array( $name ) ){

		$name    = ( !empty($name['name']) ) ? $name['name'] : false;

		$classes = ( !empty($name['classes']) ) ? $name['classes'] : false;

		$echo    = ( !empty($name['echo']) ) ? $name['echo'] : false;

	}



	//Get field

	if( ! is_string( $name ) || empty($name) ){

		$name = 'display_name';

	}



	// Get CSS classes

	if( ! $class = dss_html_class_attr($classes) ){

		$class = '';

	}



	$link = '<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'"'. $class .' itemprop="author">' . get_the_author_meta( $name ) .'</a>';

	if( $echo ){

		echo $link;

	}

	else{

		return $link;

	}



}



//------------------------------------//--------------------------------------//



/**

 * Post date

 *

 * Return or echo the date of the current post

 * !!! Must be used within loop.

 *

 * @param $format string Date format

 * See for more info: http://www.php.net//manual/en/function.date.php

 * @param $echo bool Echo or return. Default true, ECHO.

 * @return string The formated date.

 */

function dss_post_date($format = false, $echo = true){



	//Get custom format

	if( ! is_string( $format ) || empty($format) ){

		$format = 'F j, Y';

	}

	$date = sprintf( __('%1$s', 'dss_theme') , get_the_time($format) );

	if( $echo ){

		echo $date;

	}

	else{

		return $date;

	}

}



//------------------------------------//--------------------------------------//

		

/**

 * Get the total number of users

 *

 * Get total number of registered users.

 * Uses cache and it will expire in 6 hours.

 *

 * @return int 

 */

function dss_get_total_users(){

	if ( false === ( $dss_get_total_users = get_transient( 'dss_get_total_users' ) ) ) {

		$all = count_users();

		$dss_get_total_users = $all['total_users'];

		set_transient( 'dss_get_total_users', $dss_get_total_users, 6 * HOUR_IN_SECONDS);

	}

	return $dss_get_total_users;

}



//------------------------------------//--------------------------------------//

		

/**

 * Get the total number of tutoriels submitted by a user by ID

 *

 * Get the total number of tutoriels submitted by a user by ID

 * Uses cache and it will expire in 15 minutes.

 *

 * @return int 

 */

function dss_get_total_user_tutoriels( $user_id ){

	global $wpdb;

	$where = get_posts_by_author_sql( 'dss_tutoriels', true, $user_id );

	$count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );

	return $count;

}



//------------------------------------//--------------------------------------//

		

/**

 * Pagination

 *

 * Show posts pagination

 *

 * @param int $total_pages The total number of pages  

 * @param array $settings Pagination settings  

 * @return string 

 */

function dss_theme_pagination($total_pages = false, $settings = array() ){



	$def_sett = array(

		'default_class' => 'button nobg primary small',

		'active_class'  => 'button primary current small',

		'block_class'   => '',

		'group_buttons' => false,

		'align'         => 'center',

		'query_arg'     => 'pag', // Parameter name from url

		'echo'          => true,

	);

	$settings    = wp_parse_args( $settings, $def_sett );

	$page_number = !empty( $_GET[ $settings['query_arg'] ] ) && absint( $_GET[ $settings['query_arg'] ] ) > 0 ? absint( $_GET[ $settings['query_arg'] ] ) : 1;

	$align       = in_array( $settings['block_class'], array('left', 'center', 'right') ) ? $settings['block_class'] : 'center';



	if( $total_pages ){

		if( is_object($total_pages) ){

			$total_pages = $total_pages->max_num_pages;

		}

	}



	$output = '';

	if( $total_pages > 1 ){

		$output .= '<div class="button-block '. $align .' '. $settings['block_class'] .'">';

		if($settings['group_buttons']) {

			$output .= '<div class="button-group">';

		}

			for ($i=1; $i <= $total_pages; $i++) { 

				if( $page_number == $i ){

					$output .= '<span class="'. $settings['active_class'] .'">'. $i .'</span>';

				}

				elseif( $i == 1 ){

					$output .= '<a class="'. $settings['default_class'] .'" href="'. dss_remove_query_arg( $settings['query_arg'] ) .'">'. $i .'</a>';

				}

				else{

					$output .= '<a class="'. $settings['default_class'] .'" href="'. esc_url( add_query_arg( array( $settings['query_arg'] => $i ) ) ) .'">'. $i .'</a>';

				}

			}

		if($settings['group_buttons']) {

			$output .= '</div>';

		}

		$output .= '</div>';

	}



	if( $settings['echo'] ) { 

		echo $output; } else { return $output; 

	}

}



//------------------------------------//--------------------------------------//

		

/**

 * Current page

 *

 * Return the current page number

 *

 * @param string $pag_parameter The url parameter that has the page number 

 * @return int

 */

function dss_theme_current_pag( $pag_parameter = 'pag' ){

	return ( !empty( $_GET[ $pag_parameter ] ) && absint( $_GET[ $pag_parameter ] ) > 0 ) ? absint( $_GET[ $pag_parameter ] ) : 1;

}



//------------------------------------//--------------------------------------//

		

/**

 * Get total number of pages for users

 *

 * Get total number of pages for users

 *

 * @param int $per_page How many users are per page  

 * @param array $users_query Custom query parameters for `get_users()`

 *

 * @todo Set the cache using transients

 *

 * @return int 

 */

function dss_theme_total_user_pages( $per_page = 10, $users_query = array() ){

	$def = array(

		'orderby' => 'post_count',

		'order' => 'DESC',

	);

	$args        = wp_parse_args( $users_query, $def );

	$all_users   = get_users( $args );

	$total_users = count( $all_users );

	$total_pages = ceil( $total_users/$per_page );



	return $total_pages;

}



function dss_get_image_id_by_url($image_url) {

	global $wpdb;

	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 

	return $attachment[0]; 

}



function dss_wp_link_pages( $args = array() ){

	wp_link_pages( $args );

}





require_once (DSS_THEME_INCLUDES . 'build-summary.php');

require_once (DSS_THEME_INCLUDES . 'build-activity.php');

require_once (DSS_THEME_INCLUDES . 'build-reputation.php');
