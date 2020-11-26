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

	var section = 'section-above-footer-builder';
	var selector = '.site-above-footer-wrap[data-section="section-above-footer-builder"]';

	// Footer Height.
	astra_css(
		'astra-settings[hba-footer-height]',
		'min-height',
		selector,
		'px'
	);

	// Footer Vertical Alignment.
    astra_css(
        'astra-settings[hba-footer-vertical-alignment]',
        'align-items',
        selector + ' .ast-builder-grid-row'
    );

	// Border Bottom width.
	astra_css(
		'astra-settings[hba-footer-separator]',
		'border-top-width',
		selector,
		'px'
	);

	// Inner Spacing.
	astra_css(
		'astra-settings[hba-inner-spacing]',
		'grid-column-gap',
		selector + ' .ast-builder-grid-row',
		'px'
	);

	// Border Color.

	astra_css(
		'astra-settings[hba-footer-top-border-color]',
		'border-top-color',
		selector
	);

	var dynamicStyle = selector + ' {';
		dynamicStyle += 'border-top-style: solid';
	dynamicStyle += '} ';

	astra_add_dynamic_css( 'hba-footer-top-border-color', dynamicStyle );

	// Primary Header - Layout.
	wp.customize( 'astra-settings[hba-footer-layout-width]', function( setting ) {
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

			astra_add_dynamic_css( 'hba-footer-layout-width', dynamicStyle );

		} );
	} );

	// Responsive BG styles > Above Footer Row.
	astra_apply_responsive_background_css( 'astra-settings[hba-footer-bg-obj-responsive]', selector, 'desktop' );
	astra_apply_responsive_background_css( 'astra-settings[hba-footer-bg-obj-responsive]', selector, 'tablet' );
	astra_apply_responsive_background_css( 'astra-settings[hba-footer-bg-obj-responsive]', selector, 'mobile' );

	// Advanced CSS Generation.
	astra_builder_advanced_css( section, selector );

} )( jQuery );
