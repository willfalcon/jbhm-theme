<?php

  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

?>

<div class="service-content-wrap">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="row">
      <div class="col">
        <?php the_title( '<h2 class="accent my-5">', '</h2>' );  ?>

        <div class="project-description">
          <?php the_content(); ?>
        </div>

      </div>

    </div>


    <div class="cd-blog-nav mt-5 mb-4">
      <div class="row w-100">
        <div class="col-6 w-50 text-left">
          <?php previous_post_link( '<p class="blog-nav-link">%link</p>','<i class="fa fa-caret-left accent"></i> Previous Service' ); ?>
        </div>
        <div class="col-6 w-50 text-right">
          <?php next_post_link( '<p class="blog-nav-link">%link</p>', 'Next Service <i class="fa fa-caret-right accent"></i>' ); ?>
        </div>
      </div>
    </div>

  <?php endwhile; else: ?>

    <h3 class="mb-4">Sorry, nothing here!</h3>

  <?php endif; ?>
</div><!-- .service-content-wrap -->


<?php get_footer(); ?>
