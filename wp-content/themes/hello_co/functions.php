<?php
/**
* Hello Co
*
* @package      Hello Co
* @link         https://helloyoudesigns.com
* @author       Hello You Designs
* @copyright    Copyright (c) 2019, Hello You Designs
* @license      GPL-2.0+
*/

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

// Adds Color selections to WordPress Theme Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Hello Co' );
define( 'CHILD_THEME_URL', 'https://helloyoudesigns.com' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

add_action( 'after_setup_theme', 'hyd_gutenberg_support' );
/**
* Adds Gutenberg opt-in features and styling.
*
* @since 1.0.2
*/
function hyd_gutenberg_support() {
require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}


//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'hyd_scripts_styles' );
function hyd_scripts_styles() {

wp_enqueue_style( 'hyd-google-fonts', '//fonts.googleapis.com/css?family=Montserrat:400,700|Muli|Poppins', array());
wp_enqueue_style( 'ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array());
wp_enqueue_style( 'dashicons' );

wp_enqueue_script( 'localScroll', get_stylesheet_directory_uri() . '/js/jquery.localScroll.min.js', array( 'scrollTo' ), '1.2.8b', true );
wp_enqueue_script( 'scrollTo', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.5-beta', true );
wp_enqueue_script( 'hyd-fadeup-script', get_stylesheet_directory_uri() . '/js/fadeup.js', array( 'jquery' ), '1.0.0', true );
wp_enqueue_script( 'match-height', get_stylesheet_directory_uri() . '/js/jquery.matchHeight-min.js', array( 'jquery' ), '1.0.0', true );
wp_enqueue_script( 'match-height-init', get_stylesheet_directory_uri() . '/js/matchheight-init.js', array( 'match-height' ), '1.0.0', true );
// wp_enqueue_script( 'hyd-search', get_stylesheet_directory_uri() . '/js/search-toggle.js', array( 'jquery' ), '1.0.0', true );
$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
wp_enqueue_script( 'hyd-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
wp_localize_script(
'hyd-responsive-menu',
'genesis_responsive_menu',
hyd_responsive_menu_settings()
);

}

require_once(get_stylesheet_directory() . '/lib/HelloSecondImage/init.php');

/**
* Defines our responsive menu settings.
*
* @since 1.0.0
*/
function hyd_responsive_menu_settings() {

$settings = array(
'mainMenu'          => __( 'Menu', 'hyd-theme' ),
'menuIconClass'     => 'dashicons-before dashicons-menu',
'subMenu'           => __( 'Submenu', 'hyd-theme' ),
'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
'menuClasses'       => array(
'combine' => array(
'.nav-primary',
'.nav-header',
'.nav-header-left',
'.nav-header-right',
'.nav-secondary',
),
'others'  => array(
'.nav-footer',
),
),
);
return $settings;
}

// Adds support for footer menu & rename menus.
add_theme_support(
'genesis-menus', array(
'primary'      => 'Top Menu',
'secondary'    => 'Bottom Menu',
'header-left'  => 'Left Menu',
'header-right' => 'Right Menu',
'footer'       => 'Footer Menu',
)
);

// Adds HTML5 markup structure.
add_theme_support( 'html5' );

// Adds new featured image sizes.
add_image_size( 'square-entry-image', 400, 400, true );
add_image_size( 'featured-image', 800, 1200, true );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

// Adds support for custom background.
add_theme_support(
'custom-background', array(
'default-image' => get_stylesheet_directory_uri() . '/images/bg.jpg',
'default-color' => 'fff',
)
);

// Adds Accessibility support.
add_theme_support( 'genesis-accessibility', array( 'headings' ) );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Add support for custom header
add_theme_support( 'custom-header', array(
'width'           => 700,
'height'          => 350,
'header-selector' => '.site-title a',
'header-text'     => false,
) );

// Removes the site description.
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3);

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

// Repositions the primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav', 7 );


add_filter( 'genesis_nav_items', 'hyd_social_icons', 10, 2 );
add_filter( 'wp_nav_menu_items', 'hyd_social_icons', 10, 2 );

function hyd_social_icons( $menu, $args ) {
$args = (array) $args;
if ( 'primary' !== $args['theme_location'] ) {
return $menu;
}
ob_start();
genesis_widget_area( 'nav-social-menu' );
$social = ob_get_clean();
return $menu . $social;
}

add_action( 'genesis_header', 'hyd_header_left_menu', 6 );
function hyd_header_left_menu() {
genesis_nav_menu(
array(
'theme_location' => 'header-left',
'depth'          => 2,
)
);
}

add_action( 'genesis_header', 'hyd_header_right_menu', 9 );
function hyd_header_right_menu() {
genesis_nav_menu(
array(
'theme_location' => 'header-right',
'depth'          => 2,
)
);
}

add_action( 'genesis_before_footer', 'hyd_footer_menu', 7 );
function hyd_footer_menu() {
genesis_nav_menu(
array(
'theme_location' => 'footer',
'depth'          => 1,
)
);
}


//Add Fancy Search Box
add_action( 'wp_enqueue_scripts', 'custom_enqueue_scripts_styles' );
function custom_enqueue_scripts_styles() {
wp_enqueue_script( 'global', get_bloginfo( 'stylesheet_directory' ) . '/js/global.js', array( 'jquery' ), '1.0.0', true );
}

add_filter( 'wp_nav_menu_items', 'theme_menu_extras', 10, 2 );
function theme_menu_extras( $menu, $args ) {
if ( 'primary' !== $args->theme_location )
return $menu;
$menu .= '<li class="search"><a id="main-nav-search-link" class="icon-search"></a><div class="search-div">' . get_search_form( false ) . '</div></li>';
return $menu;
}


//* Modify the Genesis content limit read more link
add_filter( 'get_the_content_more_link', 'hyd_read_more_link' );
function hyd_read_more_link() {
return '... <a class="more-link" href="' . get_permalink() . '">READ <em>the</em> POST</a>';
}

//* Setup widget counts
function hyd_count_widgets( $id ) {
global $sidebars_widgets;
if ( isset( $sidebars_widgets[ $id ] ) ) {
return count( $sidebars_widgets[ $id ] );
}
}

//* Flexible widget classes
function hyd_widget_area_class( $id ) {
$count = hyd_count_widgets( $id );
$class = '';
if( $count == 1 ) {
$class .= ' widget-full';
} elseif( $count % 3 == 1 ) {
$class .= ' widget-thirds';
} elseif( $count % 4 == 1 ) {
$class .= ' widget-fourths';
} elseif( $count % 2 == 0 ) {
$class .= ' widget-halves uneven';
} else {
$class .= ' widget-halves even';
}
return $class;
}

//* Modify the size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'hyd_comments_gravatar' );
function hyd_comments_gravatar( $args ) {
$args['avatar_size'] = 96;
return $args;
}

//* Modify the size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'hyd_author_box_gravatar' );
function hyd_author_box_gravatar( $size ) {
return 150;
}

//* Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'hyd_remove_comment_form_allowed_tags' );
function hyd_remove_comment_form_allowed_tags( $defaults ) {
$defaults['comment_notes_after'] = '';
return $defaults;
}

//* Genesis Previous/Next Post Post Navigation
add_action( 'genesis_entry_footer', 'hyd_prev_next_post_nav' );
function hyd_prev_next_post_nav() {
if ( is_single() ) {
echo '<div class="prev-next-navigation">';
previous_post_link( '<div class="previous">%link</div>', 'Prev' );
next_post_link( '<div class="next">%link</div>', 'Next' );
echo '</div><!-- .prev-next-navigation -->';
}
}

//* Customize the entire footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'hyd_custom_footer' );
function hyd_custom_footer() {

if(is_active_sidebar('social-footer')){
echo '<div class="site-footer-wrap"><div class="social-wrap">';
dynamic_sidebar('social-footer');
echo '</div>';
}
echo '<div class="social-wrap">';
echo 'Copyright &copy; ';
echo date('Y');
echo '<em>|</em>';
echo get_bloginfo( 'name' );
echo '<em>|</em> <a target="_blank" href="https://helloyoudesigns.com">Hello You Designs</a>';
echo '</div></div>';
}


// Add To Top button
add_action( 'genesis_before', 'genesis_to_top');
function genesis_to_top() {
echo '<a href="#0" class="to-top" title="Back To Top">Top</a>';
}

//* Add Theme Support for WooCommerce
add_theme_support( 'genesis-connect-woocommerce' );

//* Add Gallery Support for WooCommerce
add_action( 'after_setup_theme', 'hyd_setup' );
function hyd_setup() {
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}

//* Add walker class that displays menu item descriptions
function be_add_description( $item_output, $item ) {
$description = $item->post_content;
if (' ' !== $description )
return preg_replace( '/(<a.*?>[^<]*?)</', '$1' . '<span class="sub">' . $description . '</span><', $item_output);
else
return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'be_add_description', 10, 2 );

add_filter('widget_text', 'do_shortcode');


//* Adds custom excerpt field for the reward style addition
add_post_type_support('post', 'excerpt');
add_action ( 'genesis_after_entry_content', 'hyd_show_page_excerpt' );
function hyd_show_page_excerpt() {
$post = get_post( get_the_ID() );
$the_excerpt = $post->post_excerpt;
if ( is_page() || empty( $the_excerpt ) )
return;
echo $the_excerpt;
}


/*
Adds an affiliate disclaimer
--------------------------------------- */
add_action( 'genesis_before_entry_content', 'hyd_affiliate', 12 );
function hyd_affiliate() {
$value = get_post_meta( get_the_ID(), 'affiliate', true );
if ( ! empty( $value ) ) {
echo '<div class="hyd-affiliate">'. $value .'</div>';
}
}

//* Add side content if active
add_action( 'genesis_after_header', 'hyd_side_content_output' );
function hyd_side_content_output() {
$button = '<button class="side-content-toggle"><i class="icon ion-ios-close-empty"></i> <span class="screen-reader-text">' . __( 'Hide side Content', 'hyd' ) . '</span></button>';
if ( is_active_sidebar( 'side-content' ) ) {
echo '<div class="side-content-icon"><button class="side-content-toggle"><i class="icon ion-arrow-right-c"></i> <span class="screen-reader-text">' . __( 'Show side Content', 'hyd' ) . '</span></button></div>';
}
genesis_widget_area( 'side-content', array(
'before' => '<div class="side-content"><div class="side-container"><div class="widget-area">' . $button . '<div class="wrap">',
'after'  => '</div></div></div></div>'
));
}


//* Hooks widget area before footer
add_action( 'genesis_before_footer', 'hyd_social_bar',11);
function hyd_social_bar() {{
genesis_widget_area( 'social-bar', array(
'before' => '<div class="social-bar widget-area">',
'after'  => '</div></div>',
) );
}}


//* Hook after post widget after the entry content
add_action( 'genesis_after_entry_content', 'hyd_signature', 10 );
function hyd_signature() {
if ( is_singular( 'post' ) )
genesis_widget_area( 'signature', array(
'before' => '<div class="signature widget-area">',
'after'  => '</div>',
) );
}


// Single Post Category on Homepage
add_shortcode( 'post_category', 'hyd_post_category_shortcode' );
function hyd_post_category_shortcode( $atts ) {
$atts = shortcode_atts (
array(
'sep'    => ', ',
'before' => '',
'after'  => '',
),
$atts
);
$category = get_the_category();
$cat = '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a>';
if( $category[0] ) {
$output = '<span class="'. $category[0]->slug .'">' . $atts['before'] . $cat . $atts['after'] . '</span>';
}
return apply_filters( 'genesis_post_categories_shortcode', $output, $atts );
}


/**
* Functon to set Read more text and limit excerpt on custom grid
*/
function custom_read_more() {
return '... <span class="read-more">more</span>';
}

function excerpt( $limit ) {
return wp_trim_words( get_the_excerpt(), $limit, custom_read_more() );
}

//* Hooks widget area before header
add_action( 'genesis_before', 'hyd_social_bar_header',11);
function hyd_social_bar_header() {{
genesis_widget_area( 'social-bar-header', array(
'before' => '<div class="social-bar-header widget-area">',
'after'  => '</div></div>',
) );
}}

// Adds an ADwidget after 3rd entry.
add_action( 'genesis_after_entry', 'hyd_postadbar_widget_area' );
function hyd_postadbar_widget_area() {
global $wp_query;
$counter = $wp_query->current_post;
if ( 2 == $counter ) {
genesis_widget_area( 'postadbar', array(
'before' => '<div class="postadbar">',
'after'  => '</div>',
) );
}
}

//* Hooks Sticky Widget
add_action( 'genesis_before_header', 'hyd_sticky_social', 1);
function hyd_sticky_social() {{
genesis_widget_area( 'sticky-social', array(
'before' => '<div class="sticky-social widget-area">',
'after'  => '</div>',
) );
}}

//* Portfolio Filter
add_action( 'pre_get_posts', 'hyd_change_portfolio_posts_per_page' );
function hyd_change_portfolio_posts_per_page( $query ) {

if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'portfolio' ) ) {
$query->set( 'posts_per_page', '-1' );
}
}


//* Hooks Widget Area Above Content
add_action( 'genesis_before_content', 'hyd_widget_above_content'  );
function hyd_widget_above_content() {
if ( ! is_front_page() ) {

genesis_widget_area( 'widget-above-content', array(
'before' => '<div id="widget-above-content" class="widget-above-content"><div class="wrap"><div class="flexible-widgets widget-area fadeup-effect' . hyd_widget_area_class( 'widget-above-content' ) . '">',
'after'  => '</div></div></div>',
) );

}}

//* Hooks Widget Area below Content
add_action( 'genesis_before_footer', 'hyd_widget_below_content', 5 );
function hyd_widget_below_content() {
if ( ! is_front_page() ) {
genesis_widget_area( 'widget-below-content', array(
'before' => '<div id="widget-below-content" class="widget-below-content"><div class="wrap"><div class="flexible-widgets widget-area fadeup-effect' . hyd_widget_area_class( 'widget-below-content' ) . '">',
'after'  => '</div></div></div>',
) );

}}


//* Hooks widget area before footer
add_action( 'genesis_before_footer', 'hyd_image_section_4', 9);
function hyd_image_section_4() {{
genesis_widget_area( 'image-section-4', array(
'before' => '<div id="image-section-4" class="image-section-4"><div class="image-section"><div class="image-section-wrap"><div class="widget-area fadeup-effect' . hyd_widget_area_class( 'image-section-4' ) . '">',
'after'  => '</div></div></div></div>',
) );
}}

//* Hooks widget area before footer
add_action( 'genesis_before_footer', 'hyd_footer_4', 12);
function hyd_footer_4() {{
genesis_widget_area( 'footer-4', array(
'before' => '<div id="footer-4" class="footer-4"><div class="widget-area fadeup-effect' . hyd_widget_area_class( 'footer-4' ) . '">',
'after'  => '</div></div>',
) );
}}


genesis_register_sidebar( array(
'id'            => 'home-full-optin',
'name'          => __( 'Top Optin', 'hyd' ),
'description'   => __( 'Add an optin or quick message.  This section is Flexible.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'            => 'home-full',
'name'          => __( 'Featured Widget', 'hyd' ),
'description'   => __( '1st widget can be your Nav Menu (or blank), rest of widgets are Flexible.  Use a slider, featured page or post', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'            => 'home-badge',
'name'          => __( 'Home badge', 'hyd' ),
'description'   => __( 'Add your Submark or Button to the right of the Featured spot', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'            => 'featured-post-1',
'name'          => __( 'Featured Posts 1', 'hyd' ),
'description'   => __( 'Feature Pages, Posts, and even ads.  Widgets are Full width, not flexible.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'            => 'featured-post-2',
'name'          => __( 'Featured Posts 2', 'hyd' ),
'description'   => __( 'Feature Pages, Posts, and even ads.  Widgets are Full width, not flexible.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'            => 'home-full-width',
'name'          => __( 'Full Width', 'hyd' ),
'description'   => __( 'Widget is full (1600px) width', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'            => 'image-section-2',
'name'        => __( 'About Section', 'hyd' ),
'description' => __( '3 Widgets - First 2 widgets Use an Image widget, Featured Page/Post, or slider - Demo Images 1000pxW by 1500H, 3rd Widget is the about blurb.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'          => 'featured-post-3',
'name'          => __( 'Featured Posts 3', 'hyd' ),
'description'   => __( 'Feature Pages, Posts, and even ads.  Widgets are Full width, not flexible.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'           => 'image-section-3',
'name'         => __( 'Image Section', 'hyd' ),
'description'  => __( 'Flexible widget area - Change the image in the customizer', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'            => 'home-full-2',
'name'          => __( 'Full Width 2', 'hyd' ),
'description'   => __( 'Widget is full (1600px) width', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'           => 'image-section-4',
'name'         => __( 'Above Footer Image Section', 'hyd' ),
'description'  => __( 'Flexible Image Section - Great for a CTA, message, or highlight a spot on the site - Change the image in the customizer', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'            => 'blog-index',
'name'          => __( 'Category Index Search', 'hyd' ),
'description'   => __( 'This will show on all of your Category Archives.  Add a Search, Category and Archive widget', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'			=> 'blog-cat-index',
'name'			=> __( 'Category Index', 'hyd' ),
'description'	=> __( 'Highlight your your top Categories on a single page with Featured Page and Post Widgets.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'			=> 'blog-slider',
'name'			=> __( 'Blog Slider', 'hyd' ),
'description'	=> __( 'Blog Slider', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'			=> 'blog-flexible',
'name'			=> __( 'Blog Flexible', 'hyd' ),
'description'	=> __( 'Flexible Widget Area', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'          => 'signature',
'name'        => __( 'Signature', 'hyd' ),
'description' => __( 'This is the signature bar that shows under each post.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'          => 'postadbar',
'name'        => __( 'Post Ad Bar', 'theme-name' ),
'description' => __( 'This will display after every 3rd Post on your homepage, and blog pages.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'          	=> 'sticky-social',
'name'        	=> __( 'Sticky Social Icons', 'hyd' ),
'description' 	=> __( 'Sticky Social Icons - Will be hidden on mobile', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'          	=> 'nav-social-menu',
'name'        	=> __( 'Menu Social Icons', 'hyd' ),
'description' 	=> __( 'Add social icons to the Top Menu Bar - These will only show on the Top Menu', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'          	=> 'social-page',
'name'        	=> __( 'Social Page', 'hyd' ),
'description' 	=> __( 'Landing page for your Social Profiles', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'          => 'social-bar-header',
'name'        => __( 'Above Header IG Feed', 'hyd' ),
'description' => __( 'Add your IG feed to above the Header.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'          => 'social-bar',
'name'        => __( 'Below Footer IG Feed', 'hyd' ),
'description' => __( 'Add your IG feed to below the footer.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'          => 'side-content',
'name'        => __( 'Side Tab Widget', 'hyd' ),
'description' => __( 'This is the side widget.  Add an optin, social icons, or an important message', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'            => 'widget-above-content',
'name'          => __( 'Above Content Ad Space', 'hyd' ),
'description'   => __( 'This widget area appears on top of the content on interior pages and posts', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'            => 'widget-below-content',
'name'          => __( 'Below Content Ad Space', 'hyd' ),
'description'   => __( 'This widget area appears below the content on interior pages and posts.', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'			=> 'social-footer',
'name'			=> __( 'Site Credits Widget', 'hyd' ),
'description'	=> __( 'Add a Menu widget with your Privacy Policy and Terms', 'hyd' ),
) );

genesis_register_sidebar( array(
'id'			=> 'footer-4',
'name'			=> __( 'Alternative Footer Widget', 'hyd' ),
'description'	=> __( 'Flexible widget area that will show below your main footer.', 'hyd' ),
) );
