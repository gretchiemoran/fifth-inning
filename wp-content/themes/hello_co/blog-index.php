<?php
/**
 * Template Name: Category Index
 *
 * @package   Hello Co
 * @copyright Copyright (c) 2019, Hello You Designs
 * @license   GPL-2.0+
 * @since     1.0.1
 */

 add_action( 'genesis_meta', 'hyd_blog_index_genesis_meta' );
 /**
  * Add widget support for recipes page.
  * If no widgets active, display the default page content.
  *
  * @since 1.0.1
  */
 function hyd_blog_index_genesis_meta() {
 	if ( is_active_sidebar( 'blog-index' ) || is_active_sidebar( 'blog-cat-index' ) ) {
 		// Remove the default Genesis loop.
 		remove_action( 'genesis_loop', 'genesis_do_loop' );
 		// Add a custom loop for the home page.
 		add_action( 'genesis_loop', 'hyd_blog_index_loop_helper' );
    // Force full width content.
    add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

 	}
 }


/**
 * Display the recipe page widgeted sections.
 *
 * @since 1.0.0
 */
function hyd_blog_index_loop_helper() {
	//* Hooks widget area before footer
	  genesis_widget_area( 'blog-index', array(
	  'before' => '<div id="blog-index" class="blog-index"><div class="wrap">',
	  'after'  => '</div></div>',
	  ) );

	genesis_widget_area( 'blog-cat-index', array(
		'before' => '<div class="blog-cat-index"><div class="home-featured"><div class="hyd-entry">',
		'after'  => '</div></div></div>',
	) );

}

genesis();
