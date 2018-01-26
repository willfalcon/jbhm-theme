<?php

  $currentTerm = get_queried_object();
  $acfID = $currentTerm->taxonomy . '_' . $currentTerm->term_id;

  if ( get_field( 'industry_image', $acfID ) ) {
    get_header( 'industries' );
  } else {
    get_header();
  }


  // $args = array(
  //   'post_type' => 'project',
  //   'tax_query' => array(
  //     array(
  //       'taxonomy' => 'industries',
  //       'field' => 'slug',
  //       'terms' => $currentTerm->slug
  //     )
  //   ),
  //   'posts_per_page' => -1
  // );
  // $query = new WP_Query( $args );

  $acfID = 'industries_' . $currentTerm->term_id;
  $projects = get_field( 'projects_picker', $acfID );

?>


<div class="row">
  <div class="industry-title-wrap">
    <h2 class="accent"><?php echo $currentTerm->name; ?></h2>

    <?php if ( $currentTerm->description ) : ?>
      <div class="term-description">
        <p><?php echo $currentTerm->description; ?></p>
      </div>
    <?php endif; ?>
  </div>
</div>


<?php if ( $projects ) : ?>

  <div class="row">
    <div class="cd-gallery">

      <div class="cd-gallery-sizer"></div>

      <?php foreach ( $projects as $post ) : setup_postdata( $post ); ?>

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

          $location = ( get_field( 'location' ) ? get_field( 'location' ) : false );

          /*<?php if ( $ratio > 1.8 ) : ?> cd-gallery-wide<?php endif;?>*/

        ?>

        <a class="cd-gallery-item frontpage-gallery-item" href="<?php the_permalink(); ?>?t=i&o=<?php echo $currentTerm->term_id; ?>">

          <img class="img-fluid" src="<?php echo cd_get_minimum_img_size( $img, 500); ?>" alt="<?php echo $img['alt']; ?>"/>

          <div class="frontpage-project-info<?php if ( ! $location ) : ?> no-location<?php endif; ?>">

            <div class="text-left w-75 h-size-adjust">
              <h4><?php the_title(); ?></h4>
              <?php if ( get_field( 'location' ) ) : ?>
                <hr class="accent">
                <h5 class="location"><?php echo $location; ?></h5>
              <?php endif; ?>
            </div>
            <div class="text-right d-none d-md-block">
              <p class="cd-more mb-0">More  <i class="fa fa-caret-right fa-lg accent"></i></p>
            </div>

          </div>

        </a>


      <?php endforeach; ?>

    </div>
  </div>

<?php endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
