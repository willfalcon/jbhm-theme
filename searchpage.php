<?php
  /*
  Template Name: Search Page
  */
?>


<?php
  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }
?>

<div class="row mt-2">
  <div class="col page-content">

  <h2>Search</h2>

  <?php get_search_form(); ?>


      <h3 class="mb-4">Sorry, nothing here!</h3>


  </div>
</div>

<?php get_footer(); ?>
