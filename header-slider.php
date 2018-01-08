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
      $gallery = get_field( 'gallery' );
      $sliders = array();
      foreach ( $gallery as $image ) {
        if ( get_field( 'slider', $image['ID'] ) ) {
          array_push( $sliders, $image );
        }
      }
    ?>

    <div class="cd-slider-nav">

      <nav class="navbar navbar-expand-md cd-nav" id="cd_header_slider">

        <a class="navbar-brand img-fluid mr-auto" href="<?php bloginfo('url'); ?>">
          <?php if ( get_field( 'logo', 'option' ) ) : ?>
            <?php $logo = get_field( 'logo', 'option' ); ?>
            <img class="cd-logo" src="<?php echo $logo['sizes']['thumbnail']; ?>" alt="<?php echo $logo['alt']; ?>"/>
          <?php else: ?>
            <h1><?php bloginfo( 'title' ); ?></h1>
          <?php endif; ?>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle Main Menu">
          <i class="fa fa-bars fa-2x"></i>
        </button>

        <div class="collapse navbar-collapse cd-menu text-right text-md-left" id="main_menu">

          <?php
            $args = array(
              'theme_location' => 'header-menu',
              'menu_class'  => 'navbar-nav nav align-items-end',
              'container'   => 'false'
            );
            wp_nav_menu( $args );
          ?>

          <button class="search-button" data-toggle="modal" data-target="#searchForm">
             <i class="fa fa-search fa-2x ml-2 accent"></i>
           </button>

        </div>

      </nav>

      <?php get_template_part( 'breadcrumbs' ); ?>
    </div><!-- .cd-slider-nav -->

    <div id="header_carousel_<?php echo $post->ID; ?>" class="carousel">


      <div class="fl-main-carousel">
        <?php foreach ( $sliders as $image ) : ?>
          <div class="fl-carousel-cell">
            <img class="img-slider" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
          </div>
        <?php endforeach; ?>
      </div>



    </div><!-- .carousel -->


    <div class="container-fluid">
