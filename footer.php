    <footer>
        <div class="container">
            <div class="inner_container">
                <div class="grid-container">
                    <div class="clinic-info">
                        <div class="headings">
                            <h2 class="text-style-h2">ひかりデンタルクリニック</h2>
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
                    <div class="sitemap">
                        <p class="text-style-p-bold">サイトマップ</p>
                        <ul>
                            <li class="text-style-p-regular">
                                <a href="">トップページ</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">クリニック紹介</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">診療案内</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">アクセス</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">診療時間</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">お知らせ</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">お問い合わせ</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">プライバシーポリシー</a>
                            </li>
                        </ul>
                    </div>
                    <div class="info">
                        <p class="text-style-p-bold">診療案内</p>
                        <ul>
                            <li class="text-style-p-regular">
                                <a href="">一般歯科</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">予防歯科</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">小児歯科</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">審美歯科</a>
                            </li>
                            <li class="text-style-p-regular">
                                <a href="">ホワイトニング</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <p class="text-style-p-regular">※本サイトはデジタル庁デザインシステムを参考に制作しています。</p>
            </div>
        </div>
        <a class="logo-footer" href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/hikari-dental-logo-footer.png" alt="ひかりデンタルクリニックのロゴフッター"></a>
        <small class="copy text-style-footer-regular">&copy; 2026 HIKARI DENTAL CLINIC. All Rights Reserved.</small>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>