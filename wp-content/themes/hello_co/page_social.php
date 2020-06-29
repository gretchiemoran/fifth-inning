<?php
/**
* This file adds the Social Page to the Hello Co Theme
*
* @package      Hello Co
* @link         https://helloyoudesigns.com
* @author       Hello You Designs
* @copyright    Copyright (c) 2019, Hello You Designs
* @license      GPL-2.0+
*/

/*
Template Name: Social Page
*/
//* Add custom body class to the head
add_filter( 'body_class', 'hyd_add_body_class' );
function hyd_add_body_class( $classes ) {

$classes[] = 'hyd-social';
return $classes;

}

add_action( 'genesis_meta', 'hyd_social_genesis_meta' );

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

/**
* Add widget support for social page. If no widgets active, display the default loop.
*
*/
function hyd_social_genesis_meta() {
if ( is_active_sidebar( 'social-page' )) {
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'hyd_social_page_sections' );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );
}
}

function hyd_social_page_sections() {
genesis_widget_area( 'social-page', array(
'before' => '<div class="social-page">',
'after'  => '</div>',
) );

}

genesis();
