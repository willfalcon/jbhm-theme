<nav class="navbar navbar-expand-lg cd-nav<?php if ( wp_is_mobile() ) { echo ' cd-mobile-nav'; } ?>" id="cd_header">


  <a class="navbar-brand img-fluid mr-auto" href="<?php bloginfo('url'); ?>">
    <?php if ( get_field( 'logo', 'option' ) ) : ?>
      <?php $logo = get_field( 'logo', 'option' ); ?>
      <img class="cd-logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
    <?php else: ?>
      <h1><?php bloginfo( 'title' ); ?></h1>
    <?php endif; ?>
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle Main Menu">
    <i id="cd_toggle" class="fa fa-bars"></i>
  </button>

  <div class="collapse navbar-collapse cd-menu text-right text-lg-left" id="main_menu">

    <?php
      $args = array(
        'theme_location' => 'header-menu',
        'menu_class'  => 'navbar-nav nav align-items-end',
        'container'   => 'false'
      );
      wp_nav_menu( $args );
    ?>

    <a class="search-button" href="#search_here">
      <i class="fa fa-search fa-2x ml-2 accent"></i>
    </a>

  </div>



</nav>
