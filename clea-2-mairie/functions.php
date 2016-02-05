<?php
/**
 * 
 * this file is designed to provide specific functions for the child theme
 *
 * @package    clea-2-mairie
 * @subpackage Functions
 * @version    0.1.0
 * @since      0.1.0
 * @author     Anne-Laure Delpech <ald.kerity@gmail.com>  
 * @copyright  Copyright (c) 2015 Anne-Laure Delpech
 * @link       
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


// Do theme setup on the 'after_setup_theme' hook.
add_action( 'after_setup_theme', 'clea_mairie_theme_setup', 11 ); 

// Remove cleaner-gallery css. Necessary for jetpack gallery.
add_action( 'wp_enqueue_scripts', 'clea_mairie_remove_cleaner_gallery', 99 );


// Get the child template directory and make sure it has a trailing slash.
$child_dir = trailingslashit( get_stylesheet_directory() );
require_once( $child_dir . 'inc/setup.php' );



function clea_mairie_theme_setup() {

	/* Register and load scripts. */
	add_action( 'wp_enqueue_scripts', 'clea_mairie_enqueue_scripts' );

	/* Register and load styles. */
	add_action( 'wp_enqueue_scripts', 'clea_mairie_enqueue_styles', 4 ); 

	/* Set content width. */
	hybrid_set_content_width( 700 );	
	
	// add theme support for WordPress featured image and post thumbnails
	add_theme_support( 'featured-header' );
	add_theme_support( 'post-thumbnails' ); 

	// Add support for the Site Logo plugin and the site logo functionality in JetPack
	// https://github.com/automattic/site-logo
	// http://jetpack.me/
	add_theme_support( 'site-logo', array( 'size' => 'medium' ) );
	
}
 

function clea_mairie_remove_cleaner_gallery() {
	// necessary if using jetpack gallery
	// source http://themehybrid.com/board/topics/loads-gallery-min-css-twice
	wp_dequeue_style( 'gallery' );	
}


	
 
function clea_mairie_enqueue_styles() {

	// feuille de style pour l'impression
	wp_enqueue_style( 'print', get_stylesheet_directory_uri() . '/css/print.css', array(), false, 'print' );

	// feuille de style pour le co-marquage service public.fr
	wp_enqueue_style( 'co-marquage', get_stylesheet_directory_uri() . '/css/co-marquage.css', array(), false, 'all' );

}

function clea_mairie_enqueue_scripts() {

	
	if ( is_page_template( 'page/cb-front-page-test1.php' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}
}

?>