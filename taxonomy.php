<?php


//TODO: Use smaller image size for thumbnails


  get_header();

  $az = true;
  $recent = false;

  if ( isset( $_GET['orderby'] ) ) {
      switch ( $_GET['orderby'] ) {
        case 'name':
          break;
        case 'date':
          $filter = 'date';
          $az = false;
          $recent = true;
          break;
      }
  }
?>


<?php $currentTerm = get_queried_object(); ?>

<div class="row">
  <div class="industry-title-wrap">
    <h2 class="accent"><?php echo $currentTerm->name; ?></h2>
    <a class="btn people-filter-btn<?php if ( $az ) : ?> active-filter<?php endif; ?>" href="?orderby=name&order=ASC">A-Z</a>
    <a class="btn people-filter-btn<?php if ( $recent ) : ?> active-filter<?php endif; ?>" href="?orderby=date">Most Recent</a>

    <?php if ( $currentTerm->description ) : ?>
      <div class="term-description">
        <p><?php echo $currentTerm->description; ?></p>
      </div>
    <?php endif; ?>
  </div>
</div>


<?php if ( have_posts() ) : ?>




  <div class="row">
    <div class="cd-gallery">

      <div class="cd-gallery-sizer"></div>

      <?php while ( have_posts() ) : the_post(); ?>

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

          <a class="cd-gallery-item" href="<?php the_permalink(); ?>">

            <img class="img-fluid" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>"/>

            <div class="project-info">

              <div class="text-left w-auto">
                <h4><?php the_title(); ?></h4>
                <hr class="accent">
                <h5><?php the_field( 'location' ); ?></h5>
              </div>
              <div class="text-right w-100">
                <p class="cd-more">More  <i class="fa fa-caret-right fa-lg accent"></i></p>
              </div>

            </div>

          </a>

      <?php endwhile; ?>

    </div>
  </div>


<?php else: wp_reset_postdata(); ?>

  <h3 class="mb-4">Nothing was found!</h3>

<?php endif; ?>


<?php get_footer(); ?>
