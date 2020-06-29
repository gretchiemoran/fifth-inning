<?php
/**
 * Gutenberg theme support.
 *
 * @package Hello Co Theme
 * @author  Hello You Designs
 * @license GPL-2.0-or-later
 * @link    https://helloyoudesigns.com
 */

add_action( 'wp_enqueue_scripts', 'hyd_enqueue_gutenberg_frontend_styles' );
/**
 * Enqueues Gutenberg front-end styles.
 *
 * @since 1.0.2
 */
function hyd_enqueue_gutenberg_frontend_styles() {

	$child_theme_slug = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'hyd';

	wp_enqueue_style(
		'hyd-gutenberg',
		get_stylesheet_directory_uri() . '/lib/gutenberg/front-end.css',
		array( $child_theme_slug ),
		CHILD_THEME_VERSION
	);

}

add_action( 'enqueue_block_editor_assets', 'hyd_block_editor_styles' );
/**
 * Enqueues Gutenberg admin editor fonts and styles.
 *
 * @since 1.0.2
 */
function hyd_block_editor_styles() {

	wp_enqueue_style(
		'hyd-gutenberg-fonts',
		'https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i|Lora:400,400i,700,700i|Montserrat:100,300,300i,400,400i,500,500i',
		array(),
		CHILD_THEME_VERSION
	);

}

// Adds support for editor styles.
add_theme_support( 'editor-styles' );

// Enqueues editor styles.
add_editor_style( '/lib/gutenberg/style-editor.css' );

// Adds support for block alignments.
add_theme_support( 'align-wide' );

// Makes media embeds responsive.
add_theme_support( 'responsive-embeds' );

// Adds support for editor font sizes.
add_theme_support(
	'editor-font-sizes',
	array(
		array(
			'name'      => __( 'Small', 'hyd-theme' ),
			'shortName' => __( 'S', 'hyd-theme' ),
			'size'      => 12,
			'slug'      => 'small',
		),
		array(
			'name'      => __( 'Normal', 'hyd-theme' ),
			'shortName' => __( 'M', 'hyd-theme' ),
			'size'      => 18,
			'slug'      => 'normal',
		),
		array(
			'name'      => __( 'Large', 'hyd-theme' ),
			'shortName' => __( 'L', 'hyd-theme' ),
			'size'      => 20,
			'slug'      => 'large',
		),
		array(
			'name'      => __( 'Larger', 'hyd-theme' ),
			'shortName' => __( 'XL', 'hyd-theme' ),
			'size'      => 24,
			'slug'      => 'larger',
		),
	)
);

add_action( 'after_setup_theme', 'hyd_content_width', 0 );
/**
 * Sets content width to match the “wide” Gutenberg block width.
 *
 * @since 1.0.2
 */
function hyd_content_width() {

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- See https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/924
	$GLOBALS['content_width'] = apply_filters( 'hyd_content_width', 1200 );

}
