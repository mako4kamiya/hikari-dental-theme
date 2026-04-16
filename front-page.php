<?php get_header(); ?>

<main>
    <div id="MainVisual" class="dark-mode h-100svh grid">
        <div class="container grid">
            <div class="main_visual_container grid">
                <div class="main_visual-left flex">
                    <a class="logo-mainvisual" href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/hikari-dental-logo-mainvisual.png" alt="ひかりデンタルクリニックのロゴメインビジュアル"></a>
                    <h1 class="text-style-main-copy">安心と信頼の<br>歯科医療</h1>
                    <p class="text-style-p-regular">一人ひとりのお悩みに真摯に向き合い、 安心して通い続けられる歯科クリニックを目指しています。</p>
                    <button class="text-style-button" type="button">クリニック紹介を見る</button>
                </div>
            </div>
        </div>
    </div>
    <div id="AboutUs" class="light-mode h-100svh grid">
        <div class="container grid">
            <div class="inner_container grid">
                <div class="about_us-left flex">
                    <h2 class="text-style-h1">チームで支える歯科医療</h2>
                    <p class="text-style-p-regular">歯科医師・スタッフが密に連携し、一人ひとりに寄り添った診療で、安心して通い続けられる診療体制を整えています。</p>
                    <button class="text-style-button" type="button">クリニック紹介を見る</button>
                </div>
                <img class="about_us-right" src="<?php echo get_theme_file_uri(); ?>/assets/images/top-page-about-us.jpg" alt="クリニック紹介">
            </div>
        </div>
    </div>
    <div id="Features" class="dark-mode h-100svh">
        <div class="container grid">
            <div class="inner_container grid"></div>
        </div>
    </div>
    <div id="Information" class="light-mode h-100svh">
        <div class="container grid">
            <div class="inner_container grid"></div>
        </div>
    </div>
    <div id="Access" class="dark-mode h-100svh">
        <div class="container grid">
            <div class="inner_container grid"></div>
        </div>
    </div>
    <div id="ClinicHours" class="light-mode h-100svh">
        <div class="container grid">
            <div class="inner_container grid"></div>
        </div>
    </div>
    <div id="News" class="dark-mode h-100svh">
        <div class="container grid">
            <div class="inner_container grid"></div>
        </div>
    </div>
</main>
<?php get_footer(); ?>