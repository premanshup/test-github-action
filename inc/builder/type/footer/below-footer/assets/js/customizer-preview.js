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

	var section = 'section-below-footer-builder';
	var selector = '.site-below-footer-wrap[data-section="section-below-footer-builder"]';

	// Footer Vertical Alignment.
    astra_css(
        'astra-settings[hbb-footer-vertical-alignment]',
        'align-items',
        selector + ' .ast-builder-grid-row'
    );


	// Header Height.
	astra_css(
		'astra-settings[hbb-footer-height]',
		'min-height',
		selector,
		'px'
	);

	// Inner Spacing.
	astra_css(
		'astra-settings[hbb-inner-spacing]',
		'grid-column-gap',
		selector + ' .ast-builder-grid-row',
		'px'
	);

	// Border Top width.
	astra_css(
		'astra-settings[hbb-footer-separator]',
		'border-top-width',
		selector,
		'px'
	);

	// Border Color.

	astra_css(
		'astra-settings[hbb-footer-top-border-color]',
		'border-top-color',
		selector
	);

	var dynamicStyle = selector + ' {';
		dynamicStyle += 'border-top-style: solid';
	dynamicStyle += '} ';

	astra_add_dynamic_css( 'hbb-footer-top-border-color', dynamicStyle );

	// Primary Header - Layout.
	wp.customize( 'astra-settings[hbb-footer-layout-width]', function( setting ) {
		setting.bind( function( layout ) {

			var dynamicStyle = '';

			if ( 'content' == layout ) {
				dynamicStyle = selector + ' .site-container {';
				dynamicStyle += 'max-width: ' + AstraBuilderPrimaryFooterData.footer_content_width + 'px;';
				dynamicStyle += 'margin-left: auto;';
				dynamicStyle += 'margin-right: auto;';
				dynamicStyle += '} ';
			}

			if ( 'full' == layout ) {
				dynamicStyle = selector + ' .site-container {';
					dynamicStyle += 'max-width: 100%;';
					dynamicStyle += 'padding-right: 35px; padding-left: 35px;';
				dynamicStyle += '} ';
			}

			astra_add_dynamic_css( 'hbb-footer-layout-width', dynamicStyle );

		} );
	} );


	// Responsive BG styles > Below Footer Row.
	astra_apply_responsive_background_css( 'astra-settings[hbb-footer-bg-obj-responsive]', selector, 'desktop' );
	astra_apply_responsive_background_css( 'astra-settings[hbb-footer-bg-obj-responsive]', selector, 'tablet' );
	astra_apply_responsive_background_css( 'astra-settings[hbb-footer-bg-obj-responsive]', selector, 'mobile' );

	// Advanced CSS Generation.
	astra_builder_advanced_css( section, selector );

} )( jQuery );
