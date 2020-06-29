<?php

add_action( 'wp_enqueue_scripts', 'hyd_css' );
/**
* Checks the settings for the link color color, primary color, and header
* If any of these value are set the appropriate CSS is output
*
* @since 1.0.0
*/
function hyd_css() {

$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';

$color_nav = get_theme_mod( 'hyd_nav_color', hyd_customizer_get_default_nav_color() );
$color_navfont = get_theme_mod( 'hyd_navfont_color', hyd_customizer_get_default_navfont_color() );
$color_subspan = get_theme_mod( 'hyd_subspan_color', hyd_customizer_get_default_subspan_color() );
$color_navfonth = get_theme_mod( 'hyd_navfonth_color', hyd_customizer_get_default_navfonth_color() );
$color_topoptin = get_theme_mod( 'hyd_topoptin_color', hyd_customizer_get_default_topoptin_color() );
$color_topoptinfont = get_theme_mod( 'hyd_topoptinfont_color', hyd_customizer_get_default_topoptinfont_color() );
$color_topmenufont = get_theme_mod( 'hyd_topmenufont_color', hyd_customizer_get_default_topmenufont_color() );
$color_topmenufonth = get_theme_mod( 'hyd_topmenufonth_color', hyd_customizer_get_default_topmenufonth_color() );
$color_tanimageborder = get_theme_mod( 'hyd_tanimageborder_color', hyd_customizer_get_default_tanimageborder_color() );
$color_oliveimageborder = get_theme_mod( 'hyd_oliveimageborder_color', hyd_customizer_get_default_oliveimageborder_color() );
$color_homefullwidth = get_theme_mod( 'hyd_homefullwidth_color', hyd_customizer_get_default_homefullwidth_color() );
$color_homefullwidthfont = get_theme_mod( 'hyd_homefullwidthfont_color', hyd_customizer_get_default_homefullwidthfont_color() );
$color_homefullwidthaccentfont = get_theme_mod( 'hyd_homefullwidthaccentfont_color', hyd_customizer_get_default_homefullwidthaccentfont_color() );
$color_homefullwidthgrid = get_theme_mod( 'hyd_homefullwidthgrid_color', hyd_customizer_get_default_homefullwidthgrid_color() );
$color_homefullwidth2 = get_theme_mod( 'hyd_homefullwidth2_color', hyd_customizer_get_default_homefullwidth2_color() );
$color_homefullwidthfont2 = get_theme_mod( 'hyd_homefullwidthfont2_color', hyd_customizer_get_default_homefullwidthfont2_color() );
$color_homefullwidthaccentfont2 = get_theme_mod( 'hyd_homefullwidthaccentfont2_color', hyd_customizer_get_default_homefullwidthaccentfont2_color() );
$color_homefullwidthgrid2 = get_theme_mod( 'hyd_homefullwidthgrid2_color', hyd_customizer_get_default_homefullwidthgrid2_color() );
$color_tanabout = get_theme_mod( 'hyd_tanabout_color', hyd_customizer_get_default_tanabout_color() );
$color_yellowtext = get_theme_mod( 'hyd_yellowtext_color', hyd_customizer_get_default_yellowtext_color() );
$color_promoblurb = get_theme_mod( 'hyd_promoblurb_color', hyd_customizer_get_default_promoblurb_color() );
$color_promofonts = get_theme_mod( 'hyd_promofonts_color', hyd_customizer_get_default_promofonts_color() );
$color_optin = get_theme_mod( 'hyd_optin_color', hyd_customizer_get_default_optin_color() );
$color_optinfont = get_theme_mod( 'hyd_optinfont_color', hyd_customizer_get_default_optinfont_color() );
$color_accentfont = get_theme_mod( 'hyd_accentfont_color', hyd_customizer_get_default_accentfont_color() );
$color_blockquote = get_theme_mod( 'hyd_blockquote_color', hyd_customizer_get_default_blockquote_color() );
$color_primarylinkcolor = get_theme_mod( 'hyd_primarylinkcolor_color', hyd_customizer_get_default_primarylinkcolor_color() );
$color_primaryhovercolor = get_theme_mod( 'hyd_primaryhovercolor_color', hyd_customizer_get_default_primaryhovercolor_color() );
$color_metacolor = get_theme_mod( 'hyd_metacolor_color', hyd_customizer_get_default_metacolor_color() );
$color_blackbutton = get_theme_mod( 'hyd_blackbutton_color', hyd_customizer_get_default_blackbutton_color() );
$color_tanbuttonhover = get_theme_mod( 'hyd_tanbuttonhover_color', hyd_customizer_get_default_tanbuttonhover_color() );
$color_stickysocial = get_theme_mod( 'hyd_stickysocial_color', hyd_customizer_get_default_stickysocial_color() );
$color_totop = get_theme_mod( 'hyd_totop_color', hyd_customizer_get_default_totop_color() );
$color_blackbuttonfont = get_theme_mod( 'hyd_blackbuttonfont_color', hyd_customizer_get_default_blackbuttonfont_color() );
$color_tanbuttonhoverfont = get_theme_mod( 'hyd_tanbuttonhoverfont_color', hyd_customizer_get_default_tanbuttonhoverfont_color() );
$color_blueunderbutton = get_theme_mod( 'hyd_blueunderbutton_color', hyd_customizer_get_default_blueunderbutton_color() );
$color_footerwidgets = get_theme_mod( 'hyd_footerwidgets_color', hyd_customizer_get_default_footerwidgets_color() );
$color_footerwidgetsfont = get_theme_mod( 'hyd_footerwidgetsfont_color', hyd_customizer_get_default_footerwidgetsfont_color() );
$color_footerwidgetslink = get_theme_mod( 'hyd_footerwidgetslink_color', hyd_customizer_get_default_footerwidgetslink_color() );
$color_footerwidgetsgrid = get_theme_mod( 'hyd_footerwidgetsgrid_color', hyd_customizer_get_default_footerwidgetsgrid_color() );
$color_fourthfooter = get_theme_mod( 'hyd_fourthfooter_color', hyd_customizer_get_default_fourthfooter_color() );
$color_fourthfooterfont = get_theme_mod( 'hyd_fourthfooterfont_color', hyd_customizer_get_default_fourthfooterfont_color() );
$color_fourthfootergrid = get_theme_mod( 'hyd_fourthfootergrid_color', hyd_customizer_get_default_fourthfootergrid_color() );
$color_sitefooter = get_theme_mod( 'hyd_sitefooter_color', hyd_customizer_get_default_sitefooter_color() );
$color_sitefooterfont = get_theme_mod( 'hyd_sitefooterfont_color', hyd_customizer_get_default_sitefooterfont_color() );



$opts = apply_filters( 'hyd_images', array( '1', '2', '3', '4' ) );
$settings = array();
foreach( $opts as $opt ){
$settings[$opt]['image'] = preg_replace( '/^https?:/', '', get_option( $opt .'-hyd-image', sprintf( '%s/images/bg-%s.jpg', get_stylesheet_directory_uri(), $opt ) ) );
}
$css = '';
foreach ( $settings as $section => $value ) {
$background = $value['image'] ? sprintf( 'background-image: url(%s);', $value['image'] ) : ''; {
$css .= ( ! empty( $section ) && ! empty( $background ) ) ? sprintf( '.image-section-%s { %s }', $section, $background ) : '';
}}

$css .= ( hyd_customizer_get_default_nav_color() !== $color_nav ) ? sprintf( '

.site-header,
.nav-primary,
.nav-secondary, .nav-footer {
background-color: %1$s;
}

@media only screen and (max-width: 1200px) {
.menu-toggle:focus,
.menu-toggle:hover,
.sub-menu-toggle:focus,
.sub-menu-toggle:hover,
.menu-toggle, .sub-menu-toggle {
background-color: %1$s;
}
}

', $color_nav ) : '';

$css .= ( hyd_customizer_get_default_navfont_color() !== $color_navfont ) ? sprintf( '

.genesis-nav-menu a {
color: %1$s;
}

@media only screen and (max-width: 1200px) {
.menu-toggle, .sub-menu-toggle {
color: %1$s;
}
}

', $color_navfont ) : '';

$css .= ( hyd_customizer_get_default_subspan_color() !== $color_subspan ) ? sprintf( '

.genesis-nav-menu span.sub {
color: %1$s;
}
', $color_subspan ) : '';

$css .= ( hyd_customizer_get_default_navfonth_color() !== $color_navfonth ) ? sprintf( '

.genesis-nav-menu a:hover,
.genesis-nav-menu .current-menu-item > a {
color: %1$s;
}

', $color_navfonth ) : '';

$css .= ( hyd_customizer_get_default_topoptin_color() !== $color_topoptin ) ? sprintf( '

.front-page .home-full-optin {
background: %1$s;
}

', $color_topoptin ) : '';

$css .= ( hyd_customizer_get_default_topoptinfont_color() !== $color_topoptinfont ) ? sprintf( '

.front-page .home-full-optin .widget-title,
.front-page .home-full-optin h1,
.front-page .home-full-optin h2,
.front-page .home-full-optin h3,
.front-page .home-full-optin h4,
.front-page .home-full-optin h5,
.front-page .home-full-optin h6,
.front-page .home-full-optin p,
.front-page .home-full-optin {
color: %1$s;
}

', $color_topoptinfont ) : '';

$css .= ( hyd_customizer_get_default_topmenufont_color() !== $color_topmenufont ) ? sprintf( '

.front-page .home-full-grid .widget_nav_menu li a  {
color: %1$s;
}

', $color_topmenufont ) : '';

$css .= ( hyd_customizer_get_default_topmenufonth_color() !== $color_topmenufonth ) ? sprintf( '


.front-page .home-full-grid .widget_nav_menu li a:hover {
color: %1$s;
}

', $color_topmenufonth ) : '';

$css .= ( hyd_customizer_get_default_tanimageborder_color() !== $color_tanimageborder ) ? sprintf( '

.home-featured .featuredpage a.alignnone::after,
.home-featured .featuredpage a.alignleft::after,
.front-page .image-section-2 .widget:nth-child(1)::after {
background-color: %1$s;
}

', $color_tanimageborder ) : '';

$css .= ( hyd_customizer_get_default_oliveimageborder_color() !== $color_oliveimageborder ) ? sprintf( '

.home-featured .featuredpage a.alignright::after {
background-color: %1$s;
}

', $color_oliveimageborder ) : '';

$css .= ( hyd_customizer_get_default_homefullwidth_color() !== $color_homefullwidth ) ? sprintf( '

.front-page .home-full-width {
background: %1$s;
}

', $color_homefullwidth ) : '';

$css .= ( hyd_customizer_get_default_homefullwidthfont_color() !== $color_homefullwidthfont ) ? sprintf( '

.front-page .home-full-width .widget-title,
.front-page .home-full-width h1,
.front-page .home-full-width h3,
.front-page .home-full-width h4,
.front-page .home-full-width h5,
.front-page .home-full-width h6,
.front-page .home-full-width p,
.front-page .home-full-width {
color: %1$s;
}

', $color_homefullwidthfont ) : '';


$css .= ( hyd_customizer_get_default_homefullwidthaccentfont_color() !== $color_homefullwidthaccentfont ) ? sprintf( '

.front-page .home-full-width h2 {
color: %1$s;
}

', $color_homefullwidthaccentfont ) : '';

$css .= ( hyd_customizer_get_default_homefullwidthgrid_color() !== $color_homefullwidthgrid ) ? sprintf( '

.front-page .home-full-width .widget:nth-child(2) {
border-left: 3px solid %1$s;
}

', $color_homefullwidthgrid ) : '';

$css .= ( hyd_customizer_get_default_homefullwidth2_color() !== $color_homefullwidth2 ) ? sprintf( '

.front-page .home-full-2 {
background: %1$s;
}

', $color_homefullwidth2 ) : '';

$css .= ( hyd_customizer_get_default_homefullwidthfont2_color() !== $color_homefullwidthfont2 ) ? sprintf( '

.front-page .home-full-2 .widget-title,
.front-page .home-full-2 h1,
.front-page .home-full-2 h3,
.front-page .home-full-2 h4,
.front-page .home-full-2 h5,
.front-page .home-full-2 h6,
.front-page .home-full-2 p,
.front-page .home-full-2 {
color: %1$s;
}

', $color_homefullwidthfont2 ) : '';


$css .= ( hyd_customizer_get_default_homefullwidthaccentfont2_color() !== $color_homefullwidthaccentfont2 ) ? sprintf( '

.front-page .home-full-2 h2 {
color: %1$s;
}

', $color_homefullwidthaccentfont2 ) : '';

$css .= ( hyd_customizer_get_default_homefullwidthgrid2_color() !== $color_homefullwidthgrid2 ) ? sprintf( '

.front-page .home-full-2 .widget:nth-child(2) {
border-left: 3px solid %1$s;
}

', $color_homefullwidthgrid2 ) : '';


$css .= ( hyd_customizer_get_default_tanabout_color() !== $color_tanabout ) ? sprintf( '

.front-page .image-section-2  .widget:nth-child(1)::after {
background: %1$s;
}

', $color_tanabout ) : '';

$css .= ( hyd_customizer_get_default_yellowtext_color() !== $color_yellowtext ) ? sprintf( '

.front-page .featuredpage h5,
.front-page .image-section-2  h4,
.front-page .promoblurb h4,
.featuredpage h5,
.front-page .image-section-2 .widget:nth-child(3) h4,
.promoblurb h4  {
color: %1$s;
}

', $color_yellowtext ) : '';

$css .= ( hyd_customizer_get_default_promoblurb_color() !== $color_promoblurb ) ? sprintf( '

.front-page .promoblurb,
.promoblurb {
background: %1$s;
outline: 1px solid %1$s;
}

', $color_promoblurb ) : '';

$css .= ( hyd_customizer_get_default_promofonts_color() !== $color_promofonts ) ? sprintf( '

.front-page .promoblurb h1,
.front-page .promoblurb h2,
.front-page .promoblurb h3,
.front-page .promoblurb h5,
.front-page .promoblurb h6,
.front-page .promoblurb a,
.front-page .promoblurb,
.promoblurb h1,
.promoblurb h2,
.promoblurb h3,
.promoblurb h5,
.promoblurb h6,
.promoblurb a,
.promoblurb  {
color: %1$s;
}

', $color_promofonts ) : '';

$css .= ( hyd_customizer_get_default_optin_color() !== $color_optin ) ? sprintf( '

.sidebar .enews,
.side-container .enews-widget  {
background: %1$s;
}

', $color_optin ) : '';

$css .= ( hyd_customizer_get_default_optinfont_color() !== $color_optinfont ) ? sprintf( '

.sidebar .enews h1,
.sidebar .enews h2,
.sidebar .enews h3,
.sidebar .enews h5,
.sidebar .enews h6,
.sidebar .enews a,
.sidebar .enews,
.sidebar .enews p
.side-container .enews h1,
.side-container .enews h2,
.side-container .enews h3,
.side-container .enews h5,
.side-container .enews h6,
.side-container .enews a,
.side-container .enews,
.side-container .enews p  {
color: %1$s;
}

', $color_optinfont ) : '';

$css .= ( hyd_customizer_get_default_accentfont_color() !== $color_accentfont ) ? sprintf( '

.accent-text h2 {
color: %1$s;
}

', $color_accentfont ) : '';

$css .= ( hyd_customizer_get_default_blockquote_color() !== $color_blockquote ) ? sprintf( '

blockquote {
background: %1$s;
outline: 1px solid %1$s;
}

', $color_blockquote ) : '';

$css .= ( hyd_customizer_get_default_primarylinkcolor_color() !== $color_primarylinkcolor ) ? sprintf( '

a,
.side-content button, .side-content-icon button,
.menu-toggle:focus,
.menu-toggle:hover,
.sub-menu-toggle:focus,
.sub-menu-toggle:hover,
.entry-title a:hover,
ul.checkmark li::before,
.home-featured .featuredpage .widget-title a:hover,
.blog-cat-index .home-featured .featuredpage .widget-title a:hover,
.front-page .soliloquy-container .soliloquy-caption .button:hover  {
color: %1$s;
}

.archive-pagination li a:hover {
  border-bottom: 2px solid %1$s;
}

', $color_primarylinkcolor ) : '';

$css .= ( hyd_customizer_get_default_primaryhovercolor_color() !== $color_primaryhovercolor ) ? sprintf( '

a:hover,
.side-content button:hover,
.side-content-icon button:hover,
.hyd-entry .featuredpost .entry-header p.entry-meta a:hover,
.footer-widgets a:hover  {
color: %1$s;
}

', $color_primaryhovercolor ) : '';

$css .= ( hyd_customizer_get_default_metacolor_color() !== $color_metacolor ) ? sprintf( '

.hyd-entry .featuredpost .entry-header p.entry-meta a,
.entry-header p.entry-meta a:hover {
color: %1$s;
}

', $color_metacolor ) : '';

$css .= ( hyd_customizer_get_default_blackbutton_color() !== $color_blackbutton ) ? sprintf( '

button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.button {
background: %1$s;
border: 1px solid %1$s;
}

.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.home-grid,
.woocommerce input.button,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt {
background: %1$s !important;
border: 1px solid %1$s !important;
}

.enews-widget input[type="submit"] {
background: %1$s !important;
border: 1px solid %1$s !important;
}

.social-page .widget_nav_menu li,
.footer-widgets-3 .widget:nth-child(1) .button {
background: %1$s;
}

', $color_blackbutton ) : '';

$css .= ( hyd_customizer_get_default_blackbuttonfont_color() !== $color_blackbuttonfont ) ? sprintf( '

button,
.footer-widgets-3 .widget:nth-child(1) .button {
color: %1$s;
}

.enews-widget input[type="submit"] {
color: %1$s !important;
}

', $color_blackbuttonfont ) : '';

$css .= ( hyd_customizer_get_default_tanbuttonhover_color() !== $color_tanbuttonhover ) ? sprintf( '

.social-page .widget_nav_menu li:hover {
background: %1$s;
}

button:hover,
input:hover[type="button"],
input:hover[type="reset"],
input:hover[type="submit"],
.button:hover,
.pricing-table a.button:hover {
background-color: %1$s;
border: 1px solid %1$s;
}

.enews-widget input[type="submit"]:hover {
background: %1$s !important;
border: 1px solid %1$s !important;
}

.front-page .image-section-2 .button:hover,
.footer-widgets .button:hover {
background: %1$s;
border: 2px solid %1$s;
}

.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover  {
background-color: %1$s !important;
border: 1px solid %1$s !important;
}

a.more-link:hover::after,
.next:hover::after,
.previous:hover::after,
.more-from-category a:hover::after,
.front-page .image-section-2 .button:hover::after,
.footer-widgets-3 .widget:nth-child(1) .button:hover {
background: %1$s;
}

', $color_tanbuttonhover ) : '';

$css .= ( hyd_customizer_get_default_tanbuttonhoverfont_color() !== $color_tanbuttonhoverfont ) ? sprintf( '

.button:hover,
.footer-widgets-3 .widget:nth-child(1) .button:hover  {
color: %1$s;
}

.enews-widget input[type="submit"]:hover {
  color: %1$s !important;
}

', $color_tanbuttonhoverfont ) : '';

$css .= ( hyd_customizer_get_default_blueunderbutton_color() !== $color_blueunderbutton) ? sprintf( '

a.more-link::after, .more-from-category a::after,
.next::after,
.previous::after,
.front-page .image-section-2 .widget:nth-child(3) .button::after,
.blog-index .widget-title::after {
background: %1$s;
}

', $color_blueunderbutton ) : '';

$css .= ( hyd_customizer_get_default_stickysocial_color() !== $color_stickysocial) ? sprintf( '

.sticky-social.widget-area {
background: %1$s;
}

', $color_stickysocial ) : '';

$css .= ( hyd_customizer_get_default_totop_color() !== $color_totop ) ? sprintf( '

.to-top {
background-color: %1$s;
}

', $color_totop ) : '';

$css .= ( hyd_customizer_get_default_footerwidgets_color() !== $color_footerwidgets ) ? sprintf( '

.footer-widgets,
.social-bar-header {
background: %1$s;
}

', $color_footerwidgets ) : '';

$css .= ( hyd_customizer_get_default_footerwidgetsfont_color() !== $color_footerwidgetsfont ) ? sprintf( '

.footer-widgets,
.footer-widgets p,
.footer-widgets h1,
.footer-widgets h2,
.footer-widgets h3,
.footer-widgets h4,
.footer-widgets h5,
.footer-widgets h6  {
color: %1$s;
}

', $color_footerwidgetsfont ) : '';

$css .= ( hyd_customizer_get_default_footerwidgetslink_color() !== $color_footerwidgetslink ) ? sprintf( '

.footer-widgets a {
color: %1$s;
}

', $color_footerwidgetslink ) : '';

$css .= ( hyd_customizer_get_default_footerwidgetsgrid_color() !== $color_footerwidgetsgrid ) ? sprintf( '

.footer-widgets li a::after {
color: %1$s;
}

.footer-widgets-1 {
border-bottom: 1px solid %1$s;
}

.footer-widgets-3 {
border-left: 1px solid %1$s;
}

.footer-widgets-3 .widget:nth-child(1) {
border-right: 1px solid %1$s;
}

@media only screen and (max-width: 600px) {
  .footer-widgets-3 .widget:nth-child(1) {
  border-right: none;
  border-left: none;
  border-bottom: 1px solid %1$s;
}
}

', $color_footerwidgetsgrid ) : '';

$css .= ( hyd_customizer_get_default_fourthfooter_color() !== $color_fourthfooter ) ? sprintf( '

#footer-4 {
background: %1$s;
}

', $color_fourthfooter ) : '';

$css .= ( hyd_customizer_get_default_fourthfooterfont_color() !== $color_fourthfooterfont ) ? sprintf( '

#footer-4,
#footer-4 p,
#footer-4 h1,
#footer-4 h2,
#footer-4 h3,
#footer-4 h4,
#footer-4 h5,
#footer-4 h6,
#footer-4 a,
#footer-4 .enews p,
#footer-4 .enews .widget-title  {
color: %1$s;
}
', $color_fourthfooterfont ) : '';

$css .= ( hyd_customizer_get_default_fourthfootergrid_color() !== $color_fourthfootergrid ) ? sprintf( '

#footer-4 .widget:nth-child(2) {
border-right: 1px solid %1$s;
border-left: 1px solid %1$s;
}

@media only screen and (max-width: 790px) {
#footer-4 .widget:nth-child(2) {
border-top: 1px solid %1$s;
border-bottom: 1px solid %1$s;
border-right: none;
border-left: none;
}
}


', $color_fourthfootergrid ) : '';

$css .= ( hyd_customizer_get_default_sitefooter_color() !== $color_sitefooter ) ? sprintf( '

.site-footer {
background: %1$s;
}

', $color_sitefooter ) : '';

$css .= ( hyd_customizer_get_default_sitefooterfont_color() !== $color_sitefooterfont ) ? sprintf( '

.site-footer,
.site-footer p,
.site-footer a,
.site-footer li a::after  {
color: %1$s;
}

', $color_sitefooterfont ) : '';



if( $css ){
wp_add_inline_style( $handle, $css );
}
}
