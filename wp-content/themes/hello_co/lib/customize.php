<?php

function hyd_customizer_get_default_nav_color() {
return '#fff';
}
function hyd_customizer_get_default_navfont_color() {
return '#222';
}
function hyd_customizer_get_default_subspan_color() {
return '#dfb15b';
}
function hyd_customizer_get_default_navfonth_color() {
return '#dfb15b';
}
function hyd_customizer_get_default_topoptin_color() {
return '#eee';
}
function hyd_customizer_get_default_topoptinfont_color() {
return '#222';
}
function hyd_customizer_get_default_topmenufont_color() {
return '#dfb15b';
}
function hyd_customizer_get_default_topmenufonth_color() {
return '#b2d2cd';
}
function hyd_customizer_get_default_tanimageborder_color() {
return '#f6ebe4';
}
function hyd_customizer_get_default_oliveimageborder_color() {
return '#e6e7e1';
}
function hyd_customizer_get_default_homefullwidth_color() {
return '#f3f3f3';
}
function hyd_customizer_get_default_homefullwidthfont_color() {
return '#222';
}
function hyd_customizer_get_default_homefullwidthaccentfont_color() {
return '#dfb15b';
}
function hyd_customizer_get_default_homefullwidthgrid_color() {
return '#d7d4cf';
}
function hyd_customizer_get_default_homefullwidth2_color() {
return '#f3f3f3';
}
function hyd_customizer_get_default_homefullwidthfont2_color() {
return '#222';
}
function hyd_customizer_get_default_homefullwidthaccentfont2_color() {
return '#dfb15b';
}
function hyd_customizer_get_default_homefullwidthgrid2_color() {
return '#d7d4cf';
}
function hyd_customizer_get_default_tanabout_color() {
return '#f6ebe4';
}
function hyd_customizer_get_default_yellowtext_color() {
return '#dfb15b';
}
function hyd_customizer_get_default_promoblurb_color() {
return '#f6f2e7';
}
function hyd_customizer_get_default_promofonts_color() {
return '#222';
}
function hyd_customizer_get_default_optin_color() {
return '#f6f2e7';
}
function hyd_customizer_get_default_optinfont_color() {
return '#222';
}
function hyd_customizer_get_default_accentfont_color() {
return '#d7d4cf';
}
function hyd_customizer_get_default_blockquote_color() {
return '#f6f2e7';
}
function hyd_customizer_get_default_primarylinkcolor_color() {
return '#dfb15b';
}
function hyd_customizer_get_default_primaryhovercolor_color() {
return '#d6d3ce';
}
function hyd_customizer_get_default_metacolor_color() {
return '#dfb15b';
}
function hyd_customizer_get_default_blackbutton_color() {
return '#222';
}
function hyd_customizer_get_default_blackbuttonfont_color() {
return '#fff';
}
function hyd_customizer_get_default_tanbuttonhover_color() {
return '#d6d3ce';
}
function hyd_customizer_get_default_tanbuttonhoverfont_color() {
return '#fff';
}
function hyd_customizer_get_default_blueunderbutton_color() {
return '#d6e9e5';
}
function hyd_customizer_get_default_stickysocial_color() {
return '#f6f2e7';
}
function hyd_customizer_get_default_totop_color() {
return '#d6d3ce';
}
function hyd_customizer_get_default_footerwidgets_color() {
return '#fff';
}
function hyd_customizer_get_default_footerwidgetsfont_color() {
return '#222';
}
function hyd_customizer_get_default_footerwidgetslink_color() {
return '#dfb15b';
}
function hyd_customizer_get_default_footerwidgetsgrid_color() {
return '#d7d4cf';
}
function hyd_customizer_get_default_fourthfooter_color() {
return '#464648';
}
function hyd_customizer_get_default_fourthfooterfont_color() {
return '#fff';
}
function hyd_customizer_get_default_fourthfootergrid_color() {
return '#d7d4cf';
}
function hyd_customizer_get_default_sitefooter_color() {
return '#222';
}
function hyd_customizer_get_default_sitefooterfont_color() {
return '#fff';
}

