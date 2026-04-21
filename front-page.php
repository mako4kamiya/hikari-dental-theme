<?php get_header(); ?>

<main>
    <div id="MainVisual" class="dark-mode">
        <div class="container">
            <div class="main_visual_container">
                <div class="main_visual-left">
                    <a class="logo-mainvisual" href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/hikari-dental-logo-mainvisual.png" alt="ひかりデンタルクリニックのロゴメインビジュアル"></a>
                    <h1 class="text-style-main-copy">安心と信頼の<br>歯科医療</h1>
                    <p class="text-style-p-regular">一人ひとりのお悩みに真摯に向き合い、 安心して通い続けられる歯科クリニックを目指しています。</p>
                    <button class="text-style-button" type="button">クリニック紹介を見る</button>
                </div>
            </div>
        </div>
    </div>
    <div id="AboutUs" class="light-mode">
        <div class="container">
            <div class="inner_container">
                <div class="about_us-left">
                    <div class="headings">
                        <h2 class="text-style-h1">チームで支える歯科医療</h2>
                    </div>
                    <p class="text-style-p-regular">歯科医師・スタッフが密に連携し、一人ひとりに寄り添った診療で、安心して通い続けられる診療体制を整えています。</p>
                    <button class="text-style-button" type="button">クリニック紹介を見る</button>
                </div>
                <img class="about_us-right" src="<?php echo get_theme_file_uri(); ?>/assets/images/top-page-about-us.jpg" alt="クリニック紹介">
            </div>
        </div>
    </div>
    <div id="Features" class="dark-mode">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <h2 class="text-style-h1">クリニックの特徴</h2>
                    <p class="text-style-subtitle">安心して通っていただくために。</p>
                </div>
                <div class="cards">
                    <div class="card">
                        <div class="headings">
                            <h3 class="text-style-h2">丁寧な<br>カウンセリング</h3>
                        </div>
                        <p class="text-style-p-regular">
                            患者さま一人ひとりのお悩みに真摯に向き合い、治療内容や流れをわかりやすくご説明します。
                        </p>
                    </div>
                    <div class="card">
                        <div class="headings">
                            <h3 class="text-style-h2">チーム医療による<br>安心の診療体制</h3>
                        </div>
                        <p class="text-style-p-regular">
                            歯科医師とスタッフが密に連携し、安心して通い続けられる診療体制を整えています。
                        </p>
                    </div>
                    <div class="card">
                        <div class="headings">
                            <h3 class="text-style-h2">落ち着いた空間と<br>清潔な院内</h3>
                        </div>
                        <p class="text-style-p-regular">
                            リラックスしてお過ごしいただけるよう、清潔感と落ち着きを大切にした院内環境を整えています。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Information" class="light-mode">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <p class="text-style-shoulder">Information</p>
                    <h2 class="text-style-h1">診療案内</h2>
                    <p class="text-style-subtitle">幅広い診療に対応し、お悩みに合わせた治療をご提案します。</p>
                </div>
                <div class="cards">
                    <div class="card card1">
                        <div class="headings">
                            <h3 class="text-style-h2">一般歯科</h3>
                        </div>
                        <img class="icon" src="<?php echo get_theme_file_uri(); ?>/assets/images/icon-general.png" alt="一般歯科のアイコン">
                        <p class="text-style-p-regular">
                            虫歯や歯周病など、お口の健康を守る基本的な治療を行います。
                        </p>
                    </div>
                    <div class="card card2">
                        <div class="headings">
                            <h3 class="text-style-h2">予防歯科</h3>
                        </div>
                        <img class="icon" src="<?php echo get_theme_file_uri(); ?>/assets/images/icon-preventive.png" alt="予防歯科のアイコン"></i>
                        <p class="text-style-p-regular">
                            健康な歯を守るためのクリーニングや定期検診を行います。
                        </p>
                    </div>
                    <div class="card card3">
                        <div class="headings">
                            <h3 class="text-style-h2">小児歯科</h3>
                        </div>
                        <img class="icon" src="<?php echo get_theme_file_uri(); ?>/assets/images/icon-pedodontic.png" alt="小児歯科のアイコン"></i>
                        <p class="text-style-p-regular">
                            お子さまの成長に合わせたやさしい歯科診療を行います。
                        </p>
                    </div>
                </div>
                <div class="page-navigation">
                    <button type="button">&lt;</button>
                    <p class="text-style-subtitle">1 / 5</p>
                    <button type="button">&gt;</button>
                </div>
            </div>
        </div>
    </div>
    <div id="Access" class="light-mode">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <p class="text-style-shoulder">Access</p>
                    <h2 class="text-style-h1">アクセス</h2>
                </div>
                <div class="clinic_info">
                    <div class="headings clinic_name">
                        <h2 class="text-style-h2">
                            <?php bloginfo('name'); ?>
                        </h2>
                    </div>
                    <div class="clinic_address">
                        <p class="text-style-p-regular">
                            〒<?php echo esc_html(get_option('clinic_postal_code')); ?>
                            <?php echo esc_html(get_option('clinic_address')); ?>
                        </p>
                        <p class="text-style-p-regular">
                            最寄り駅: <?php echo esc_html(get_option('clinic_nearest_station')); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="access_map">
            <?php echo get_option('company_map'); ?>
        </div>
    </div>
    <div id="ClinicHours" class="light-mode">
        <div class="container">
            <div class="inner_container"></div>
        </div>
    </div>
    <div id="News" class="dark-mode">
        <div class="container">
            <div class="inner_container"></div>
        </div>
    </div>
</main>
<?php get_footer(); ?>