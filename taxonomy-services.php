<?php

  $currentTerm = get_queried_object();
  $acfID = $currentTerm->taxonomy . '_' . $currentTerm->term_id;

  if ( get_field( 'image', $acfID ) ) {
    get_header( 'services' );
  } else {
    get_header();
  }

  if ( get_field( 'limit_projects_to', $acfID ) ) {
    $posts_per_page = get_field( 'limit_projects_to', $acfID );
  } else {
    $posts_per_page = -1;
  }

  $args = array(
    'post_type' => 'project',
    'tax_query' => array(
      array(
        'taxonomy' => 'services',
        'field' => 'slug',
        'terms' => $currentTerm->slug
      )
    ),
    'posts_per_page' => $posts_per_page
  );
  $query = new WP_Query( $args );

  // $projects = get_field( 'projects_picker_services', $acfID );

?>

<div class="row">
  <div class="industry-title-wrap text-center">
    <h2 class="accent"><?php echo $currentTerm->name; ?></h2>

    <?php if ( term_description() ) : ?>
      <div class="term-description">
        <?php echo term_description(); ?>
      </div>
    <?php endif; ?>

  </div>
</div>


<?php if ( $query->have_posts() ) : ?>

  <div class="tax-grid row">

    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

      <?php get_template_part( '/template-parts/grid-single-project' ); ?>

    <?php endwhile; ?>

  </div>


<?php endif; wp_reset_postdata(); ?>



<?php get_footer(); ?>
