<?php

  $currentTerm = get_queried_object();
  $acfID = $currentTerm->taxonomy . '_' . $currentTerm->term_id;
  $headerImg = get_field( 'industry_image', $acfID );
  $headerHeight = get_field( 'header_image_height', $acfID );
  $headerImg = $headerImg['sizes']['large'];
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


        <!-- <?php //get_template_part( 'breadcrumbs' ); ?> -->

      </div><!-- .header-img -->

      <div class="container-fluid">
