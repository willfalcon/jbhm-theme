<?php
  if ( get_field( 'header_img' ) ) {
    $headerImg = get_field( 'header_img' );
    $headerImg = $headerImg['sizes']['large'];
    $headerHeight = get_field( 'header_height' );
    $headerHeightCss = 'height: ' . $headerHeight . 'px;';
  } else {
    $images = get_field( 'gallery' );
    $firstImg = $images[0];
    $headerImg = $firstImg['url'];
    if ( get_field( 'header_height' ) ) {
      $headerHeight = get_field( 'header_height' );
    } elseif ( $firstImg['height'] < 450 ) {
      $headerHeight = $firstImg['height'];
    } else {
      $headerHeight = 450;
    }
    // max-height: 100vh;';
  }

  $headerHeightCss = 'height: ' . $headerHeight . 'px;';
  $headerImgCss = 'background: url(' . $headerImg . ');';
?>

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

    <style>
      div.header-img {
        <?php echo $headerImgCss; ?>
        background-size: cover;
        background-repeat: no-repeat;
        <?php if ( is_front_page() ) : ?>
          height: 100vh;
        <?php else : ?>
          <?php echo $headerHeightCss; ?>
        <?php endif; ?>
        background-position: center;
        max-height: 100vh;
      }
      nav.cd-nav {
        background-color: rgba(55, 55, 55, .6);
      }
    </style>

  </head>

  <body <?php body_class(); ?>>



      <div class="header-img">

        <?php get_template_part( '/template-parts/nav' ); ?>

      </div><!-- .header-img -->

      <div class="container-fluid">
