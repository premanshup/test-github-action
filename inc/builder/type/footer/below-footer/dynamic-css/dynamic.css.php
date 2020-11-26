<?php
/**
 * Below Footer control - Dynamic CSS
 *
 * @package Astra Builder
 * @since 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Below Footer CSS
 */
add_filter( 'astra_dynamic_theme_css', 'astra_fb_below_footer_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css          Astra Dynamic CSS.
 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
 * @return String Generated dynamic CSS for below Footer.
 *
 * @since 3.0.0
 */
function astra_fb_below_footer_dynamic_css( $dynamic_css, $dynamic_css_filtered = '' ) {

	if ( ! ( Astra_Builder_Helper::is_footer_row_empty( 'below' ) || is_customize_preview() ) ) {
		return $dynamic_css;
	}

	$_section = 'section-below-footer-builder';

	$selector = '.site-below-footer-wrap[data-section="section-below-footer-builder"]';

	$footer_bg               = astra_get_option( 'hbb-footer-bg-obj-responsive' );
	$footer_height           = astra_get_option( 'hbb-footer-height' );
	$footer_top_border_size  = astra_get_option( 'hbb-footer-separator' );
	$footer_top_border_color = astra_get_option( 'hbb-footer-top-border-color' );
	$footer_width            = astra_get_option( 'hbb-footer-layout-width' );
	$content_width           = astra_get_option( 'site-content-width' );
	$inner_spacing           = astra_get_option( 'hbb-inner-spacing' );


	$css_output_desktop = array(

		$selector                            => astra_get_responsive_background_obj( $footer_bg, 'desktop' ),
		$selector . ' .ast-builder-grid-row' => array(
			'align-items'     => astra_get_option( 'hbb-footer-vertical-alignment' ),
			'grid-column-gap' => astra_get_css_value( $inner_spacing, 'px' ),
		),

	);

	$css_output_desktop[ $selector ]['min-height'] = astra_get_css_value( $footer_height, 'px' );

	if ( isset( $footer_top_border_size ) && 1 <= $footer_top_border_size ) {

		$css_output_desktop[ $selector ]['border-style'] = 'solid';

		$css_output_desktop[ $selector ]['border-top-width'] = astra_get_css_value( $footer_top_border_size, 'px' );

		$css_output_desktop[ $selector ]['border-top-color'] = $footer_top_border_color;
	}

	$css_output_tablet = array(

		$selector => astra_get_responsive_background_obj( $footer_bg, 'tablet' ),
	);
	$css_output_mobile = array(

		$selector => astra_get_responsive_background_obj( $footer_bg, 'mobile' ),
	);

	if ( isset( $footer_width ) && 'content' === $footer_width ) {

		$css_output_desktop[ $selector . ' .site-container' ]['max-width']    = astra_get_css_value( $content_width, 'px' );
		$css_output_desktop[ $selector . ' .site-container' ]['margin-left']  = 'auto';
		$css_output_desktop[ $selector . ' .site-container' ]['margin-right'] = 'auto';
	} else {
		$css_output_desktop[ $selector . ' .site-container' ]['max-width']     = '100%';
		$css_output_desktop[ $selector . ' .site-container' ]['padding-left']  = '35px';
		$css_output_desktop[ $selector . ' .site-container' ]['padding-right'] = '35px';
	}


	/* Parse CSS from array() */
	$css_output  = astra_parse_css( $css_output_desktop );
	$css_output .= astra_parse_css( $css_output_tablet, '', astra_get_tablet_breakpoint() );
	$css_output .= astra_parse_css( $css_output_mobile, '', astra_get_mobile_breakpoint() );

	$dynamic_css .= $css_output;

	$dynamic_css .= Astra_Builder_Base_Dynamic_CSS::prepare_advanced_margin_padding_css( $_section, $selector );

	return $dynamic_css;
}
