<?php
/**
 *  Theme index
 *
 * @since 1.0.0
 */
get_header();
?>
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?>>
        <header>
          <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <small><time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time></small>
        </header>
      </article>
    <?php endwhile; ?>
<?php
get_footer();