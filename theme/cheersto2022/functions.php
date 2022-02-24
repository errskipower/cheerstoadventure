<?php

if ( ! function_exists( 'emptytheme_support' ) ) :
	function emptytheme_support()  {

		// Add default posts and comments RSS feed links to <head>.
    add_theme_support( 'automatic-feed-links' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );
		// Enable support for post thumbnails and featured images.
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}
	add_action( 'after_setup_theme', 'emptytheme_support' );
endif;

/**
 * Enqueue scripts and styles.
 */
function emptytheme_scripts() {
	// Enqueue theme stylesheet.
	wp_enqueue_style( 'emptytheme-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'emptytheme_scripts' );
