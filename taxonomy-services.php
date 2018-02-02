<?php

  $currentTerm = get_queried_object();
  $acfID = $currentTerm->taxonomy . '_' . $currentTerm->term_id;

  if ( get_field( 'image', $acfID ) ) {
    get_header( 'services' );
  } else {
    get_header();
  }

  // $args = array(
  //   'post_type' => 'project',
  //   'tax_query' => array(
  //     array(
  //       'taxonomy' => 'services',
  //       'field' => 'slug',
  //       'terms' => $currentTerm->slug
  //     )
  //   ),
  //   'posts_per_page' => -1
  // );
  // $query = new WP_Query( $args );
  //
  $projects = get_field( 'projects_picker_services', $acfID );

?>

<div class="row">
  <div class="industry-title-wrap text-center">
    <h2 class="accent"><?php echo $currentTerm->name; ?></h2>

    <?php if ( $currentTerm->description ) : ?>
      <div class="term-description">
        <p><?php echo $currentTerm->description; ?></p>
      </div>
    <?php endif; ?>
  </div>
</div>


<?php if ( $projects ) : ?>

  <div class="tax-grid row">

    <?php foreach ( $projects as $post ) : setup_postdata( $post ); ?>

      <?php get_template_part( '/template-parts/grid-single-project' ); ?>

    <?php endforeach; ?>

  </div>


<?php endif; wp_reset_postdata(); ?>



<?php get_footer(); ?>
