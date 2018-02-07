<?php

  $logo = get_field( 'footer_logo', 'option' );

?>

      <div id="cd_footer" class="cd-footer row">

        <div class="footer-logo d-flex align-items-center">

          <h1 class="my-md-0 mr-md-4">
            <strong>JBHM</strong> Architecture
          </h1>


        </div>

        <div class="footer-contact d-flex align-items-center">
          <?php if ( get_field( 'facebook_url', 'option' ) ) : ?>

            <a class="social-link" href="<?php the_field( 'facebook_url', 'option' ); ?>" target="_blank">
              <span class="my-0 fa-stack fa-lg social-icon">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x"></i>
              </span>
            </a>

          <?php endif; ?>

          <?php if ( get_field( 'twitter_url', 'option' ) ) : ?>

            <a class="social-link" href="<?php the_field( 'twitter_url', 'option' ); ?>" target="_blank">
              <span class="my-0 fa-stack fa-lg social-icon">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x"></i>
              </span>
            </a>

          <?php endif; ?>

          <?php if ( get_field( 'instagram_url', 'option' ) ) : ?>

            <a class="my-0 social-link" href="<?php the_field( 'instagram_url', 'option' ); ?>" target="_blank">
              <span class="fa-stack fa-lg social-icon">
                <i class="fa fa-2x fa-instagram fa-stack-2x"></i>
              </span>
            </a>

          <?php endif; ?>

          <?php if ( get_field ( 'contact_phone', 'option' ) ) : ?>

            <a class="my-md-0" href="tel:<?php the_field( 'contact_phone', 'option' ); ?>">
              <?php the_field( 'contact_phone', 'option' ); ?>
            </a>

          <?php endif; ?>

          <?php if ( get_field( 'contact_email', 'option' ) ) : ?>

            <a class="my-md-0" href="mailto:<?php the_field( 'contact_email', 'option' ); ?>">
              <?php the_field( 'contact_email', 'option' ); ?>
            </a>

          <?php endif; ?>

        </div><!-- .footer-contact -->


            <div class="search-form">
              <form class="form-inline search-form justify-content-center" id="searchForm" method="GET" action="<?php echo home_url(); ?>">
                <input id="search_here" class="form-control mb-1 mb-md-0 mr-md-1" type="search" aria-label="Search" name="s">
                <button class="btn search-submit mt-1 mt-md-0 ml-md-1" type="submit">
                  Search
                </button>
              </form>
            </div>

          <?php if ( get_field( 'copyright_label', 'option' ) ) : ?>
            <div class="d-flex align-items-center">
              <p class="copyright mt-3 my-md-0">&copy; <?php the_field( 'copyright_label', 'option' ); ?> <?php echo date_i18n('Y'); ?>
            </div>
          <?php endif; ?>



      </div><!-- .cd-footer -->

    </div><!-- .container-fluid -->

      <?php wp_footer(); ?>

      <?php get_template_part( '/assets/a/gtm', 'footer' ); ?>
  </body>
</html>
