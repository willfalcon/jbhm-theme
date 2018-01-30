<?php

  $logo = get_field( 'footer_logo', 'option' );

?>

      <div class="cd-footer row">

        <div class="footer-logo">

          <h1 class="mt-1 mr-4">
            <strong>JBHM</strong> Architecture
          </h1>


        </div>

        <div class="footer-contact">
          <?php if ( get_field( 'facebook_url', 'option' ) ) : ?>

            <a class="social-link" href="<?php the_field( 'facebook_url', 'option' ); ?>" target="_blank">
              <span class="fa-stack fa-lg social-icon">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x"></i>
              </span>
            </a>

          <?php endif; ?>

          <?php if ( get_field( 'twitter_url', 'option' ) ) : ?>

            <a class="social-link" href="<?php the_field( 'twitter_url', 'option' ); ?>" target="_blank">
              <span class="fa-stack fa-lg social-icon">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x"></i>
              </span>
            </a>

          <?php endif; ?>

          <?php if ( get_field( 'instagram_url', 'option' ) ) : ?>

            <a class="social-link" href="<?php the_field( 'instagram_url', 'option' ); ?>" target="_blank">
              <span class="fa-stack fa-lg social-icon">
                <i class="fa fa-2x fa-instagram fa-stack-2x"></i>
              </span>
            </a>

          <?php endif; ?>

          <?php if ( get_field ( 'contact_phone', 'option' ) ) : ?>

            <a class="my-1" href="tel:<?php the_field( 'contact_phone', 'option' ); ?>">
              <?php the_field( 'contact_phone', 'option' ); ?>
            </a>

          <?php endif; ?>

          <?php if ( get_field( 'contact_email', 'option' ) ) : ?>

            <a class="my-1" href="mailto:<?php the_field( 'contact_email', 'option' ); ?>">
              <?php the_field( 'contact_email', 'option' ); ?>
            </a>

          <?php endif; ?>

        </div><!-- .footer-contact -->


          <?php if ( get_field( 'copyright_label', 'option' ) ) : ?>
            <p class="copyright my-1">&copy; <?php the_field( 'copyright_label', 'option' ); ?> <?php echo date_i18n('Y'); ?>
          <?php endif; ?>



      </div><!-- .cd-footer -->

    </div><!-- .container-fluid -->

      <?php wp_footer(); ?>

      <?php get_template_part( '/assets/a/gtm', 'footer' ); ?>
  </body>
</html>
