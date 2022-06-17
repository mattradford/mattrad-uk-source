<?php
/**
 * Register nav menus
 *
 * @since 1.0.0
 */
function mr_register_main_menu() {
    register_nav_menu( 'main', __( 'Main', 'negligible' ) );
}
add_action( 'after_setup_theme', 'mr_register_main_menu' );