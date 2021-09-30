<?php

function devwp_theme_support(){
    add_theme_support("title-tag");
    add_theme_support("custom-logo");
}

add_action('after_setup_theme','devwp_theme_support');

function devwp_menus(){

    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );
    register_nav_menus( $locations );
}
add_action("init","devwp_menus");

// Add cs files
function devwp_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('devwp-custom', get_template_directory_uri() . "/style.css", array('devwp-bootstrap'), $version, 'all');
    wp_enqueue_style('devwp-bootstrap',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" , array(), '1.0', 'all');
    wp_enqueue_style('devwp-font-awesome', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '1.0', 'all');
}

add_action( 'wp_enqueue_scripts', 'devwp_register_styles');

// Add js files
function devwp_register_scripts(){

    wp_enqueue_script('devwp-jquery',"https://code.jquery.com/jquery-3.4.1.slim.min.js", array() , "3.4.1", true  );
    wp_enqueue_script('devwp-popper',"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "1.16.0", true   );
    wp_enqueue_script('devwp-bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array() ,"4.4.1" , true  );
    wp_enqueue_script('devwp-main',get_template_directory_uri( )."/assets/js/main.js", array() , "1.0 ",  true );
}

add_action( 'wp_enqueue_scripts', 'devwp_register_scripts');

add_filter( 'comments_number', 'wporg_com_num', 10, 2 );
function wporg_com_num ( $out, $num ) { // Two parameter as in filter described
    if ( 0 === $num ) {
        $out = '0 Comments'; // If No comments
    } elseif ( 1 === $num ) {
        $out = '1 Comment'; // If 1 comment
    } else {
        $out = $num . ' Comments'; // More than 1 comment
    }

    return $out;
}





?>
