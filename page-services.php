<?php

  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

  $args = array(
    'taxonomy' => 'services',
    'hide_empty' => false,
    'orderby' => 'name',
    'order' => 'ASC'
  );

  $query = new WP_Term_Query( $args );

  $services = get_field( 'services' );
?>

<div <?php post_class(); ?>>

  <div class="row">
    <div class="col">
      <h2 class="project-title accent py-3 m-0 text-center"><?php the_title();  ?></h2>
    </div>
  </div>

  <div class="row mt-2 tax-grid">

        <?php foreach ( $services as $service ) : ?>

          <?php $acf_term_id = 'services_' . $service->term_id; ?>
          <?php $img = get_field( 'image', $acf_term_id ); ?>

          <a class="frontpage-gallery-item cd-grid-item tax-grid-item col-12 col-sm-6 col-md-4 col-xl-3" href="../services/<?php echo $service->slug; ?>">

            <div class="img">
              <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>"/>
            </div>

            <div class="text-left frontpage-project-info no-location">
              <h3 class="w-75 font-size-1 align-self-start"><?php echo $service->name; ?></h3>
            </div>

          </a>


        <?php endforeach; ?>

  </div>
</div>

<?php get_footer(); ?>
