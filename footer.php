
        <?php query_posts("cat=21"); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        <?php wp_reset_query(); ?>
        
    <?php wp_footer(); ?>
  </body>
</html>

