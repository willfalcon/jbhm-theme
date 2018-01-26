<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icon path here -->
    <link rel="icon" href="">
    <?php get_template_part( '/assets/a/gtm', 'head' ); ?>

    <?php wp_head(); ?>


  </head>

  <body <?php body_class(); ?>>

    <?php
      // $gallery = get_field( 'gallery' );
      // $sliders = array();
      // foreach ( $gallery as $image ) {
      //   if ( get_field( 'slider', $image['ID'] ) ) {
      //     array_push( $sliders, $image );
      //   }
      // }
    ?>


    <?php
      $video = get_field( 'video' );
      $poster = get_field( 'poster' );
    ?>

      <div class="video-header">
        <video width="100%" autoplay loop muted poster="<?php echo $poster['url']; ?>">
          <source src="<?php echo $video['url']; ?>" type="<?php echo $video['mime_type']; ?>">
        </video>
      </div>

      <div class="cd-slider-nav">

        <?php get_template_part( 'template-parts/nav' ); ?>

      </div><!-- .cd-slider-nav -->




    <div class="container-fluid">
