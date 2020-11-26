<?php
/**
 * Astra Social Component Dynamic CSS.
 *
 * @package     astra-builder
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       3.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Builder Dynamic CSS.
 *
 * @since 3.0.0
 */
class Astra_Social_Component_Dynamic_CSS {

	/**
	 * Dynamic CSS
	 *
	 * @param string $builder_type Builder Type.
	 * @return String Generated dynamic CSS for Heading Colors.
	 *
	 * @since 3.0.0
	 */
	public static function astra_social_dynamic_css( $builder_type = 'header' ) {

		$generated_css = '';

		$number_of_social_icons = ( 'header' === $builder_type ) ? Astra_Builder_Helper::$num_of_header_social_icons : Astra_Builder_Helper::$num_of_footer_social_icons;

		for ( $index = 1; $index <= $number_of_social_icons; $index++ ) {

			if ( ! Astra_Builder_Helper::is_component_loaded( $builder_type, 'social-icons-' . $index ) ) {
				continue;
			}

			$selector = '.ast-' . $builder_type . '-social-' . $index . '-wrap';
			$_section = ( 'header' === $builder_type ) ? 'section-hb-social-icons-' . $index : 'section-fb-social-icons-' . $index;

			$icon_spacing    = astra_get_option( $builder_type . '-social-' . $index . '-space' );
			$icon_bg_spacing = astra_get_option( $builder_type . '-social-' . $index . '-bg-space' );
			$icon_size       = astra_get_option( $builder_type . '-social-' . $index . '-size' );
			$icon_radius     = astra_get_option( $builder_type . '-social-' . $index . '-radius' );

			$icon_spacing    = ( isset( $icon_spacing ) && ! empty( $icon_spacing ) ) ? $icon_spacing / 2 : '';
			$icon_size       = ( isset( $icon_size ) && ! empty( $icon_size ) ) ? $icon_size : '';
			$icon_radius     = ( isset( $icon_radius ) && ! empty( $icon_radius ) ) ? $icon_radius : '';
			$icon_bg_spacing = ( isset( $icon_bg_spacing ) && ! empty( $icon_bg_spacing ) ) ? $icon_bg_spacing : '';

			// Normal Responsive Colors.
			$color_type                 = astra_get_option( $builder_type . '-social-' . $index . '-color-type' );
			$social_icons_color_desktop = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-color' ), 'desktop' );
			$social_icons_color_tablet  = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-color' ), 'tablet' );
			$social_icons_color_mobile  = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-color' ), 'mobile' );

			// Hover Responsive Colors.
			$social_icons_h_color_desktop = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-h-color' ), 'desktop' );
			$social_icons_h_color_tablet  = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-h-color' ), 'tablet' );
			$social_icons_h_color_mobile  = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-h-color' ), 'mobile' );

			// Normal Responsive Bg Colors.
			$social_icons_bg_color_desktop = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-bg-color' ), 'desktop' );
			$social_icons_bg_color_tablet  = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-bg-color' ), 'tablet' );
			$social_icons_bg_color_mobile  = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-bg-color' ), 'mobile' );

			// Hover Responsive Bg Colors.
			$social_icons_h_bg_color_desktop = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-bg-h-color' ), 'desktop' );
			$social_icons_h_bg_color_tablet  = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-bg-h-color' ), 'tablet' );
			$social_icons_h_bg_color_mobile  = astra_get_prop( astra_get_option( $builder_type . '-social-' . $index . '-bg-h-color' ), 'mobile' );

			$margin = astra_get_option( $_section . '-margin' );

			/**
			 * Social Icon CSS.
			 */
			$css_output_desktop = array(

				$selector . ' .ast-builder-social-element' => array(
					// Icon Spacing.
					'margin-left'   => astra_get_css_value( $icon_spacing, 'px' ),
					'margin-right'  => astra_get_css_value( $icon_spacing, 'px' ),

					// Icon Background Space.
					'padding'       => astra_get_css_value( $icon_bg_spacing, 'px' ),

					// Icon Radius.
					'border-radius' => astra_get_css_value( $icon_radius, 'px' ),
				),
				$selector . ' .ast-builder-social-element svg' => array(

					// Icon Size.
					'width'  => astra_get_css_value( $icon_size, 'px' ),
					'height' => astra_get_css_value( $icon_size, 'px' ),
				),
				$selector . ' .ast-social-icon-image-wrap' => array(

					// Icon Background Space.
					'margin' => astra_get_css_value( $icon_bg_spacing, 'px' ),
				),
				$selector                                  => array(
					// Margin CSS.
					'margin-top'    => astra_responsive_spacing( $margin, 'top', 'desktop' ),
					'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'desktop' ),
					'margin-left'   => astra_responsive_spacing( $margin, 'left', 'desktop' ),
					'margin-right'  => astra_responsive_spacing( $margin, 'right', 'desktop' ),
				),
			);

			if ( 'custom' === $color_type || is_customize_preview() ) {
				$css_output_desktop[ $selector . ' .ast-builder-social-element svg' ]['fill']                 = $social_icons_color_desktop;
				$css_output_desktop[ $selector . ' .ast-builder-social-element .social-item-label' ]['color'] = $social_icons_color_desktop;
				$css_output_desktop[ $selector . ' .ast-builder-social-element' ]['background']               = $social_icons_bg_color_desktop;

				$css_output_desktop[ $selector . ' .ast-builder-social-element:hover' ]                             = array(
					// Hover.
					'color'      => $social_icons_h_color_desktop,
					'background' => $social_icons_h_bg_color_desktop,
				);
				$css_output_desktop[ $selector . ' .ast-builder-social-element:hover .social-item-label' ]['color'] = $social_icons_h_color_desktop;
				$css_output_desktop[ $selector . ' .ast-builder-social-element:hover svg' ]                         = array(
					'fill' => $social_icons_h_color_desktop,
				);
			}

			/**
			 * Social_icons CSS.
			 */
			$css_output_tablet = array(
				$selector => array(
					// Margin CSS.
					'margin-top'    => astra_responsive_spacing( $margin, 'top', 'tablet' ),
					'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'tablet' ),
					'margin-left'   => astra_responsive_spacing( $margin, 'left', 'tablet' ),
					'margin-right'  => astra_responsive_spacing( $margin, 'right', 'tablet' ),
				),
			);

			if ( 'custom' === $color_type || is_customize_preview() ) {
				$css_output_tablet[ $selector . ' .ast-builder-social-element svg' ]['fill']                 = $social_icons_color_tablet;
				$css_output_tablet[ $selector . ' .ast-builder-social-element .social-item-label' ]['color'] = $social_icons_color_tablet;

				$css_output_tablet[ $selector . ' .ast-builder-social-element' ]['background'] = $social_icons_bg_color_tablet;

				$css_output_tablet[ $selector . ' .ast-builder-social-element:hover' ]     = array(
					// Hover.
					'color'      => $social_icons_h_color_tablet,
					'background' => $social_icons_h_bg_color_tablet,
				);
				$css_output_tablet[ $selector . ' .ast-builder-social-element:hover svg' ] = array(
					'fill' => $social_icons_h_color_tablet,
				);
			}

			/**
			 * Social_icons CSS.
			 */
			$css_output_mobile = array(
				$selector => array(
					// Margin CSS.
					'margin-top'    => astra_responsive_spacing( $margin, 'top', 'mobile' ),
					'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'mobile' ),
					'margin-left'   => astra_responsive_spacing( $margin, 'left', 'mobile' ),
					'margin-right'  => astra_responsive_spacing( $margin, 'right', 'mobile' ),
				),
			);

			if ( 'custom' === $color_type || is_customize_preview() ) {
				$css_output_mobile[ $selector . ' .ast-builder-social-element svg' ]['fill']                 = $social_icons_color_mobile;
				$css_output_mobile[ $selector . ' .ast-builder-social-element .social-item-label' ]['color'] = $social_icons_color_mobile;

				$css_output_mobile[ $selector . ' .ast-builder-social-element' ]['background'] = $social_icons_bg_color_mobile;

				$css_output_mobile[ $selector . ' .ast-builder-social-element:hover' ]     = array(
					// Hover.
					'color'      => $social_icons_h_color_mobile,
					'background' => $social_icons_h_bg_color_mobile,
				);
				$css_output_mobile[ $selector . ' .ast-builder-social-element:hover svg' ] = array(
					'fill' => $social_icons_h_color_mobile,
				);
			}

			if ( 'footer' === $builder_type ) {

				// Footer Social Alignment CSS.
				$alignment = astra_get_option( 'footer-social-' . $index . '-alignment' );

				$desktop_alignment = ( isset( $alignment['desktop'] ) ) ? $alignment['desktop'] : '';
				$tablet_alignment  = ( isset( $alignment['tablet'] ) ) ? $alignment['tablet'] : '';
				$mobile_alignment  = ( isset( $alignment['mobile'] ) ) ? $alignment['mobile'] : '';

				$css_output_desktop[ '[data-section="section-fb-social-icons-' . $index . '"] .footer-social-inner-wrap' ] = array( 
					'text-align' => $desktop_alignment,
				);
				$css_output_tablet[ '[data-section="section-fb-social-icons-' . $index . '"] .footer-social-inner-wrap' ]  = array(
					'text-align' => $tablet_alignment,
				);
				$css_output_mobile[ '[data-section="section-fb-social-icons-' . $index . '"] .footer-social-inner-wrap' ]  = array(
					'text-align' => $mobile_alignment,
				);

			}

			/* Parse CSS from array() */
			$css_output  = astra_parse_css( $css_output_desktop );
			$css_output .= astra_parse_css( $css_output_tablet, '', astra_get_tablet_breakpoint() );
			$css_output .= astra_parse_css( $css_output_mobile, '', astra_get_mobile_breakpoint() );

			$css_output .= Astra_Builder_Base_Dynamic_CSS::prepare_advanced_typography_css( $_section, $selector );

			$generated_css .= $css_output;
		}

		return $generated_css;
	}
}

/**
 * Kicking this off by creating object of this class.
 */

new Astra_Social_Component_Dynamic_CSS();
