<?php get_header(); ?>

<main>
    <section id="main-visual" class="dark-mode">
        <div class="container">
            <div class="main_visual_container">
                <div class="main_visual-left">
                    <a class="logo-mainvisual" href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/front/hikari-dental-logo-mainvisual.png" alt="ひかりデンタルクリニックのロゴメインビジュアル"></a>
                    <h1 class="text-style-main-copy">安心と信頼の<br>歯科医療</h1>
                    <p class="text-style-p-regular">一人ひとりのお悩みに真摯に向き合い、 安心して通い続けられる歯科クリニックを目指しています。</p>
                    <a class="button text-style-button" href="<?php the_permalink(14); ?>">クリニック紹介を見る</a>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="light-mode">
        <div class="container">
            <div class="inner_container">
                <div class="about-left">
                    <div class="headings">
                        <h2 class="text-style-h1">チームで支える歯科医療</h2>
                    </div>
                    <p class="text-style-p-regular">歯科医師・スタッフが密に連携し、一人ひとりに寄り添った診療で、安心して通い続けられる診療体制を整えています。</p>
                    <a class="button text-style-button" href="<?php the_permalink(14); ?>">クリニック紹介を見る</a>
                </div>
                <img class="about-right" src="<?php echo get_theme_file_uri(); ?>/assets/images/front/medical-team.jpg" alt="クリニック紹介の写真">
            </div>
        </div>
    </section>
    <section id="features" class="dark-mode">
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
    </section>
    <section id="information" class="light-mode">
        <?php
            $post_type_obj = get_post_type_object('information');
            $post_type_label = $post_type_obj->label;
            $post_type_desc = $post_type_obj->description; 
        ?>
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <p class="text-style-shoulder">Information</p>
                    <h2 class="text-style-h1"><?php echo esc_html($post_type_label); ?></h2>
                    <p class="text-style-subtitle"><?php echo esc_html($post_type_desc); ?></p>
                </div>
                <section class="splide" aria-label="診療一覧">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php
                                $info_query = new WP_Query([
                                    'post_type'      => 'information',
                                ]);
                                while ($info_query->have_posts()) : $info_query->the_post();
                            ?>
                            <li class="splide__slide">
                                <a href="<?php the_permalink(); ?>" class="card">
                                    <div class="headings">
                                        <h3 class="text-style-h2"><?php the_title(); ?></h3>
                                    </div>
                                    <?php
                                    $saved_icon_key = get_post_meta(get_the_ID(), '_selected_svg_icon', true);
                                    if ( $saved_icon_key ) {
                                        // 2. assets/icons/information-icons.php からアイコン一覧を呼び出し
                                        $icons = get_information_icons();

                                        // 3. 該当するSVGコードがあればクラス付きのdivで出力
                                        if ( isset($icons[$saved_icon_key]) ) {
                                            echo '<div class="card-icon">';
                                            echo $icons[$saved_icon_key]; 
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                    <p class="text-style-p-regular">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                </a>
                            </li>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <div class="splide__arrows"></div>
                </section>
            </div>
        </div>
    </section>
    <section id="access" class="light-mode">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <p class="text-style-shoulder">Access</p>
                    <h2 class="text-style-h1">アクセス</h2>
                </div>
            </div>
        </div>
        <?php get_template_part('template-parts/access'); ?>
    </section>
    <section id="clinic-hours" class="light-mode">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <p class="text-style-shoulder">Clinic Hours</p>
                    <h2 class="text-style-h1">診療時間</h2>
                </div>
                <?php echo do_shortcode( '[clinic_table]' ); ?>
            </div>
        </div>
    </section>
    <section id="news" class="dark-mode">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <p class="text-style-shoulder">News</p>
                    <h2 class="text-style-h1">お知らせ</h2>
                </div>
                <div class="links">
                    <?php
                    $news_query = new WP_Query([
                        'category_name'  => 'news',
                        'posts_per_page' => 3,
                    ]);

                    while ($news_query->have_posts()) : $news_query->the_post();
                    ?>
                        <a href="<?php the_permalink(); ?>" class="text-style-a-regular">
                            <?php echo get_the_date('Y.m.d'); ?>　<?php the_title(); ?>
                        </a>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>