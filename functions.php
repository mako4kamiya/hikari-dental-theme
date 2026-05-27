<?php
/**
 * テーマの機能追加・カスタマイズ
 *
 * INDEX:
 * 01. スクリプトとCSSの読み込み (Enqueues)
 * 02. テーマサポート設定 (Theme Supports)
 * 03. 管理画面のカスタマイズ (Admin Customizes)
 * 04. カスタム投稿タイプの追加 (Custom Post Types)
 * 05. ショートコードの追加 (Shortcodes)
 * 06. ページに応じたテキストの取得 (Dynamic Texts)
 * 07. その他のカスタマイズ (Other Customizes)
 */





/* ==========================================================================
   01. スクリプトとCSSの読み込み (Enqueues)
   ========================================================================== */
function my_enqueue_assets() {
	/* --------------------------------------------------------------------------
	* JSの読み込み
	* ----------------------------------------------------------------------- */
	wp_enqueue_script('splide-script', get_theme_file_uri('/assets/js/splide.js'), array('splide-script-cdn'), filemtime(get_theme_file_path('/assets/js/splide.js')), array('strategy' => 'defer', 'in_footer' => true));
	wp_enqueue_script('splide-script-cdn', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), '4.1.4', true);
	wp_enqueue_script('header-script', get_theme_file_uri('/assets/js/header.js'), array(), filemtime(get_theme_file_path('/assets/js/header.js')), array('strategy' => 'defer', 'in_footer' => true));
	wp_enqueue_script('sp-menu-script', get_theme_file_uri('/assets/js/sp-menu.js'), array(), filemtime(get_theme_file_path('/assets/js/sp-menu.js')), array('strategy' => 'defer', 'in_footer' => true));

	/* --------------------------------------------------------------------------
	* CSSの読み込み
	* ----------------------------------------------------------------------- */
	wp_enqueue_style('splide-style-cdn', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), '4.1.4');
	wp_enqueue_style('header-style', get_theme_file_uri('/assets/css/header.css'), array(), filemtime(get_theme_file_path('/assets/css/header.css')));
	wp_enqueue_style('footer-style', get_theme_file_uri('/assets/css/footer.css'), array(), filemtime(get_theme_file_path('/assets/css/footer.css')));
	wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/main.css'), array(), filemtime(get_theme_file_path('/assets/css/main.css')));
	wp_enqueue_style('front-page-style', get_theme_file_uri('/assets/css/front-page.css'), array(), filemtime(get_theme_file_path('/assets/css/front-page.css')));
	wp_enqueue_style('page-style', get_theme_file_uri('/assets/css/page.css'), array(), filemtime(get_theme_file_path('/assets/css/page.css')));
	wp_enqueue_style('category-style', get_theme_file_uri('/assets/css/category.css'), array(), filemtime(get_theme_file_path('/assets/css/category.css')));
	wp_enqueue_style('archive-style', get_theme_file_uri('/assets/css/archive.css'), array(), filemtime(get_theme_file_path('/assets/css/archive.css')));
	wp_enqueue_style('single-style', get_theme_file_uri('/assets/css/single.css'), array(), filemtime(get_theme_file_path('/assets/css/single.css')));
	wp_enqueue_style('Libre Baskerville', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400..700;1,400..700&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'my_enqueue_assets');

/* --------------------------------------------------------------------------
 * フォントの事前接続
 * ----------------------------------------------------------------------- */
function my_theme_add_preconnect() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action('wp_head', 'my_theme_add_preconnect');









/* ==========================================================================
   02. テーマサポート設定 (Theme Supports)
   ========================================================================== */
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









/* ==========================================================================
   03. 管理画面のカスタマイズ (Admin Customizes)
   ========================================================================== */

/* --------------------------------------------------------------------------
 * クリニック基本情報の管理画面を追加
 * ----------------------------------------------------------------------- */
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

