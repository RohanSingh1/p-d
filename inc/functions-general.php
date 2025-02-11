<?php
/**
 * Functions
 *
 * This file contains general functions
 *
 * @author    Project Name
 * @copyright 2017 Project Name
 * @version   1.0
 */

define( 'THEME_DIRECTORY', get_template_directory() );

/*
Body classes
- add more classes to the body to enable more specific targeting if needed
*/
function ambrosite_body_class($classes) {$post_name_prefix = 'postname-';$page_name_prefix = 'pagename-';$single_term_prefix = 'single-';$single_parent_prefix = 'parent-';$category_parent_prefix = 'parent-category-';$term_parent_prefix = 'parent-term-';$site_prefix = 'site-';global $wp_query;if ( is_single() ) {$wp_query->post = $wp_query->posts[0];setup_postdata($wp_query->post);$classes[] = $post_name_prefix . $wp_query->post->post_name;$taxonomies = array_filter( get_post_taxonomies($wp_query->post->ID), "is_taxonomy_hierarchical" );foreach ( $taxonomies as $taxonomy ) {$tax_name = ( $taxonomy != 'category') ? $taxonomy . '-' : '';$terms = get_the_terms($wp_query->post->ID, $taxonomy);if ( $terms ) {foreach( $terms as $term ) {if ( !empty($term->slug ) )$classes[] = $single_term_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);while ( $term->parent ) {$term = &get_term( (int) $term->parent, $taxonomy );if ( !empty( $term->slug ) )$classes[] = $single_parent_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);}}}}} elseif ( is_archive() ) {if ( is_category() ) {$cat = $wp_query->get_queried_object();while ( $cat->parent ) {$cat = &get_category( (int) $cat->parent);if ( !empty( $cat->slug ) )$classes[] = $category_parent_prefix . sanitize_html_class($cat->slug, $cat->cat_ID);}} elseif ( is_tax() ) {$term = $wp_query->get_queried_object();while ( $term->parent ) {$term = &get_term( (int) $term->parent, $term->taxonomy );if ( !empty( $term->slug ) )$classes[] = $term_parent_prefix . sanitize_html_class($term->slug, $term->term_id);}}} elseif ( is_page() ) {$wp_query->post = $wp_query->posts[0];setup_postdata($wp_query->post);$classes[] = $page_name_prefix . $wp_query->post->post_name;}if ( is_multisite() ) {global $blog_id;$classes[] = $site_prefix . $blog_id;}return $classes;} add_filter('body_class', 'ambrosite_body_class');

/*
Disable the theme editor
- stop clients from breaking their website
*/
define('DISALLOW_FILE_EDIT', true);

/*
Remove version info
- makes it that little bit harder for hackers
*/
function complete_version_removal() {
    return '';
}
add_filter('the_generator', 'complete_version_removal');

/*
Remove info from headers
- remove the stuff we don't need
*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'wp_enqueue_emoji_styles' );

/*
Excerpt
- this theme supports excerpts
*/
add_post_type_support( 'page', 'excerpt' );

function new_excerpt_more($more) {
     global $post;
	 return '...';
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
  } else {
	$excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

/*
Thumbnails
- this theme supports thumbnails
*/
add_theme_support( 'post-thumbnails' );
add_image_size ( 'full', 3000, 3000, true );

/*
Scripts & Styles
- include the scripts and stylesheets
*/
add_action( 'wp_enqueue_scripts', 'script_enqueues' );

add_filter('gform_init_scripts_footer', function() {
	return true;
});

function script_enqueues() {
			
	wp_enqueue_style( 'pd-style', get_stylesheet_uri(), array(), time() );	
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), time(), 'all' );
	wp_enqueue_style( 'owl-carousel-default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), time(), 'all' );
	wp_enqueue_style( 'custom-select', get_template_directory_uri() . '/assets/css/custom-select.css', array(), time(), 'all' );
	wp_enqueue_style( 'pd-main-css', PND_ASSETS_URI . 'css/style.css', [], time(), 'all' );
  	wp_enqueue_script('jquery');
	wp_enqueue_script( 'custom-select', PND_ASSETS_URI . 'js/custom-select.min.js', '', time(), true );
	wp_enqueue_script( 'main-js', PND_ASSETS_URI . 'js/main.js', array('jquery'), time(), true );
	wp_enqueue_script( 'owl-carousel', PND_ASSETS_URI . 'js/owl.carousel.js', array('jquery'), time(), true );
	wp_enqueue_script( 'jquery-scripts', PND_ASSETS_URI . 'js/jquery-scripts.js', array('jquery'), time(), true );	
	wp_enqueue_script( 'sevenrooms', 'https://www.sevenrooms.com/widget/embed.js' );
	
}

/*
Admin Bar
- hide the admin bar
*/
add_filter('show_admin_bar', '__return_false');

/**
 * paisanoanddaughters functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package paisanoanddaughters
 */

if ( ! function_exists( 'pd_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pd_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on paisanoanddaughters, use a find and replace
		 * to change 'paisanoanddaughters' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'paisanoanddaughters', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header' => esc_html__( 'Header Nav', 'paisanoanddaughters' ),
      'footer' => esc_html__( 'Footer Nav', 'paisanoanddaughters' ),
      'follow-us' => esc_html__( 'Follow Us Links', 'paisanoanddaughters' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pd_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pd_setup' );
/*
Menu Classes
- add first and last to menu items
*/
function wpdev_first_and_last_menu_class($items) {
	$items[1]->classes[] = 'first';
	$items[count($items)]->classes[] = 'last';
	return $items;
}
add_filter('wp_nav_menu_objects', 'wpdev_first_and_last_menu_class');

/*
Admin Menus
- hide unused menu items
*/
function remove_menus(){
  
  remove_menu_page( 'edit-comments.php' );
  
}
add_action( 'admin_menu', 'remove_menus' );

// Allow SVG uploads
function enable_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'enable_svg_upload');

// Sanitize SVG uploads
function sanitize_svg($data, $file, $filename, $mimes, $real_mime) {
    if ('image/svg+xml' === $real_mime) {
        // Load the SVG XML for sanitization
        $xml = simplexml_load_file($file);

        if ($xml === false) {
            // Invalid SVG
            wp_die('Invalid SVG file.');
        }
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'sanitize_svg', 10, 5);