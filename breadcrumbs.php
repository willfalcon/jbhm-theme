<?php

  $queriedObject = get_queried_object();

  /*
    TODO: Make '/projects' a list of all projects, then make "Projects" link in header link to industries archive page.
  */

  // Don't show breadcrumbs on the front page.
  if ( ! is_front_page() ) :


    if ( is_page( 'projects' ) ) :
      get_template_part( 'inc/breadcrumbs/page', 'projects' );
    elseif ( is_page( 'services' ) ) :
      get_template_part( 'inc/breadcrumbs/page', 'services' );
    elseif ( is_page() ) :
      get_template_part( 'inc/breadcrumbs/page' );
    endif;


    if ( is_single() && ! is_page() ) :
      get_template_part( 'inc/breadcrumbs/single-post-type' );
    endif;

    if ( is_tax() ) :
      get_template_part( 'inc/breadcrumbs/taxonomy' );
    endif;

  endif;

?>
