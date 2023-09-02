<?php

add_action('wp_ajax_tripfilter', 'nomad_filter_function');
add_action('wp_ajax_nopriv_tripfilter', 'nomad_filter_function');

function nomad_filter_function(){

    if(isset( $_POST['categoryfilter'] ) ):
        $args = array('post_type' => 'trip', 'tax_query' => array(array(
            'taxonomy' => 'trip_cat',
            'field' => 'id',
            'terms' => $_POST['categoryfilter']))
        );
    endif;

    global $wp_query;

    query_posts( $args );

    if( have_posts() ) :
        ob_start();
        while( have_posts() ): the_post();
            get_template_part( 'template-parts/content', 'trip');
        endwhile;
        $post_html = ob_get_contents(); // we pass the posts to varible
        ob_end_clean(); // clear the buffer

    else :
        $posts_html = '<p>Nothig found for your criteria.</p>';
    endif;
    echo json_encode( array(
        'content' => $posts_html,
    ));
    die();

}