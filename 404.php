<?php get_header(); ?>

<!-- 404.php -->
  <h3 class="my-5 404-error">
    <?php
      if ( get_field( 'error_404_message', 'option' ) ) :
        the_field( 'error_404_message', 'option' );
      else:
    ?>
      Sorry, nothing was found!
    <?php endif; ?>
  </h3>

  <h4 class="text-center mb-4 accent">Recent Projects</h4>

  <?php get_template_part( 'inc/gallery', 'front' ); ?>

<?php get_footer(); ?>
