<?php

add_action( 'genesis_meta', 'clt_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function clt_home_genesis_meta() {

	if ( is_active_sidebar( 'home-sliders' ) || is_active_sidebar( 'home-upcoming' ) || is_active_sidebar( 'home-started' ) || is_active_sidebar( 'home-about' ) || is_active_sidebar( 'home-left' ) || is_active_sidebar( 'home-right' ) ) {

		remove_action( 'genesis_loop', 'genesis_do_loop' );
		remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
		add_action( 'genesis_loop', 'clt_home_sections' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		add_filter( 'body_class', 'clt_add_home_body_class' );

	}
	
}

function clt_home_sections() {

	genesis_widget_area( 'home-sliders', array(
		'before' => '<div class="home-slider widget-area">',
		'after'  => '</div>',
	) );

	genesis_widget_area( 'home-upcoming', array(
		'before' => '<div class="home-upcoming widget-area">',
		'after'  => '</div>',
	) );

	genesis_widget_area( 'home-started', array(
		'before' => '<div class="home-started widget-area">',
		'after'  => '</div>',
	) );

	genesis_widget_area( 'home-about', array(
		'before' => '<div class="home-about widget-area">',
		'after'  => '</div>',
	) );
	genesis_widget_area( 'home-left', array(
		'before' => '<div class="home-left widget-area">',
		'after'  => '</div>',
	) );
	genesis_widget_area( 'home-right', array(
		'before' => '<div class="home-right widget-area">',
		'after'  => '</div>',
	) );
	
}

//* Add body class to home page		
function clt_add_home_body_class( $classes ) {

	$classes[] = 'clt-pro-home';
	return $classes;
	
}

genesis();