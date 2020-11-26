<?php
/**
 * Heading Colors - Dynamic CSS
 *
 * @package astra-builder
 * @since 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Heading Colors
 */
add_filter( 'astra_dynamic_theme_css', 'astra_hb_menu_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css          Astra Dynamic CSS.
 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
 * @return String Generated dynamic CSS for Heading Colors.
 *
 * @since 3.0.0
 */
function astra_hb_menu_dynamic_css( $dynamic_css, $dynamic_css_filtered = '' ) {

	for ( $index = 1; $index <= Astra_Builder_Helper::$num_of_header_menu; $index++ ) {

		if ( ! Astra_Builder_Helper::is_component_loaded( 'header', 'menu-' . $index ) ) {
			continue;
		}

		$_prefix  = 'menu' . $index;
		$_section = 'section-hb-menu-' . $index;

		$selector = '.ast-builder-menu-' . $index;

		// Sub Menu.
		$sub_menu_border         = astra_get_option( 'header-' . $_prefix . '-submenu-border' );
		$sub_menu_divider_toggle = astra_get_option( 'header-' . $_prefix . '-submenu-item-border' );
		$sub_menu_divider_color  = astra_get_option( 'header-' . $_prefix . '-submenu-item-b-color' );

		// Menu.
		$menu_resp_color           = astra_get_option( 'header-' . $_prefix . '-color-responsive' );
		$menu_resp_bg_color        = astra_get_option( 'header-' . $_prefix . '-bg-obj-responsive' );
		$menu_resp_color_hover     = astra_get_option( 'header-' . $_prefix . '-h-color-responsive' );
		$menu_resp_bg_color_hover  = astra_get_option( 'header-' . $_prefix . '-h-bg-color-responsive' );
		$menu_resp_color_active    = astra_get_option( 'header-' . $_prefix . '-a-color-responsive' );
		$menu_resp_bg_color_active = astra_get_option( 'header-' . $_prefix . '-a-bg-color-responsive' );

		$menu_resp_color_desktop = ( isset( $menu_resp_color['desktop'] ) ) ? $menu_resp_color['desktop'] : '';
		$menu_resp_color_tablet  = ( isset( $menu_resp_color['tablet'] ) ) ? $menu_resp_color['tablet'] : '';
		$menu_resp_color_mobile  = ( isset( $menu_resp_color['mobile'] ) ) ? $menu_resp_color['mobile'] : '';

		$menu_resp_color_hover_desktop = ( isset( $menu_resp_color_hover['desktop'] ) ) ? $menu_resp_color_hover['desktop'] : '';
		$menu_resp_color_hover_tablet  = ( isset( $menu_resp_color_hover['tablet'] ) ) ? $menu_resp_color_hover['tablet'] : '';
		$menu_resp_color_hover_mobile  = ( isset( $menu_resp_color_hover['mobile'] ) ) ? $menu_resp_color_hover['mobile'] : '';

		$menu_resp_bg_color_hover_desktop = ( isset( $menu_resp_bg_color_hover['desktop'] ) ) ? $menu_resp_bg_color_hover['desktop'] : '';
		$menu_resp_bg_color_hover_tablet  = ( isset( $menu_resp_bg_color_hover['tablet'] ) ) ? $menu_resp_bg_color_hover['tablet'] : '';
		$menu_resp_bg_color_hover_mobile  = ( isset( $menu_resp_bg_color_hover['mobile'] ) ) ? $menu_resp_bg_color_hover['mobile'] : '';

		$menu_resp_color_active_desktop = ( isset( $menu_resp_color_active['desktop'] ) ) ? $menu_resp_color_active['desktop'] : '';
		$menu_resp_color_active_tablet  = ( isset( $menu_resp_color_active['tablet'] ) ) ? $menu_resp_color_active['tablet'] : '';
		$menu_resp_color_active_mobile  = ( isset( $menu_resp_color_active['mobile'] ) ) ? $menu_resp_color_active['mobile'] : '';

		$menu_resp_bg_color_active_desktop = ( isset( $menu_resp_bg_color_active['desktop'] ) ) ? $menu_resp_bg_color_active['desktop'] : '';
		$menu_resp_bg_color_active_tablet  = ( isset( $menu_resp_bg_color_active['tablet'] ) ) ? $menu_resp_bg_color_active['tablet'] : '';
		$menu_resp_bg_color_active_mobile  = ( isset( $menu_resp_bg_color_active['mobile'] ) ) ? $menu_resp_bg_color_active['mobile'] : '';

		// Typography.
		$menu_font_family    = astra_get_option( 'header-' . $_prefix . '-font-family' );
		$menu_font_size      = astra_get_option( 'header-' . $_prefix . '-font-size' );
		$menu_font_weight    = astra_get_option( 'header-' . $_prefix . '-font-weight' );
		$menu_text_transform = astra_get_option( 'header-' . $_prefix . '-text-transform' );
		$menu_line_height    = astra_get_option( 'header-' . $_prefix . '-line-height' );

		$menu_font_size_desktop      = ( isset( $menu_font_size['desktop'] ) ) ? $menu_font_size['desktop'] : '';
		$menu_font_size_tablet       = ( isset( $menu_font_size['tablet'] ) ) ? $menu_font_size['tablet'] : '';
		$menu_font_size_mobile       = ( isset( $menu_font_size['mobile'] ) ) ? $menu_font_size['mobile'] : '';
		$menu_font_size_desktop_unit = ( isset( $menu_font_size['desktop-unit'] ) ) ? $menu_font_size['desktop-unit'] : '';
		$menu_font_size_tablet_unit  = ( isset( $menu_font_size['tablet-unit'] ) ) ? $menu_font_size['tablet-unit'] : '';
		$menu_font_size_mobile_unit  = ( isset( $menu_font_size['mobile-unit'] ) ) ? $menu_font_size['mobile-unit'] : '';


		// Spacing.
		$menu_spacing = astra_get_option( 'header-' . $_prefix . '-menu-spacing' );

		$sub_menu_divider_color = ( true === $sub_menu_divider_toggle ) ? $sub_menu_divider_color : '';

		$sub_menu_border_top = ( isset( $sub_menu_border ) && ! empty( $sub_menu_border['top'] ) ) ? $sub_menu_border['top'] : 0;

		$sub_menu_border_bottom = ( isset( $sub_menu_border ) && ! empty( $sub_menu_border['bottom'] ) ) ? $sub_menu_border['bottom'] : 0;

		$sub_menu_border_right = ( isset( $sub_menu_border ) && ! empty( $sub_menu_border['right'] ) ) ? $sub_menu_border['right'] : 0;

		$sub_menu_border_left = ( isset( $sub_menu_border ) && ! empty( $sub_menu_border['left'] ) ) ? $sub_menu_border['left'] : 0;

		// Margin.
		$margin          = astra_get_option( $_section . '-margin' );
		$margin_selector = '.ast-builder-menu-' . $index . ' .main-header-menu, .ast-header-break-point .ast-builder-menu-' . $index . ' .main-header-menu';

		$css_output_desktop = array(

			// Menu.
			$selector                                    => array(
				'font-family'    => astra_get_font_family( $menu_font_family ),
				'font-weight'    => esc_attr( $menu_font_weight ),
				'font-size'      => astra_get_font_css_value( $menu_font_size_desktop, $menu_font_size_desktop_unit ),
				'line-height'    => esc_attr( $menu_line_height ),
				'text-transform' => esc_attr( $menu_text_transform ),
			),
			$selector . ' .menu-item > .menu-link'       => array(
				'color'          => $menu_resp_color_desktop,
				'padding-top'    => astra_responsive_spacing( $menu_spacing, 'top', 'desktop' ),
				'padding-bottom' => astra_responsive_spacing( $menu_spacing, 'bottom', 'desktop' ),
				'padding-left'   => astra_responsive_spacing( $menu_spacing, 'left', 'desktop' ),
				'padding-right'  => astra_responsive_spacing( $menu_spacing, 'right', 'desktop' ),
			),
			$selector . ' .menu-item > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_desktop,
			),
			$selector . ' .menu-item:hover > .menu-link' => array(
				'color'      => $menu_resp_color_hover_desktop,
				'background' => $menu_resp_bg_color_hover_desktop,
			),
			$selector . ' .menu-item:hover > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_hover_desktop,
			),
			$selector . ' .menu-item.current-menu-item > .menu-link' => array(
				'color'      => $menu_resp_color_active_desktop,
				'background' => $menu_resp_bg_color_active_desktop,
			),
			$selector . ' .menu-item.current-menu-item > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_active_desktop,
			),
			// Sub Menu.
			$selector . ' .sub-menu'                     => array(
				'border-top-width'    => astra_get_css_value( $sub_menu_border_top, 'px' ),
				'border-bottom-width' => astra_get_css_value( $sub_menu_border_bottom, 'px' ),
				'border-right-width'  => astra_get_css_value( $sub_menu_border_right, 'px' ),
				'border-left-width'   => astra_get_css_value( $sub_menu_border_left, 'px' ),
				'border-color'        => esc_attr( astra_get_option( 'header-' . $_prefix . '-submenu-b-color' ) ),
				'border-style'        => 'solid',
			),
			$selector . ' .menu-item.menu-item-has-children > .ast-menu-toggle' => array(
				'top'   => astra_responsive_spacing( $menu_spacing, 'top', 'desktop' ),
				'right' => astra_calculate_spacing( astra_responsive_spacing( $menu_spacing, 'right', 'desktop' ), '-', '0.907', 'em' ),
			),
			// Margin CSS.
			$margin_selector                             => array(
				'margin-top'    => astra_responsive_spacing( $margin, 'top', 'desktop' ),
				'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'desktop' ),
				'margin-left'   => astra_responsive_spacing( $margin, 'left', 'desktop' ),
				'margin-right'  => astra_responsive_spacing( $margin, 'right', 'desktop' ),
			),
		);

		$css_output_desktop[ $selector . ' .main-header-menu' ] = astra_get_responsive_background_obj( $menu_resp_bg_color, 'desktop' );

		$mobile_selector = '.ast-builder-menu-' . $index;

		$menu_spacing_mobile_top = astra_responsive_spacing( $menu_spacing, 'top', 'mobile' );
		$menu_spacing_mobile_top = ( isset( $menu_spacing_mobile_top ) && ! empty( $menu_spacing_mobile_top ) ) ? $menu_spacing_mobile_top : 0;

		$menu_spacing_tablet_top = astra_responsive_spacing( $menu_spacing, 'top', 'tablet' );
		$menu_spacing_tablet_top = ( isset( $menu_spacing_tablet_top ) && ! empty( $menu_spacing_tablet_top ) ) ? $menu_spacing_tablet_top : 0;

		$css_output_tablet = array(

			$mobile_selector                             => array(
				'font-size' => astra_get_font_css_value( $menu_font_size_tablet, $menu_font_size_tablet_unit ),
			),
			$mobile_selector . ' .main-header-menu .menu-item > .menu-link' => array(
				'color'          => $menu_resp_color_tablet,
				'padding-top'    => astra_responsive_spacing( $menu_spacing, 'top', 'tablet' ),
				'padding-bottom' => astra_responsive_spacing( $menu_spacing, 'bottom', 'tablet' ),
				'padding-left'   => astra_responsive_spacing( $menu_spacing, 'left', 'tablet' ),
				'padding-right'  => astra_responsive_spacing( $menu_spacing, 'right', 'tablet' ),
			),
			$selector . ' .menu-item > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_tablet,
			),
			$selector . ' .menu-item:hover > .menu-link' => array(
				'color'      => $menu_resp_color_hover_tablet,
				'background' => $menu_resp_bg_color_hover_tablet,
			),
			$selector . ' .menu-item:hover > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_hover_tablet,
			),
			$selector . ' .menu-item.current-menu-item > .menu-link' => array(
				'color'      => $menu_resp_color_active_tablet,
				'background' => $menu_resp_bg_color_active_tablet,
			),
			$selector . ' .menu-item.current-menu-item > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_active_tablet,
			),
			$mobile_selector . ' .menu-item.menu-item-has-children > .ast-menu-toggle' => array(
				'top'   => $menu_spacing_tablet_top,
				'right' => astra_calculate_spacing( astra_responsive_spacing( $menu_spacing, 'right', 'tablet' ), '-', '0.907', 'em' ),
			),
			$selector . ' .menu-item-has-children > .menu-link:after' => array(
				'content' => 'unset',
			),
			// Margin CSS.
			$margin_selector                             => array(
				'margin-top'    => astra_responsive_spacing( $margin, 'top', 'tablet' ),
				'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'tablet' ),
				'margin-left'   => astra_responsive_spacing( $margin, 'left', 'tablet' ),
				'margin-right'  => astra_responsive_spacing( $margin, 'right', 'tablet' ),
			),
		);

		$css_output_tablet[ $selector . ' .main-header-menu' ] = astra_get_responsive_background_obj( $menu_resp_bg_color, 'tablet' );

		$css_output_mobile = array(

			$mobile_selector                              => array(
				'font-size' => astra_get_font_css_value( $menu_font_size_mobile, $menu_font_size_mobile_unit ),
			),
			$mobile_selector . ' .main-header-menu .menu-item > .menu-link' => array(
				'color'          => $menu_resp_color_mobile,
				'padding-top'    => astra_responsive_spacing( $menu_spacing, 'top', 'mobile' ),
				'padding-bottom' => astra_responsive_spacing( $menu_spacing, 'bottom', 'mobile' ),
				'padding-left'   => astra_responsive_spacing( $menu_spacing, 'left', 'mobile' ),
				'padding-right'  => astra_responsive_spacing( $menu_spacing, 'right', 'mobile' ),
			),
			$selector . ' .menu-item  > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_mobile,
			),
			$selector . ' .menu-item:hover > .menu-link'  => array(
				'color'      => $menu_resp_color_hover_mobile,
				'background' => $menu_resp_bg_color_hover_mobile,
			),
			$selector . ' .menu-item:hover  > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_hover_mobile,
			),
			$selector . ' .menu-item.current-menu-item > .menu-link' => array(
				'color'      => $menu_resp_color_active_mobile,
				'background' => $menu_resp_bg_color_active_mobile,
			),
			$selector . ' .menu-item.current-menu-item  > .ast-menu-toggle' => array(
				'color' => $menu_resp_color_active_mobile,
			),
			$mobile_selector . ' .menu-item.menu-item-has-children > .ast-menu-toggle' => array(
				'top'   => $menu_spacing_mobile_top,
				'right' => astra_calculate_spacing( astra_responsive_spacing( $menu_spacing, 'right', 'mobile' ), '-', '0.907', 'em' ),
			),
			// Margin CSS.
			$margin_selector                              => array(
				'margin-top'    => astra_responsive_spacing( $margin, 'top', 'mobile' ),
				'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'mobile' ),
				'margin-left'   => astra_responsive_spacing( $margin, 'left', 'mobile' ),
				'margin-right'  => astra_responsive_spacing( $margin, 'right', 'mobile' ),
			),
		);

		$css_output_mobile[ $selector . ' .main-header-menu' ] = astra_get_responsive_background_obj( $menu_resp_bg_color, 'mobile' );

		if ( true === $sub_menu_divider_toggle ) {

			// Sub Menu Divider.
			$css_output_desktop[ $selector . ' .menu-item .sub-menu .menu-link' ]                       = array(
				'border-bottom-width' => '1px',
				'border-color'        => $sub_menu_divider_color,
				'border-style'        => 'solid',
			);
			$css_output_desktop[ $selector . ' .menu-item .sub-menu .menu-item:last-child .menu-link' ] = array(
				'border-style' => 'none',
			);
			$css_output_mobile[ '.ast-header-break-point ' . $selector . ' .main-navigation .menu-item .sub-menu .menu-link, .ast-header-break-point ' . $selector . ' .main-navigation .menu-item .menu-link' ] = array(
				'border-bottom-width' => '1px',
				'border-color'        => $sub_menu_divider_color,
				'border-style'        => 'solid',
			);
			$css_output_mobile['.ast-header-break-point .ast-builder-menu .menu-item .sub-menu .menu-item:last-child .menu-link, .ast-header-break-point .ast-builder-menu .menu-item:last-child .menu-link']    = array(
				'border-style' => 'none',
			);
			$css_output_tablet[ '.ast-header-break-point ' . $selector . ' .main-navigation .menu-item .sub-menu .menu-link, .ast-header-break-point ' . $selector . ' .main-navigation .menu-item .menu-link' ] = array(
				'border-bottom-width' => '1px',
				'border-color'        => $sub_menu_divider_color,
				'border-style'        => 'solid',
			);
			$css_output_tablet['.ast-header-break-point .ast-builder-menu .menu-item .sub-menu .menu-item:last-child .menu-link, .ast-header-break-point .ast-builder-menu .menu-item:last-child .menu-link']    = array(
				'border-style' => 'none',
			);
		} else {

			$css_output_desktop['.ast-builder-menu .menu-item .sub-menu .menu-link'] = array(
				'border-style' => 'none',
			);
			$css_output_tablet[ '.ast-header-break-point ' . $selector . ' .main-navigation .menu-item .sub-menu .menu-link, .ast-header-break-point ' . $selector . ' .main-navigation .menu-item .menu-link' ] = array(
				'border-style' => 'none',
			);
			$css_output_mobile[ '.ast-header-break-point ' . $selector . ' .main-navigation .menu-item .sub-menu .menu-link, .ast-header-break-point ' . $selector . ' .main-navigation .menu-item .menu-link' ] = array(
				'border-style' => 'none',
			);
		}

		/* Parse CSS from array() */
		$css_output  = astra_parse_css( $css_output_desktop );
		$css_output .= astra_parse_css( $css_output_tablet, '', astra_get_tablet_breakpoint() );
		$css_output .= astra_parse_css( $css_output_mobile, '', astra_get_mobile_breakpoint() );

		$dynamic_css .= $css_output;
	}

	return $dynamic_css;
}
