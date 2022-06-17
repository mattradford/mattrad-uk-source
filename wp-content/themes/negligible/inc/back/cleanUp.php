<?php
/**
 * Back end functions
 *
 * @since 1.0.0
 */

/**
 * Remove RSS and generator cruft from <head>
*/
function mr_unregister_taxonomies() {
    global $wp_taxonomies;
    $taxonomies =  [
        'category',
        'post_tag',
    ];
    foreach($taxonomies as $taxonomy) {
        if ( taxonomy_exists($taxonomy) ) {
            unset( $wp_taxonomies[$taxonomy] );
        }
    }
}
add_action( 'init', 'mr_unregister_taxonomies' );

/**
 * Remove theme and plugin file editor
 */
if (!defined('DISALLOW_FILE_EDIT')) {
    define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Remove hated Customizer
 */
function mr_remove_customizer( $caps, $cap, $user_id, $args ) {
    if ('customize' == $cap) {
        return ['do_not_allow'];
    }
    return $caps;
}
add_filter('map_meta_cap', 'mr_remove_customizer', 10, 4);

/**
 * Redirect pointless Dashboard.
 *
 * On login, to Posts.
 */
function mr_dashboard_redirect($url) {
    return admin_url('edit.php');
}
add_filter('login_redirect', 'mr_dashboard_redirect');

/**
 * Remove pointless Dashboard from admin menu
 */
function mr_remove_dashboard(){
    remove_menu_page( 'index.php' );
}
add_action( 'admin_menu', 'mr_remove_dashboard', 99 );