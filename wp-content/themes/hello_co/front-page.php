<?php
/**
* This file adds the Custom Home Page to the Hello Co Theme.
*
* @package      Hello Co
* @link         https://helloyoudesigns.com
* @author       Hello You Designs
* @copyright    Copyright (c) 2019, Hello You Designs
* @license      GPL-2.0+
*/


add_action( 'genesis_meta', 'hyd_front_page_genesis_meta' );
/**
* Add widget support for homepage. If no widgets active, display the default loop.
*
*/
function hyd_front_page_genesis_meta() {
if ( is_active_sidebar( 'home-full-optin' ) || is_active_sidebar( 'home-full' ) || is_active_sidebar( 'home-badge' ) || is_active_sidebar( 'featured-post-1' ) || is_active_sidebar( 'featured-post-2' ) || is_active_sidebar( 'home-full-width' ) || is_active_sidebar( 'image-section-2' ) || is_active_sidebar( 'featured-post-3' ) || is_active_sidebar( 'image-section-3' ) || is_active_sidebar( 'home-full-2' ))

//* Enqueue scripts
add_action( 'wp_enqueue_scripts', 'hyd_enqueue_hyd_script' );
function hyd_enqueue_hyd_script() {

wp_enqueue_script( 'global-script', get_bloginfo( 'stylesheet_directory' ) . '/js/global.js', array( 'jquery' ), '1.0.0' );
wp_enqueue_script( 'localScroll', get_stylesheet_directory_uri() . '/js/jquery.localScroll.min.js', array( 'scrollTo' ), '1.2.8b', true );
wp_enqueue_script( 'scrollTo', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.5-beta', true );
wp_enqueue_style( 'hyd-front-styles', get_stylesheet_directory_uri() . '/style-front.css', array());

}

//* Add front-page body class
add_filter( 'body_class', 'hyd_body_class' );
function hyd_body_class( $classes ) {

$classes[] = 'front-page';
return $classes;

}

//* Add featured-section body class
if ( is_active_sidebar( 'image-section-1' ) ) {

//* Add image-section-start body class
add_filter( 'body_class', 'hyd_featured_body_class' );
function hyd_featured_body_class( $classes ) {

$classes[] = 'featured-section';
return $classes;

}
}


//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Add widgets on front page
add_action( 'genesis_after_header', 'hyd_front_page_widgets' );

$blog = get_option( 'hyd_blog_setting', 'true' );

if ( $blog === 'true' ) {

//* Add opening markup for blog section
add_action( 'genesis_before_loop', 'hyd_front_page_blog_open' );

//* Add closing markup for blog section
add_action( 'genesis_after_loop', 'hyd_front_page_blog_close' );


//* Relocate the post image
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1);
add_action('genesis_entry_header', 'hello_second_hero', 2);

/**
* Callback for the above action. Outputs the hero.
*
* @return void
*/
function hello_second_hero()
{
echo '<div class="hero-wrap"><div class="hero-image">';
$hero = new HelloSecondImage\Pub\Display;
?>

<!-- Display as an image element: -->
<img src="<?php echo $hero->src; ?>" alt="<?php echo $hero->alt; ?>" srcset="<?php echo $hero->srcset; ?>" >

<!-- Use the image as the background of a container: -->
<div style="background-image: url('<?php echo $hero->src; ?>');"></div>
<?php
echo '</div></div>';
}

// Entry Meta.
add_filter( 'genesis_post_info', 'hyd_entry_meta_header' );
function hyd_entry_meta_header( $post_info ) {
$post_info = '[post_category before=" " after=" " ] <em>|</em> [post_date]';
return $post_info;
}

//* removes custom excerpt field for the reward style addition
remove_action( 'genesis_before_entry_content', 'hyd_affiliate', 12 );



// Position post info above post title.
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info', 6 );

// Removes the entry footer
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

} else {

//* Remove the default Genesis loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
}
}

//* Add widgets on front page
function hyd_front_page_widgets() {

if ( get_query_var( 'paged' ) >= 2 )
return;

echo '<div class="home-full-grid"><div class="image-section-1"><div class="wrap"><div class="fadeup-effect">';
genesis_widget_area( 'home-full-optin', array(
'before' => '<div class="home-full-optin">',
'after'  => '</div>',
) );
genesis_widget_area( 'home-full', array(
'before' => '<div id="home-full" class="home-full"><div class="hyd-entry"><div class="flexible-widgets widget-area' . hyd_widget_area_class( 'home-full' ) . '">',
'after'  => '</div></div></div>',
) );
genesis_widget_area( 'home-badge', array(
'before' => '<div class="home-badge">',
'after'  => '</div>',
) );
echo '</div></div></div></div>';

echo '<div class="home-featured"><div class="hyd-entry"><div class="wrap"><div class="fadeup-effect">';
genesis_widget_area( 'featured-post-1', array(
'before' => '<div id="featured-post-1" class="featured-post-1">',
'after'  => '</div>',
) );

genesis_widget_area( 'featured-post-2', array(
'before' => '<div id="featured-post-2" class="featured-post-2">',
'after'  => '</div>',
) );
echo '</div></div></div></div>';

genesis_widget_area( 'home-full-width', array(
'before' => '<div id="home-full-width" class="home-full-width"><div class="wrap"><div class="widget-area fadeup-effect' . hyd_widget_area_class( 'home-full-width' ) . '">',
'after'  => '</div></div></div>',
) );

genesis_widget_area( 'image-section-2', array(
'before' => '<div id="image-section-2" class="image-section-2"><div class="image-section"><div class="wrap"><div class="widget-area fadeup-effect' . hyd_widget_area_class( 'image-section-2' ) . '">',
'after'  => '</div></div></div></div>',
) );

genesis_widget_area( 'featured-post-3', array(
'before' => '<div id="featured-post-3" class="featured-post-3"><div class="home-featured"><div class="hyd-entry"><div class="wrap"><div class="fadeup-effect' . hyd_widget_area_class( 'featured-post-3' ) . '">',
'after'  => '</div></div></div></div></div>',
) );

genesis_widget_area( 'image-section-3', array(
'before' => '<div id="image-section-3" class="image-section-3"><div class="image-section"><div class="hyd-entry"><div class="wrap"><div class="flexible-widgets widget-area fadeup-effect' . hyd_widget_area_class( 'image-section-3' ) . '">',
'after'  => '</div></div></div></div></div>',
) );

genesis_widget_area( 'home-full-2', array(
'before' => '<div id="home-full-2" class="home-full-2"><div class="wrap"><div class="widget-area fadeup-effect' . hyd_widget_area_class( 'home-full-2' ) . '">',
'after'  => '</div></div></div>',
) );

}



//* Add opening markup for blog section
function hyd_front_page_blog_open() {

$blog_text = get_option( 'hyd_blog_text', __( 'On the Blog', 'hyd' ) );

if ( 'posts' == get_option( 'show_on_front' ) ) {

echo '<div class="blog widget-area fadeup-effect"><div class="wrap">';

if ( ! empty( $blog_text ) ) {

echo '<h2 class="widgettitle widget-title center">' . $blog_text . '</h2>';

}

}

}

//* Add closing markup for blog section
function hyd_front_page_blog_close() {

if ( 'posts' == get_option( 'show_on_front' ) ) {

echo '</div></div>';

}

}

//* Run the Genesis function
genesis();
