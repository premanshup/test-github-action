<?php
/**
 * Astra Widget Component Dynamic CSS.
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
class Astra_Widget_Component_Dynamic_CSS {

	/**
	 * Dynamic CSS
	 *
	 * @param string $builder_type Builder Type.
	 * @return String Generated dynamic CSS for Heading Colors.
	 *
	 * @since 3.0.0
	 */
	public static function astra_widget_dynamic_css( $builder_type = 'header' ) {

		$generated_css = '';

		$no_of_widgets = 'header' === $builder_type ? Astra_Builder_Helper::$num_of_header_widgets : Astra_Builder_Helper::$num_of_footer_widgets;

		for ( $index = 1; $index <= $no_of_widgets; $index++ ) {

			if ( ! Astra_Builder_Helper::is_component_loaded( $builder_type, 'widget-' . $index ) ) {
				continue;
			}

			$_section = 'sidebar-widgets-' . $builder_type . '-widget-' . $index;
			$selector = '.' . $builder_type . '-widget-area[data-section="sidebar-widgets-' . $builder_type . '-widget-' . $index . '"]';
			$margin   = astra_get_option( $_section . '-margin' );

			$title_font_size   = astra_get_option( $builder_type . '-widget-' . $index . '-font-size' );
			$content_font_size = astra_get_option( $builder_type . '-widget-' . $index . '-content-font-size' );

			/**
			 * Copyright CSS.
			 */
			$css_output_desktop = array(

				$selector . ' .' . $builder_type . '-widget-area-inner' => array(
					'color'     => astra_get_option( $builder_type . '-widget-' . $index . '-color' ),
					// Typography.
					'font-size' => astra_responsive_font( $content_font_size, 'desktop' ),
				),
				$selector . ' .' . $builder_type . '-widget-area-inner a' => array(
					'color' => astra_get_option( $builder_type . '-widget-' . $index . '-link-color' ),
				),
				$selector . ' .' . $builder_type . '-widget-area-inner a:hover' => array(
					'color' => astra_get_option( $builder_type . '-widget-' . $index . '-link-h-color' ),
				),
				$selector . ' .widget-title' => array(
					'color'     => astra_get_option( $builder_type . '-widget-' . $index . '-title-color' ),
					// Typography.
					'font-size' => astra_responsive_font( $title_font_size, 'desktop' ),
				),
				$selector                    => array(
					// Margin CSS.
					'margin-top'    => astra_responsive_spacing( $margin, 'top', 'desktop' ),
					'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'desktop' ),
					'margin-left'   => astra_responsive_spacing( $margin, 'left', 'desktop' ),
					'margin-right'  => astra_responsive_spacing( $margin, 'right', 'desktop' ),
				),
			);

			$css_output_tablet = array(
				$selector . ' .' . $builder_type . '-widget-area-inner' => array(
					// Typography.
					'font-size' => astra_responsive_font( $content_font_size, 'tablet' ),
				),
				$selector . ' .widget-title' => array(
					// Typography.
					'font-size' => astra_responsive_font( $title_font_size, 'tablet' ),
				),
				$selector                    => array(
					// Margin CSS.
					'margin-top'    => astra_responsive_spacing( $margin, 'top', 'tablet' ),
					'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'tablet' ),
					'margin-left'   => astra_responsive_spacing( $margin, 'left', 'tablet' ),
					'margin-right'  => astra_responsive_spacing( $margin, 'right', 'tablet' ),
				),
			);
		
			$css_output_mobile = array(
				$selector . ' .' . $builder_type . '-widget-area-inner' => array(
					// Typography.
					'font-size' => astra_responsive_font( $content_font_size, 'mobile' ),
				),
				$selector . ' .widget-title' => array(
					// Typography.
					'font-size' => astra_responsive_font( $title_font_size, 'mobile' ),
				),
				$selector                    => array(
					// Margin CSS.
					'margin-top'    => astra_responsive_spacing( $margin, 'top', 'mobile' ),
					'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'mobile' ),
					'margin-left'   => astra_responsive_spacing( $margin, 'left', 'mobile' ),
					'margin-right'  => astra_responsive_spacing( $margin, 'right', 'mobile' ),
				),
			);

			/* Parse CSS from array() */
			$css_output     = astra_parse_css( $css_output_desktop );
			$css_output    .= astra_parse_css( $css_output_tablet, '', astra_get_tablet_breakpoint() );
			$css_output    .= astra_parse_css( $css_output_mobile, '', astra_get_mobile_breakpoint() );
			$generated_css .= $css_output;
		}

		return $generated_css;
	}
}

/**
 * Kicking this off by creating object of this class.
 */

new Astra_Widget_Component_Dynamic_CSS();
