<?php

  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

  $industries = get_field( 'industries' );

?>
<div <?php post_class(); ?>>

  <div class="row">
    <div class="col">
      <h2 class="project-title accent py-3 m-0 text-center"><?php the_title(); ?></h2>
    </div>
  </div>

  <div class="row mt-2 tax-grid">
    <!-- This is the one -->

        <?php foreach ( $industries as $industry ) : ?>

          <?php $acf_term_id = 'industries_' . $industry->term_id; ?>
          <?php $img = get_field( 'industry_image', $acf_term_id ); ?>

          <a class="frontpage-gallery-item cd-grid-item tax-grid-item col-12 col-sm-6 col-md-4 col-xl-3" href="../industries/<?php echo $industry->slug; ?>">


            <div class="img">
              <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>"/>
            </div>


            <div class="text-left frontpage-project-info no-location">
              <h3 class="w-75 font-size-1 align-self-start"><?php echo $industry->name; ?></h3>
            </div>

            <p class="more-link">More  <i class="fa fa-caret-right fa-lg accent"></i></p>



          </a>

        <?php endforeach; ?>

  </div>
</div>

<?php get_footer(); ?>
