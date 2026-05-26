<?php get_header(); ?>

<main class="light-mode">
    <?php get_template_part('template-parts/header-entry'); ?>
    
    <section id="main-section">
        <div class="container">
            <div class="inner_container">
                <?php if (have_posts()) : ?>
                    <ul>
                    <?php while (have_posts()) : the_post(); ?>
                        <li id="<?php the_ID(); ?>">
                            <a href="<?php the_permalink(); ?>" class="card">
                                <div class="headings">
                                    <h3 class="text-style-h2"><?php the_title(); ?></h3>
                                </div>
                                <?php

                                $saved_icon_key = get_post_meta(get_the_ID(), '_selected_svg_icon', true);

                                if ( $saved_icon_key ) {
                                    // 2. assets/icons.php からアイコン一覧を呼び出し
                                    $icons = get_custom_svg_icons();

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
                    <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <p>お探しの記事は見つかりませんでした。すでに削除されたか、URLが変更された可能性があります。</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/breadcrumb'); ?>
</main>

<?php get_footer(); ?>