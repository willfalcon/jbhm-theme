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

    <!-- Search Modal -->
    <div class="modal fade" id="searchForm" tabindex="-1" role="dialog" aria-labelledby="searchForm" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">

            <form id="cd_search_form" method="get" action="<?php echo home_url(); ?>">

              <input id="search_box" class="form-control" type="text" name="s">

              <input type="submit" id="cd_search" class="btn" value="Search">

            </form>

          </div>

        </div>
      </div>
    </div>



      <?php wp_footer(); ?>

      <?php get_template_part( '/assets/a/gtm', 'footer' ); ?>
  </body>
</html>
