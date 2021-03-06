
    <?php

      $img = '';

      if ( get_field( 'header_img' ) ) {
        $img = get_field( 'header_img' );
      } elseif ( get_field( 'gallery' ) ) {
        $gallery = get_field( 'gallery' );
        $img = $gallery[0];
      }


      $location = ( get_field( 'location' ) ? get_field( 'location' ) : false );

      if ( ! empty($img) ) :
        $currentTerm = get_queried_object();
        // print_r($currentTerm);
    ?>

      <a class="frontpage-gallery-item cd-grid-item tax-grid-item col-12 col-sm-6 col-md-4 col-xl-3"
      href="
        <?php the_permalink(); ?>
        <?php if ( ! is_front_page() ) : ?>
          ?tax=<?php echo $currentTerm->taxonomy; ?>&term=<?php echo $currentTerm->term_id; ?>
        <?php endif; ?>
      ">

        <div class="img">
          <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>"/>
        </div>

        <div class="frontpage-project-info<?php if ( ! $location ) : ?> no-location<?php endif; ?>">

          <div class="text-left h-size-adjust align-self-start mwidth-100">
            <h3><?php the_title(); ?></h3>
            <?php if ( $location ) : ?>
              <hr class="accent">
              <h4 class="location"><?php the_field( 'location' ); ?></h4>
            <?php endif; ?>
          </div>


        </div>


      </a>

    <?php  endif; ?>
