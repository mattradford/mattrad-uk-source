<?php
/**
 * Single post and page
 *
 * @since 1.0.0
 */
get_header();
?>
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header>
                <h1><?php the_title(); ?></h1>
                <?php
                if ( is_single() && 'post' == get_post_type() ) :
                    echo '<span>';
                    esc_html_e('Published on', 'negligible');
                    echo '&nbsp;</span>';
                    echo '<time datetime="' . get_post_time('c', true) .'">'. get_the_date() . '</time>';
                endif;
                ?>
            </header>
            <section>
                <?php the_content(); ?>
            </section>
        </article>
    <?php endwhile; ?>
<?php
get_footer();
