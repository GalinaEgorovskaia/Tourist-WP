<?php
/**
 * NomadTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NomadTheme
 */

require get_template_directory() . '/inc/crb-options.php';

require get_template_directory() . '/inc/theme-options.php';

require get_template_directory() . '/inc/nomad-widgets.php';

require get_template_directory() . '/inc/nomadtheme-style.php';

require get_template_directory() . '/inc/nomadtheme-scripts.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/nomad-post-and-tax.php';

require get_template_directory() . '/inc/ajax-filters.php';

add_filter('get_the_archive_title', 'change_archive_trip_title');
function change_archive_trip_title( $title ){
	if( is_post_type_archive('trip')){
		return post_type_archive_title('', false);
	}
	else{
		return $title;
	}
}