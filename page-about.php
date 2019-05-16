<?php
  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }
?>

<div class="row mt-2">
  <div class="page-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <h2 class="accent my-4 page-title text-center"><?php the_title(); ?></h2>

    <?php the_content() ?>

    <?php endwhile; else: ?>

      <h3 class="mb-4 page-error">Sorry, nothing here!</h3>

    <?php endif; wp_reset_postdata(); ?>

    <?php $awards // get_template_part( 'template-parts/awards-query.php') ?>
    
    <div class="design-excellence">
      <?php the_field( 'design_excellence_section' ); ?>
    </div>
    
  </div>
</div>

<?php get_footer(); ?>
