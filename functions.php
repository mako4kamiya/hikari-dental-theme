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
				'company_map'     => 'Googleマップ埋め込みコード',
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

	if ( ! function_exists( 'my_clinic_hours_setting' ) ) :
    function my_clinic_hours_setting() {
        add_settings_section(
            'clinic_hours_section',
            '診療時間表の設定',
            '',
            'general'
        );

        add_settings_field(
            'clinic_hours_table_field',
            '診療時間',
            'render_clinic_hours_table',
            'general',
            'clinic_hours_section'
        );

		register_setting( 'general', 'clinic_am_label' );
		register_setting( 'general', 'clinic_pm_label' );

        $days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
        $times = ['am', 'pm'];
        foreach ( $days as $d ) {
            foreach ( $times as $t ) {
                register_setting( 'general', "clinic_{$d}_{$t}" );
            }
        }
    }
	endif;

	/**
	 * 管理画面にテーブル形式の入力欄を表示する
	 */
	function render_clinic_hours_table() {
		$days = ['mon' => '月', 'tue' => '火', 'wed' => '水', 'thu' => '木', 'fri' => '金', 'sat' => '土', 'sun' => '日'];
		$choices = ['○' => '○ (診療)', '×' => '× (休診)', '△' => '△(備考)'];
		$times = ['am' => '9:00～13:00','pm' => '15:00～19:00'];
    ?>
    <style>
        .admin-clinic-table { border-collapse: collapse; text-align: center; }
        .admin-clinic-table th, .admin-clinic-table td { border: 1px solid #ccc; padding: 8px; }
        .admin-clinic-table th { background: #f0f0f0; text-align: center;}
        .time-label-input { width: 150px; text-align: center; font-weight: bold; }
    </style>

    <table class="admin-clinic-table">
        <thead>
            <tr>
                <th>診療時間</th>
                <?php foreach ( $days as $label ) echo "<th>{$label}</th>"; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $times as $t_id => $default_label ) : 
                $label_option_id = "clinic_{$t_id}_label";
                $current_label = get_option( $label_option_id, $default_label );
            ?>
                <tr>
                    <td>
                        <input type="text" 
                               name="<?php echo esc_attr( $label_option_id ); ?>" 
                               value="<?php echo esc_attr( $current_label ); ?>" 
                               class="time-label-input" 
                               placeholder="例：9:00〜13:00">
                    </td>
                    <?php foreach ( $days as $d_id => $d_label ) : 
                        $option_id = "clinic_{$d_id}_{$t_id}";
                        $current_val = get_option( $option_id, '○' );
                    ?>
                        <td>
                            <select name="<?php echo esc_attr( $option_id ); ?>">
                                <?php foreach ( $choices as $v => $c_label ) : ?>
                                    <option value="<?php echo esc_attr($v); ?>" <?php selected($current_val, $v); ?>>
                                        <?php echo esc_html($c_label); ?>
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
	add_action( 'admin_init', 'my_clinic_hours_setting' );
?>