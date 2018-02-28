<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

    <?php get_template_part( '/assets/a/gtm', 'head' ); ?>

    <?php wp_head(); ?>


  </head>

  <body <?php body_class(); ?>>

    <div class="cd-slider-nav">

      <?php get_template_part( '/template-parts/nav' ); ?>

    </div><!-- .cd-slider-nav -->

    <div id="header_carousel_<?php echo $post->ID; ?>">

      <?php
        $gallery = get_field( 'gallery' );
        $sliders = array();
        foreach ( $gallery as $image ) {
          if ( get_field( 'slider', $image['ID'] ) ) {
            array_push( $sliders, $image );
          }
        }
      ?>

      <div class="fl-main-carousel">
        <?php foreach ( $sliders as $image ) : ?>
          <div class="fl-carousel-cell">
            <img class="img-slider" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
          </div>
        <?php endforeach; ?>
      </div>



    </div><!-- .carousel -->


    <div class="container-fluid">
