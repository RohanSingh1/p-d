<?php
/**
 * Includes all hooks
 */

 

/**
 * Load admin CSS for styling the Blocks
 *
 * @return void
 */
add_action( 'admin_enqueue_scripts', 'pd_load_admin_style' );
function pd_load_admin_style() {
	wp_enqueue_style( 'custom-dashboard', get_stylesheet_directory_uri() . '/assets/css/admin-dashboard.css', array(), time(), 'all' );
}


/**
 * Create local files for acf fields
 * Whenever settings are updated, files in this folder will be updated
 */
function pd_json_save_point( $path ) {
    return get_stylesheet_directory() . '/inc/acf-options';
}
add_filter( 'acf/settings/save_json', 'pd_json_save_point' );

function pd_acf_json_filename( $filename, $post, $load_path ) {
    $filename = str_replace(
        array(
            ' ',
            '_',
        ),
        array(
            '-',
            '-'
        ),
        $post['title']
    );

    $filename = strtolower( $filename ) . '.json';

    return $filename;
}
add_filter( 'acf/json/save_file_name', 'pd_acf_json_filename', 10, 3 );


add_action('template_redirect', function() {
    if (is_search() && !is_admin()) {
        wp_redirect(home_url());
        exit;
    }
});