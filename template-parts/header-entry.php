<?php
// 現在の投稿タイプを取得（'post', 'page', 'information' など）
$post_type = get_post_type();
$shoulder = '';

// if ( 'page' === $post_type ) {
//     // 1. 固定ページ（page）の場合
//     $shoulder = ucwords($post->post_name);
// } elseif ( 'post' === $post_type ) {
//     // 2. 通常の投稿（post）の場合
//     $categories = get_the_category();
//     $shoulder  = ucwords(!empty($categories) ? $categories[0]->slug : '');
// } else {
//     // 3. カスタム投稿タイプの場合
//     global $post;
//     $shoulder = ucwords($post->post_name);
// }
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
<?php
// 1. single.php：投稿（およびカスタム投稿）の個別ページ
if ( is_single() ) {
    // 投稿の個別詳細ページ用の処理
    $categories = get_the_category();
    $categorie = $categories[0];
    $shoulder  = ucwords($categorie->slug); 
    echo '個別記事ページ（single）のコンテンツ' . $shoulder;

// 2. page.php：固定ページ（※front-page以外の通常の固定ページ）
} elseif ( is_page() ) {
    // 固定ページ用の処理
    $shoulder = ucwords($post->post_name);
    echo '固定ページ（page）のコンテンツ' . $shoulder;

// 3. category.php：カテゴリーごとの記事一覧ページ
} elseif ( is_category() ) {
    // カテゴリー一覧用の処理
    $categories = get_the_category();
    $categorie = $categories[0];
    $shoulder  = ucwords($categorie->slug);
    echo 'カテゴリー一覧ページ（category）のコンテンツ' . $shoulder;

// 4. tag.php：タグごとの記事一覧ページ
} elseif ( is_tag() ) {
    // タグ一覧用の処理
    echo 'タグ一覧ページ（tag）のコンテンツ' . $shoulder;

// 5. archive.php：各種一覧ページ（上記以外の著者、日付、カスタム投稿一覧など）
} elseif ( is_archive() ) {
    // 各種一覧ページ用の処理
    $queried_object = get_queried_object();
    $shoulder = ucwords($queried_object->name);
    echo 'アーカイブ一覧ページ（archive）のコンテンツ' . $shoulder;

// 6. search.php：検索結果一覧ページ
} elseif ( is_search() ) {
    // 検索結果用の処理
    echo '検索結果一覧ページ（search）のコンテンツ' . $shoulder;

// 7. 404.php：エラーページ
} elseif ( is_404() ) {
    // 404エラー用の処理
    echo '404エラーページ（404）のコンテンツ' . $shoulder;

}
?>