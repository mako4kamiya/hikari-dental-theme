<!DOCTYPE html>
<html <?php get_language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head( ); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
            <div>
                <?php the_custom_logo(); ?>
                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'header-menu',
                        'container' => 'nav',
                        'container_class' => 'header-nav',
                        'container_id' => 'HeaderNav',
                        'menu_class' => 'header-menu',
                        'menu_id' => 'HeaderMenu',
                        'fallback_cb' => false,
                        'theme_location' => 'header-menu'
                    )
                );
                ?>
            </div>
        </header>
