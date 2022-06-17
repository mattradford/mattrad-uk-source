<?php
/**
 * Front end functions
 *
 * @since 1.0.0
 */

/**
 * Remove RSS and generator cruft from <head>
*/
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/**
 * Remove emoji.
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Remove WP Site icon.
 */
remove_action( 'wp_head', 'wp_site_icon', 99);

/**
 * Remove WP Site icon.
 */
remove_action( 'wp_head', 'wp_robots', 1);

/**
 * Remove Yoast comments from <head>
 */
add_filter( 'wpseo_debug_markers', '__return_false' );

/**
 * Remove the WordPress version from RSS feeds
 */
add_filter('the_generator', '__return_false');

/**
 * Dequeue Block Library CSS
 */
function mr_dequeue_global_css(){
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'mr_dequeue_global_css', 100 );

/**
 * Dequeue Block Library Global Inline CSS
 */
function mr_dequeue_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'mr_dequeue_block_library_css', 100 );

/**
 * Dequeue Page Links To script.
 */
function mr_dequeue_page_links_js() {
    if (!is_admin()) {
        wp_dequeue_script('page-links-to');
    }
}
add_action('wp_enqueue_scripts', 'mr_dequeue_page_links_js', 100);

/**
 * Remove duotone SVGs after <body>
 */
function mr_remove_global_styles() {
    remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
    remove_action( 'in_admin_header', 'wp_global_styles_render_svg_filters' );
}
add_action('after_setup_theme', 'mr_remove_global_styles', 10);

/**
 * Remove DNS prefetch to w.org
 */
function mr_remove_dns_prefetch () {
    remove_action( 'wp_head', 'wp_resource_hints', 2, 99 );
}
add_action( 'init', 'mr_remove_dns_prefetch' );

/**
 * Remove oEmbed
 *
 * @link https://kinsta.com/knowledgebase/disable-embeds-wordpress/
 */
function mr_disable_embeds_code_init() {
    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Remove oEmbed-specific JavaScript from the front-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

    // Remove all embeds rewrite rules.
    add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );

    // Remove filter of the oEmbed result before any HTTP requests are made.
    remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
}
add_action( 'init', 'mr_disable_embeds_code_init', 9999 );

/**
 * Remove oEmbed rewrites
 */
function mr_disable_embeds_rewrites( $rules ) {
    foreach($rules as $rule => $rewrite) {
        if(false !== strpos($rewrite, 'embed=true')) {
            unset($rules[$rule]);
        }
    }
    return $rules;
}

/**
 * Remove user sitemap
 */
function mr_remove_user_sitemap( $provider, $name ) {
        if ( 'users' === $name ) {
            return false;
        }
        return $provider;
}
add_filter( 'wp_sitemaps_add_provider','mr_remove_user_sitemap', 10, 2);

/**
 * Remove category tax sitemap
 */
function mr_remove_category_sitemap( $taxonomies ) {
    unset( $taxonomies['category'] );
    return $taxonomies;
}
add_filter( 'wp_sitemaps_taxonomies', 'mr_remove_category_sitemap', 10, 1);
