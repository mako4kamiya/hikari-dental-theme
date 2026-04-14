<?php
	if ( ! function_exists( 'HikariDentalTheme_setup' ) ) :
		function HikariDentalTheme_setup() {
			
			add_theme_support( 'title-tag' );
			add_theme_support( 'custom-logo' );
			add_theme_support( 'post-thumbnails' );

			register_nav_menus( array(
				'header-menu'   => __( 'Header Menu', 'HikariDentalTheme' ),
				'footer-menu' => __( 'Footer Menu', 'HikariDentalTheme' ),
			) );
		}
	endif;
	add_action( 'after_setup_theme', 'HikariDentalTheme_setup' );

	if ( ! function_exists( 'my_split_styles' ) ) :
		function my_split_styles() {
			wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');
			wp_enqueue_style('header-style', get_template_directory_uri() . '/assets/css/header.css');
			wp_enqueue_style('front-page-style', get_template_directory_uri() . '/assets/css/front-page.css');
			wp_enqueue_style('Libre Baskerville', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400..700;1,400..700&display=swap');
		}
	endif;
	add_action('wp_enqueue_scripts', 'my_split_styles');

	if ( ! function_exists( 'my_theme_add_preconnect' ) ) :
		function my_theme_add_preconnect() {
			echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
			echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
		}
	endif;
	add_action('wp_head', 'my_theme_add_preconnect');

?>