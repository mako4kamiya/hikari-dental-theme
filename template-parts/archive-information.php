<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php
        the_ID();               // ID
        the_permalink();        // リンク
        the_title();            // タイトル
        the_excerpt();          // 抜粋内容
        ?>
    <?php endwhile; ?>

    <?php
    // ページネーションの表示
    the_posts_pagination();
    ?>
<?php else : ?>
    <?php // 投稿がない場合のメッセージなど ?>
<?php endif; ?>
