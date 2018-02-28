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


    <?php
      if ( wp_is_mobile() ) :
        $gallery = get_field( 'gallery' );
      else :
    ?>


    <?php
      $video = get_field( 'front-page_video' );
      $poster = $video['poster'];

    ?>

      <div id="home_video_wrap" class="video-header">
        <video
          id="home_video"
          data-srclarge="<?php echo $video['video_1080']['url']; ?>"
          data-srcsmall="<?php echo $video['video_720']['url']; ?>"
          poster="<?php echo $poster['url']; ?>"
          width="100%" autoplay loop muted >
          <source type="<?php echo $video['video_1080']['mime_type']; ?>">
        </video>
      </div>

      <div class="cd-slider-nav">

        <?php get_template_part( 'template-parts/nav' ); ?>

      </div><!-- .cd-slider-nav -->

    <?php endif; ?>


    <div class="container-fluid">
