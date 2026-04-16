<?php get_header(); ?>

<main>
    <div id="MainVisual" class="grid dark-mode">
        <div class="container grid">
            <div class="main_visual_container grid">
                <div class="main_visual-left flex">
                    <a class="logo-mainvisual" href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/hikari-dental-logo-mainvisual.png" alt="ひかりデンタルクリニックのロゴメインビジュアル"></a>
                    <p class="text-style-main-copy">安心と信頼の<br>歯科医療</p>
                    <p class="text-style-p-regular">一人ひとりのお悩みに真摯に向き合い、 安心して通い続けられる歯科クリニックを目指しています。</p>
                    <button class="text-style-button" type="button">クリニック紹介を見る</button>
                </div>
            </div>
        </div>
    </div>
    <div id="AboutUs" class="grid">
        <div class="container grid">
            <div class="inner_container grid">
                <div class="grid">
                    <div class="about_us-left"></div>
                    <div class="about_us-right">
                        <p>クリニックの紹介内容がここに表示されます。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Features" class="min-h-screen">
        <div class="container grid">
            <div class="inner_container grid"></div>
        </div>
    </div>
    <div id="Information" class="min-h-screen">
        <div class="container grid">
            <div class="inner_container grid"></div>
        </div>
    </div>
    <div id="Access" class="min-h-screen">
        <div class="container grid">
            <div class="inner_container grid"></div>
        </div>
    </div>
    <div id="ClinicHours" class="min-h-screen">
        <div class="container grid">
            <div class="inner_container grid"></div>
        </div>
    </div>
    <div id="News" class="min-h-screen">
        <div class="container grid">
            <div class="inner_container grid"></div>
        </div>
    </div>
</main>
<?php get_footer(); ?>