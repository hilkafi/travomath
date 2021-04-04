<?php
/*
@package travomath

========================
	ADMIN ENQUEUE FUNCTIONS
========================
*/
function travomath_load_admin_scripts( $hook ){
    $pages = array('toplevel_page_travomath_options', 'travomath_page_travomath_options_css', 'travomath_page_travomath_options_settings');
    //echo $hook;

    //Register Admin Css
    wp_register_style( 'raleway_admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
    wp_register_style( 'travomath_admin_css', get_template_directory_uri() . '/css/travomath.admin.css', array(), '1.0.0', 'all' );
    wp_register_script( 'travomath-admin-script', get_template_directory_uri() . '/js/travomath.admin.js', array('jquery'), '1.0.0', true );
    

	if( in_array( $hook, $pages ) ){
		wp_enqueue_style( 'raleway_admin' );
		wp_enqueue_style( 'travomath_admin_css' );
	} 

    if('toplevel_page_travomath_options' == $hook) { 
        wp_enqueue_media();
        wp_enqueue_script( 'travomath-admin-script' );
    }
    
    if('travomath_page_travomath_options_css') {
        wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/travomath.ace.css', array(), '1.0.0', 'all' );

        wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
        wp_enqueue_script( 'travomath-custom-css-script', get_template_directory_uri() . '/js/travomath.custom_css.js', array('jquery'), '1.0.0', true );
    }
    
}
add_action( 'admin_enqueue_scripts', 'travomath_load_admin_scripts' );


/*
========================
	FRONTEND ENQUEUE FUNCTIONS
========================
*/
function travomath_load_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bs.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'font-awesome-5', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css' );
    wp_enqueue_style( 'slick-carousel-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
    wp_enqueue_style( 'gstatic', 'https://fonts.gstatic.com' );
    wp_enqueue_style( 'google-fonts-raleway', 'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );
	wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/travomath-custom.css', array(), '1.0.0', 'all' );
    
    //custom font link from user
    $font_one = get_option( 'custom_font_one' );
    $font_two = get_option( 'custom_font_two' );
    if(!empty($font_one)){
        wp_enqueue_style( 'custom-font-one', $font_one );
    }
    if(!empty($font_two)){
        wp_enqueue_style( 'custom-font-two', $font_two );
    }

    wp_enqueue_style('webmanifest', get_template_directory_uri() . '/site.webmanifest');
    wp_enqueue_style('apple-touch-icon', get_template_directory_uri() . '/icon.png');
    
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', false, null, true );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
	wp_enqueue_script( 'slick-carousel-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
}
add_action( 'wp_enqueue_scripts', 'travomath_load_scripts' );



function travomath_add_style_attributes( $html, $handle ) {

    if ( 'font-awesome-5' === $handle ) {
        return str_replace( "media='all'", "media='all' integrity='sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==' crossorigin='anonymous'", $html );
    }

    if ( 'gstatic' === $handle ) {
        return str_replace( "rel='stylesheet'", "rel='preconnect'", $html );
    }

    if ( 'webmanifest' === $handle ) {
        return str_replace( "rel='stylesheet'", "rel='manifest'", $html );
    }

    if ( 'apple-touch-icon' === $handle ) {
        return str_replace( "rel='stylesheet'", "rel='apple-touch-icon'", $html );
    }

    return $html;
}
add_filter( 'style_loader_tag', 'travomath_add_style_attributes', 10, 2 );
