<?php
/**
 * Astra Builder Controller.
 *
 * @package astra-builder
 * @since 3.0.0
 */

/**
 * Class Astra_Builder_Customizer.
 *
 * Customizer Configuration for Header Footer Builder.
 *
 * @since 3.0.0
 */
final class Astra_Builder_Customizer {


	/**
	 * Contexts.
	 *
	 * @access private
	 * @var object
	 */
	private static $contexts;

	/**
	 * Choices.
	 *
	 * @access private
	 * @var object
	 */
	private static $choices;

	/**
	 * JS Configs.
	 *
	 * @access private
	 * @var object
	 */
	private static $js_configs;

	/**
	 * Group Configs.
	 *
	 * @access private
	 * @var object
	 */
	private static $group_configs;

	/**
	 * Configs.
	 *
	 * @access private
	 * @var object
	 */
	private static $dependency_arr;

	/**
	 * Removed Sections.
	 *
	 * @access private
	 * @var object
	 */
	private static $removed_sections;

	/**
	 * Removed Sections.
	 *
	 * @access private
	 * @var object
	 */
	private static $removed_panels;


	/**
	 * Constructor
	 *
	 * @since 3.0.0
	 */
	public function __construct() {

		add_action( 'customize_preview_init', array( $this, 'enqueue_customizer_preview_scripts' ) );

		if ( ! Astra_Builder_Helper::$is_header_footer_builder_active ) {
			return;
		}

		$this->load_base_components();
		$this->remove_actions();
		$this->remove_old_header_footer();

		add_action( 'customize_register', array( $this, 'builder_configs' ), 2 );
		add_action( 'customize_register', array( $this, 'header_configs' ), 2 );
		add_action( 'customize_register', array( $this, 'footer_configs' ), 2 );
		add_action( 'customize_register', array( $this, 'update_default_wp_configs' ) );
		add_filter( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_customizer_scripts' ), 999 );

		add_action( 'init', array( $this, 'deregister_menu_locations_widgets' ), 999 );
		add_action( 'customize_register', array( $this, 'prepare_customizer_javascript_configs' ) );
		add_action( 'customize_register', array( $this, 'prepare_group_configs' ), 9 );
		add_filter( 'astra_customizer_required_dependency', array( $this, 'update_customizer_control_dependency' ) );

		add_action( 'customize_controls_print_footer_scripts', array( $this, 'builder_customizer_preview_styles' ) );

	}

	/**
	 * Update default WP configs.
	 *
	 * @param object $wp_customize customizer object.
	 */
	public function update_default_wp_configs( $wp_customize ) {

		$wp_customize->get_control( 'custom_logo' )->priority     = 2;
		$wp_customize->get_control( 'blogname' )->priority        = 7;
		$wp_customize->get_control( 'site_icon' )->priority       = 16;
		$wp_customize->get_control( 'blogdescription' )->priority = 11;

		$wp_customize->get_setting( 'custom_logo' )->transport     = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';

		$wp_customize->get_section( 'title_tagline' )->panel = 'panel-header-builder-group';

		$wp_customize->selective_refresh->add_partial(
			'custom_logo',
			array(
				'selector'            => '.site-branding',
				'container_inclusive' => true,
				'render_callback'     => array( Astra_Builder_Header::get_instance(), 'site_identity' ),
			)
		);

		// @codingStandardsIgnoreStart PHPCompatibility.FunctionDeclarations.NewClosure.Found
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => function() {
					bloginfo( 'description' );
				},
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title',
				'render_callback' => function() {
					bloginfo( 'name' );
				},
			)
		);
		// @codingStandardsIgnoreStart PHPCompatibility.FunctionDeclarations.NewClosure.Found

	}


	/**
	 * Get the Link for Control.
	 *
	 * @since 3.0.0
	 * @param array $id Control ID.
	 */
	public static function get_control_link( $id ) {
		if ( isset( $id ) ) {
			return 'data-customize-setting-link="' . $id . '"';
		} else {
			return 'data-customize-setting-key-link="default"';
		}
	}

	/**
	 * Bypass JS configs for Controls.
	 *
	 * @param array $configuration configuration.
	 */
	public static function bypass_control_configs( $configuration ) {

		$val = '';

		if ( isset( $configuration['name'] ) ) {

			$data = explode( '[', rtrim( $configuration['name'], ']' ) );

			if ( isset( $data[1] ) ) {
				$val = astra_get_option( $data[1] );
			}
		}

		if ( isset( $val ) && ! empty( $val ) ) {

			$configuration['value'] = $val;
		}

		switch ( $configuration['type'] ) {

			case 'ast-responsive-spacing':
				if ( ! is_array( $val ) || is_numeric( $val ) ) {

					$configuration['value'] = array(
						'desktop'      => array(
							'top'    => $val,
							'right'  => '',
							'bottom' => $val,
							'left'   => '',
						),
						'tablet'       => array(
							'top'    => $val,
							'right'  => '',
							'bottom' => $val,
							'left'   => '',
						),
						'mobile'       => array(
							'top'    => $val,
							'right'  => '',
							'bottom' => $val,
							'left'   => '',
						),
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					);
				}
				break;
			case 'ast-radio-image':
				$configuration['value'] = $val;

				if ( isset( $configuration['choices'] ) && is_array( $configuration['choices'] ) ) {

					foreach ( $configuration['choices'] as $key => $value ) {
						$configuration['choices'][ $key ]        = $value['path'];
						$configuration['choices_titles'][ $key ] = $value['label'];
					}
				}
				if ( isset( $configuration['input_attrs'] ) ) {

					$configuration['inputAttrs'] = '';
					$configuration['labelStyle'] = '';
					foreach ( $configuration['input_attrs'] as $attr => $value ) {
						if ( 'style' !== $attr ) {
							$configuration['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
						} else {
							$configuration['labelStyle'] = 'style="' . esc_attr( $value ) . '" ';
						}
					}
				}
				break;
			case 'ast-border':
				$configuration['value'] = $val;

				break;
			case 'ast-responsive-slider':
				if ( ! is_array( $val ) || is_numeric( $val ) ) {

					$configuration['value'] = array(
						'desktop' => $val,
						'tablet'  => '',
						'mobile'  => '',
					);
				}
				break;
			case 'ast-responsive-background':
				$configuration['value'] = $val;

				break;
			case 'ast-responsive':
				if ( ! is_array( $val ) || is_numeric( $val ) ) {

					$configuration['value'] = array(
						'desktop'      => $val,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => '',
						'tablet-unit'  => '',
						'mobile-unit'  => '',
					);
				}
				break;
			case 'ast-link':
				$configuration['value'] = $val;

				break;
			case 'ast-hidden':
				$configuration['value'] = $val;

				break;
			case 'ast-settings-group':
				$config = array();

				if ( isset( self::$group_configs[ $configuration['name'] ]['tabs'] ) ) {
					$tab = array_keys( self::$group_configs[ $configuration['name'] ]['tabs'] );
					rsort( $tab );
					foreach ( $tab as $key => $value ) {

						$config['tabs'][ $value ] = wp_list_sort( self::$group_configs[ $configuration['name'] ]['tabs'][ $value ], 'priority' );
					}
				} else {
					if ( isset( self::$group_configs[ $configuration['name'] ] ) ) {
						$config = wp_list_sort( self::$group_configs[ $configuration['name'] ], 'priority' );
					}
				}
				$configuration['ast_fields'] = $config;
				break;
			case 'ast-font-weight':
				$configuration['ast_all_font_weight'] = array(
					'100'       => __( 'Thin 100', 'astra' ),
					'100italic' => __( '100 Italic', 'astra' ),
					'200'       => __( 'Extra-Light 200', 'astra' ),
					'200italic' => __( '200 Italic', 'astra' ),
					'300'       => __( 'Light 300', 'astra' ),
					'300italic' => __( '300 Italic', 'astra' ),
					'400'       => __( 'Normal 400', 'astra' ),
					'italic'    => __( '400 Italic', 'astra' ),
					'500'       => __( 'Medium 500', 'astra' ),
					'500italic' => __( '500 Italic', 'astra' ),
					'600'       => __( 'Semi-Bold 600', 'astra' ),
					'600italic' => __( '600 Italic', 'astra' ),
					'700'       => __( 'Bold 700', 'astra' ),
					'700italic' => __( '700 Italic', 'astra' ),
					'800'       => __( 'Extra-Bold 800', 'astra' ),
					'800italic' => __( '800 Italic', 'astra' ),
					'900'       => __( 'Ultra-Bold 900', 'astra' ),
					'900italic' => __( '900 Italic', 'astra' ),
				);
				break;
			case 'ast-sortable':
				$configuration['value'] = $val;

				break;

		} // Switch End.

		if ( isset( $configuration['id'] ) ) {

			$configuration['link'] = self::get_control_link( $configuration['id'] );
		}
		$exclude_controls = array( 'ast-builder', 'ast-radio-image' );

		if ( isset( $configuration['type'] ) && ! in_array( $configuration['type'], $exclude_controls ) && isset( $configuration['input_attrs'] ) && is_array( $configuration['input_attrs'] ) ) {

			$configuration['inputAttrs'] = '';

			foreach ( $configuration['input_attrs'] as $attr => $value ) {

				if ( ! is_array( $value ) ) {

					$configuration['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
				}
			}
		}

		return $configuration;
	}

	/**
	 * Prepare Panel Configs for Javascript.
	 * @since 3.0.0
	 * @param array $config configs.
	 */
	public function prepare_javascript_panel_configs( $config ) {

		$panel_name = astra_get_prop( $config, 'name' );

		if ( in_array( $panel_name, self::$removed_panels, true ) ) {
			return;
		}

		unset( $config['type'] );
		$config['type']               = 'ast_panel';
		$config['active']             = true;
		$config['id']                 = $panel_name;
		self::$js_configs['panels'][$panel_name] = $config;
	}

	/**
	 * Prepare Section Configs for Javascript.
	 * @since 3.0.0
	 * @param array $config configs.
	 */
	public function prepare_javascript_section_configs( $config ) {

		$section_name = astra_get_prop( $config, 'name' );
		$panel_name   = astra_get_prop( $config, 'panel' );

		if ( in_array( $section_name, self::$removed_sections, true ) ) {
			return;
		}

		if ( in_array( $panel_name, self::$removed_panels, true ) ) {
			return;
		}

		unset( $config['type'] );
		$config['type']                 = isset( $config['ast_type'] ) ? $config['ast_type'] : 'ast_section';
		$config['active']               = true;
		$config['id']                   = $section_name;
		$config['customizeAction']      = sprintf( 'Customizing ▸ %s', astra_get_prop( $config, 'title' ) );
		self::$js_configs['sections'][$section_name] = $config;
	}

	/**
	 * Prepare Sub Control Configs for Javascript.
	 * @since 3.0.0
	 * @param array $config configs.
	 */
	public function prepare_javascript_sub_control_configs( $config ) {

		if ( in_array( astra_get_prop( $config, 'section' ), self::$removed_sections, true ) ) {
			return;
		}

		global $wp_customize;
		unset( $config['type'] );

		$sub_control_name = ASTRA_THEME_SETTINGS . '[' . astra_get_prop( $config, 'name' ) . ']';
		$parent           = astra_get_prop( $config, 'parent' );

		$ignore_controls = array( 'ast-settings-group', 'ast-sortable', 'ast-radio-image', 'ast-slider', 'ast-responsive-slider' );

		$sanitize_callback = ( in_array( $config['control'], $ignore_controls, true ) ) ? false : astra_get_prop( $config, 'sanitize_callback', Astra_Customizer_Control_Base::get_sanitize_call( astra_get_prop( $config, 'control' ) ) );

		$new_config = array(
			'name'              => $sub_control_name,
			'datastore_type'    => 'option',
			'transport'         => 'postMessage',
			'control'           => 'ast-hidden',
			'section'           => astra_get_prop( $config, 'section', 'title_tagline' ),
			'priority'           => astra_get_prop( $config, 'priority', '10' ),
			'default'           => astra_get_prop( $config, 'default' ),
			'sanitize_callback' => $sanitize_callback,
		);

		$wp_customize->add_setting(
			astra_get_prop( $new_config, 'name' ),
			array(
				'default'           => astra_get_prop( $new_config, 'default' ),
				'type'              => astra_get_prop( $new_config, 'datastore_type' ),
				'transport'         => astra_get_prop( $new_config, 'transport', 'refresh' ),
				'sanitize_callback' => astra_get_prop( $new_config, 'sanitize_callback', Astra_Customizer_Control_Base::get_sanitize_call( astra_get_prop( $new_config, 'control' ) ) ),
			)
		);

		$new_config['type']                               = astra_get_prop( $new_config, 'control' );
		$new_config['id']                                 = astra_get_prop( $new_config, 'name' );
		$new_config['settings']                           = array( 'default' => astra_get_prop( $new_config, 'name' ) );
		$new_config                                       = self::bypass_control_configs( $new_config );
		self::$js_configs ['sub_controls'] [ $parent ] [] = $new_config;
	}


	/**
	 * Prepare Control Configs for Javascript.
	 * @since 3.0.0
	 * @param array $config configs.
	 */
	public function prepare_javascript_control_configs( $config ) {

		if ( in_array( astra_get_prop( $config, 'section' ), self::$removed_sections, true ) ) {
			return;
		}

		global $wp_customize;
		// Remove type from configuration.
		unset( $config['type'] );

		$ignore_controls = array( 'ast-settings-group', 'ast-sortable', 'ast-radio-image', 'ast-slider', 'ast-responsive-slider' );

		if ( ! isset( $config['control'] ) ) {
			return;
		}

		$sanitize_callback = ( in_array( $config['control'], $ignore_controls, true ) ) ? false : astra_get_prop( $config, 'sanitize_callback', Astra_Customizer_Control_Base::get_sanitize_call( astra_get_prop( $config, 'control' ) ) );


		$wp_customize->add_setting(
			astra_get_prop( $config, 'name' ),
			array(
				'default'           => astra_get_prop( $config, 'default' ),
				'type'              => astra_get_prop( $config, 'datastore_type' ),
				'transport'         => astra_get_prop( $config, 'transport', 'refresh' ),
				'sanitize_callback' => $sanitize_callback,
			)
		);

		$config['label'] = astra_get_prop( $config, 'title' );
		$config['type']  = astra_get_prop( $config, 'control' );

		if ( false !== astra_get_prop( $config, 'font-type', false ) ) {
			$config['type'] = astra_get_prop( $config, 'font-type', false );
		}

		if ( astra_get_prop( $config, 'partial', false ) ) {

			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					astra_get_prop( $config, 'name' ),
					array(
						'selector'            => astra_get_prop( $config['partial'], 'selector' ),
						'container_inclusive' => astra_get_prop( $config['partial'], 'container_inclusive' ),
						'render_callback'     => astra_get_prop( $config['partial'], 'render_callback' ),
					)
				);
			}
		}

		if ( false !== astra_get_prop( $config, 'required', false ) ) {
			self::$dependency_arr[ astra_get_prop( $config, 'name' ) ] = astra_get_prop( $config, 'required' );
		}

		if( 'image' === $config['type'] ) {

			$this->prepare_preload_controls( $config );
			return;
		}

		if( isset( $config['active_callback'] ) ) {

			self::$js_configs ['skip_context'] [] =  astra_get_prop( $config, 'name' );
			$this->prepare_preload_controls($config);
			return;
		}

		$config['id']       = astra_get_prop( $config, 'name' );
		$config['settings'] = array( 'default' => astra_get_prop( $config, 'name' ) );
		$config             = self::bypass_control_configs( $config );

		if ( isset( $config['section'] ) ) {
			self::$js_configs ['controls'] [ $config['section'] ] [] = $config;
		}
	}

	/**
	 * Add controls for which active_callback is added.
	 * @since 3.0.0
	 * @param array $config config.
	 */
	public function prepare_preload_controls( $config ) {

		global $wp_customize;

		$instance = Astra_Customizer_Control_Base::get_control_instance( astra_get_prop( $config, 'control' ) );

		// Forwarding to the DOM as default control.
		if( 'title_tagline' !== $config['section'] ) {
			self::$js_configs ['wp_defaults'][ astra_get_prop( $config, 'name' ) ] = $config['section'];
			$config['section'] = 'title_tagline';
		}

		if ( false !== $instance ) {
			$wp_customize->add_control(
				new $instance( $wp_customize, astra_get_prop( $config, 'name' ), $config )
			);
		} else {
			$wp_customize->add_control( astra_get_prop( $config, 'name' ), $config );
		}

	}

	/**
	 * Remove contron register as doing it from JS way.
	 * @since 3.0.0
	 */
	public function remove_actions() {

		if ( method_exists( 'Astra_Customizer', 'get_instance' ) ) {
			remove_action( 'customize_register', array( Astra_Customizer::get_instance(), 'register_customizer_settings' ) );
		}
	}


	/**
	 * Function to remove old Header and Footer Menu location and widgets.
	 *
	 * @since 3.0.0
	 * @return void
	 */
	public function deregister_menu_locations_widgets() {

		// Remove Header Menus locations.
		unregister_nav_menu( 'above_header_menu' );
		unregister_nav_menu( 'below_header_menu' );

		// Remove Header Widgets.
		unregister_sidebar( 'above-header-widget-1' );
		unregister_sidebar( 'above-header-widget-2' );
		unregister_sidebar( 'below-header-widget-1' );
		unregister_sidebar( 'below-header-widget-2' );

		// Remove Footer Widgets.
		unregister_sidebar( 'advanced-footer-widget-1' );
		unregister_sidebar( 'advanced-footer-widget-2' );
		unregister_sidebar( 'advanced-footer-widget-3' );
		unregister_sidebar( 'advanced-footer-widget-4' );
		unregister_sidebar( 'advanced-footer-widget-5' );
	}

	/**
	 * Function to remove old Header and Footer panels from Plugin.
	 *
	 * @since 3.0.0
	 * @return void
	 */
	public function remove_old_header_footer() {

		self::$removed_panels[] = 'panel-header-group';

		self::$removed_sections[] = 'section-footer-small';
		self::$removed_sections[] = 'section-footer-group';
		self::$removed_sections[] = 'section-footer-adv';

	}

	/**
	 * Add Required dependency.
	 *
	 * @param array $dependency_arr dependency array.
	 * @since 3.0.0
	 * @return mixed
	 */
	public function update_customizer_control_dependency( $dependency_arr ) {

		$required_arr                    = self::$dependency_arr;
		$required_arr['blogname']        = array( ASTRA_THEME_SETTINGS . '[display-site-title]', '==', true );
		$required_arr['blogdescription'] = array( ASTRA_THEME_SETTINGS . '[display-site-tagline]', '==', true );
		return $required_arr;
	}

	/**
	 * Return default values for the Customize Configurations.
	 *
	 * @since 3.0.0
	 * @return Array default values for the Customizer Configurations.
	 */
	private function get_astra_customizer_configuration_defaults() {
		return apply_filters(
			'astra_customizer_configuration_defaults',
			array(
				'priority'             => null,
				'title'                => null,
				'label'                => null,
				'name'                 => null,
				'type'                 => null,
				'description'          => null,
				'capability'           => null,
				'datastore_type'       => 'option', // theme_mod or option. Default option.
				'settings'             => null,
				'active_callback'      => null,
				'sanitize_callback'    => null,
				'sanitize_js_callback' => null,
				'theme_supports'       => null,
				'transport'            => null,
				'default'              => null,
				'selector'             => null,
				'ast_fields'           => array(),
			)
		);
	}

	/**
	 * Prepare Contexts and choices.
	 * @since 3.0.0
	 * @param object $wp_customize customizer object.
	 */
	public function prepare_customizer_javascript_configs( $wp_customize ) {

		$configurations = apply_filters( 'astra_customizer_configurations', array(), $wp_customize );

		$defaults = $this->get_astra_customizer_configuration_defaults();

		foreach ( $configurations as $key => $configuration ) {

			$config = wp_parse_args( $configuration, $defaults );

			if ( isset( $configuration['context'] ) ) {
				self::$contexts[ $configuration['name'] ] = $configuration['context'];
			} else {
				if ( isset( $configuration['type'] ) && ( ( 'control' === $configuration['type'] ) || ( 'sub-control' === $configuration['type'] ) ) ) {
					if ( ( isset( $configuration['control'] ) && 'ast-builder-header-control' !== $configuration['control'] ) && ( isset($configuration['name']) && strpos($configuration['name'], 'ahfb-notice') === false ) ) {
						self::$contexts[ $configuration['name'] ] = Astra_Builder_Helper::$general_tab;
					}
				}
			}

			if ( isset( $configuration['choices'] ) ) {
				self::$choices[ $configuration['name'] ] = $configuration['choices'];
			}

			switch ( $config['type'] ) {

				case 'panel':
					$this->prepare_javascript_panel_configs( $config );
					break;
				case 'section':
					$this->prepare_javascript_section_configs( $config );
					break;

				case 'sub-control':
					$this->prepare_javascript_sub_control_configs( $config );
					break;
				case 'control':
					$this->prepare_javascript_control_configs( $config );
					break;
			}
		}

	}

	/**
	 * Prepare Group configs to visible sub-controls.
	 * @since 3.0.0
	 * @param object $wp_customize customizer object.
	 */
	public function prepare_group_configs( $wp_customize ) {

		$configurations = apply_filters( 'astra_customizer_configurations', array(), $wp_customize );
		$defaults = $this->get_astra_customizer_configuration_defaults();

		foreach ( $configurations as $key => $configuration ) {
			$config = wp_parse_args( $configuration, $defaults );
			if( 'sub-control' === $config['type'] ) {
				unset( $config['type'] );
				$parent  = astra_get_prop( $config, 'parent' );
				$tab     = astra_get_prop( $config, 'tab' );

				if ( empty( self::$group_configs[ $parent ] ) ) {
					self::$group_configs[ $parent ] = array();
				}

				if ( array_key_exists( 'tab', $config ) ) {
					self::$group_configs[ $parent ]['tabs'][ $tab ][] = $config;
				} else {
					self::$group_configs[ $parent ][] = $config;
				}
			}
		}
	}

	/**
	 * Attach customize_controls_print_footer_scripts preview styles conditionally.
	 *
	 * @since 3.0.0
	 */
	public function builder_customizer_preview_styles() {
		/**
		 * Added Astra Pro dependent customizer style.
		 */
		if ( is_customize_preview() ) {
			echo '<style type="text/css">
				.ahfb-builder-mode-header[data-row="above"] .ahfb-row-actions, .ahfb-builder-mode-header[data-row="below"] .ahfb-row-actions, .ahfb-builder-mode-footer[data-row="above"] .ahfb-row-actions, .ahfb-builder-mode-footer[data-row="primary"] .ahfb-row-actions {
					cursor: pointer;
				}
			</style>';
		}
	}

	/**
	 * Add Customizer preview script.
	 *
	 * @since 3.0.0
	 */
	public function enqueue_customizer_preview_scripts() {

		// Enqueue Builder CSS.
		wp_enqueue_style(
			'ahfb-customizer-preview-style',
			ASTRA_THEME_URI . 'inc/assets/css/customizer-preview.css',
			null,
			ASTRA_THEME_VERSION
		);

		// Advanced Dynamic CSS.
		wp_enqueue_script(
			'ahfb-customizer-preview',
			ASTRA_THEME_URI . 'inc/assets/js/customizer-preview.js',
			array( 'customize-preview' ),
			ASTRA_THEME_VERSION,
			true
		);

		// Base Dynamic CSS.
		wp_enqueue_script(
			'ahfb-base-customizer-preview',
			ASTRA_THEME_URI . 'inc/builder/type/base/assets/js/customizer-preview.js',
			array( 'customize-preview' ),
			ASTRA_THEME_VERSION,
			true
		);

		// Localize variables for Astra Breakpoints JS.
		wp_localize_script(
			'ahfb-base-customizer-preview',
			'astraBuilderPreview',
			array(
				'tablet_break_point' => astra_get_tablet_breakpoint(),
				'mobile_break_point' => astra_get_mobile_breakpoint(),
			)
		);

		wp_localize_script(
			'ahfb-customizer-preview',
			'astraBuilderCustomizer',
			array(
				'ajaxurl'    => admin_url( 'admin-ajax.php' ),
				'ajax_nonce' => wp_create_nonce( 'astra-builder-customizer-nonce' ),
			)
		);
	}

	/**
	 * Register Base Components for Builder.
	 */
	public function load_base_components() {

		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once ASTRA_THEME_DIR . 'inc/customizer/configurations/builder/class-astra-builder-base-configuration.php';

		require_once ASTRA_THEME_DIR . 'inc/builder/type/class-astra-builder-base-dynamic-css.php';

		// Base Config Files.
		require_once ASTRA_THEME_DIR . 'inc/customizer/configurations/builder/base/class-astra-social-icon-component-configs.php';
		require_once ASTRA_THEME_DIR . 'inc/customizer/configurations/builder/base/class-astra-html-component-configs.php';
		require_once ASTRA_THEME_DIR . 'inc/customizer/configurations/builder/base/class-astra-button-component-configs.php';

		// Base Dynamic CSS Files.
		require_once ASTRA_THEME_DIR . 'inc/builder/type/base/dynamic-css/html/class-astra-html-component-dynamic-css.php';
		require_once ASTRA_THEME_DIR . 'inc/builder/type/base/dynamic-css/social/class-astra-social-component-dynamic-css.php';
		require_once ASTRA_THEME_DIR . 'inc/builder/type/base/dynamic-css/button/class-astra-button-component-dynamic-css.php';
		require_once ASTRA_THEME_DIR . 'inc/builder/type/base/dynamic-css/widget/class-astra-widget-component-dynamic-css.php';

		$this->load_header_components();
		$this->load_footer_components();
		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Register Components for Header Builder.
	 *
	 * @since 3.0.0
	 */
	public function load_header_components() {
		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$header_components_path = ASTRA_THEME_DIR . 'inc/builder/type/header';
		require_once $header_components_path . '/site-identity/class-astra-header-site-identity-component.php';
		require_once $header_components_path . '/off-canvas/class-astra-off-canvas.php';
		require_once $header_components_path . '/primary-header/class-astra-primary-header.php';
		require_once $header_components_path . '/button/class-astra-header-button-component.php';
		require_once $header_components_path . '/menu/class-astra-header-menu-component.php';
		require_once $header_components_path . '/html/class-astra-header-html-component.php';
		require_once $header_components_path . '/search/class-astra-header-search-component.php';
		require_once $header_components_path . '/social-icon/class-astra-header-social-icon-component.php';
		require_once $header_components_path . '/widget/class-astra-header-widget-component.php';
		require_once $header_components_path . '/mobile-trigger/class-astra-mobile-trigger.php';

		require_once $header_components_path . '/above-header/class-astra-above-header.php';
		require_once $header_components_path . '/below-header/class-astra-below-header.php';

		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Register Components for Footer Builder.
	 *
	 * @since 3.0.0
	 */
	public function load_footer_components() {
		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$footer_components_path = ASTRA_THEME_DIR . 'inc/builder/type/footer';
		require_once $footer_components_path . '/below-footer/class-astra-below-footer.php';
		require_once $footer_components_path . '/menu/class-astra-footer-menu-component.php';
		require_once $footer_components_path . '/html/class-astra-footer-html-component.php';
		require_once $footer_components_path . '/button/class-astra-footer-button-component.php';
		require_once $footer_components_path . '/copyright/class-astra-footer-copyright-component.php';
		require_once $footer_components_path . '/social-icon/class-astra-footer-social-icons-component.php';
		require_once $footer_components_path . '/above-footer/class-astra-above-footer.php';
		require_once $footer_components_path . '/primary-footer/class-astra-primary-footer.php';
		require_once $footer_components_path . '/widget/class-astra-footer-widget-component.php';
		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Register controls for Header/Footer Builder.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 3.0.0
	 */
	public function builder_configs( $wp_customize ) {
		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$builder_config_path = ASTRA_THEME_DIR . 'inc/customizer/configurations/builder/';
		// Header Builder.
		require_once $builder_config_path . '/header/class-astra-customizer-header-builder-configs.php';
		// Footer Builder.
		require_once $builder_config_path . '/footer/class-astra-customizer-footer-builder-configs.php';
		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Register controls for Header Builder.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 3.0.0
	 */
	public function header_configs( $wp_customize ) {
		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$header_config_path = ASTRA_THEME_DIR . 'inc/customizer/configurations/builder/header';
		require_once $header_config_path . '/class-astra-customizer-above-header-configs.php';
		require_once $header_config_path . '/class-astra-customizer-below-header-configs.php';
		require_once $header_config_path . '/class-astra-customizer-header-builder-configs.php';
		require_once $header_config_path . '/class-astra-customizer-header-widget-configs.php';
		require_once $header_config_path . '/class-astra-customizer-mobile-trigger-configs.php';
		require_once $header_config_path . '/class-astra-customizer-off-canvas-configs.php';
		require_once $header_config_path . '/class-astra-customizer-primary-header-configs.php';
		require_once $header_config_path . '/class-astra-customizer-site-identity-configs.php';
		require_once $header_config_path . '/class-astra-header-button-component-configs.php';
		require_once $header_config_path . '/class-astra-header-html-component-configs.php';
		require_once $header_config_path . '/class-astra-header-menu-component-configs.php';
		require_once $header_config_path . '/class-astra-header-search-component-configs.php';
		require_once $header_config_path . '/class-astra-header-social-icon-component-configs.php';
		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Register controls for Footer Builder.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 3.0.0
	 */
	public function footer_configs( $wp_customize ) {
		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		$footer_config_path = ASTRA_THEME_DIR . 'inc/customizer/configurations/builder/footer';
		require_once $footer_config_path . '/class-astra-customizer-above-footer-configs.php';
		require_once $footer_config_path . '/class-astra-customizer-below-footer-configs.php';
		require_once $footer_config_path . '/class-astra-customizer-copyright-configs.php';
		require_once $footer_config_path . '/class-astra-customizer-footer-builder-configs.php';
		require_once $footer_config_path . '/class-astra-customizer-footer-menu-configs.php';
		require_once $footer_config_path . '/class-astra-customizer-footer-social-icons-configs.php';
		require_once $footer_config_path . '/class-astra-customizer-primary-footer-configs.php';
		require_once $footer_config_path . '/class-astra-footer-html-component-configs.php';
		require_once $footer_config_path . '/class-astra-footer-button-component-configs.php';
		require_once $footer_config_path . '/class-astra-footer-widget-component-configs.php';
		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	/**
	 * Prepare context.
	 *
	 * @return mixed|void
	 */
	public static function get_contexts() {
		// Return contexts.
		return apply_filters( 'astra_customizer_context', self::$contexts );
	}

	/**
	 * Prepare choices.
	 *
	 * @return mixed|void
	 */
	public static function get_choices() {
		// Return contexts.
		return apply_filters( 'astra_customizer_choices', self::$choices );
	}

	/**
	 * Prepare javascript configs.
	 *
	 * @return mixed|void
	 */
	public static function get_js_configs() {

		// Return contexts.
		return apply_filters( 'astra_javascript_configurations', self::$js_configs );

	}

	/**
	 * Add customizer script.
	 *
	 * @since 3.0.0
	 */
	public function enqueue_customizer_scripts() {

		// Localize variables for Dev mode > Customizer JS.
		wp_localize_script(
			SCRIPT_DEBUG ? 'astra-custom-control-react-script' : 'astra-custom-control-script',
			'AstraBuilderCustomizerData',
			array(
				'contexts'   => self::get_contexts(),
				'choices'    => self::get_choices(),
				'js_configs' => self::get_js_configs(),
			)
		);

		// Enqueue Builder CSS.
		wp_enqueue_style(
			'ahfb-customizer-style',
			ASTRA_THEME_URI . 'inc/assets/css/ast-builder-customizer.css',
			array( 'wp-components' ),
			ASTRA_THEME_VERSION
		);
	}
}

/**
 *  Prepare if class 'Astra_Builder_Customizer' exist.
 *  Kicking this off by creating new object of the class.
 */
new Astra_Builder_Customizer();
