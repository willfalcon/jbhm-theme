<?php


//TODO: Use smaller image size for thumbnails


  get_header();

?>

<?php
  $currentTerm = get_queried_object();

  $args = array(
    'post_type' => 'project',
    'tax_query' => array(
      array(
        'taxonomy' => 'industries',
        'field' => 'slug',
        'terms' => $currentTerm->slug
      )
    ),
    'posts_per_page' => -1
  );
  $query = new WP_Query( $args );
?>

<div class="row">
  <div class="industry-title-wrap">
    <h2 class="accent"><?php echo $currentTerm->name; ?></h2>

  </div>
</div>

<div class="row">

<?php if ( $query->have_posts() ) : ?>

  <div class="cd-gallery">

    <div class="cd-gallery-sizer"></div>

    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

      <?php

        if ( get_field( 'header_img' ) ) {
          $img = get_field( 'header_img' );
        } else {
          $gallery = get_field( 'gallery' );
          $img = $gallery[0];
        }
        $width = $img['width'];
        $height = $img['height'];
        $ratio = $width / $height;

        /*<?php if ( $ratio > 1.8 ) : ?> cd-gallery-wide<?php endif;?>*/

      ?>

      <a class="cd-gallery-item frontpage-gallery-item" href="<?php the_permalink(); ?>?t=i&o=<?php echo $currentTerm->term_id; ?>">

        <img class="img-fluid" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>"/>

        <div class="frontpage-project-info">

          <div class="text-left w-auto h-size-adjust">
            <h4><?php the_title(); ?></h4>
            <hr class="accent">
            <h5><?php the_field( 'location' ); ?></h5>
          </div>
          <div class="text-right w-100 d-none d-md-block">
            <p class="cd-more">More  <i class="fa fa-caret-right fa-lg accent"></i></p>
          </div>

        </div>

      </a>

    <?php endwhile; ?>

  </div>


  <?php else: wp_reset_postdata(); ?>

    <div class="industry-title-wrap">
      <h3 class="mb-4">Sorry, no projects were found!</h3>
    </div>

  <?php endif; ?>

</div>

<?php get_footer(); ?>
