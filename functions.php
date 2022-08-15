<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blocksite102
 * @since 1.0.0
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */
define( 'BLOCKSITE102_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Add theme support.
 */
function blocksite102_setup() {
	
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_editor_style( array('./assets/css/style-shared.min.css','./assets/css/ash-custom.css') );

	/*
	 * Load additional block styles.
	 * See details on how to add more styles in the readme.txt.
	 */
	$styled_blocks = [ 'button', 'file', 'quote', 'search' ];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "blocksite102-$block_name",
			'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.min.css" ),
			'path'   => get_theme_file_path( "assets/css/blocks/$block_name.min.css" ),
		);
		// Replace the "core" prefix if you are styling blocks from plugins.
		wp_enqueue_block_style( "core/$block_name", $args );
	}
}
add_action( 'after_setup_theme', 'blocksite102_setup' );

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function blocksite102_styles() {
	wp_enqueue_style(
		'blocksite102-style',
		get_stylesheet_uri(),
		[],
		BLOCKSITE102_VERSION
	);
	wp_enqueue_style(
		'blocksite102-shared-styles',
		get_theme_file_uri( 'assets/css/style-shared.min.css' ),
		[],
		BLOCKSITE102_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'blocksite102_styles' );

// Block style examples.
require_once get_theme_file_path( 'inc/register-block-styles.php' );

// Block pattern helper for the privacy policy.
require_once get_theme_file_path( 'inc/block-pattern-helper.php' );


function bannerBlock() {
	wp_register_script('bannerBlockScript', get_stylesheet_directory_uri() . '/build/banner.js', array('wp-blocks', 'wp-editor'));
	register_block_type("ourblocktheme/banner", array(
	  'editor_script' => 'bannerBlockScript'
	));
  }
  
  add_action('init', 'bannerBlock');