/* --------------------------------------------------------------------------
 * クリニック基本情報の管理画面の内容
 * ----------------------------------------------------------------------- */
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

/* --------------------------------------------------------------------------
 * クリニック基本情報の設定項目の登録
 * ----------------------------------------------------------------------- */
function clinic_register_settings() {
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
			echo '<p>／：診療なし、◯：診療あり、△：'. $other_time .'</p>';
		},
		'clinic-info'
	);
	add_settings_field(
		'clinic_weekly_hours_field',
		'診療時間',
		'clinic_weekly_hours_table_html',
		'clinic-info',
		'clinic_weekly_hours_section'
	);
	register_setting( 'register_clinic_info', 'clinic_hours' );

	// 診療時間の選択肢を表示するHTML
	function clinic_weekly_hours_table_html() {
		$current_data = get_option( 'clinic_hours', [] );
		$days = ['mon' => '月', 'tue' => '火', 'wed' => '水', 'thu' => '木', 'fri' => '金', 'sat' => '土', 'sun' => '日', 'hol' => '祝'];
		$times = ['am' => '午前', 'pm' => '午後'];
		$options_list = ['／', '◯', '△'];
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
					<th><?php echo esc_attr( $d_label ) ?></th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $times as $t_key => $t_label ) : ?>
				<tr>
					<th><?php echo esc_attr( $t_label ) ?></th>
					<?php foreach( $days as $d_key => $d_label ) : ?>
					<?php
						$current_val = $current_data[$t_key][$d_key] ?? '／';
						$name_attr = "clinic_hours[{$t_key}][{$d_key}]";
					?>
					<td>
						<select name="<?php echo esc_attr( $name_attr ) ?>">
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









/* ==========================================================================
   04. カスタム投稿タイプの追加 (Custom Post Types)
   ========================================================================== */

/* --------------------------------------------------------------------------
* 診療内容のカスタム投稿タイプを追加
* ----------------------------------------------------------------------- */
function create_post_type_information() {
	register_post_type( 'information',
		array(
			'labels' => array(
				'name'          => '診療内容',
				'singular_name' => '診療内容',
				'add_new_item'	=> '診療内容を追加',
				'edit_item'   	=> '診療内容を編集',
				'all_items'   	=> '診療内容一覧',
				'search_items'	=> '診療内容を検索',
				'not_found'   	=> '診療内容は見つかりませんでした',
				'item_published'=> '診療内容を公開しました。',
				'item_published_privately' => '診療内容を非公開で公開しました',
				'item_reverted_to_draft'   => '診療内容を下書きに戻しました',
				'item_scheduled'           => '診療内容を予約しました',
				'item_updated'	=> '診療内容を更新しました。',
				'view_item'		=> '診療内容を表示',
				'new_item'		=> '新規診療内容',
			),
			'description' => '幅広い診療に対応し、お悩みに合わせた治療をご提案します。',
			'public'        => true,
			'has_archive'   => true,
			'menu_icon'		=> 'dashicons-info',
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'menu_position' => 5,
			'show_in_rest'  => true,  // 【重要】ブロックエディタ(Gutenberg)を有効にする
		)
	);
}
add_action( 'init', 'create_post_type_information' );

/* --------------------------------------------------------------------------
* 診療内容のカスタム投稿タイプにアイコン設定機能を追加
* ----------------------------------------------------------------------- */
// 1. アイコン定義ファイル（assets/icons.php）を読み込む
require_once get_theme_file_path('/assets/icons.php');

