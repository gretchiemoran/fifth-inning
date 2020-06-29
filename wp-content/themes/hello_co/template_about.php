<?php

/**
 * This file adds the About Page to the Hello Co Theme.
 *
 * @package      Hello Co
 * @link         https://fifthinning.com
 * @author       Gretchen Moran
 * @copyright    Copyright (c) 2020, Fifth Inning, LLC
 * @license      GPL-2.0+
 */

/*
 * Template Name: About
 * Template Post Type: page
 */

add_action('genesis_meta', 'hyd_about_page_genesis_meta');
/**
 * Add widget support for aboutpage. If no widgets active, display the default loop.
 *
 */
function hyd_about_page_genesis_meta()
{
    if (is_active_sidebar('image-section-added'))
        //* Enqueue scripts
        add_action('wp_enqueue_scripts', 'hyd_enqueue_hyd_script');

    function hyd_enqueue_hyd_script()
    {

        wp_enqueue_script('global-script', get_bloginfo('stylesheet_directory') . '/js/global.js', array(
            'jquery'
        ), '1.0.0');
        wp_enqueue_script('localScroll', get_stylesheet_directory_uri() . '/js/jquery.localScroll.min.js', array(
            'scrollTo'
        ), '1.2.8b', true);
        wp_enqueue_script('scrollTo', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.min.js', array(
            'jquery'
        ), '1.4.5-beta', true);
        wp_enqueue_style('hyd-front-styles', get_stylesheet_directory_uri() . '/style-front.css', array());
        wp_enqueue_style('hyd-about-styles', get_stylesheet_directory_uri() . '/style-about.css', array());

    }

    //* Remove breadcrumbs
    remove_action('genesis_before_loop', 'genesis_do_breadcrumbs');

    //* Add widgets on front page
    add_action('genesis_after_header', 'hyd_about_page_widgets');

    add_filter('genesis_site_layout', '__genesis_return_full_width_content');


}


//* Add widgets on front page
    function hyd_about_page_widgets()
    {

        if (get_query_var('paged') >= 2) return;


        genesis_widget_area('home-full-width', array(
            'before' => '<div id="home-full-width" class="home-full-width"><div class="wrap"><div class="widget-area fadeup-effect' . hyd_widget_area_class('home-full-width') . '">',
            'after' => '</div></div></div>',
        ));



        genesis_widget_area('image-section-added', array(
            'before' => '<div id="image-section-added" class="image-section-added"><div class="image-section"><div class="wrap"><div class="widget-area fadeup-effect' . hyd_widget_area_class('image-section-added') . '">',
            'after' => '</div></div></div></div>',
        ));

    }

//* Run the Genesis function
    genesis();

