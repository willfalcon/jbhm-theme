<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Index.php -->
  <?php the_content() ?>

<?php endwhile; else: ?>

  <h3 class="my-4 index-error">Sorry, nothing here!</h3>

<?php endif; ?>

<?php get_footer(); ?>
