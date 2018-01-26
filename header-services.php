<?php

$currentTerm = get_queried_object();
$acfID = $currentTerm->taxonomy . '_' . $currentTerm->term_id;
$headerImg = get_field( 'image', $acfID );
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

        <nav class="navbar navbar-expand-md cd-nav" id="cd_header">

          <a class="navbar-brand img-fluid mr-auto" href="<?php bloginfo('url'); ?>">
            <?php if ( get_field( 'logo', 'option' ) ) : ?>
              <?php $logo = get_field( 'logo', 'option' ); ?>
              <img id="cd_logo" class="cd-logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
            <?php else: ?>
              <h1><?php bloginfo( 'title' ); ?></h1>
            <?php endif; ?>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle Main Menu">
            <i id="cd_toggle" class="fa fa-bars cd-nav-toggle"></i>
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

            <button class="search-button" id="searchButton">
              <i class="fa fa-search fa-2x ml-2 accent"></i>
            </button>

            <form class="form-inline search-form" id="searchForm" method="GET" action="<?php echo home_url(); ?>">
              <input class="form-control" type="search" aria-label="Search" name="s">
              <button class="btn search-submit" type="submit">
                Search
              </button>
            </form>

          </div>
        </nav>

        <!-- <?php //get_template_part( 'breadcrumbs' ); ?> -->

      </div><!-- .header-img -->

      <div class="container-fluid">
