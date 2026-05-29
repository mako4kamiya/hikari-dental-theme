<?php
$type    = isset( $args['type'] ) ? $args['type'] : 'success';
$title   = isset( $args['title'] ) ? $args['title'] : '';
$message = isset( $args['message'] ) ? $args['message'] : '';
$icons = array_merge(get_global_icons(), get_notification_icons());

// どれか1つでも空なら何も出力しない（すべて揃っていないと表示しない）
if ( empty( $type ) || empty( $title ) || empty( $message ) ) {
    return;
}
?>

<div class="notification-banner hidden" role="alert">
    <div class="banner-contents <?php echo esc_attr( $type ); ?>">
        <div class="banner-title-container">
            <div class="banner-title">
                <?php echo $icons[$type]; ?>
                <p class="title-spacing text-style-p-bold"><?php echo esc_html( $title ); ?></p>
            </div>
            <button class="banner-close" type="button" aria-label="閉じる">
                <?php echo $icons['close']; ?>
                <p class="text-style-button">閉じる</p>
            </button>
        </div>
        <p class="banner-copy text-style-p-regular"><?php echo esc_html( $message ); ?></p>
    </div>
</div>