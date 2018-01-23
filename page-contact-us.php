<?php
  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }
?>



    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="row page-content mt-2"><div class="col">
        <h2 class="accent my-4"><?php the_title(); ?></h2>
      </div></div>

      <div class="row page-content">

        <?php if ( have_rows( 'offices' ) ) : ?>

          <div class="col-12 col-md-8">

            <?php while ( have_rows( 'offices' ) ) : the_row( 'offices' ); ?>

              <?php $img = get_sub_field( 'map_image' ); ?>

              <div class="office">
                <h2><?php the_sub_field( 'title' ); ?></h2>
                <img class="img-fluid w-100" src="<?php echo $img['sizes']['large']; ?>" alt=<?php echo $img['alt']; ?> />
                <div class="office-info">
                  <p>
                    <?php the_sub_field( 'address' ); ?>
                  </p>
                  <p>
                    <?php the_sub_field( 'city' ); ?>, <?php the_sub_field( 'state' ); ?> <?php the_sub_field( 'zip_code' ); ?>
                  </p>
                  <p>
                    <a href="tel:<?php the_sub_field( 'phone' ); ?>">
                      <?php the_sub_field( 'phone' ); ?>
                    </a>
                  </p>
                </div>
              </div>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

        <?php if ( have_rows( 'bid_documents' ) ) : ?>

          <div class="col-12 col-md-4">
            <div class="bid-docs">

              <h3>Bid Documents</h3>

              <?php while ( have_rows( 'bid_documents' ) ) : the_row( 'bid_documents' ); ?>

                <a class="accent" href="<?php the_sub_field( 'link' ); ?>" target="_blank">
                  <?php the_sub_field( 'label' ); ?> <i class="fa fa-chevron-right accent"></i>
                </a>

              <?php endwhile; ?>

            </div>
          </div>

        <?php endif; ?>

      </div>

    <?php endwhile; endif; ?>

  </div>
</div>

<?php get_footer(); ?>
