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
	// 管理画面の表示
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
	// 情報の登録
	function clinic_register_settings() {
		// クリニック基本情報
		add_settings_section(
			'clinic_info_section',
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
			'clinic_hours_am' => '午前の診療時間',
			'clinic_hours_pm' => '午後の診療時間',
			'clinic_hours_other' => 'その他の診療時間（△）',
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
				'clinic_info_section'
			);
			register_setting( 'register_clinic_info', $id );
		}


		// 各曜日ごとの診療の有無
		add_settings_section(
			'clinic_weekly_hours_section',
			'各曜日ごとの診療の有無',
			function() {
				$clinic_hours_other = get_option( 'clinic_hours_other' );
				$other_time = $clinic_hours_other ? 'その他の診療時間（'. $clinic_hours_other. '）' : 'その他の診療時間' ;
				echo '<p>-：診療なし、○：診療あり、△：'. $other_time .'</p>';
			},
			'clinic-info'
		);
		$config = array(
			'times' => ['am' => get_option( 'clinic_hours_am') ?: '午前', 'pm' => get_option( 'clinic_hours_pm') ?: '午後'],
			'days'  => ['mon' => '月', 'tue' => '火', 'wed' => '水', 'thu' => '木', 'fri' => '金', 'sat' => '土', 'sun' => '日', 'holiday' => '祝'],
		);
		add_settings_field(
			'clinic_weekly_hours_field',
			'診療時間',
			'clinic_weekly_hours_table_html',
			'clinic-info',
			'clinic_weekly_hours_section',
			$config
		);
		foreach ( $config['times'] as $t_key => $t_label ) {
			foreach ( $config['days'] as $d_key => $d_label ) {
				register_setting( 'register_clinic_info', "clinic_hours_{$d_key}_{$t_key}" );
			}
		}
		function clinic_weekly_hours_table_html( $args ) {
			$days = $args['days'];
			$times = $args['times'];
			$options_list = ['-', '○', '△'];
			?>
			<style>
				table.clinic-hours { border-collapse: collapse; }
				table.clinic-hours th, table.clinic-hours td { border: 1px solid #ccc; text-align: center; align-content: center; padding: 5px; }
			</style>
			<table class="clinic-hours">
				<thead>
					<tr>
						<th>診療時間</th>
						<?php foreach( $days as $d_key => $d_label ) : ?>
						<td><?php echo esc_attr( $d_label ) ?></td>
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach( $times as $t_key => $t_label ) : ?>
					<tr>
						<th><?php echo esc_attr( $t_label ) ?></th>
						<?php foreach( $days as $d_key => $d_label ) : ?>
						<?php
							$id = "clinic_hours_{$d_key}_{$t_key}";
							$current_val = get_option( $id, '-' ); 
						?>
						<td>
							<select name="<?php echo esc_attr( $id ) ?>">
								<?php foreach( $options_list as $option ) : ?>
								<option value="<?php echo esc_attr( $option ) ?>" <?php selected( $current_val, $option ); ?>>
									<?php echo esc_attr( $option ) ?>
								</option>
								<?php endforeach; ?>
							</select>
						</td>
						<?php endforeach; ?>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php
		}
	}
	add_action('admin_init', 'clinic_register_settings');
?>