<?php

/* Styles and scripts */

  add_action( 'wp_enqueue_scripts', 'cd_theme_styles' );
  add_action( 'wp_enqueue_scripts', 'cd_theme_scripts' );

  function cd_theme_styles() {
    wp_enqueue_style( 'boostrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fa/css/font-awesome.min.css' );
    wp_enqueue_style( 'lightbox_css', get_template_directory_uri() . '/assets/lightbox/dist/css/lightbox.min.css' );
    wp_enqueue_style( 'flickity_css', get_template_directory_uri() . '/assets/flickity/flickity.min.css');
    wp_enqueue_style( 'typekit', 'https://use.typekit.net/lci6lco.css' );
    wp_enqueue_style( 'main_styles', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'component_styles', get_template_directory_uri() . '/assets/css/styles.css' );

  }

  function cd_theme_scripts() {
    wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', '', '', false );
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery', 'popper' ), '', true );
    wp_enqueue_script( 'cd_js', get_template_directory_uri() . '/assets/js/cd.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'images_loaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array( 'jquery', 'images_loaded' ) );
    wp_enqueue_script( 'lightbox_js', get_template_directory_uri() . '/assets/lightbox/dist/js/lightbox.min.js', array( 'jquery' ), false, true);
    wp_enqueue_script( 'flickity_js', get_template_directory_uri() . '/assets/flickity/flickity.pkgd.min.js', array( 'jquery' ), false );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-custom.js' );
  }

/* Add Theme Supports */

  add_theme_support( 'menus' );
  add_theme_support( 'title-tag' );

/* Create Menu Locations */

  function register_theme_menus() {
    register_nav_menus(
      array(
        'header-menu' => 'Header Menu'
      )
    );
  }
  add_action( 'init', 'register_theme_menus' );

  add_filter('nav_menu_css_class' , 'cd_nav_item' , 10 , 2);

  function cd_nav_item( $classes, $item ) {
    /* Add .nav-item to li elements in navbar */

      $classes[] = 'nav-item';
      return $classes;
  }


/* Setup widget location */
  /* TODO: Widget location is not currently being used, consider removing unless that changes */
  cd_create_widget( 'Footer Left', 'footer-left', 'Displays in the far left of the footer.' );

  function cd_create_widget( $name, $id, $description ) {
  	register_sidebar(array(
  		'name' => __( $name ),
  		'id' => $id,
  		'description' => __( $description ),
  		'before_widget' => '<div class="widget">',
  		'after_widget' => '</div>',
  		'before_title' => '<h3>',
  		'after_title' => '</h3>'
  	));
  }

/* Setup ACF */

  add_filter('acf/settings/path', 'my_acf_settings_path');

  function my_acf_settings_path( $path ) {
      $path = get_stylesheet_directory() . '/inc/acf/';
      return $path;
  }

  add_filter('acf/settings/dir', 'my_acf_settings_dir');

  function my_acf_settings_dir( $dir ) {
      $dir = get_stylesheet_directory_uri() . '/inc/acf/';
      return $dir;
  }

  include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );

  acf_add_options_page(
    array(
      'page_title' => 'Site Options',
      'position' => 3
    )
  );

  function filter_project_picker_industries( $args, $field, $post_id ) {

	// $post_id comes in here as term_# so we need to remove 'term_' to get the term ID
	$prefix = 'term_';

	// Also if you are creating a new taxonomy, post_id = 'term_0' so then there's no point in adding a filter
	if ( 'term_0' != $post_id && substr( $post_id, 0, strlen( $prefix )) == $prefix ) {
		// Set $term_id to the ID part of $post_id
		$term_id = substr( $post_id, strlen( $prefix ) );

		// And adjust the query to filter by specific taxonomy term
		$args['tax_query'] = array(
			array(
				'taxonomy'  => 'industries',
				'field'     => 'term_id',
				'terms'     => $term_id,
			),
		);
	}
	return $args;
}

function filter_project_picker_services( $args, $field, $post_id ) {

// $post_id comes in here as term_# so we need to remove 'term_' to get the term ID
$prefix = 'term_';

// Also if you are creating a new taxonomy, post_id = 'term_0' so then there's no point in adding a filter
if ( 'term_0' != $post_id && substr( $post_id, 0, strlen( $prefix )) == $prefix ) {
  // Set $term_id to the ID part of $post_id
  $term_id = substr( $post_id, strlen( $prefix ) );

  // And adjust the query to filter by specific taxonomy term
  $args['tax_query'] = array(
    array(
      'taxonomy'  => 'services',
      'field'     => 'term_id',
      'terms'     => $term_id,
    ),
  );
}
return $args;
}

// filter for a specific field based on itss name
// add_filter('acf/fields/post_object/query/name=projects_picker_industries', 'filter_project_picker_industries', 10, 3);
// add_filter('acf/fields/post_object/query/name=projects_picker_services', 'filter_project_picker_services', 10, 3);


function filter_project_picker_awards( $args, $field, $post_id ) {


  // And adjust the query to filter by specific taxonomy term
  $args['meta_key'] = 'recognition';

  return $args;
}
//add_filter('acf/fields/post_object/query/name=included_projects', 'filter_project_picker_awards', 10, 3);


function cd_get_minimum_img_size( $image, $min_width ) {
  // TODO: check to make sure this is being used somewhere */
  if ( $image['sizes']['thumbnail-width'] > $min_width ) {
    $img_size = $image['sizes']['thumbnail'];
  } elseif ( $image['sizes']['medium-width'] > $min_width ) {
    $img_size = $image['sizes']['medium'];
  } elseif ( $image['sizes']['large-width'] > $min_width ) {
    $img_size = $image['sizes']['large'];
  } else {
    $img_size = $image['url'];
  }


  return $img_size;

}

function cd_map_link( $address, $city, $state, $zip ) {
  /**
   * Converts a string containing an address into a google maps link.
   *
   * @param string $address The address to be converted.
   * @return string $href new string containing a url specifying the address on a google map.
   */


  $address = (string)$address;
  $city = (string)$city;
  $state = (string)$state;
  $zip = (string)$zip;

  $address = preg_replace('/\s+/', '+', $address);
  $city = preg_replace('/\s+/', '+', $city);
  $state = preg_replace('/\s+/', '+', $state);
  $zip = preg_replace('/\s+/', '+', $zip);

  $href = $address . '+' . $city . '+' . $state . '+' . $zip;
  return $href;
}

function acf_load_office_field_choices($field) {

    // reset choices
    $field['choices'] = array();

    while ( have_rows('offices', 'post_1465') ) : the_row();
      $value = get_sub_field('title');
      $title = get_sub_field('title');
      $field['choices'][ $value ] = $title;

    endwhile;

    // return the field
    return $field;

  }

  add_filter('acf/load_field/name=office_select', 'acf_load_office_field_choices');

  // add_filter('apto/navigation_sort_apply', 'theme_apto_navigation_sort_apply');
  // function theme_apto_navigation_sort_apply($current) {
  //   global $post;
  //   if($post->post_type == 'project') {
  //     $current = TRUE;
  //   } else {
  //     $current = FALSE;
  //   }
  //   return $current;
  // }
