<?php
$type    = isset( $args['type'] ) ? $args['type'] : 'success';
$title   = isset( $args['title'] ) ? $args['title'] : '';
$message = isset( $args['message'] ) ? $args['message'] : '';

// どれか1つでも空なら何も出力しない（すべて揃っていないと表示しない）
if ( empty( $type ) || empty( $title ) || empty( $message ) ) {
    return;
}
?>

<div class="notification-banner <?php echo esc_attr( $type ); ?>" role="alert">
    <p class="text-style-p-bold"><?php echo esc_html( $title ); ?></p>
    <p class="text-style-p-regular"><?php echo esc_html( $message ); ?></p>
</div>
