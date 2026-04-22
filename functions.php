<?php
	/**
	 * テーマの基本設定
	 */
	function HikariDentalTheme_setup() {
		
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'header-menu'   => __( 'Header Menu', 'HikariDentalTheme' ),
			'footer-menu' => __( 'Footer Menu', 'HikariDentalTheme' ),
		) );
	}
	add_action( 'after_setup_theme', 'HikariDentalTheme_setup' );

	/**
	 * CSS・JavaScriptの読み込み設定
	 */
	function my_enqueue_assets() {
		wp_enqueue_script('header-script', get_theme_file_uri('/assets/js/header.js'), array(), null, array('strategy' => 'defer', 'in_footer' => true));
		wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/main.css'), array(), filemtime(get_theme_file_path('/assets/css/main.css')));
		wp_enqueue_style('header-style', get_theme_file_uri('/assets/css/header.css'), array(), filemtime(get_theme_file_path('/assets/css/header.css')));
		wp_enqueue_style('front-page-style', get_theme_file_uri('/assets/css/front-page.css'), array(), filemtime(get_theme_file_path('/assets/css/front-page.css')));
		wp_enqueue_style('Libre Baskerville', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400..700;1,400..700&display=swap', array(), null);
	}
	add_action('wp_enqueue_scripts', 'my_enqueue_assets');

	/**
	 * <head>タグ内へのカスタムコード挿入
	 * Google Fontsなどの外部リソースを読み込むためのタグをhead内に出力します。
	 */
	function my_theme_add_preconnect() {
		echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
		echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
	}
	add_action('wp_head', 'my_theme_add_preconnect');

	/**
	 * 管理画面のメニュー追加
	 */
	function my_clinic_info() {
		add_options_page(
			'クリニック基本情報',
			'クリニック基本情報',
			'manage_options',
			'clinic-info',
			'clinic_settings_page_html'
			);
	}
	add_action('admin_menu', 'my_clinic_info');

	function clinic_register_settings() {
		add_settings_section(
			'clinic_info_sections',
			'クリニック基本情報',
			'',
			'clinic-info'
		);
		$fields = [
			'clinic_postal_code' => '郵便番号',
			'clinic_address'     => '住所',
			'clinic_nearest_station' => '最寄り駅',
			'clinic_tel'         => '電話番号',
			'clinic_email'       => 'メールアドレス',
			'clinic_map'     => 'Googleマップ埋め込みコード',
		];
		foreach ( $fields as $id => $label ) {
			add_settings_field(
				$id,
				$label,
				function() use ( $id ) {
					$value = get_option( $id );
					echo '<input type="text" id="' . esc_attr( $id ) . '" name="' . esc_attr( $id ) . '" value="' . esc_attr( $value ) . '" class="regular-text">';
				},
				'clinic-info',
				'clinic_info_sections'
			);
			register_setting( 'register_clinic_info', $id );
		}
		
	}
	add_action('admin_init', 'clinic_register_settings');
	
	function clinic_settings_page_html() {
		?>
		<div class="wrap">
			<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
			<form action="options.php" method="post">
				<?php
				settings_fields('register_clinic_info'); // 保存の許可
				do_settings_sections('clinic-info'); // 画面の表示
				submit_button();
				?>
			</form>
		</div>
		<?php
	}
?>