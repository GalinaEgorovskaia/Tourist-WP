<?php

/**
 * Enqueue scripts.
 */
function nomadtheme_scripts() {

	//wp_style_add_data( 'nomadtheme-style', 'rtl', 'replace' );

	//wp_enqueue_script( 'nomadtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'nomadtheme-js', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script( 'nomadtheme-ajax', get_template_directory_uri() . '/assets/js/ajax-filter.js');

	global $wp_query;
	wp_localize_script( 'nomadtheme-ajax', 'nomadtheme_ajax_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => json_encode($wp_query->query_vars),
		'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
		'max_page' => $wp_query->max_num_pages
	));

	if( is_post_type_archive( 'trip' )){
		wp_enqueue_script( 'nomadtheme-ajax');
	}

}
add_action( 'wp_enqueue_scripts', 'nomadtheme_scripts' );