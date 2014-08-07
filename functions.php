<?php

// Required file
require_once( get_template_directory() . '/lib/init.php' );

// Child theme support
add_theme_support( 'html5' );
add_theme_support( 'genesis-responsive-viewport' );
add_theme_support( 'genesis-footer-widgets', 3 );
add_theme_support( 'custom-background' );

// Remove Title & Description
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

//* Register after post widget area
genesis_register_sidebar( array(
	'id'            => 'home-slider',
	'name'          => __( 'Slider', 'clt' ),
	'description'   => __( 'This is a widget area that can be placed after the post', 'clt' ),
) );

//* Hook before post on home area
add_action( 'genesis_before_entry', 'slider_post_widget' );
	function slider_post_widget() {
	if ( is_front_page() )
		genesis_widget_area( 'home-slider', array(
			'before' => '<div class="home-slider">',
			'after' => '</div>',
	) );
}

//Custom header image
function collaborative_leadership_team_logo() {
	$link = get_bloginfo('url');
	$image = get_stylesheet_directory_uri() .'/images/logo.jpg';
	$alt = get_bloginfo('name');

	echo '<a href=" '.$link.'" title="'.$alt.'"><img src="'.$image.'" alt="'.$alt.'" class="logo"/>';
}
add_action( 'genesis_header', 'collaborative_leadership_team_logo' );

// Recent post hook on homepage
genesis_register_sidebar( array(
	'id'            => 'home-recent-posts',
	'name'          => __( 'Home Recent Posts', 'clt' ),
	'description'   => __( 'This is a widget area that can be placed after the post for recent post', 'clt' ),
) );

add_action( 'genesis_entry_footer', 'home_recent_posts_widget' );
	function home_recent_posts_widget() {
	if ( is_front_page() )
		genesis_widget_area( 'home-recent-posts', array(
			'before' => '<div class="home-recent-posts">',
			'after' => '</div>',
	) );
}

// Menu.js
add_action( 'wp_enqueue_scripts', 'clt_enqueue_scripts' );
function clt_enqueue_scripts() { 
	wp_enqueue_script( 'clt-responsive-menu', get_stylesheet_directory_uri() . '/lib/js/menu.js', array( 'jquery' ), '1.0.0', true ); 
}

// Home
genesis_register_sidebar( array(
	'id'          => 'home-sliders',
	'name'        => __( 'Home - Sliders', 'clt' ),
	'description' => __( 'This is the slider section on the home page.', 'clt' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-upcoming',
	'name'        => __( 'Home - Upcoming', 'executive' ),
	'description' => __( 'This is the Upcoming section of the home page.', 'clt' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-about',
	'name'        => __( 'Home - About', 'clt' ),
	'description' => __( 'This is the call to action section on the home page.', 'clt' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-left',
	'name'        => __( 'Home - Left', 'clt' ),
	'description' => __( 'This is the left section of the home page.', 'clt' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-right',
	'name'        => __( 'Home - Right', 'clt' ),
	'description' => __( 'This is the right section of the home page.', 'clt' ),
) );


// Dont add code after the closing php tag below
?>