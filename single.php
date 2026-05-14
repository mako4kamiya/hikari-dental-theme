<?php get_header(); ?>

<main class="light-mode">
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        // 1. 現在の投稿タイプを取得
        $post_type = get_post_type();
        // 2. 通常の投稿（post）の場合
        if ( 'post' === $post_type ) {
            $categories = get_the_category();
            $file_suffix = !empty($categories) ? $categories[0]->slug : '';
        } else {
            // 3. カスタム投稿タイプの場合
            $file_suffix = $post_type;
        }
    ?>
        <?php get_template_part('template-parts/header-entry'); ?>
        <?php get_template_part('template-parts/single', $file_suffix); ?>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>