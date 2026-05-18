<?php get_header(); ?>

<main class="light-mode">
    <?php get_template_part('template-parts/header-entry'); ?>
    
    <section id="main-section">
        <div class="container">
            <div class="inner_container">
                <p>お探しのページは見つかりませんでした。</p>
                <p>すでに削除されたか、URLが変更された可能性があります。</p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページへ戻る</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>