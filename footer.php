      <div class="row cd-footer">


        <div class="col-12 col-md-6 cd-footer-col">
          <div class="text-md-center">
          	<div class="d-inline-block text-left">
              <?php get_sidebar( 'footer_left_center' ); ?>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 cd-copyright text-md-center cd-footer-col">
          <?php get_sidebar( 'footer_right' ); ?>
        </div>

      </div>

    </div><!--.container-fluid-->

      <?php wp_footer(); ?>

      <?php get_template_part( '/assets/a/gtm', 'footer' ); ?>
  </body>
</html>