add_action( 'customize_register', 'hyd_customizer_register' );
/**
* Register settings and controls with the Customizer.
*
* @since 1.0.0
*
* @param WP_Customize_Manager $wp_customize Customizer object.
*/
function hyd_customizer_register() {

global $wp_customize;

$images = apply_filters( 'hyd_images', array( '1', '2', '3', '4') );

$wp_customize->add_section( 'hyd-settings', array(
'description' => __( 'Customize the image sections on the homepage. Recommended Image size listed in Widget.', 'hyd' ),
'title'    => __( 'Image Sections', 'hyd' ),
'priority' => 35,
) );

foreach( $images as $image ){

$wp_customize->add_setting( $image .'-hyd-image', array(
'default'  => sprintf( '%s/images/bg-%s.jpg', get_stylesheet_directory_uri(), $image ),
'type'     => 'option',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $image .'-hyd-image', array(
'label'    => sprintf( __( 'Image Section %s :', 'hyd' ), $image ),
'section'  => 'hyd-settings',
'settings' => $image .'-hyd-image',
'priority' => $image+1,
) ) );
}

$wp_customize->add_setting(
'hyd_nav_color',
array(
'default'           => hyd_customizer_get_default_nav_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_navfont_color',
array(
'default'           => hyd_customizer_get_default_navfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_subspan_color',
array(
'default'           => hyd_customizer_get_default_subspan_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_navfonth_color',
array(
'default'           => hyd_customizer_get_default_navfonth_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_topoptin_color',
array(
'default'           => hyd_customizer_get_default_topoptin_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_topoptinfont_color',
array(
'default'           => hyd_customizer_get_default_topoptinfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_topmenufont_color',
array(
'default'           => hyd_customizer_get_default_topmenufont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_topmenufonth_color',
array(
'default'           => hyd_customizer_get_default_topmenufonth_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_tanimageborder_color',
array(
'default'           => hyd_customizer_get_default_tanimageborder_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_oliveimageborder_color',
array(
'default'           => hyd_customizer_get_default_oliveimageborder_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_homefullwidth_color',
array(
'default'           => hyd_customizer_get_default_homefullwidth_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_homefullwidthfont_color',
array(
'default'           => hyd_customizer_get_default_homefullwidthfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_homefullwidthaccentfont_color',
array(
'default'           => hyd_customizer_get_default_homefullwidthaccentfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_homefullwidthgrid_color',
array(
'default'           => hyd_customizer_get_default_homefullwidthgrid_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_homefullwidth2_color',
array(
'default'           => hyd_customizer_get_default_homefullwidth2_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_homefullwidthfont2_color',
array(
'default'           => hyd_customizer_get_default_homefullwidthfont2_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_homefullwidthaccentfont2_color',
array(
'default'           => hyd_customizer_get_default_homefullwidthaccentfont2_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_homefullwidthgrid2_color',
array(
'default'           => hyd_customizer_get_default_homefullwidthgrid2_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);


$wp_customize->add_setting(
'hyd_tanabout_color',
array(
'default'           => hyd_customizer_get_default_tanabout_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_yellowtext_color',
array(
'default'           => hyd_customizer_get_default_yellowtext_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_promoblurb_color',
array(
'default'           => hyd_customizer_get_default_promoblurb_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_promofonts_color',
array(
'default'           => hyd_customizer_get_default_promofonts_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_optin_color',
array(
'default'           => hyd_customizer_get_default_optin_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_optinfont_color',
array(
'default'           => hyd_customizer_get_default_optinfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_accentfont_color',
array(
'default'           => hyd_customizer_get_default_accentfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_blockquote_color',
array(
'default'           => hyd_customizer_get_default_blockquote_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_primarylinkcolor_color',
array(
'default'           => hyd_customizer_get_default_primarylinkcolor_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_primaryhovercolor_color',
array(
'default'           => hyd_customizer_get_default_primaryhovercolor_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_metacolor_color',
array(
'default'           => hyd_customizer_get_default_metacolor_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_blackbutton_color',
array(
'default'           => hyd_customizer_get_default_blackbutton_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_tanbuttonhover_color',
array(
'default'           => hyd_customizer_get_default_tanbuttonhover_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_stickysocial_color',
array(
'default'           => hyd_customizer_get_default_stickysocial_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_totop_color',
array(
'default'           => hyd_customizer_get_default_totop_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_blackbuttonfont_color',
array(
'default'           => hyd_customizer_get_default_blackbuttonfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_tanbuttonhoverfont_color',
array(
'default'           => hyd_customizer_get_default_tanbuttonhoverfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_blueunderbutton_color',
array(
'default'           => hyd_customizer_get_default_blueunderbutton_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_footerwidgets_color',
array(
'default'           => hyd_customizer_get_default_footerwidgets_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_footerwidgetsfont_color',
array(
'default'           => hyd_customizer_get_default_footerwidgetsfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_footerwidgetslink_color',
array(
'default'           => hyd_customizer_get_default_footerwidgetslink_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_footerwidgetsgrid_color',
array(
'default'           => hyd_customizer_get_default_footerwidgetsgrid_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_fourthfooter_color',
array(
'default'           => hyd_customizer_get_default_fourthfooter_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_fourthfooterfont_color',
array(
'default'           => hyd_customizer_get_default_fourthfooterfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_fourthfootergrid_color',
array(
'default'           => hyd_customizer_get_default_fourthfootergrid_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);


$wp_customize->add_setting(
'hyd_sitefooter_color',
array(
'default'           => hyd_customizer_get_default_sitefooter_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);

$wp_customize->add_setting(
'hyd_sitefooterfont_color',
array(
'default'           => hyd_customizer_get_default_sitefooterfont_color(),
'sanitize_callback' => 'sanitize_hex_color',
)
);


$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_nav_color',
array(
'description' => __( 'Change The Navigation Color', 'hyd' ),
'label'       => __( 'Navigation Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_nav_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_navfont_color',
array(
'description' => __( 'Change The Navigation Font Color', 'hyd' ),
'label'       => __( 'Navigation Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_navfont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_subspan_color',
array(
'description' => __( 'Change the Menu Item Accent color', 'hyd' ),
'label'       => __( 'Menu Accent Text', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_subspan_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_navfonth_color',
array(
'description' => __( 'Change the hover color in the navigation', 'hyd' ),
'label'       => __( 'Navigation Hover Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_navfonth_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_topoptin_color',
array(
'description' => __( 'Change the gray optin color of the top widget', 'hyd' ),
'label'       => __( 'Top Optin Gray Background', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_topoptin_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_topoptinfont_color',
array(
'description' => __( 'Change the font color of the top optin', 'hyd' ),
'label'       => __( 'Top Optin Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_topoptinfont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_topmenufont_color',
array(
'description' => __( 'Change the Menu color in the Featured Spot', 'hyd' ),
'label'       => __( 'Featured Menu Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_topmenufont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_topmenufonth_color',
array(
'description' => __( 'Change the Menu hover color', 'hyd' ),
'label'       => __( 'Featured Menu Hover Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_topmenufonth_color',
)
)
);


$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_tanimageborder_color',
array(
'description' => __( 'Change the tan color of the image blocks', 'hyd' ),
'label'       => __( 'Tan Color Behind Images', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_tanimageborder_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_oliveimageborder_color',
array(
'description' => __( 'Change the olive color of the image blocks', 'hyd' ),
'label'       => __( 'Olive Color Behind Images', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_oliveimageborder_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_homefullwidth_color',
array(
'description' => __( 'Change pale gray background color of the Full Width spot', 'hyd' ),
'label'       => __( 'Full Width 1 Gray Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_homefullwidth_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_homefullwidthfont_color',
array(
'description' => __( 'Change the font color in the full width widget area', 'hyd' ),
'label'       => __( 'Full Width 1 Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_homefullwidthfont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_homefullwidthaccentfont_color',
array(
'description' => __( 'Change the accent (h2) font color in the full width widget area', 'hyd' ),
'label'       => __( 'Full Width 1 Accent Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_homefullwidthaccentfont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_homefullwidthgrid_color',
array(
'description' => __( 'Change the color of the Gray Bar When using 2 widgets', 'hyd' ),
'label'       => __( 'Full Width 1 Gray Accent Bar', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_homefullwidthgrid_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_homefullwidth2_color',
array(
'description' => __( 'Change pale gray background color of the Full Width spot', 'hyd' ),
'label'       => __( 'Full Width 2 Gray Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_homefullwidth2_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_homefullwidthfont2_color',
array(
'description' => __( 'Change the font color in the full width widget area', 'hyd' ),
'label'       => __( 'Full Width 2 Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_homefullwidthfont2_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_homefullwidthaccentfont2_color',
array(
'description' => __( 'Change the accent (h2) font color in the full width widget area', 'hyd' ),
'label'       => __( 'Full Width 2 Accent Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_homefullwidthaccentfont2_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_homefullwidthgrid2_color',
array(
'description' => __( 'Change the color of the Gray Bar When using 2 widgets', 'hyd' ),
'label'       => __( 'Full Width 2 Gray Accent Bar', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_homefullwidthgrid2_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_tanabout_color',
array(
'description' => __( 'Change the tan color behind the about image', 'hyd' ),
'label'       => __( 'About Section Tan Image Block', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_tanabout_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_yellowtext_color',
array(
'description' => __( 'Change the yellow text in the Featured Page spot.', 'hyd' ),
'label'       => __( 'Yellow Text Featured Posts', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_yellowtext_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_promoblurb_color',
array(
'description' => __( 'Change the cream background color of the promobox', 'hyd' ),
'label'       => __( 'Promo Box Background Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_promoblurb_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_promofonts_color',
array(
'description' => __( 'Change the Tan of the Blog Flexible widget area', 'hyd' ),
'label'       => __( 'Promo Box Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_promofonts_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_optin_color',
array(
'description' => __( 'Change background color of the Sidebar and Side Widget Optin', 'hyd' ),
'label'       => __( 'Optin Color - Sidebar and Sidewidget ', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_optin_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_optinfont_color',
array(
'description' => __( 'Change the font color of the optins in the Sidebar and Side Widget', 'hyd' ),
'label'       => __( 'Optin Font Color - Sidebar and Sidewidget ', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_optinfont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_accentfont_color',
array(
'description' => __( 'Change the pink accent text color', 'hyd' ),
'label'       => __( 'Accent Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_accentfont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_blockquote_color',
array(
'description' => __( 'Change the cream background of the blockquote', 'hyd' ),
'label'       => __( 'Cream Blockquote', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_blockquote_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_primarylinkcolor_color',
array(
'description' => __( 'Change the Primary Link color', 'hyd' ),
'label'       => __( 'Primary Link Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_primarylinkcolor_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_primaryhovercolor_color',
array(
'description' => __( 'Change the main Hover color', 'hyd' ),
'label'       => __( 'Primary Hover Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_primaryhovercolor_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_metacolor_color',
array(
'description' => __( 'Change the category color & hover', 'hyd' ),
'label'       => __( 'Category/Meta Gold Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_metacolor_color',
)
)
);


$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_blackbutton_color',
array(
'description' => __( 'Change the Black Button color', 'hyd' ),
'label'       => __( 'Black Button Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_blackbutton_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_blackbuttonfont_color',
array(
'description' => __( 'Change the Black Button font color', 'hyd' ),
'label'       => __( 'Black Button Font', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_blackbuttonfont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_tanbuttonhover_color',
array(
'description' => __( 'Change the tan button hover color', 'hyd' ),
'label'       => __( 'Button Hover Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_tanbuttonhover_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_tanbuttonhoverfont_color',
array(
'description' => __( 'Change the tan button font color', 'hyd' ),
'label'       => __( 'Tan Button Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_tanbuttonhoverfont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_blueunderbutton_color',
array(
'description' => __( 'Change the mint underlines', 'hyd' ),
'label'       => __( 'Mint Underline Buttons', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_blueunderbutton_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_stickysocial_color',
array(
'description' => __( 'Change the Sticky Social background color', 'hyd' ),
'label'       => __( 'Sticky Social Background color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_stickysocial_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_totop_color',
array(
'description' => __( 'Change the To Top button color', 'hyd' ),
'label'       => __( 'To Top Button Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_totop_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_footerwidgets_color',
array(
'description' => __( 'Change the footer widgets background color', 'hyd' ),
'label'       => __( 'Footer Widgets Background Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_footerwidgets_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_footerwidgetsfont_color',
array(
'description' => __( 'Change the footer widgets font color', 'hyd' ),
'label'       => __( 'Footer Widgets font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_footerwidgetsfont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_footerwidgetslink_color',
array(
'description' => __( 'Change the link color in the Footer', 'hyd' ),
'label'       => __( 'Footer Widgets link Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_footerwidgetslink_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_footerwidgetsgrid_color',
array(
'description' => __( 'Change the gray grid color in the footer', 'hyd' ),
'label'       => __( 'Footer Widgets Gray Grid', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_footerwidgetsgrid_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_fourthfooter_color',
array(
'description' => __( 'Change the dark gray background of the Alternative Footer', 'hyd' ),
'label'       => __( 'Alternative Footer Background', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_fourthfooter_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_fourthfooterfont_color',
array(
'description' => __( 'Change the font color of the Alternative Footer', 'hyd' ),
'label'       => __( 'Alternative Footer Font', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_fourthfooterfont_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_fourthfootergrid_color',
array(
'description' => __( 'Change the grid color of the Alternative Footer', 'hyd' ),
'label'       => __( 'Alternative Footer Grid', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_fourthfootergrid_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_sitefooter_color',
array(
'description' => __( 'Change the black site footer', 'hyd' ),
'label'       => __( 'Site Credit Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_sitefooter_color',
)
)
);

$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'hyd_sitefooterfont_color',
array(
'description' => __( 'Change the Site Footer Font color', 'hyd' ),
'label'       => __( 'Site Footer Font Color', 'hyd' ),
'section'     => 'colors',
'settings'    => 'hyd_sitefooterfont_color',
)
)
);

//* Add front page setting to the Customizer
$wp_customize->add_section( 'hyd_blog_section', array(
'title'    => __( 'Front Page Content Settings', 'hyd' ),
'description' => __( 'Choose if you would like to display the content section below widget sections on the front page.', 'hyd' ),
'priority' => 75.01,
));

//* Add front page setting to the Customizer
$wp_customize->add_setting( 'hyd_blog_setting', array(
'default'           => 'true',
'capability'        => 'edit_theme_options',
'type'              => 'option',
));

$wp_customize->add_control( new WP_Customize_Control(
$wp_customize, 'hyd_blog_control', array(
'label'       => __( 'Front Page Content Section Display', 'hyd' ),
'description' => __( 'Show or Hide the content section. The section will display on the front page by default.', 'hyd' ),
'section'     => 'hyd_blog_section',
'settings'    => 'hyd_blog_setting',
'type'        => 'select',
'choices'     => array(
'false'   => __( 'Hide content section', 'hyd' ),
'true'    => __( 'Show content section', 'hyd' ),
),
))
);

$wp_customize->add_setting( 'hyd_blog_text', array(
'default'           => __( 'On the Blog', 'hyd' ),
'capability'        => 'edit_theme_options',
'sanitize_callback' => 'wp_kses_post',
'type'              => 'option',
));

$wp_customize->add_control( new WP_Customize_Control(
$wp_customize, 'hyd_blog_text_control', array(
'label'      => __( 'Blog Section Heading Text', 'hyd' ),
'description' => __( 'Choose the heading text you would like to display above posts on the front page.<br /><br />This text will show when displaying posts and using widgets on the front page.', 'hyd' ),
'section'    => 'hyd_blog_section',
'settings'   => 'hyd_blog_text',
'type'       => 'text',
))
);

}
