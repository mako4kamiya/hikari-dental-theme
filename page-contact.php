<?php get_header(); ?>

<main class="light-mode">
    <?php get_template_part('template-parts/header-entry'); ?>
    
    <section id="contact" class="light-mode">
        <?php the_post_thumbnail('post-thumbnail', array('class' => 'post-thumbnail')); ?>
        <div class="container">
            <div class="inner_container">
                <p class="text-style-footer-regular warning">※現在、実際の予約・お問い合わせは受け付けておりません。（ポートフォリオ用のデモ画面です）</p>
                <div class="contact-form-7">
                    <?php echo do_shortcode( '[contact-form-7 id="f46cafd" title="コンタクトフォーム"]' ); ?>
                </div>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/breadcrumb'); ?>
</main>

<?php get_footer(); ?>