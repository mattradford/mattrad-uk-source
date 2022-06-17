<?php
/**
 *  Theme header
 *
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
        <!-- All Glory to the Hypno Toad! -->
    </head>

    <body>
        <?php wp_body_open(); ?>

        <header>
            <a href="<?php echo home_url('/') ?>"><?php bloginfo('name'); ?></a>
            <p><?php bloginfo('description'); ?></p>
            <nav>
                <?php
                if (has_nav_menu('main')) :
                    wp_nav_menu(
                        [
                            'theme_location'    => 'main',
                            'container'         => '',
                            'fallback_cb'       => false
                        ]
                    );
                endif;
                ?>
            </nav>
        </header>

        <main>