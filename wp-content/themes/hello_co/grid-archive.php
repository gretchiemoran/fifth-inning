<?php
/**
* This is a template part for displaying entries in a grid with title and excerpt appearing on hover.
*/

add_filter( 'body_class', 'custom_add_grid_archive_body_class' );
/**
* Add `grid-archive-page` body class.
*
* @param array $classes Existing body classes.
* @return array Modified body classes.
*/
function custom_add_grid_archive_body_class( $classes ) {
$classes[] = 'grid-archive-page';

return $classes;
}

// Force full width content.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Hooks widget area before footer
add_action( 'genesis_archive_title_descriptions', 'hyd_blog_index', 11);
function hyd_blog_index() {{
genesis_widget_area( 'blog-index', array(
'before' => '<div id="blog-index" class="blog-index"><div class="wrap">',
'after'  => '</div></div>',
) );
}}

// Remove all actions from entry header, entry content and entry footer hooks.
$hooks = array(
'genesis_entry_header',
'genesis_entry_content',
'genesis_entry_footer',
);

foreach ( $hooks as $hook ) {
remove_all_actions( $hook );
}

// Do not show featured image if set in Theme Settings > Content Archives.
add_filter( 'genesis_pre_get_option_content_archive_thumbnail', '__return_false' );

add_action( 'genesis_entry_content', 'custom_grid_archive_image_overlay' );
/**
* Add image, title and excerpt.
*/
function custom_grid_archive_image_overlay() {
// raw title.
$title = apply_filters( 'genesis_post_title_text', get_the_title() );

if ( has_post_thumbnail() ) {
// get the URL of featured image.
$image_url = genesis_get_image( 'format=url&size=grid-archive' );
} else {
// a placeholder.
$image_url = get_stylesheet_directory_uri() . '/images/default-archive-image.png';
}

// get the alt text of featured image.
$thumb_id = get_post_thumbnail_id( get_the_ID() );
$alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );

// if no alt text is present for featured image, set it to entry title.
if ( '' === $alt ) {
$alt = the_title_attribute( 'echo=0' );
}

printf( '<a href="%s" class="grid-block"><img src="%s" alt="%s" /><div class="grid-overlay"><h2 class="entry-title" itemprop="headline">%s</h2></div></a>',
get_permalink(),
$image_url,
$alt,
$title,
excerpt( '5' ) // this many words of the content as excerpt.
);
}

add_action( 'genesis_before_while', 'custom_grid_archive_items_open' );
/**
* Add opening div.grid tag for entries.
*/
function custom_grid_archive_items_open() {
echo '<div class="grid-archive">';
}

add_action( 'genesis_after_endwhile', 'custom_grid_archive_items_close' );
/**
* Add closing div.grid tag for entries.
*/
function custom_grid_archive_items_close() {
echo '</div>';
}

// Reposition archive pagination.
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
add_action( 'genesis_after_endwhile', 'genesis_posts_nav', 15 );
