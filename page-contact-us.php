<?php
  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }
?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="row page-content">
        <div class="col-12">
          <h2 class="accent py-3 m-0"><?php the_title(); ?></h2>
        </div>
        <div class="col-12">
          <?php the_content(); ?>
        </div>
      </div>

      <div class="row page-content">

        <?php if ( have_rows( 'offices' ) ) : ?>

          <div class="col-12 col-md-8">

            <?php while ( have_rows( 'offices' ) ) : the_row( 'offices' ); ?>

              <?php
                $img = get_sub_field( 'map_image' );
                $link = get_sub_field( 'map_link' );
              ?>

              <div class="office clearfix" id="office_<?php the_sub_field( 'title' ); ?>">
                <img class="img-fluid" src="<?php echo $img['sizes']['medium_large']; ?>" alt="<?php $img['alt']; ?>" />
                <h2 class="office-link-header"><?php the_sub_field( 'title' ); ?></h2>
                <div class="office-info">
                  <p>
                    <?php the_sub_field( 'address' ); ?>
                  </p>
                  <p>
                    <?php the_sub_field( 'address_2' ); ?>
                  </p>
                  <p>
                    <a href="tel:<?php the_sub_field( 'phone' ); ?>">
                      <?php the_sub_field( 'phone' ); ?>
                    </a>
                  </p>
                </div>
                <div class="map-link-wrap">
                  <?php if ( $link ) : ?>
                    <a class="btn map-link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                      <?php echo $link['title']; ?>
                    </a>
                  <?php endif; ?>
                </div>
              </div>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

        <?php if ( get_field( 'sidebar_content' ) || have_rows( 'bid_documents' ) ) : ?>

          <aside class="col-12 col-md-4 project-sidebar sticky-sidebar">
            <div>
              <div class="page-sidebar-content">

                <?php if ( have_rows( 'bid_documents' ) ) : ?>

                <h5>Bid Documents</h5>

                <?php while ( have_rows( 'bid_documents' ) ) : the_row( 'bid_documents' ); ?>

                  <a class="accent w-100 d-block" href="<?php the_sub_field( 'link' ); ?>" target="_blank">
                    <?php the_sub_field( 'label' ); ?> <i class="fa fa-chevron-right accent"></i>
                  </a>

                <?php endwhile; ?>
              <?php endif; ?>

              <?php if ( get_field( 'sidebar_content' ) ) : ?>
                <div class="sidebar-content-wrap">
                  <?php the_field( 'sidebar_content' ); ?>
                </div>
              <?php endif; ?>

              </div>

              <div class="text-center mt-3">

                <?php if ( get_field( 'facebook_url', 'option' ) ) : ?>

                  <a class="social-link mx-2" href="<?php the_field( 'facebook_url', 'option' ); ?>" target="_blank">
                    <i class="fa fa-2x fa-facebook"></i>
                  </a>

                <?php endif; ?>

                <?php if ( get_field( 'twitter_url', 'option' ) ) : ?>

                  <a class="social-link mx-2" href="<?php the_field( 'twitter_url', 'option' ); ?>" target="_blank">
                    <i class="fa fa-2x fa-twitter"></i>
                  </a>

                <?php endif; ?>

                <?php if ( get_field( 'instagram_url', 'option' ) ) : ?>

                  <a class="social-link mx-2" href="<?php the_field( 'instagram_url', 'option' ); ?>" target="_blank">
                    <i class="fa fa-2x fa-instagram"></i>
                  </a>

                <?php endif; ?>

              </div>
            </div>
          </aside>

        <?php endif; ?>


      </div>

    <?php endwhile; endif; ?>

  </div>
</div>

<?php get_footer(); ?>
