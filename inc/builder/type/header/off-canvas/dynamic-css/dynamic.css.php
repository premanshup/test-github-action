<?php
/**
 * Off Canvas - Dynamic CSS
 *
 * @package astra-builder
 * @since 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Off Canvas Row.
 */
add_filter( 'astra_dynamic_theme_css', 'astra_off_canvas_row_setting', 11 );

/**
 * Off Canvas Row - Dynamic CSS
 *
 * @param  string $dynamic_css          Astra Dynamic CSS.
 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
 * @return String Generated dynamic CSS for Heading Colors.
 *
 * @since 3.0.0
 */
function astra_off_canvas_row_setting( $dynamic_css, $dynamic_css_filtered = '' ) {

	$parse_css = '';

	$_section = 'section-popup-header-builder';

	$selector = '.ast-mobile-popup-drawer.active';

	$off_canvas_background  = astra_get_option( 'off-canvas-background' );
	$off_canvas_close_color = astra_get_option( 'off-canvas-close-color' );

	/**
	 * Off-Canvas CSS.
	 */
	$css_output = array(

		$selector . ' .ast-mobile-popup-inner' => astra_get_background_obj( $off_canvas_background ),

		'.ast-mobile-header-wrap .ast-mobile-header-content' => astra_get_background_obj( $off_canvas_background ),
	);

	$css_output[ $selector . ' .ast-mobile-popup-inner' ]['color'] = $off_canvas_close_color;

	/* Parse CSS from array() */
	$css_output = astra_parse_css( $css_output );

	$dynamic_css .= $css_output;

	return $dynamic_css;
}