// 2. カスタム投稿「information」の編集画面にアイコン設定欄を追加
function add_information_icon_meta_box() {
    add_meta_box(
        'information_icon_box',
        'アイコン画像の設定',
        'render_information_icon_meta_box',
        'information',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_information_icon_meta_box');

// 3. 管理画面にアイコン画像を並べて選択（ラジオボタン）させるHTMLとCSS
function render_information_icon_meta_box($post) {
    wp_nonce_field('save_information_icon_action', 'information_icon_nonce');

    // 現在保存されているアイコンのキー名を取得
    $selected_icon = get_post_meta($post->ID, '_selected_svg_icon', true);
    $icons = get_custom_svg_icons();
    
    echo '<div class="admin-icon-selector">';

    // 未選択（アイコンなし）の選択肢
    $no_icon_checked = (empty($selected_icon)) ? 'checked' : '';
    echo '<label class="admin-icon-label no-icon">';
    echo '<input type="radio" name="selected_svg_icon" value="" ' . $no_icon_checked . ' />';
    echo '<span>なし</span>';
    echo '</label>';

    // 配列内のSVGをループして、画像付きのボタンを生成
    if ( !empty($icons) ) {
        foreach ( $icons as $key => $svg_code ) {
            $checked = ($selected_icon === $key) ? 'checked' : '';
            echo '<label class="admin-icon-label" title="' . esc_attr($key) . '">';
            echo '<input type="radio" name="selected_svg_icon" value="' . esc_attr($key) . '" ' . $checked . ' />';
            echo '<div class="admin-icon-svg-wrapper">' . $svg_code . '</div>';
            echo '</label>';
        }
    }
    echo '</div>';

    // 管理画面専用の簡易CSS（見た目を整え、選択中のものを強調する）
    ?>
    <style>
        .admin-icon-selector {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            background: #f0f0f1;
            padding: 10px;
            border-radius: 4px;
        }
        .admin-icon-label {
            position: relative;
            cursor: pointer;
            border: 2px solid #ccd0d4;
            background: #fff;
            border-radius: 4px;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            transition: all 0.15s ease-in-out;
        }
        /* ラジオボタン自体は非表示にして見栄えを良くする */
        .admin-icon-label input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        /* 「なし」ボタンのテキスト用スタイル */
        .admin-icon-label.no-icon span {
            font-size: 11px;
            color: #646970;
        }
        /* SVGアイコンのサイズと色 */
        .admin-icon-svg-wrapper svg {
            width: 24px;
            height: 24px;
            color: #2c3338;
            display: block;
        }
        /* マウスホバー時 */
        .admin-icon-label:hover {
            border-color: #2271b1;
            background: #f0f6fc;
        }
        /* 選択されている（チェックが入っている）ボタンの見た目 */
        .admin-icon-label:has(input:checked) {
            border-color: #2271b1;
            background: #f0f6fc;
            box-shadow: 0 0 0 1px #2271b1;
        }
    </style>
    <?php
}

// 4. アイコンの選択データを保存
function save_information_icon_meta_box($post_id) {
    if (!isset($_POST['information_icon_nonce']) || !wp_verify_nonce($_POST['information_icon_nonce'], 'save_information_icon_action')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['selected_svg_icon']) && $_POST['selected_svg_icon'] !== '') {
        update_post_meta($post_id, '_selected_svg_icon', sanitize_text_field($_POST['selected_svg_icon']));
    } else {
        delete_post_meta($post_id, '_selected_svg_icon');
    }
}
add_action('save_post', 'save_information_icon_meta_box');









/* ==========================================================================
   05. ショートコードの追加 (Shortcodes)
   ========================================================================== */

/* --------------------------------------------------------------------------
 * 診療時間のショートコード
 * ----------------------------------------------------------------------- */
function clinic_hours_table_html() {
	// 1. データの準備
	$days_labels = ['mon' => '月', 'tue' => '火', 'wed' => '水', 'thu' => '木', 'fri' => '金', 'sat' => '土', 'sun' => '日', 'hol' => '祝'];
	$times_labels = [
		'am' => get_option('clinic_hours_am', '午前'), 
		'pm' => get_option('clinic_hours_pm', '午後')
	];
	$clinic_hours_other = get_option('clinic_hours_other');
	$schedule_data = get_option('clinic_hours', []);

	// 2. 休診日テキストの生成ロジック
	$closed_days_list = [];
	foreach ( $days_labels as $d_key => $d_label ) {
		$am_is_closed = ( ($schedule_data['am'][$d_key] ?? '／') === '／' );
		$pm_is_closed = ( ($schedule_data['pm'][$d_key] ?? '／') === '／' );

		if ( $am_is_closed && $pm_is_closed ) {
			$closed_days_list[] = $d_label;
		} elseif ( $am_is_closed ) {
			$closed_days_list[] = $d_label . '午前';
		} elseif ( $pm_is_closed ) {
			$closed_days_list[] = $d_label . '午後';
		}
	}
	$closed_text = !empty($closed_days_list) ? '休診日：' . implode('・', $closed_days_list) : '休診日：なし';

	ob_start(); 
	?>
	<div class="clinic-table-wrapper">
		<table>
			<thead>
				<tr>
					<th class="text-style-table-header">診療時間</th>
					<?php foreach( $days_labels as $label ) : ?>
					<th class="text-style-table-header"><?php echo esc_html( $label ) ?></th>
					<?php endforeach ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $times_labels as $t_key => $t_label ) : ?>
				<tr>
					<th class="text-style-table-header"><?php echo esc_html( $t_label ) ?></th>
					<?php foreach( $days_labels as $d_key => $d_label ) : ?>
						<td class="text-style-table-body">
							<?php echo esc_html( $schedule_data[$t_key][$d_key] ?? '／' ); ?>
						</td>
					<?php endforeach ?>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		
		<div class="clinic-table-footer">
			<?php if ( !empty($clinic_hours_other) ) : ?>
				<p class="text-style-table-body">
					△・・・<?php echo esc_html($clinic_hours_other); ?>の診療となります。
				</p>
			<?php endif; ?>
			
			<p class="text-style-table-body">
				<?php echo esc_html($closed_text); ?>
			</p>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode('clinic_table', 'clinic_hours_table_html');

/* --------------------------------------------------------------------------
 * アクセスのショートコード
 * ----------------------------------------------------------------------- */
function access_html() {
	ob_start();
	get_template_part('template-parts/access'); 
	return ob_get_clean();
}
add_shortcode('access', 'access_html');










/* ==========================================================================
   06. ページに応じたテキストの取得 (Dynamic Texts)
   ========================================================================== */

/* --------------------------------------------------------------------------
 * ショルダーテキスト（小見出し）を取得する
 * ----------------------------------------------------------------------- */
function get_my_entry_shoulder() {
	if ( is_404() ) {
		return 'Page Not Found';
	}

	global $wp;
	$url_segments = explode( '/', $wp->request );
	$shoulder = !empty( $url_segments ) ? end( $url_segments ) : '';

	if ( is_single() && 'post' === get_post_type() ) {
		// 通常投稿の場合はその投稿のカテゴリーのスラッグを取得する
		$categories = get_the_category();
		$shoulder = isset( $categories ) ? $categories[0]->slug : '';
	}
	
	// ハイフンをスペースに置換し、各単語の先頭を大文字にする（例: about-us -> About Us）
	$shoulder = str_replace( '-', ' ', $shoulder );
	return ucwords( $shoulder );
}

/* --------------------------------------------------------------------------
 * メインタイトルを取得する
 * ----------------------------------------------------------------------- */
function get_my_entry_title() {
	if ( is_404() ) {
		return 'ページが見つかりません';
	} elseif ( is_category() ) {
		return single_cat_title( '', false );
	} elseif ( is_post_type_archive() ) {
		return post_type_archive_title( '', false );
	} elseif ( is_archive() ) {
		return get_the_archive_title(); 
	}
	return get_the_title();
}









/* ==========================================================================
   07. その他のカスタマイズ (Other Customizes)
   ========================================================================== */
?>