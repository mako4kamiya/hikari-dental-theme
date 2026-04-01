<?php
	if ( ! function_exists( 'HikariDentalTheme_setup' ) ) :
		function HikariDentalTheme_setup() {
			
			/** tag-title **/
			add_theme_support( 'title-tag' );

			/** post thumbnail **/
			add_theme_support( 'post-thumbnails' );

			/**
			 * Add support for two custom navigation menus.
			 */
			register_nav_menus( array(
				'header-menu'   => __( 'Header Menu', 'HikariDentalTheme' ),
				'footer-menu' => __( 'Footer Menu', 'HikariDentalTheme' ),
			) );
		}
	endif;
	add_action( 'after_setup_theme', 'HikariDentalTheme_setup' );
?>