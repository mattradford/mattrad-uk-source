<?php
/**
 * Negligible CSS
 *
 * @since 1.0.0
 */
function mr_fix_images() {
    ?>
    <style>body img {width: 100%;height: auto;}</style>
    <?php
}
add_action( 'wp_head', 'mr_fix_images' );