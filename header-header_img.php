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

        <nav class="navbar navbar-expand-md cd-nav" id="cd_header_img">

          <a class="navbar-brand img-fluid mr-auto" href="<?php bloginfo('url'); ?>">
            <?php if ( get_field( 'logo', 'option' ) ) : ?>
              <?php $logo = get_field( 'logo', 'option' ); ?>
              <img class="cd-logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
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

      </div><!-- .header-img -->

      <div class="container-fluid">
