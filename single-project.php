<?php

  // $images = get_field( 'photos' );
  // $first_row = $images[0];
  // $first_image = $first_row['img'];

  $gallery = get_field( 'gallery' );

  if ( $gallery && ! is_ie() ) {
    $slider = false;
    foreach ( $gallery as $image ) {
      if ( get_field( 'slider', $image['ID'] ) ) {
        $slider = true;
        break;
      }
    }
  }

  if ( $slider && ! is_ie() ) {
    get_header( 'slider' );
  } elseif ( get_field( 'header_img' ) || ! empty( $gallery ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

?>

<?php get_template_part( '/inc/gallery', 'project' ); ?>

<div class="project-content-wrap">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="row mt-5">
      <div class="col">
        <h2 class="project-title"><?php the_title();  ?></h2>
        <?php if ( get_field( 'location' ) ) : ?>
          <h3><?php the_field( 'location' ); ?></h3>
        <?php endif; ?>
      </div>
    </div>

    <div class="row mt-3">

      <?php if ( get_the_content() ) : ?>
        <main class="col-md-9 project-main">
          <h4 class="accent mb-3">Project Description</h3>
          <div class="project-description">
            <?php the_content(); ?>
          </div>
        </main>
      <?php endif; ?>

      <?php $startTails = false; ?>
      <?php if ( have_rows( 'recognition' ) ) : ?>

        <aside class="col-md-3 project-sidebar sticky-sidebar">
          <div class="project-details">

            <h5>Recognition</h5>

              <?php while ( have_rows( 'recognition' ) ) : the_row(); ?>
                <p><?php the_sub_field( 'name' ); ?></p>
              <?php endwhile; ?>
              <hr>
        <?php $startTails = true; endif; ?>

      <?php if ( get_field( 'square_ft' ) ) : ?>
        <?php if ( ! $startTails ) : ?>
          <aside class="col-md-3 project-sidebar sticky-sidebar">
            <div class="project-details">
        <?php $startTails = true; endif; ?>
        <h5>Square Feet</h5>
        <p><?php the_field( 'square_ft' ); ?></p>
      <?php endif; ?>

      <?php if ( get_field( 'completed' ) ) : ?>
        <?php if ( ! $startTails ) : ?>
          <aside class="col-md-3 project-sidebar sticky-sidebar">
            <div class="project-details">
        <?php $startTails = true; endif; ?>
        <h5>Completed</h5>
        <p><?php the_field( 'completed' ); ?>
      <?php endif; ?>

      <?php if ( $startTails ) : ?>
          </div>
        </aside>
      <?php endif; ?>


    </div>
  </div><!-- .project-content-wrap -->


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

    <?php if ( isset( $_GET['tax'] ) && isset( $_GET['term'] ) ) : ?>
      <div class="cd-blog-nav project-content-wrap mt-5 mb-4">

        <?php

          $args = array(
            'sort_id'   =>  2110,
            'taxonomy'  =>  $_GET['tax'],
            'term_id'   =>  $_GET['term']
          );

          $next_post = apto_get_adjacent_post($args, FALSE);

          // print_r($next_post);
          $prev_post = apto_get_adjacent_post($args, TRUE);
          // print_r($prev_post);
        ?>
          <p class="blog-nav-link">
            <?php if ( $next_post ) : ?>
              <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>?tax=<?php echo $_GET['tax']; ?>&term=<?php echo $_GET['term']; ?>"><i class="fa fa-caret-left accent"></i> Previous Project</a>
            <?php endif; ?>
          </p>


          <p class="blog-nav-link right">
            <?php if ( $prev_post ) : ?>
              <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>?tax=<?php echo $_GET['tax']; ?>&term=<?php echo $_GET['term']; ?>">Next Project <i class="fa fa-caret-right accent"></i></a>
            <?php endif; ?>
          </p>

      </div>
    <?php else: ?>
      <div class="cd-blog-nav project-content-wrap mt-5 mb-4">
        <p class="blog-nav-link">
          <?php next_post_link( '%link','<i class="fa fa-caret-left accent"></i> Previous Project' ); ?>
        </p>
        <p class="blog-nav-link right">
          <?php previous_post_link( '%link', 'Next Project <i class="fa fa-caret-right accent"></i>' ); ?>
        </p>
      </div>
    <?php endif; ?>

  <?php endwhile; else: ?>

    <h3 class="mb-4">Sorry, nothing here!</h3>

  <?php endif; ?>

<?php get_footer(); ?>
