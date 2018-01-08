<?php

  if ( wp_is_mobile() ) {
    if ( get_field( 'header_img' ) ) {
      get_header( 'header_img' );
    } else {
      get_header();
    }
  } else {
    if ( get_field( 'video' ) ) {
      get_header( 'video' );
    } elseif ( get_field( 'header_img' ) ) {
      get_header( 'header_img' );
    } else {
      get_header();
    }
  }
?>

  <div class="row mb-3">
    <div class="col">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="text-center mt-3">
          <a class="cd-more" id="learn_more_link" data-toggle="collapse" onclick="rotateCaret()" href="#homeContentWrap" aria-expanded="false" aria-controls="homeContentWrap">
            LEARN MORE  <i class="fa fa-caret-right fa-lg accent" id="learn_more_caret"></i>
          </a>
        </div>

        <div class="home-content-wrap collapse" id="homeContentWrap">
          <?php the_content(); ?>
        </div>

      <?php endwhile; endif; ?>

    </div>
  </div>

  <?php get_template_part( 'inc/gallery', 'front' ); ?>

<?php get_footer(); ?>
