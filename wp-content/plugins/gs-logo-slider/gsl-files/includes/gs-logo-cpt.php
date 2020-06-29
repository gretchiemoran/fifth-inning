<?php
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/

if ( ! function_exists('GS_Logo_Slider')) {

	function GS_Logo_Slider() {

		$labels = array(
			'name'               => _x( 'Logos', 'gslogo' ),
			'singular_name'      => _x( 'Logo', 'gslogo' ),
			'menu_name'          => _x( 'GS Logos', 'admin menu', 'gslogo' ),
			'name_admin_bar'     => _x( 'Logo', 'add new on admin bar', 'gslogo' ),
			'add_new'            => _x( 'Add New Logo', 'logo', 'gslogo' ),
			'add_new_item'       => __( 'Add New Logo', 'gslogo' ),
			'new_item'           => __( 'New Logo', 'gslogo' ),
			'edit_item'          => __( 'Edit Logo', 'gslogo' ),
			'view_item'          => __( 'View Logo', 'gslogo' ),
			'all_items'          => __( 'All Logos', 'gslogo' ),
			'search_items'       => __( 'Search Logos', 'gslogo' ),
			'parent_item_colon'  => __( 'Parent Logos:', 'gslogo' ),
			'not_found'          => __( 'No logos found.', 'gslogo' ),
			'not_found_in_trash' => __( 'No logos found in Trash.', 'gslogo' ),
		);

		$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'logo' ),
				'capability_type'    => 'post',
				'has_archive'        => false,
				'exclude_from_search' => true,
				'hierarchical'       => false,
				'menu_position'      => 5,
				'menu_icon'          => 'dashicons-screenoptions',
				'supports'           => array( 'title', 'thumbnail','editor' )
			);

			register_post_type( 'gs-logo-slider', $args );
	}
}

add_action( 'init', 'GS_Logo_Slider' );


// =============taxonomy==================

if ( ! function_exists( 'gs_logo_category' ) ) {

// Register Custom Taxonomy For Logo Slider
function gs_logo_category() {

	$labels = array(
		'name'                       => _x( 'Logo categories', 'Taxonomy General Name', 'gslogo' ),
		'singular_name'              => _x( 'Logo category', 'Taxonomy Singular Name', 'gslogo' ),
		'menu_name'                  => __( 'Logo Category', 'gslogo' ),
		'all_items'                  => __( 'All logo Category', 'gslogo' ),
		'parent_item'                => __( 'Parent logo Category', 'gslogo' ),
		'parent_item_colon'          => __( 'Parent logo Category:', 'gslogo' ),
		'new_item_name'              => __( 'New logo Category', 'gslogo' ),
		'add_new_item'               => __( 'Add New logo Category', 'gslogo' ),
		'edit_item'                  => __( 'Edit logo Category', 'gslogo' ),
		'update_item'                => __( 'Update logo Category', 'gslogo' ),
		'separate_items_with_commas' => __( 'Separate logo Category with commas', 'gslogo' ),
		'search_items'               => __( 'Search logo Category', 'gslogo' ),
		'add_or_remove_items'        => __( 'Add or remove logo Category', 'gslogo' ),
		'choose_from_most_used'      => __( 'Choose from the most used logo categories', 'gslogo' ),
		'not_found'                  => __( 'Not Found', 'gslogo' ),
	);
	$rewrite = array(
		'slug'                       => 'logo-category',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'logo-category', array( 'gs-logo-slider' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'gs_logo_category', 0 );

}

// Register Theme Features (feature image for Logo)
if ( ! function_exists('gs_logo_theme_support') ) {

	function gs_logo_theme_support()  {
		// Add theme support for Featured Images
		add_theme_support( 'post-thumbnails', array( 'gs-logo-slider' ) );
		add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add it for posts
		add_theme_support( 'post-thumbnails', array( 'page' ) ); // Add it for pages
		add_theme_support( 'post-thumbnails', array( 'product' ) ); // Add it for products
		add_theme_support( 'post-thumbnails');
		// Add Shortcode support in text widget
		add_filter('widget_text', 'do_shortcode'); 
	}

	// Hook into the 'after_setup_theme' action
	add_action( 'after_setup_theme', 'gs_logo_theme_support' );
}