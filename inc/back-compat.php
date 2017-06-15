<?php
/**
 * ranker back compat functionality
 *
 * Prevents ranker from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * @package WordPress
 * @subpackage ranker
 * @since ranker 1.0
 */

/**
 * Prevent switching to ranker on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since ranker 1.0
 */
function ranker_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'ranker_upgrade_notice' );
}
add_action( 'after_switch_theme', 'ranker_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * ranker on WordPress versions prior to 4.1.
 *
 * @since ranker 1.0
 */
function ranker_upgrade_notice() {
	$message = sprintf( __( 'ranker requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'ranker' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since ranker 1.0
 */
function ranker_customize() {
	wp_die( sprintf( __( 'ranker requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'ranker' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'ranker_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since ranker 1.0
 */
function ranker_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'ranker requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'ranker' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'ranker_preview' );
