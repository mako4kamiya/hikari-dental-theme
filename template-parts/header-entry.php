<?php
// 現在の投稿タイプを取得（'post', 'page', 'information' など）
$post_type = get_post_type();
$shoulder = '';

if ( 'page' === $post_type ) {
    // 1. 固定ページ（page）の場合
    $shoulder = ucwords($post->post_name);
} elseif ( 'post' === $post_type ) {
    // 2. 通常の投稿（post）の場合
    $categories = get_the_category();
    $shoulder  = ucwords(!empty($categories) ? $categories[0]->slug : '');
} else {
    // 3. カスタム投稿タイプの場合
    global $post;
    $shoulder = ucwords($post->post_name);
}
?>

<header id="entry-header">
    <div class="container">
        <div class="inner_container">
            <div class="headings">
                <p class="text-style-shoulder"><?php echo esc_html($shoulder); ?></p>
                <h1 class="text-style-h1"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</header>
