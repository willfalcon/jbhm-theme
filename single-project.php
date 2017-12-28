<?php

  // $images = get_field( 'photos' );
  // $first_row = $images[0];
  // $first_image = $first_row['img'];

  $gallery = get_field( 'gallery' );

  if ( $gallery && ! is_ie() ) {
    $sliders = array();
    foreach ( $gallery as $image ) {
      if ( get_field( 'slider', $image['ID'] ) ) {
        array_push( $sliders, $image );
      }
    }
  }

  if ( ! empty( $sliders ) && ! is_ie() ) {
    get_header( 'slider' );
  } elseif ( get_field( 'header_img' ) || ! empty( $gallery ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

?>


<div class="project-content-wrap">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="row mt-5">
      <div class="col">
        <?php the_title( '<h2 class="project-title">', '</h2>' );  ?>
      </div>
    </div>

    <div class="row mt-3">

      <?php if ( get_the_content() ) : ?>
        <div class="col-md-9">
          <h4 class="accent mb-3">Project Description</h3>
          <div class="project-description">
            <?php the_content(); ?>
          </div>
        </div>
      <?php endif; ?>

      <?php $startTails = false; ?>
      <?php if ( have_rows( 'recognition' ) ) : ?>

        <div class="col-md-3">
          <div class="project-details">

            <h5>Recognition</h5>

              <?php while ( have_rows( 'recognition' ) ) : the_row(); ?>
                <p><?php the_sub_field( 'name' ); ?></p>
              <?php endwhile; ?>
              <hr>
        <?php $startTails = true; endif; ?>

      <?php if ( get_field( 'square_ft' ) ) : ?>
        <?php if ( ! $startTails ) : ?>
          <div class="col-md-3">
            <div class="project-details">
        <?php $startTails = true; endif; ?>
        <h5>Square Feet</h5>
        <p><?php the_field( 'square_ft' ); ?></p>
      <?php endif; ?>

      <?php if ( get_field( 'completed' ) ) : ?>
        <?php if ( ! $startTails ) : ?>
          <div class="col-md-3">
            <div class="project-details">
        <?php $startTails = true; endif; ?>
        <h5>Completed</h5>
        <p><?php the_field( 'completed' ); ?>
      <?php endif; ?>

      <?php if ( $startTails ) : ?>
          </div>
        </div>
      <?php endif; ?>


    </div>
  </div><!-- .project-content-wrap -->



    <?php get_template_part( '/inc/gallery', 'project' ); ?>


    <?php if ( get_field( 'testimonial_content' ) ) : ?>

      <div class="row cd-testimonial">
        <div class="col-12">
          <blockquote class="blockquote">


            <div class="text-center">
              <?php the_field( 'testimonial_content' ); ?>

              <footer class="blockquote-footer my-3">
                <?php the_field( 'testimonial_source' ); ?>
              </footer>
            </div>

          </blockquote>
        </div>
      </div>

    <?php endif; ?>

    <div class="cd-blog-nav project-content-wrap mt-5 mb-4">
      <?php previous_post_link( '<p class="blog-nav-link">%link</p>','<i class="fa fa-caret-left accent"></i> Previous Project' ); ?>
      <?php next_post_link( '<p class="blog-nav-link right">%link</p>', 'Next Project <i class="fa fa-caret-right accent"></i>' ); ?>
    </div>

  <?php endwhile; else: ?>

    <h3 class="mb-4">Sorry, nothing here!</h3>

  <?php endif; ?>

<?php get_footer(); ?>
