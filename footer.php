    <footer class="light-mode">
        <div class="container">
            <div class="inner_container">
                <div class="grid-container">
                    <div class="clinic-info">
                        <div class="headings">
                            <h2 class="text-style-h2"><?php bloginfo('name'); ?></h2>
                        </div>
                        <address>
                            <p class="text-style-p-regular">
                                〒<?php echo esc_html(get_option('clinic_postal_code')); ?>
                                <?php echo esc_html(get_option('clinic_address')); ?>
                            </p>
                            <p class="text-style-p-regular">
                                <?php echo esc_html(get_option('clinic_tel')); ?>
                            </p>
                            <p class="text-style-p-regular">
                                <?php echo esc_html(get_option('clinic_email')); ?>
                            </p>
                        </address>
                    </div>
                    <div class="clinic-hours">
                        <p class="text-style-p-bold">診療時間</p>
                        <ul>
                            <?php
                            $schedule_data = get_option('clinic_hours', []);
                            $days_labels   = ['mon' => '月', 'tue' => '火', 'wed' => '水', 'thu' => '木', 'fri' => '金', 'sat' => '土', 'sun' => '日', 'hol' => '祝'];
                            $am_time       = get_option('clinic_hours_am', '9:00～13:00');
                            $pm_time       = get_option('clinic_hours_pm', '15:00～19:00');
                            $other_time    = get_option('clinic_hours_other', '15:00～18:00');

                            // 1. 曜日ごとの「診療パターン」を分類する
                            $patterns = [];
                            $closed_days = [];

                            foreach ( $days_labels as $key => $label ) {
                                $am_val = $schedule_data['am'][$key] ?? '／';
                                $pm_val = $schedule_data['pm'][$key] ?? '／';

                                if ( $am_val === '／' && $pm_val === '／' ) {
                                    $closed_days[] = $label;
                                } else {
                                    // その日の時間を組み立てる（◯なら通常、△なら特殊時間）
                                    $times = [];
                                    if ( $am_val === '◯' ) $times[] = $am_time;
                                    if ( $pm_val === '◯' ) $times[] = $pm_time;
                                    if ( $am_val === '△' || $pm_val === '△' ) $times = [$am_time, $other_time]; // △がある日のパターン
                                    
                                    $time_str = implode('、', $times);
                                    $patterns[$time_str][] = $label;
                                }
                            }

                            // 2. まとめて出力
                            foreach ( $patterns as $time_label => $days ) : ?>
                                <li class="text-style-p-regular"><?php echo implode('・', $days); ?></li>
                                <li class="text-style-p-regular"><?php echo esc_html($time_label); ?></li>
                            <?php endforeach; ?>

                            <?php if ( !empty($closed_days) ) : ?>
                                <li class="text-style-p-regular"><?php echo implode('・', $closed_days); ?>：休診</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="sitelinks">
                        <p class="text-style-p-bold"><?php bloginfo('name'); ?></p>
                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => 'footer-menu',
                                'container' => 'nav',
                                'container_class' => 'footer-nav',
                                'container_id' => 'footer-nav',
                                'menu_class' => 'footer-menu',
                                'menu_id' => 'footer-menu',
                                'fallback_cb' => false,
                                'theme_location' => 'footer-menu'
                            )
                        );
                        ?>
                    </div>
                    <div class="info">
                        <p class="text-style-p-bold">診療案内</p>
                        <ul>
                            <li class="text-style-p-regular">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">一般歯科</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">予防歯科</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">小児歯科</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">審美歯科</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホワイトニング</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <p class="text-style-p-regular">※本サイトはデジタル庁デザインシステムを参考に制作しています。</p>
            </div>
            <a class="logo-footer" href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/footer/hikari-dental-logo-footer.png" alt="ひかりデンタルクリニックのロゴフッター"></a>
            <small id="copylight" text-style-footer-regular">&copy; 2026 HIKARI DENTAL CLINIC. All Rights Reserved.</small>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>