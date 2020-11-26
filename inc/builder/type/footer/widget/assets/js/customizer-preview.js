/**
 * This file adds some LIVE to the Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @package Astra Builder
 * @since 3.0.0
 */

( function( $ ) {

    var tablet_break_point    = AstraBuilderWidgetData.tablet_break_point || 768,
        mobile_break_point    = AstraBuilderWidgetData.mobile_break_point || 544;

    wp.customize( 'astra-settings[footer-widget-alignment-1]', function( value ) {
        value.bind( function( alignment ) {
            if( alignment.desktop != '' || alignment.tablet != '' || alignment.mobile != '' ) {
                var dynamicStyle = '';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['desktop'] + ';';
                dynamicStyle += '} ';

                dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['tablet'] + ';';
                dynamicStyle += '} ';
                dynamicStyle += '} ';

                dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-1"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['mobile'] + ';';
                dynamicStyle += '} ';
                dynamicStyle += '} ';

                astra_add_dynamic_css( 'footer-widget-alignment-1', dynamicStyle );
            }
        } );
    } );

    wp.customize( 'astra-settings[footer-widget-alignment-2]', function( value ) {
        value.bind( function( alignment ) {
            if( alignment.desktop != '' || alignment.tablet != '' || alignment.mobile != '' ) {
                var dynamicStyle = '';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['desktop'] + ';';
                dynamicStyle += '} ';

                dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['tablet'] + ';';
                dynamicStyle += '} ';
                dynamicStyle += '} ';

                dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-2"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['mobile'] + ';';
                dynamicStyle += '} ';
                dynamicStyle += '} ';

                astra_add_dynamic_css( 'footer-widget-alignment-2', dynamicStyle );
            }
        } );
    } );

    wp.customize( 'astra-settings[footer-widget-alignment-3]', function( value ) {
        value.bind( function( alignment ) {
            if( alignment.desktop != '' || alignment.tablet != '' || alignment.mobile != '' ) {
                var dynamicStyle = '';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-3"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['desktop'] + ';';
                dynamicStyle += '} ';

                dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-3"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['tablet'] + ';';
                dynamicStyle += '} ';
                dynamicStyle += '} ';

                dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-3"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['mobile'] + ';';
                dynamicStyle += '} ';
                dynamicStyle += '} ';

                astra_add_dynamic_css( 'footer-widget-alignment-3', dynamicStyle );
            }
        } );
    } );

    wp.customize( 'astra-settings[footer-widget-alignment-4]', function( value ) {
        value.bind( function( alignment ) {
            if( alignment.desktop != '' || alignment.tablet != '' || alignment.mobile != '' ) {
                var dynamicStyle = '';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['desktop'] + ';';
                dynamicStyle += '} ';

                dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['tablet'] + ';';
                dynamicStyle += '} ';
                dynamicStyle += '} ';

                dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
                dynamicStyle += '.footer-widget-area[data-section="sidebar-widgets-footer-widget-4"] .footer-widget-area-inner {';
                dynamicStyle += 'text-align: ' + alignment['mobile'] + ';';
                dynamicStyle += '} ';
                dynamicStyle += '} ';

                astra_add_dynamic_css( 'footer-widget-alignment-4', dynamicStyle );
            }
        } );
    } );

	astra_builder_widget_css('footer');

} )( jQuery );
