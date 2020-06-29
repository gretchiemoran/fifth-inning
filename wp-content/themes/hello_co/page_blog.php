<?php
/**
* @package      Hello Co
* @link         https://helloyoudesigns.com
* @author       Hello You Designs
* @copyright    Copyright (c) 2019, Hello You Designs
* @license      GPL-2.0+
*/

/*
Template Name: Custom Blog
*/

//* Add the blog slider widget
add_action( 'genesis_after_header', 'hyd_blog_slider_after_header', 12 );
function hyd_blog_slider_after_header() {
if ( get_query_var( 'paged' ) >= 1 )
return;
genesis_widget_area( 'blog-slider', array(
'before' => '<div class="blog-slider">',
'after'  => '</div>',
) );
}

//* Add the blog slider widget
add_action( 'genesis_after_header', 'hyd_blog_flexible_after_header',13 );
function hyd_blog_flexible_after_header() {
if ( get_query_var( 'paged' ) >= 1 )
return;
genesis_widget_area( 'blog-flexible', array(
'before' => '<div class="blog-flexible"><div class="flexible-widgets widget-area' . hyd_widget_area_class( 'blog-flexible' ) . '">',
'after'  => '</div></div>',
) );
}

// Custom Blog loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'hyd_do_custom_loop' );

function hyd_do_custom_loop() {

global $paged; // current paginated page.
global $query_args; // grab the current wp_query() args.
$args = array(
'paged' => $paged, // respect pagination.
);

genesis_custom_loop( wp_parse_args( $query_args, $args ) );

}

/**
* Add an action to the hook you'd like to use to display the hero.
*/
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

//* Relocate the post image
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1);

// Position post info above post title.
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info', 6 );

// Removes the entry footer
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );



genesis();
