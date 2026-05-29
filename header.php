<!DOCTYPE html>
<html <?php get_language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head( ); ?>
    </head>
    <body <?php body_class(); ?>>

        <?php
            get_template_part('/template-parts/notification-banner', null, array(
                'type'      => 'warning',
                'title'     => 'ポートフォリオ用デモサイト',
                'message'   =>'このウェブサイトは、ポートフォリオ制作のための架空の歯科医院のサイトです。実在する人物・団体・医療機関とは一切関係ありません。'
            ));
        ?>

        <header id="site-header">
            <div class="header-inner">
                <?php the_custom_logo(); ?>
                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'header-menu',
                        'container' => 'nav',
                        'container_class' => 'header-nav',
                        'container_id' => 'header-nav',
                        'menu_class' => 'header-menu',
                        'menu_id' => 'header-menu',
                        'fallback_cb' => false,
                        'theme_location' => 'header-menu'
                    )
                );
                ?>
            </div>
            <div class="sp-menu">
                <div class="header-icon">
                    <?php
                        $icons = get_sp_menu_icons();
                        foreach ($icons as $key => $icon) {
                            echo $icon;
                        }
                    ?>
                </div>
            </div>
        </header>