<?php

  $currentTerm = get_queried_object();
  $acfID = $currentTerm->taxonomy . '_' . $currentTerm->term_id;

  if ( get_field( 'industry_image', $acfID ) ) {
    get_header( 'industries' );
  } else {
    get_header();
  }


  $args = array(
    'post_type' => 'project',
    'tax_query' => array(
      array(
        'taxonomy' => 'industries',
        'field' => 'slug',
        'terms' => $currentTerm->slug
      )
    ),
    'posts_per_page' => -1
  );
  $query = new WP_Query( $args );

  $acfID = 'industries_' . $currentTerm->term_id;
  // $projects = get_field( 'projects_picker', $acfID );

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
