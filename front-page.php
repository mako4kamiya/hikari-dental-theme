<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Hikari Dental Clinic</title>
    </head>
    <body>
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
    </body>
</html>