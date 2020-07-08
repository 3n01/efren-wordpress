<?php
 function load_stylesheets(){

    wp_register_style( "bootstrap", get_template_directory_uri() . '/css/bootstrap.min.css', 
     array(),false,'all');
     wp_enqueue_style( 'bootstrap');

    wp_register_style( "style", get_template_directory_uri() . '/style.css', 
    array(),false,'all');
    wp_enqueue_style( 'style'); 
 }
 add_action( 'wp_enqueue_scripts', 'load_stylesheets' );



 function load_jquery(){
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() .'/js/jquery.js','',1 ,true);
    add_action( 'wp_enqueue_scripts', 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'load_jquery' );


 function loadjs(){
    wp_register_script( 'customjs', get_template_directory_uri() . '/js/scripts.js', '',1, true );
    wp_enqueue_script( 'customjs' );
}

add_action( 'wp_enqueue_scripts', 'loadjs');

add_theme_support('menus' );


register_nav_menus( 
    array(
        'top-menu' => __('Top Menu','theme'),
        'footer-menu'=> __('Footer Menu', 'theme')
    )
);


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


function loadjsbootstrap(){
    wp_register_script( 'jsbootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', '',1, true );
    wp_enqueue_script( 'jsbootstrap' );
}
add_action( 'wp_enqueue_scripts', 'loadjsbootstrap' );

?>