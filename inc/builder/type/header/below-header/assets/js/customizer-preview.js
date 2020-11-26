/**
 * This file adds some LIVE to the Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @package Astra
 * @since 3.0.0
 */

( function( $ ) {

	// Header Height.
	astra_css(
		'astra-settings[hbb-header-height]',
		'min-height',
		'.ast-below-header-bar .site-below-header-wrap, .ast-mobile-header-wrap .ast-below-header-bar .ast-builder-grid-row-container-inner',
		'px'
	);
	astra_css(
		'astra-settings[hbb-header-height]',
		'height',
		'.ast-desktop .ast-below-header-bar .main-header-menu > .menu-item',
		'px'
	);

	// Border Bottom width.
	astra_css(
		'astra-settings[hbb-header-separator]',
		'border-bottom-width',
		'.ast-header-break-point .ast-below-header-bar, .ast-below-header-bar',
		'px'
	);

	// Border Color.
	astra_css(
		'astra-settings[hbb-header-bottom-border-color]',
		'border-color',
		'.ast-below-header-bar',
	);

	astra_css(
		'astra-settings[hbb-header-bottom-border-color]',
		'border-color',
		'.ast-header-break-point .ast-below-header-bar, .ast-below-header-bar',
	);

	var dynamicStyle = '.ast-below-header-bar {';
		dynamicStyle += 'border-bottom-style: solid';
	dynamicStyle += '} ';

	astra_add_dynamic_css( 'hbb-header-bottom-border-color', dynamicStyle );

	// Responsive BG styles > Below Header Row.
	astra_apply_responsive_background_css( 'astra-settings[hbb-header-bg-obj-responsive]', '.ast-below-header.ast-below-header-bar', 'desktop' );
	astra_apply_responsive_background_css( 'astra-settings[hbb-header-bg-obj-responsive]', '.ast-below-header.ast-below-header-bar', 'tablet' );
	astra_apply_responsive_background_css( 'astra-settings[hbb-header-bg-obj-responsive]', '.ast-below-header.ast-below-header-bar', 'mobile' );

	// Advanced CSS Generation.
	astra_builder_advanced_css( 'section-below-header-builder', '.ast-below-header.ast-below-header-bar' );

} )( jQuery );
