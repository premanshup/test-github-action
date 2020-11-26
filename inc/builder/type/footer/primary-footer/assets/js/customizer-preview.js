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

	var section = 'section-primary-footer-builder';
	var selector = '.site-primary-footer-wrap[data-section="section-primary-footer-builder"]';

	// Primary Header - Layout.
	wp.customize( 'astra-settings[hb-footer-layout-width]', function( setting ) {
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

			astra_add_dynamic_css( 'hb-footer-layout-width', dynamicStyle );

		} );
	} );

	// Footer Vertical Alignment.
    astra_css(
        'astra-settings[hb-footer-vertical-alignment]',
        'align-items',
        selector + ' .ast-builder-grid-row'
    );

	// Inner Spacing.
	astra_css(
		'astra-settings[hb-inner-spacing]',
		'grid-column-gap',
		selector + ' .ast-builder-grid-row',
		'px'
	);

	// Border Top width.
	astra_css(
		'astra-settings[hb-footer-main-sep]',
		'border-top-width',
		selector,
		'px'
	);

	// Border Color.
	astra_css(
		'astra-settings[hb-footer-main-sep-color]',
		'border-color',
		selector,
	);

	var dynamicStyle = selector + ' {';
		dynamicStyle += 'border-top-style: solid';
	dynamicStyle += '} ';

	astra_add_dynamic_css( 'hb-footer-main-sep-color', dynamicStyle );

	// Responsive BG styles > Primary Footer Row.
	astra_apply_responsive_background_css( 'astra-settings[hb-footer-bg-obj-responsive]', selector, 'desktop' );
	astra_apply_responsive_background_css( 'astra-settings[hb-footer-bg-obj-responsive]', selector, 'tablet' );
	astra_apply_responsive_background_css( 'astra-settings[hb-footer-bg-obj-responsive]', selector, 'mobile' );

	// Responsive BG styles > Global Footer Row.
	astra_apply_responsive_background_css( 'astra-settings[footer-bg-obj-responsive]', '.ast-main-footer-wrap', 'desktop' );
	astra_apply_responsive_background_css( 'astra-settings[footer-bg-obj-responsive]', '.ast-main-footer-wrap', 'tablet' );
	astra_apply_responsive_background_css( 'astra-settings[footer-bg-obj-responsive]', '.ast-main-footer-wrap', 'mobile' );

	// Advanced CSS Generation.
	astra_builder_advanced_css( section, selector );

	// Advanced CSS for Header Builder.
	astra_builder_advanced_css( 'section-footer-builder-layout', '.astra-hfb-header .ast-main-footer-wrap' );

} )( jQuery );
