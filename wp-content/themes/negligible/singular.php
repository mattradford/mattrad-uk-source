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
            </header>
            <section>
                <?php the_content(); ?>
            </section>
        </article>
    <?php endwhile; ?>
<?php
get_footer();
