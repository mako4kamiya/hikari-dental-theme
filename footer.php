    <footer class="light-mode">
        <div class="container">
            <div class="inner_container">
                <div class="grid-container">
                    <div class="clinic-info">
                        <div class="headings">
                            <h2 class="text-style-h2"><?php bloginfo('name'); ?></h2>
                        </div>
                        <div>
                            <p class="text-style-p-regular">
                                〒<?php echo esc_html(get_option('clinic_postal_code')); ?>
                                <?php echo esc_html(get_option('clinic_address')); ?>
                            </p>
                            <p class="text-style-p-regular">
                                <?php echo esc_html(get_option('clinic_nearest_station')); ?>
                            </p>
                            <p class="text-style-p-regular">
                                <?php echo esc_html(get_option('clinic_email')); ?>
                            </p>
                        </div>
                    </div>
                    <div class="clinic-hours">
                        <p class="text-style-p-bold">診療時間</p>
                        <ul>
                            <li class="text-style-p-regular">水～金</li>
                            <li class="text-style-p-regular">9:00～19:00</li>
                            <li class="text-style-p-regular">土・日</li>
                            <li class="text-style-p-regular">9:00～18:00</li>
                            <li class="text-style-p-regular">月・火・祝休診</li>
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
            <a class="logo-footer" href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/hikari-dental-logo-footer.png" alt="ひかりデンタルクリニックのロゴフッター"></a>
            <small id="copylight" text-style-footer-regular">&copy; 2026 HIKARI DENTAL CLINIC. All Rights Reserved.</small>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>