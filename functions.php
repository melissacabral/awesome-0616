<?php
//The functions file is used for:
//Activating sleeping WP features
//Building custom functionality
//and more!

//required for auto embeds
if ( ! isset( $content_width ) ) $content_width = 700;

add_theme_support( 'post-thumbnails' );
//allows you to style different kinds of posts
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'audio', 'video', 
	'chat', 'status', 'link', 'quote' ) );

//wakes up appearance > customize > background image
add_theme_support('custom-background' );

//appearance > customize > header
add_theme_support('custom-header', array(
		'width' => 1000,
		'height' => 200,
	) );

add_theme_support( 'custom-logo', array(
		'width' => 250,
		'height' => 80,
	) );

add_theme_support( 'automatic-feed-links' );

//improve the markup for search form, comment form, galleries, etc
add_theme_support( 'html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

//remove <title> from header.php. it will be auto-generated in an SEO friendly way
add_theme_support('title-tag');


//add a custom image size
add_image_size( 'banner', 1045, 300, 1 );

/**
 * Add two menu areas to the theme
 * @since  0.1
 * @author  melissa <mcabral@platt.edu>
 * @see   https://codex.wordpress.org/Navigation_Menus
 * @todo Make this more awesome
 */
add_action( 'init', 'awesome_menus' );
function awesome_menus(){
	register_nav_menus( array(
		'main_nav' 	=> 'Main Menu Area',
		'utilities' => 'Utility Area',
	) );
}

/**
 * Register multiple widget areas (AKA dynamic sidebars)
 */
add_action( 'widgets_init', 'awesome_widget_areas' );
function awesome_widget_areas(){
	register_sidebar( array(
		'name' 			=> 'Blog Sidebar',
		'id'			=> 'blog-sidebar',
		'description' 	=> 'Appears alongside the blog and archives',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Page Sidebar',
		'id'			=> 'page-sidebar',
		'description' 	=> 'Appears alongside static pages',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Front Page Area',
		'id'			=> 'front-page-area',
		'description' 	=> 'Appears only on the front page',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name' 			=> 'Footer Area',
		'id'			=> 'footer-area',
		'description' 	=> 'Appears at the bottom of everything',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );

}

/**
 * Enhanced comment form display
 */
add_action( 'wp_enqueue_scripts', 'awesome_comment_reply' );
function awesome_comment_reply(){
	wp_enqueue_script('comment-reply');
}



//no close PHP