<?php
/**
* This file adds the Landing Page template to the Hello Co Theme
*
* @package      Hello Co
* @link         https://helloyoudesigns.com
* @author       Hello You Designs
* @copyright    Copyright (c) 2019, Hello You Designs
* @license      GPL-2.0+
*/

/*
Template Name: Landing
*/

//* Add custom body class to the head
add_filter( 'body_class', 'hyd_add_body_class' );
function hyd_add_body_class( $classes ) {

$classes[] = 'hyd-landing';
return $classes;

}

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Remove elements
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_after_header', 'hyd_menus_container' );
remove_action( 'genesis_after_header', 'hyd_side_content_output' );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_footer', 'hyd_footer_menu', 7 );
remove_action( 'genesis_before_footer', 'hyd_social_bar' );
remove_action( 'genesis_before_content', 'hyd_widget_above_content' );
remove_action( 'genesis_after_content', 'hyd_widget_below_content'  );
remove_action( 'genesis_footer', 'hyd_custom_footer' );
remove_action( 'genesis_before_header', 'genesis_do_nav', 7 );
remove_action( 'genesis_header', 'hyd_header_left_menu', 6 );
remove_action( 'genesis_before_footer', 'hyd_footer_menu', 7 );
remove_action( 'genesis_header', 'hyd_header_right_menu', 9 );
remove_action( 'genesis_before', 'hyd_social_bar_header',11);

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Remove site footer widgets
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

//* Run the Genesis loop
genesis();
