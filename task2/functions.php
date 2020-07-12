<?php

function newsbit_style(){
	wp_enqueue_style('ionicons', get_template_directory_uri() . '/fonts/ionicons.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('font','https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700');
	wp_enqueue_style('style', get_stylesheet_uri());

}

function newsbit_scripts(){
	wp_enqueue_script('jquery-3.2.1', get_template_directory_uri() . '/js/jquery-3.2.1.min.js');
	wp_enqueue_script('tether', get_template_directory_uri() . '/js/tether.min.js');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js');
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js');
}

add_action('wp_enqueue_scripts','newsbit_style');
add_action('wp_footer','newsbit_scripts');