<?php
/**
 * Astra Builder Base Configuration.
 *
 * @package astra-builder
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Builder_Base_Configuration' ) ) {

	/**
	 * Class Astra_Builder_Base_Configuration.
	 */
	final class Astra_Builder_Base_Configuration {

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance = null;


		/**
		 *  Initiator
		 */
		public static function get_instance() {

			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

		}

		/**
		 * Prepare Advance header configuration.
		 *
		 * @param string $section_id section id.
		 * @return array
		 */
		public static function prepare_advanced_tab( $section_id ) {

			return array(

				/**
				 * Option: Blog Color Section heading
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[' . $section_id . '-margin-padding-heading]',
					'type'     => 'control',
					'control'  => 'ast-heading',
					'section'  => $section_id,
					'title'    => __( 'Spacing', 'astra' ),
					'priority' => 200,
					'settings' => array(),
					'context'  => Astra_Builder_Helper::$design_tab,
				),

				/**
				 * Option: Padded Layout Custom Width
				 */
				array(
					'name'           => ASTRA_THEME_SETTINGS . '[' . $section_id . '-padding]',
					'default'        => '',
					'type'           => 'control',
					'transport'      => 'postMessage',
					'control'        => 'ast-responsive-spacing',
					'section'        => $section_id,
					'priority'       => 210,
					'title'          => __( 'Padding', 'astra' ),
					'linked_choices' => true,
					'unit_choices'   => array( 'px', 'em', '%' ),
					'choices'        => array(
						'top'    => __( 'Top', 'astra' ),
						'right'  => __( 'Right', 'astra' ),
						'bottom' => __( 'Bottom', 'astra' ),
						'left'   => __( 'Left', 'astra' ),
					),
					'context'        => Astra_Builder_Helper::$design_tab,
				),

				/**
				 * Option: Padded Layout Custom Width
				 */
				array(
					'name'           => ASTRA_THEME_SETTINGS . '[' . $section_id . '-margin]',
					'default'        => '',
					'type'           => 'control',
					'transport'      => 'postMessage',
					'control'        => 'ast-responsive-spacing',
					'section'        => $section_id,
					'priority'       => 220,
					'title'          => __( 'Margin', 'astra' ),
					'linked_choices' => true,
					'unit_choices'   => array( 'px', 'em', '%' ),
					'choices'        => array(
						'top'    => __( 'Top', 'astra' ),
						'right'  => __( 'Right', 'astra' ),
						'bottom' => __( 'Bottom', 'astra' ),
						'left'   => __( 'Left', 'astra' ),
					),
					'context'        => Astra_Builder_Helper::$design_tab,
				),
			);
		}

		/**
		 * Prepare Advance Typography configuration.
		 *
		 * @param string $section_id section id.
		 * @param array  $required_condition Required Condition.
		 * @return array
		 */
		public static function prepare_typography_options( $section_id, $required_condition = array() ) {

			$parent = ASTRA_THEME_SETTINGS . '[' . $section_id . '-typography]';
			return array(

				array(
					'name'      => $parent,
					'default'   => astra_get_option( $section_id . '-typography' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Text Typography', 'astra' ),
					'section'   => $section_id,
					'transport' => 'postMessage',
					'required'  => $required_condition,
					'priority'  => 16,
					'context'   => Astra_Builder_Helper::$design_tab,
				),

				/**
				 * Option: Font Size
				 */
				array(
					'name'        => 'font-size-' . $section_id,
					'type'        => 'sub-control',
					'parent'      => $parent,
					'section'     => $section_id,
					'control'     => 'ast-responsive',
					'default'     => astra_get_option( 'font-size-' . $section_id ),
					'transport'   => 'postMessage',
					'priority'    => 14,
					'title'       => __( 'Size', 'astra' ),
					'input_attrs' => array(
						'min' => 0,
					),
					'units'       => array(
						'px' => 'px',
						'em' => 'em',
					),
				),

			);
		}

		/**
		 * Prepare common options for the widgets by type.
		 *
		 * @param string $type type.
		 * @return array
		 */
		public static function prepare_widget_options( $type = 'header' ) {
			$html_config = array();

			$no_of_widgets = 'header' === $type ? Astra_Builder_Helper::$num_of_header_widgets : Astra_Builder_Helper::$num_of_footer_widgets;

			for ( $index = 1; $index <= $no_of_widgets; $index++ ) {

				$_section = 'sidebar-widgets-' . $type . '-widget-' . $index;

				$_configs = array(

					array(
						'name'     => 'sidebar-widgets-' . $type . '-widget-' . $index,
						'type'     => 'section',
						'priority' => 5,
						'title'    => __( 'Widget ', 'astra' ) . $index,
						'panel'    => 'panel-' . $type . '-builder-group',
					),


					// Option: Widget heading.
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-heading-' . $index . ']',
						'section'  => $_section,
						'type'     => 'control',
						'control'  => 'ast-heading',
						'priority' => 6,
						'title'    => __( 'Widget Colors', 'astra' ),
					),

					/**
					 * Option: Widget title color.
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-' . $index . '-title-color]',
						'default'   => astra_get_option( $type . '-widget-' . $index . '-title-color' ),
						'type'      => 'control',
						'section'   => $_section,
						'priority'  => 7,
						'transport' => 'postMessage',
						'control'   => 'ast-color',
						'title'     => __( 'Title', 'astra' ),
					),

					/**
					 * Option: Widget Color.
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-' . $index . '-color]',
						'default'   => astra_get_option( $type . '-widget-' . $index . '-color' ),
						'type'      => 'control',
						'section'   => $_section,
						'priority'  => 8,
						'transport' => 'postMessage',
						'control'   => 'ast-color',
						'title'     => __( 'Content', 'astra' ),
					),

					/**
					 * Option: Widget link color.
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-' . $index . '-link-color]',
						'default'   => astra_get_option( $type . '-widget-' . $index . '-link-color' ),
						'type'      => 'control',
						'section'   => $_section,
						'priority'  => 9,
						'transport' => 'postMessage',
						'control'   => 'ast-color',
						'title'     => __( 'Link', 'astra' ),
					),

					/**
					 * Option: Widget link color.
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-' . $index . '-link-h-color]',
						'default'   => astra_get_option( $type . '-widget-' . $index . '-link-h-color' ),
						'type'      => 'control',
						'section'   => $_section,
						'priority'  => 10,
						'transport' => 'postMessage',
						'control'   => 'ast-color',
						'title'     => __( 'Link Hover', 'astra' ),
					),

					// Option: Widget heading.
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-typo-heading-' . $index . ']',
						'section'  => $_section,
						'type'     => 'control',
						'control'  => 'ast-heading',
						'priority' => 89,
						'title'    => __( 'Widget Typography', 'astra' ),
					),

					/**
					 * Option: Widget Title Typography
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-' . $index . '-text-typography]',
						'default'   => astra_get_option( $type . '-widget-' . $index . '-text-typography' ),
						'type'      => 'control',
						'control'   => 'ast-settings-group',
						'title'     => __( 'Title', 'astra' ),
						'section'   => $_section,
						'transport' => 'postMessage',
						'priority'  => 90,
					),

					/**
					 * Option: Widget Title Font Size
					 */
					array(
						'name'        => $type . '-widget-' . $index . '-font-size',
						'default'     => astra_get_option( $type . '-widget-' . $index . '-font-size' ),
						'parent'      => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-' . $index . '-text-typography]',
						'transport'   => 'postMessage',
						'title'       => __( 'Size', 'astra' ),
						'type'        => 'sub-control',
						'section'     => $_section,
						'control'     => 'ast-responsive',
						'input_attrs' => array(
							'min' => 0,
						),
						'priority'    => 3,
						'units'       => array(
							'px' => 'px',
							'em' => 'em',
						),
					),

					/**
					 * Option: Widget Content Typography
					 */
					array(
						'name'      => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-' . $index . '-content-typography]',
						'default'   => astra_get_option( $type . '-widget-' . $index . '-content-typography' ),
						'type'      => 'control',
						'control'   => 'ast-settings-group',
						'title'     => __( 'Content', 'astra' ),
						'section'   => $_section,
						'transport' => 'postMessage',
						'priority'  => 91,
					),

					/**
					 * Option: Widget Content Font Size
					 */
					array(
						'name'        => $type . '-widget-' . $index . '-content-font-size',
						'default'     => astra_get_option( $type . '-widget-' . $index . '-content-font-size' ),
						'parent'      => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-' . $index . '-content-typography]',
						'transport'   => 'postMessage',
						'title'       => __( 'Size', 'astra' ),
						'type'        => 'sub-control',
						'section'     => $_section,
						'control'     => 'ast-responsive',
						'input_attrs' => array(
							'min' => 0,
						),
						'priority'    => 3,
						'units'       => array(
							'px' => 'px',
							'em' => 'em',
						),
					),

					/**
					 * Option: Margin Heading heading
					 */
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[' . $_section . '-margin-padding-heading]',
						'type'     => 'control',
						'control'  => 'ast-heading',
						'section'  => $_section,
						'title'    => __( 'Spacing', 'astra' ),
						'priority' => 200,
						'settings' => array(),
					),

					/**
					 * Option: Margin
					 */
					array(
						'name'           => ASTRA_THEME_SETTINGS . '[' . $_section . '-margin]',
						'default'        => '',
						'type'           => 'control',
						'transport'      => 'postMessage',
						'control'        => 'ast-responsive-spacing',
						'section'        => $_section,
						'priority'       => 220,
						'title'          => __( 'Margin', 'astra' ),
						'linked_choices' => true,
						'unit_choices'   => array( 'px', 'em', '%' ),
						'choices'        => array(
							'top'    => __( 'Top', 'astra' ),
							'right'  => __( 'Right', 'astra' ),
							'bottom' => __( 'Bottom', 'astra' ),
							'left'   => __( 'Left', 'astra' ),
						),
					),
				);

				if ( 'footer' === $type ) {
					array_push(
						$_configs,
						/**
						 * Option: Column Alignment
						 */
						array(
							'name'      => ASTRA_THEME_SETTINGS . '[' . $type . '-widget-alignment-' . $index . ']',
							'default'   => astra_get_option( $type . '-widget-alignment-' . $index ),
							'type'      => 'control',
							'control'   => 'ast-responsive-select',
							'section'   => $_section,
							'priority'  => 5,
							'title'     => __( 'Alignment', 'astra' ),
							'choices'   => array(
								'left'   => __( 'Left', 'astra' ),
								'center' => __( 'Center', 'astra' ),
								'right'  => __( 'Right', 'astra' ),
							),
							'transport' => 'postMessage',
						)
					);
				}

				$html_config[] = $_configs;
			}

			return $html_config;

		}

	}

	/**
	 *  Prepare if class 'Astra_Builder_Base_Configuration' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Builder_Base_Configuration::get_instance();
}
