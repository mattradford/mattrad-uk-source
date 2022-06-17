<?php
/**
 *  Theme index
 *
 * @since 1.0.0
 */
get_header();
?>
    <aside>
        <p><em>Is this website broken?</em></p>
        <p>No! This is just HTML. I wanted to start from scratch with my blog, keeping the content but stripping everything else back. I'm working on fixing and rebuilding the content first, then I'll use modern CSS to make it look good. HTML is awesome by itself ;)</p>
    </aside>
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