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

	var tablet_break_point    = AstraBuilderMenuData.tablet_break_point || 768,
		mobile_break_point    = AstraBuilderMenuData.mobile_break_point || 544;

	for ( var index = 1; index <= AstraBuilderMenuData.header_menu_count; index++ ) {

		var prefix = 'menu' + index;
		var selector = '.ast-builder-menu-' + index;

		/**
		 * Typography CSS.
		 */

			// Menu Typography.
			astra_generate_outside_font_family_css(
				'astra-settings[header-' + prefix + '-font-family]',
				selector + ' .menu-item > .menu-link'
			);
			astra_css(
				'astra-settings[header-' + prefix + '-font-weight]',
				'font-weight',
				selector + ' .menu-item > .menu-link'
			);
			astra_css(
				'astra-settings[header-' + prefix + '-text-transform]',
				'text-transform',
				selector + ' .menu-item > .menu-link'
			);
			astra_responsive_font_size(
				'astra-settings[header-' + prefix + '-font-size]',
				selector + ' .menu-item > .menu-link'
			);
			astra_css(
				'astra-settings[header-' + prefix + '-line-height]',
				'line-height',
				selector + ' .menu-item > .menu-link'
			);
			astra_css(
				'astra-settings[header-' + prefix + '-letter-spacing]',
				'letter-spacing',
				selector + ' .menu-item > .menu-link',
				'px'
			);

		/**
		 * Color CSS.
		 */

			/**
			 * Menu - Colors
			 */

			// Menu - Normal Color
			astra_color_responsive_css(
				'astra-menu-color-preview',
				'astra-settings[header-' + prefix + '-color-responsive]',
				'color',
				selector + ' .main-header-menu .menu-item > .menu-link'
			);

			// Menu - Hover Color
			astra_color_responsive_css(
				'astra-menu-h-color-preview',
				'astra-settings[header-' + prefix + '-h-color-responsive]',
				'color',
				selector + ' .menu-item:hover > .menu-link'
			);

			// Menu Toggle -  Color
			astra_color_responsive_css(
				'astra-builder-toggle',
				'astra-settings[header-' + prefix + '-color-responsive]',
				'color',
				selector + ' .menu-item > .ast-menu-toggle'
			);

			// Menu Toggle - Hover Color
			astra_color_responsive_css(
				'astra-menu-h-toogle-color-preview',
				'astra-settings[header-' + prefix + '-h-color-responsive]',
				'color',
				selector + ' .menu-item:hover > .ast-menu-toggle'
			);
			// Menu - Active Color
			astra_color_responsive_css(
				'astra-menu-active-color-preview',
				'astra-settings[header-' + prefix + '-a-color-responsive]',
				'color',
				selector + ' .menu-item.current-menu-item > .menu-link'
			);

			// Menu - Normal Background
			astra_apply_responsive_background_css( 'astra-settings[header-' + prefix + '-bg-obj-responsive]', selector + ' .main-header-menu', 'desktop' );
			astra_apply_responsive_background_css( 'astra-settings[header-' + prefix + '-bg-obj-responsive]', selector + ' .main-header-menu', 'tablet' );
			astra_apply_responsive_background_css( 'astra-settings[header-' + prefix + '-bg-obj-responsive]', selector + ' .main-header-menu', 'mobile' );

			// Menu - Hover Background
			astra_color_responsive_css(
				'astra-menu-bg-preview',
				'astra-settings[header-' + prefix + '-h-bg-color-responsive]',
				'background',
				selector + ' .menu-item:hover > .menu-link'
			);

			// Menu - Active Background
			astra_color_responsive_css(
				'astra-builder',
				'astra-settings[header-' + prefix + '-a-bg-color-responsive]',
				'background',
				selector + ' .menu-item.current-menu-item > .menu-link'
			);

		/**
		 * Border CSS.
		 */

			(function (index) {

				// Menu 1 > Sub Menu Border Size.
				wp.customize( 'astra-settings[header-menu'+ index +'-submenu-border]', function( setting ) {
					setting.bind( function( border ) {

						var dynamicStyle = '.ast-builder-menu-'+ index +' .main-header-menu .sub-menu, .ast-desktop .ast-builder-menu-'+ index +' .submenu-with-border .astra-full-megamenu-wrapper, .ast-desktop .ast-builder-menu-'+ index +' .submenu-with-border .astra-megamenu {';
						dynamicStyle += 'border-top-width:'  + border.top + 'px;';
						dynamicStyle += 'border-right-width:'  + border.right + 'px;';
						dynamicStyle += 'border-left-width:'   + border.left + 'px;';
						dynamicStyle += 'border-style: solid;';
						dynamicStyle += 'border-bottom-width:'   + border.bottom + 'px;';

						dynamicStyle += '}';
						astra_add_dynamic_css( 'header-menu'+ index +'-submenu-border', dynamicStyle );

					} );
				} );

				// Menu Spacing - Menu 1.
				wp.customize( 'astra-settings[header-menu'+ index +'-menu-spacing]', function( value ) {
					value.bind( function( padding ) {
						var dynamicStyle = '';
						dynamicStyle += '.ast-builder-menu-'+ index +' .main-header-menu .menu-item > .menu-link {';
						dynamicStyle += 'padding-left: ' + padding['desktop']['left'] + padding['desktop-unit'] + ';';
						dynamicStyle += 'padding-right: ' + padding['desktop']['right'] + padding['desktop-unit'] + ';';
						dynamicStyle += 'padding-top: ' + padding['desktop']['top'] + padding['desktop-unit'] + ';';
						dynamicStyle += 'padding-bottom: ' + padding['desktop']['bottom'] + padding['desktop-unit'] + ';';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
						dynamicStyle += '.ast-header-break-point .ast-builder-menu-'+ index +' .main-header-menu .menu-item > .menu-link {';
						dynamicStyle += 'padding-left: ' + padding['tablet']['left'] + padding['tablet-unit'] + ';';
						dynamicStyle += 'padding-right: ' + padding['tablet']['right'] + padding['tablet-unit'] + ';';
						dynamicStyle += 'padding-top: ' + padding['tablet']['top'] + padding['tablet-unit'] + ';';
						dynamicStyle += 'padding-bottom: ' + padding['tablet']['bottom'] + padding['tablet-unit'] + ';';
						dynamicStyle += '} ';
						// Toggle top.
						dynamicStyle += '.astra-hfb-header .ast-builder-menu-'+ index +' .main-navigation ul .menu-item.menu-item-has-children > .ast-menu-toggle {';
						dynamicStyle += 'top: ' + padding['tablet']['top'] + padding['tablet-unit'] + ';';
						dynamicStyle += 'right: calc( ' + padding['tablet']['right'] + padding['tablet-unit'] + ' - 0.907em );'
						dynamicStyle += '} ';

						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
						dynamicStyle += '.ast-header-break-point .ast-builder-menu-'+ index +' .main-header-menu .menu-item > .menu-link {';
						dynamicStyle += 'padding-left: ' + padding['mobile']['left'] + padding['mobile-unit'] + ';';
						dynamicStyle += 'padding-right: ' + padding['mobile']['right'] + padding['mobile-unit'] + ';';
						dynamicStyle += 'padding-top: ' + padding['mobile']['top'] + padding['mobile-unit'] + ';';
						dynamicStyle += 'padding-bottom: ' + padding['mobile']['bottom'] + padding['mobile-unit'] + ';';
						dynamicStyle += '} ';
						// Toggle top.
						dynamicStyle += '.astra-hfb-header .ast-builder-menu-'+ index +' .main-navigation ul .menu-item.menu-item-has-children > .ast-menu-toggle {';
						dynamicStyle += 'top: ' + padding['mobile']['top'] + padding['mobile-unit'] + ';';
						dynamicStyle += 'right: calc( ' + padding['mobile']['right'] + padding['mobile-unit'] + ' - 0.907em );'
						dynamicStyle += '} ';

						dynamicStyle += '} ';

						astra_add_dynamic_css( 'header-menu'+ index +'-menu-spacing-toggle-button', dynamicStyle );
					} );
				} );

				// Margin - Menu 1.
				wp.customize( 'astra-settings[section-hb-menu-'+ index +'-margin]', function( value ) {
					value.bind( function( margin ) {
						var selector = '.ast-builder-menu-'+ index +' .main-header-menu, .ast-header-break-point .ast-builder-menu-'+ index +' .main-header-menu';
						var dynamicStyle = '';
						dynamicStyle += selector + ' {';
						dynamicStyle += 'margin-left: ' + margin['desktop']['left'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-right: ' + margin['desktop']['right'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-top: ' + margin['desktop']['top'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-bottom: ' + margin['desktop']['bottom'] + margin['desktop-unit'] + ';';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
						dynamicStyle += selector + ' {';
						dynamicStyle += 'margin-left: ' + margin['tablet']['left'] + margin['tablet-unit'] + ';';
						dynamicStyle += 'margin-right: ' + margin['tablet']['right'] + margin['tablet-unit'] + ';';
						dynamicStyle += 'margin-top: ' + margin['tablet']['top'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-bottom: ' + margin['tablet']['bottom'] + margin['desktop-unit'] + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';

						dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
						dynamicStyle += selector + ' {';
						dynamicStyle += 'margin-left: ' + margin['mobile']['left'] + margin['mobile-unit'] + ';';
						dynamicStyle += 'margin-right: ' + margin['mobile']['right'] + margin['mobile-unit'] + ';';
						dynamicStyle += 'margin-top: ' + margin['mobile']['top'] + margin['desktop-unit'] + ';';
						dynamicStyle += 'margin-bottom: ' + margin['mobile']['bottom'] + margin['desktop-unit'] + ';';
						dynamicStyle += '} ';
						dynamicStyle += '} ';
						astra_add_dynamic_css( 'section-hb-menu-'+ index +'-margin', dynamicStyle );
					} );
				} );

				/**
				 * Header Menu 1 > Submenu border Color
				 */
				wp.customize('astra-settings[header-menu'+ index +'-submenu-item-b-color]', function (value) {
					value.bind(function (color) {
						var insideBorder = wp.customize('astra-settings[header-menu'+ index +'-submenu-item-border]').get();
						if ('' != color) {
							if ( true == insideBorder ) {

								var dynamicStyle = '';

								dynamicStyle += '.ast-desktop .ast-builder-menu-'+ index +' .main-header-menu.submenu-with-border .sub-menu .menu-link, .ast-header-break-point .ast-builder-menu-'+ index +' .main-navigation .menu-item .sub-menu .menu-link, .ast-header-break-point .ast-builder-menu-'+ index +' .main-navigation .menu-item .menu-link';
								dynamicStyle += '{';
								dynamicStyle += 'border-bottom-width:' + ( ( true === insideBorder ) ? '1px;' : '0px;' );
								dynamicStyle += 'border-color:' + color + ';';
								dynamicStyle += 'border-style: solid;';
								dynamicStyle += '}';
								dynamicStyle += '.ast-desktop .ast-builder-menu-'+ index +' .menu-item .sub-menu .menu-item:last-child .menu-link{ border-style: none; }';

								astra_add_dynamic_css('header-menu'+ index +'-submenu-item-b-color', dynamicStyle);
							}
						} else {
							wp.customize.preview.send('refresh');
						}
					});
				});

				/**
				 * Header Menu 1 > Submenu border Color
				 */
				wp.customize( 'astra-settings[header-menu'+ index +'-submenu-item-border]', function( value ) {
					value.bind( function( border ) {
						var color = wp.customize( 'astra-settings[header-menu'+ index +'-submenu-item-b-color]' ).get();

						if( true === border  ) {
							var dynamicStyle = '.ast-desktop .ast-builder-menu-'+ index +' .main-header-menu.submenu-with-border .sub-menu .menu-link, .ast-header-break-point .ast-builder-menu-'+ index +' .main-navigation .menu-item .sub-menu .menu-link, .ast-header-break-point .ast-builder-menu-'+ index +' .main-navigation .menu-item .menu-link';
							dynamicStyle += '{';
							dynamicStyle += 'border-bottom-width:' + ( ( true === border ) ? '1px;' : '0px;' );
							dynamicStyle += 'border-color:'        + color + ';';
							dynamicStyle += 'border-style: solid;';
							dynamicStyle += '}';
							dynamicStyle += '.ast-desktop .ast-builder-menu-'+ index +' .menu-item .sub-menu .menu-item:last-child .menu-link{ border-style: none; }';

							astra_add_dynamic_css( 'header-menu'+ index +'-submenu-item-border', dynamicStyle );
						} else {
							wp.customize.preview.send( 'refresh' );
						}

					} );
				} );

				// Stack on Mobile CSS
				wp.customize( 'astra-settings[header-menu'+ index +'-menu-stack-on-mobile]', function( setting ) {
					setting.bind( function( stack ) {

						var menu_div = jQuery( '#ast-mobile-header #ast-hf-menu-'+ index  );
						menu_div.removeClass('inline-on-mobile');
						menu_div.removeClass('stack-on-mobile');

						if ( false === stack ) {
							menu_div.addClass('inline-on-mobile');
						} else {
							menu_div.addClass('stack-on-mobile');
						}
					} );
				} );

			})(index);


			// Sub Menu - Border Color.
			astra_css(
				'astra-settings[header-' + prefix + '-submenu-b-color]',
				'border-color',
				selector + ' li.menu-item .sub-menu '
			);

	}

	// Transparent header > Submenu link hover color.
	astra_color_responsive_css( 'astra-builder-transparent-submenu', 'astra-settings[transparent-submenu-h-color-responsive]', 'color', '.ast-theme-transparent-header .main-header-menu .menu-item .sub-menu .menu-item:hover > .menu-link' );

} )( jQuery );
