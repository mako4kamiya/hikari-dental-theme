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

	if ( ! function_exists( 'my_enqueue_assets' ) ) :
		function my_enqueue_assets() {
			wp_enqueue_script('header-script', get_theme_file_uri('/assets/js/header.js'), array(), null, array('strategy' => 'defer', 'in_footer' => true));
			wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/main.css'), array(), filemtime(get_theme_file_path('/assets/css/main.css')));
			wp_enqueue_style('header-style', get_theme_file_uri('/assets/css/header.css'), array(), filemtime(get_theme_file_path('/assets/css/header.css')));
			wp_enqueue_style('front-page-style', get_theme_file_uri('/assets/css/front-page.css'), array(), filemtime(get_theme_file_path('/assets/css/front-page.css')));
			wp_enqueue_style('Libre Baskerville', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400..700;1,400..700&display=swap', array(), null);
		}
	endif;
	add_action('wp_enqueue_scripts', 'my_enqueue_assets');

	if ( ! function_exists( 'my_theme_add_preconnect' ) ) :
		function my_theme_add_preconnect() {
			echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
			echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
		}
	endif;
	add_action('wp_head', 'my_theme_add_preconnect');

	if ( ! function_exists( 'my_clinic_info' ) ) :
		function my_clinic_info() {
			add_settings_section(
				'clinic_info_section',
				'クリニック基本情報',
				'',
				'general'
			);
			$fields = [
				'clinic_postal_code' => '郵便番号',
				'clinic_address'     => '住所',
				'clinic_nearest_station' => '最寄り駅',
				'clinic_tel'         => '電話番号',
				'clinic_email'       => 'メールアドレス',
			];
			foreach ( $fields as $id => $label ) {
				add_settings_field(
					$id,
					$label,
					function() use ( $id ) {
						$value = get_option( $id );
						echo '<input type="text" id="' . esc_attr( $id ) . '" name="' . esc_attr( $id ) . '" value="' . esc_attr( $value ) . '" class="regular-text">';
					},
					'general',
					'clinic_info_section'
				);
				register_setting( 'general', $id );
			}
			
		}
	endif;
	add_action('admin_init', 'my_clinic_info');

?>