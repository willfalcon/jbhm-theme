<?php

	function cptui_register_my_cpts() {

		/**
		 * Post Type: Services.
		 */

		$labels = array(
			"name" => __( "Services", "jbhm" ),
			"singular_name" => __( "Service", "jbhm" ),
		);

		$args = array(
			"label" => __( "Services", "jbhm" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => true,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "service", "with_front" => true ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
			"taxonomies" => array( "category" ),
		);

		register_post_type( "service", $args );

		/**
		 * Post Type: People.
		 */

		$labels = array(
			"name" => __( "People", "jbhm" ),
			"singular_name" => __( "Person", "jbhm" ),
		);

		$args = array(
			"label" => __( "People", "jbhm" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => "people",
			"show_in_menu" => true,
			"exclude_from_search" => true,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "person", "with_front" => true ),
			"query_var" => true,
			"menu_icon" => "dashicons-businessman",
			"supports" => array( "title", "editor", "custom-fields" ),
			"taxonomies" => array( "category" ),
		);

		register_post_type( "person", $args );

		/**
		 * Post Type: Projects.
		 */

		$labels = array(
			"name" => __( "Projects", "jbhm" ),
			"singular_name" => __( "Project", "jbhm" ),
		);

		$args = array(
			"label" => __( "Projects", "jbhm" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "project", "with_front" => true ),
			"query_var" => true,
			"menu_icon" => "dashicons-building",
			"supports" => array( "title", "editor", "thumbnail" ),
			"taxonomies" => array( "category" ),
		);

		register_post_type( "project", $args );
	}

	add_action( 'init', 'cptui_register_my_cpts' );

	function cptui_register_my_taxes() {

		/**
		 * Taxonomy: Industries.
		 */

		$labels = array(
			"name" => __( "Industries", "jbhm" ),
			"singular_name" => __( "Industry", "jbhm" ),
		);

		$args = array(
			"label" => __( "Industries", "jbhm" ),
			"labels" => $labels,
			"public" => true,
			"hierarchical" => false,
			"label" => "Industries",
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"rewrite" => array( 'slug' => 'industries', 'with_front' => true, ),
			"show_admin_column" => false,
			"show_in_rest" => false,
			"rest_base" => "",
			"show_in_quick_edit" => false,
		);
		register_taxonomy( "industries", array( "project" ), $args );
	}

	add_action( 'init', 'cptui_register_my_taxes' );

?>
