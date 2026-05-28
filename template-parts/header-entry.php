<?php
    $shoulder = get_my_entry_shoulder();
    $title    = get_my_entry_title();
?>
<header id="entry-header">
    <div class="container">
        <div class="inner_container">
            <div class="headings">
                <?php if ( ! empty( $shoulder ) ) : ?>
                    <p class="text-style-shoulder"><?php echo esc_html( $shoulder ); ?></p>
                <?php endif; ?>
                
                <?php if ( ! empty( $title ) ) : ?>
                    <h1 class="text-style-h1"><?php echo esc_html( $title ); ?></h1>
                <?php endif; ?>
            </div>
<?php
get_template_part('/template-parts/notification-banner', null, array(
    'type'      => 'warning',
    'title'     => 'ポートフォリオ用デモサイト',
    'message'   =>'このウェブサイトは、ポートフォリオ制作のための架空の歯科医院のサイトです。実在する人物・団体・医療機関とは一切関係ありません。'
));
?>
        </div>
    </div>
</header>
