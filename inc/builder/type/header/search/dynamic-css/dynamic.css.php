<?php
/**
 * Search - Dynamic CSS
 *
 * @package Astra
 * @since 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Search
 */
add_filter( 'astra_dynamic_theme_css', 'astra_hb_search_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css          Astra Dynamic CSS.
 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
 * @return String Generated dynamic CSS for Search.
 *
 * @since 3.0.0
 */
function astra_hb_search_dynamic_css( $dynamic_css, $dynamic_css_filtered = '' ) {

	if ( ! Astra_Builder_Helper::is_component_loaded( 'header', 'search' ) ) {
		return $dynamic_css;
	}

	$_section  = 'section-header-search';
	$selector  = '.ast-header-search';
	$icon_size = astra_get_option( 'header-search-icon-space' );

	$icon_size_desktop = ( isset( $icon_size ) && isset( $icon_size['desktop'] ) && ! empty( $icon_size['desktop'] ) ) ? $icon_size['desktop'] : 20;
	
	$icon_size_tablet = ( isset( $icon_size ) && isset( $icon_size['tablet'] ) && ! empty( $icon_size['tablet'] ) ) ? $icon_size['tablet'] : 20;

	$icon_size_mobile = ( isset( $icon_size ) && isset( $icon_size['mobile'] ) && ! empty( $icon_size['mobile'] ) ) ? $icon_size['mobile'] : 20;

	$margin          = astra_get_option( $_section . '-margin' );
	$margin_selector = '.astra-hfb-header .site-header-section > .ast-header-search, .astra-hfb-header .ast-header-search';
	
	/**
	 * Search CSS.
	 */
	$css_output_desktop = array(

		$selector . ' .astra-search-icon'         => array(
			'color'     => esc_attr( astra_get_option( 'header-search-icon-color' ) ),
			'font-size' => astra_get_css_value( $icon_size_desktop, 'px' ),
		),
		$selector . ' .search-field::placeholder' => array(
			'color' => esc_attr( astra_get_option( 'header-search-icon-color' ) ),
		),
		$selector . ' .ast-search-menu-icon.ast-dropdown-active .search-field' => array(
			'margin-right' => astra_get_css_value( $icon_size_desktop - 10, 'px' ),
		),
		$margin_selector                          => array(
			// Margin CSS.
			'margin-top'    => astra_responsive_spacing( $margin, 'top', 'desktop' ),
			'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'desktop' ),
			'margin-left'   => astra_responsive_spacing( $margin, 'left', 'desktop' ),
			'margin-right'  => astra_responsive_spacing( $margin, 'right', 'desktop' ),
		),
	);

	$css_output_tablet = array(

		$selector . ' .astra-search-icon' => array(
			'font-size' => astra_get_css_value( $icon_size_tablet, 'px' ),
		),
		$selector . ' .ast-search-menu-icon.ast-dropdown-active .search-field' => array(
			'margin-right' => astra_get_css_value( $icon_size_tablet - 10, 'px' ),
		),
		$margin_selector                  => array(
			// Margin CSS.
			'margin-top'    => astra_responsive_spacing( $margin, 'top', 'tablet' ),
			'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'tablet' ),
			'margin-left'   => astra_responsive_spacing( $margin, 'left', 'tablet' ),
			'margin-right'  => astra_responsive_spacing( $margin, 'right', 'tablet' ),
		),
	);

	$css_output_mobile = array(

		$selector . ' .astra-search-icon' => array(
			'font-size' => astra_get_css_value( $icon_size_mobile, 'px' ),
		),
		$selector . ' .ast-search-menu-icon.ast-dropdown-active .search-field' => array(
			'margin-right' => astra_get_css_value( $icon_size_mobile - 10, 'px' ),
		),
		$margin_selector                  => array(
			// Margin CSS.
			'margin-top'    => astra_responsive_spacing( $margin, 'top', 'mobile' ),
			'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'mobile' ),
			'margin-left'   => astra_responsive_spacing( $margin, 'left', 'mobile' ),
			'margin-right'  => astra_responsive_spacing( $margin, 'right', 'mobile' ),
		),
	);

	/* Parse CSS from array() */
	$css_output  = astra_parse_css( $css_output_desktop );
	$css_output .= astra_parse_css( $css_output_tablet, '', astra_get_tablet_breakpoint() );
	$css_output .= astra_parse_css( $css_output_mobile, '', astra_get_mobile_breakpoint() );

	$dynamic_css .= $css_output;

	return $dynamic_css;
}
