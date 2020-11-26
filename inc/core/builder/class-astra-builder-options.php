<?php
/**
 * Astra Builder Options default values.
 *
 * @package astra-builder
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'astra_theme_defaults', 'astra_hf_builder_customizer_defaults' );

/**
 * Return defaults for Builder Options.
 *
 * @param array $defaults exsiting options array.
 * @return array
 */
function astra_hf_builder_customizer_defaults( $defaults ) {

	/**
	 * Header Builder - Desktop Defaults.
	 */
	$defaults['header-desktop-items'] = array(
		'above'   =>
			array(
				'above_left'         => array(),
				'above_left_center'  => array(),
				'above_center'       => array(),
				'above_right_center' => array(),
				'above_right'        => array(),
			),
		'primary' =>
			array(
				'primary_left'         => array( 'logo' ),
				'primary_left_center'  => array(),
				'primary_center'       => array(),
				'primary_right_center' => array(),
				'primary_right'        => array( 'menu-1' ),
			),
		'below'   =>
			array(
				'below_left'         => array(),
				'below_left_center'  => array(),
				'below_center'       => array(),
				'below_right_center' => array(),
				'below_right'        => array(),
			),
	);

	/**
	 * Header Builder - Mobile Defaults.
	 */
	$defaults['header-mobile-items'] = array(
		'popup'   => array( 'popup_content' => array( 'menu-1' ) ),
		'above'   =>
			array(
				'above_left'   => array(),
				'above_center' => array(),
				'above_right'  => array(),
			),
		'primary' =>
			array(
				'primary_left'   => array( 'logo' ),
				'primary_center' => array(),
				'primary_right'  => array( 'mobile-trigger' ),
			),
		'below'   =>
			array(
				'below_left'   => array(),
				'below_center' => array(),
				'below_right'  => array(),
			),
	);

	/**
	 * Primary Header Defaults.
	 */
	$defaults['hb-header-main-layout-width'] = 'content';
	$defaults['hb-header-height']            = 50;
	$defaults['hb-header-main-sep']          = 1;
	$defaults['hb-header-main-sep-color']    = '#eaeaea';
	$defaults['hb-header-main-menu-align']   = 'inline';
	$defaults['hb-header-bg-obj-responsive'] = array(
		'desktop' => array(
			'background-color'      => '#ffffff',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'tablet'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'mobile'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
	);

	$defaults['hb-header-spacing'] = array(
		'desktop'      => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'tablet'       => array(
			'top'    => '1.5',
			'right'  => '',
			'bottom' => '1.5',
			'left'   => '',
		),
		'mobile'       => array(
			'top'    => '1',
			'right'  => '',
			'bottom' => '1',
			'left'   => '',
		),
		'desktop-unit' => 'px',
		'tablet-unit'  => 'em',
		'mobile-unit'  => 'em',
	);

	/**
	 * Above Header Defaults.
	 */
	$defaults['hba-header-layout']                  = 'above-header-layout-1';
	$defaults['hba-header-height']                  = 50;
	$defaults['hba-header-separator']               = 1;
	$defaults['hba-header-bottom-border-color']     = '#eaeaea';
	$defaults['hba-header-bg-obj-responsive']       = array(
		'desktop' => array(
			'background-color'      => '#ffffff',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'tablet'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'mobile'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
	);
	$defaults['hba-header-text-color-responsive']   = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);
	$defaults['hba-header-link-color-responsive']   = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);
	$defaults['hba-header-link-h-color-responsive'] = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);
	$defaults['hba-header-spacing']                 = array(
		'desktop'      => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'tablet'       => array(
			'top'    => '0',
			'right'  => '',
			'bottom' => '0',
			'left'   => '',
		),
		'mobile'       => array(
			'top'    => '0.5',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'desktop-unit' => 'px',
		'tablet-unit'  => 'px',
		'mobile-unit'  => 'em',
	);

	/**
	 * Logo defaults.
	 */
	$defaults['ast-header-responsive-logo-width'] = array(
		'desktop' => 150,
		'tablet'  => 120,
		'mobile'  => 100,
	);

	/**
	 * Above Header Defaults.
	 */
	$defaults['hbb-header-layout']              = 'below-header-layout-1';
	$defaults['hbb-header-height']              = 60;
	$defaults['hbb-header-separator']           = 1;
	$defaults['hbb-header-bottom-border-color'] = '#eaeaea';
	$defaults['hbb-header-bg-obj-responsive']   = array(
		'desktop' => array(
			'background-color'      => '#eeeeee',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'tablet'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'mobile'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
	);
	$defaults['hbb-header-spacing']             = array(
		'desktop'      => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'tablet'       => array(
			'top'    => '1',
			'right'  => '',
			'bottom' => '1',
			'left'   => '',
		),
		'mobile'       => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'desktop-unit' => 'px',
		'tablet-unit'  => 'em',
		'mobile-unit'  => 'px',
	);

	for ( $index = 1; $index <= Astra_Builder_Helper::$num_of_header_button; $index++ ) {

		$_prefix = 'button' . $index;

		$defaults[ 'header-' . $_prefix . '-text' ]           = __( 'Button', 'astra' );
		$defaults[ 'header-' . $_prefix . '-link-option' ]    = array(
			'url'      => apply_filters( 'astra_site_url', 'https://www.wpastra.com' ),
			'new_tab'  => false,
			'link_rel' => '',
		);
		$defaults[ 'header-' . $_prefix . '-font-family' ]    = 'inherit';
		$defaults[ 'header-' . $_prefix . '-font-weight' ]    = 'inherit';
		$defaults[ 'header-' . $_prefix . '-text-transform' ] = '';
		$defaults[ 'header-' . $_prefix . '-line-height' ]    = '';
		$defaults[ 'header-' . $_prefix . '-font-size' ]      = array(
			'desktop'      => '',
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);
		$defaults[ 'header-' . $_prefix . '-text-color' ]     = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		$defaults[ 'header-' . $_prefix . '-back-color' ]     = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		$defaults[ 'header-' . $_prefix . '-text-h-color' ]   = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		$defaults[ 'header-' . $_prefix . '-back-h-color' ]   = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		$defaults[ 'header-' . $_prefix . '-padding' ]        = array(
			'desktop' => array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
			),
			'tablet'  => array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
			),
			'mobile'  => array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
			),
		);
		$defaults[ 'header-' . $_prefix . '-border-size' ]    = array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		);
		$defaults[ 'header-' . $_prefix . '-border-color' ]   = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		$defaults[ 'header-' . $_prefix . '-border-radius' ]  = '';
	}

	for ( $index = 1; $index <= Astra_Builder_Helper::$num_of_footer_button; $index++ ) {

		$_prefix = 'button' . $index;

		$defaults[ 'footer-' . $_prefix . '-text' ]           = __( 'Button', 'astra' );
		$defaults[ 'footer-' . $_prefix . '-link-option' ]    = array(
			'url'      => apply_filters( 'astra_site_url', 'https://www.wpastra.com' ),
			'new_tab'  => false,
			'link_rel' => '',
		);
		$defaults[ 'footer-' . $_prefix . '-font-family' ]    = 'inherit';
		$defaults[ 'footer-' . $_prefix . '-font-weight' ]    = 'inherit';
		$defaults[ 'footer-' . $_prefix . '-text-transform' ] = '';
		$defaults[ 'footer-' . $_prefix . '-line-height' ]    = '';
		$defaults[ 'footer-' . $_prefix . '-font-size' ]      = array(
			'desktop'      => '',
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);
		$defaults[ 'footer-' . $_prefix . '-text-color' ]     = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		$defaults[ 'footer-' . $_prefix . '-back-color' ]     = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		$defaults[ 'footer-' . $_prefix . '-text-h-color' ]   = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		$defaults[ 'footer-' . $_prefix . '-back-h-color' ]   = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		$defaults[ 'footer-' . $_prefix . '-padding' ]        = array(
			'desktop' => array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
			),
			'tablet'  => array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
			),
			'mobile'  => array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
			),
		);
		$defaults[ 'footer-' . $_prefix . '-border-size' ]    = array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		);
		$defaults[ 'footer-' . $_prefix . '-border-color' ]   = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);
		$defaults[ 'footer-' . $_prefix . '-border-radius' ]  = '';

		$defaults[ 'footer-button-' . $index . '-alignment' ] = array(
			'desktop' => 'center',
			'tablet'  => 'center',
			'mobile'  => 'center',
		);
	}

	for ( $index = 1; $index <= Astra_Builder_Helper::$num_of_header_html; $index++ ) {

		$_section = 'section-hb-html-' . $index;

		$defaults[ 'header-html-' . $index ] = __( 'Insert HTML text here.', 'astra' );

		/**
		 * HTML Components - Typography.
		 */
		$defaults[ 'font-size-' . $_section ]      = array(
			'desktop'      => 15,
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);
		$defaults[ 'font-weight-' . $_section ]    = 'inherit';
		$defaults[ 'font-family-' . $_section ]    = 'inherit';
		$defaults[ 'line-height-' . $_section ]    = '';
		$defaults[ 'text-transform-' . $_section ] = '';
	}

	for ( $index = 1; $index <= Astra_Builder_Helper::$num_of_header_menu; $index++ ) {
		$_prefix = 'menu' . $index;

		// Specify all the default values for Menu from here.
		$defaults[ 'header-' . $_prefix . '-bg-color' ]   = '';
		$defaults[ 'header-' . $_prefix . '-color' ]      = '';
		$defaults[ 'header-' . $_prefix . '-h-bg-color' ] = '';
		$defaults[ 'header-' . $_prefix . '-h-color' ]    = '';
		$defaults[ 'header-' . $_prefix . '-a-bg-color' ] = '';
		$defaults[ 'header-' . $_prefix . '-a-color' ]    = '';

		$defaults[ 'header-' . $_prefix . '-bg-obj-responsive' ] = array(
			'desktop' => array(
				'background-color'      => '',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
			),
			'tablet'  => array(
				'background-color'      => 'rgba(0,0,0,0)',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
			),
			'mobile'  => array(
				'background-color'      => 'rgba(0,0,0,0)',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
			),
		);

		$defaults[ 'header-' . $_prefix . '-color-responsive' ] = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);

		$defaults[ 'header-' . $_prefix . '-h-bg-color-responsive' ] = array(
			'desktop' => '',
			'tablet'  => 'rgba(0,0,0,0)',
			'mobile'  => 'rgba(0,0,0,0)',
		);

		$defaults[ 'header-' . $_prefix . '-h-color-responsive' ] = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);

		$defaults[ 'header-' . $_prefix . '-a-bg-color-responsive' ] = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);

		$defaults[ 'header-' . $_prefix . '-a-color-responsive' ] = array(
			'desktop' => '',
			'tablet'  => '',
			'mobile'  => '',
		);

		/**
		 * Submenu
		 */
		$defaults[ 'header-' . $_prefix . '-submenu-item-border' ]  = true;
		$defaults[ 'header-' . $_prefix . '-submenu-item-b-color' ] = '#eaeaea';

		/**
		 * Menu Stack on Mobile.
		 */
		$defaults[ 'header-' . $_prefix . '-menu-stack-on-mobile' ] = true;
		
		/**
		 * Menu - Typography.
		 */
		$defaults[ 'header-' . $_prefix . '-font-size' ]      = array(
			'desktop'      => '',
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);
		$defaults[ 'header-' . $_prefix . '-font-weight' ]    = 'inherit';
		$defaults[ 'header-' . $_prefix . '-font-family' ]    = 'inherit';
		$defaults[ 'header-' . $_prefix . '-text-transform' ] = '';
		$defaults[ 'header-' . $_prefix . '-line-height' ]    = '';

		/**
		 * Header Types - Defaults
		 */
		$defaults['transparent-header-main-sep']       = '';
		$defaults['transparent-header-main-sep-color'] = '';
	}
	
	/**
	 * Header Types - Defaults
	 */
	$defaults['transparent-header-main-sep']       = '';
	$defaults['transparent-header-main-sep-color'] = '';

	/**
	 * Header > Sticky Defaults.
	 */
	$defaults['sticky-header-on-devices'] = 'desktop';
	$defaults['sticky-header-style']      = 'none';

	/**
	 * Footer Builder - Desktop Defaults.
	 */
	$defaults['footer-desktop-items'] = array(
		'above'   =>
			array(
				'above_1' => array(),
				'above_2' => array(),
				'above_3' => array(),
				'above_4' => array(),
				'above_5' => array(),
			),
		'primary' =>
			array(
				'primary_1' => array(),
				'primary_2' => array(),
				'primary_3' => array(),
				'primary_4' => array(),
				'primary_5' => array(),
			),
		'below'   =>
			array(
				'below_1' => array( 'copyright' ),
				'below_2' => array(),
				'below_3' => array(),
				'below_4' => array(),
				'below_5' => array(),
			),
	);

	/**
	 * Above Footer Defaults.
	 */
	$defaults['hba-footer-height'] = 60;
	$defaults['hba-footer-column'] = '2';
	$defaults['hba-footer-layout'] = array(
		'desktop' => '2-equal',
		'tablet'  => '2-equal',
		'mobile'  => '2-equal',
	);

	/**
	 * Footer - Defaults
	 */
	$defaults['hba-footer-bg-obj-responsive'] = array(
		'desktop' => array(
			'background-color'      => '#eeeeee',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'tablet'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'mobile'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
	);
	$defaults['hbb-footer-bg-obj-responsive'] = array(
		'desktop' => array(
			'background-color'      => '#eeeeee',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'tablet'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'mobile'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
	);
	$defaults['hb-footer-bg-obj-responsive']  = array(
		'desktop' => array(
			'background-color'      => '#f9f9f9',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'tablet'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'mobile'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
	);

	/**
	 * Header Margin defaults.
	 */
	$defaults['section-header-builder-layout-margin'] = array(
		'desktop' => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'tablet'  => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'mobile'  => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
	);

	/**
	 * Below Footer Defaults.
	 */
	$defaults['hbb-footer-height'] = 80;
	$defaults['hbb-footer-column'] = '1';
	$defaults['hbb-footer-layout'] = array(
		'desktop' => 'full',
		'tablet'  => 'full',
		'mobile'  => 'full',
	);

	$defaults['hba-footer-layout-width'] = 'content';
	$defaults['hb-footer-layout-width']  = 'content';
	$defaults['hbb-footer-layout-width'] = 'content';

	$defaults['hba-footer-vertical-alignment'] = 'flex-start';
	$defaults['hb-footer-vertical-alignment']  = 'flex-start';
	$defaults['hbb-footer-vertical-alignment'] = 'flex-start';

	$defaults['footer-bg-obj-responsive'] = array(
		'desktop' => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'tablet'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'mobile'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
	);

	/**
	 * Primary Footer Defaults.
	 */
	$defaults['hb-footer-column']              = '3';
	$defaults['hb-footer-separator']           = 1;
	$defaults['hb-footer-bottom-border-color'] = '#e6e6e6';
	$defaults['hb-footer-layout']              = array(
		'desktop' => '3-equal',
		'tablet'  => '3-equal',
		'mobile'  => '3-equal',
	);

	$defaults['hb-footer-main-sep']       = 1;
	$defaults['hb-footer-main-sep-color'] = '#e6e6e6';

	/**
	 * Footer Copyright.
	 */
	$defaults['footer-copyright-editor']                 = 'Copyright [copyright] [current_year] [site_title] | Powered by [theme_author]';
	$defaults['footer-copyright-color']                  = '#3a3a3a';
	$defaults['line-height-section-footer-copyright']    = 2;
	$defaults['footer-copyright-alignment']              = array(
		'desktop' => 'center',
		'tablet'  => 'center',
		'mobile'  => 'center',
	);
	$defaults['font-size-section-footer-copyright']      = array(
		'desktop'      => '',
		'tablet'       => '',
		'mobile'       => '',
		'desktop-unit' => 'px',
		'tablet-unit'  => 'px',
		'mobile-unit'  => 'px',
	);
	$defaults['font-weight-section-footer-copyright']    = 'inherit';
	$defaults['font-family-section-footer-copyright']    = 'inherit';
	$defaults['text-transform-section-footer-copyright'] = '';
	$defaults['line-height-section-footer-copyright']    = '';

	$defaults['footer-menu-alignment'] = array(
		'desktop' => 'center',
		'tablet'  => 'center',
		'mobile'  => 'center',
	);

	/**
	 * Footer Below Padding.
	 */
	$defaults['section-below-footer-builder-padding'] = array(
		'desktop' => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'tablet'  => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'mobile'  => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
	);

	/**
	 * Search.
	 */
	$defaults['header-search-icon-space'] = array(
		'desktop' => 18,
		'tablet'  => 18,
		'mobile'  => 18,
	);

	/**
	 * Header > Social Icon Defaults.
	 */
	for ( $index = 1; $index <= Astra_Builder_Helper::$num_of_header_social_icons; $index++ ) {

		$defaults[ 'header-social-' . $index . '-space' ]        = '';
		$defaults[ 'header-social-' . $index . '-bg-space' ]     = '';
		$defaults[ 'header-social-' . $index . '-size' ]         = 18;
		$defaults[ 'header-social-' . $index . '-radius' ]       = '';
		$defaults[ 'header-social-' . $index . '-color' ]        = '';
		$defaults[ 'header-social-' . $index . '-h-color' ]      = '';
		$defaults[ 'header-social-' . $index . '-bg-color' ]     = '';
		$defaults[ 'header-social-' . $index . '-bg-h-color' ]   = '';
		$defaults[ 'header-social-' . $index . '-label-toggle' ] = false;
		$defaults[ 'header-social-' . $index . '-color-type' ]   = 'custom';

		$defaults[ 'font-size-section-hb-social-icons-' . $index ] = array(
			'desktop'      => '',
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);

		$defaults[ 'header-social-icons-' . $index ] = array(
			'items' =>
			array(
				array(
					'id'      => 'facebook',
					'enabled' => true,
					'source'  => 'icon',
					'url'     => '',
					'imageid' => '',
					'width'   => 24,
					'icon'    => 'facebook',
					'label'   => 'Facebook',
				),
				array(
					'id'      => 'twitter',
					'enabled' => true,
					'source'  => 'icon',
					'url'     => '',
					'imageid' => '',
					'width'   => 24,
					'icon'    => 'twitter',
					'label'   => 'Twitter',
				),
				array(
					'id'      => 'instagram',
					'enabled' => true,
					'source'  => 'icon',
					'url'     => '',
					'imageid' => '',
					'width'   => 24,
					'icon'    => 'instagram',
					'label'   => 'Instagram',
				),
			),
		);
	}

	/**
	 * Footer > Social Icon Defaults.
	 */
	for ( $index = 1; $index <= Astra_Builder_Helper::$num_of_footer_social_icons; $index++ ) {

		$defaults[ 'footer-social-' . $index . '-space' ]        = '';
		$defaults[ 'footer-social-' . $index . '-bg-space' ]     = '';
		$defaults[ 'footer-social-' . $index . '-size' ]         = 18;
		$defaults[ 'footer-social-' . $index . '-radius' ]       = '';
		$defaults[ 'footer-social-' . $index . '-color' ]        = '';
		$defaults[ 'footer-social-' . $index . '-h-color' ]      = '';
		$defaults[ 'footer-social-' . $index . '-bg-color' ]     = '';
		$defaults[ 'footer-social-' . $index . '-bg-h-color' ]   = '';
		$defaults[ 'footer-social-' . $index . '-label-toggle' ] = false;
		$defaults[ 'footer-social-' . $index . '-color-type' ]   = 'custom';

		$defaults[ 'font-size-section-fb-social-icons-' . $index ] = array(
			'desktop'      => '',
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);

		$defaults[ 'footer-social-icons-' . $index ] = array(
			'items' =>
			array(
				array(
					'id'      => 'facebook',
					'enabled' => true,
					'source'  => 'icon',
					'url'     => '',
					'imageid' => '',
					'width'   => 24,
					'icon'    => 'facebook',
					'label'   => 'Facebook',
				),
				array(
					'id'      => 'twitter',
					'enabled' => true,
					'source'  => 'icon',
					'url'     => '',
					'imageid' => '',
					'width'   => 24,
					'icon'    => 'twitter',
					'label'   => 'Twitter',
				),
				array(
					'id'      => 'instagram',
					'enabled' => true,
					'source'  => 'icon',
					'url'     => '',
					'imageid' => '',
					'width'   => 24,
					'icon'    => 'instagram',
					'label'   => 'Instagram',
				),
			),
		);

		$defaults[ 'footer-social-' . $index . '-alignment' ] = array(
			'desktop' => 'center',
			'tablet'  => 'center',
			'mobile'  => 'center',
		);
	}

	/**
	 * Transparent Header > Component Configs
	 */
	$defaults['transparent-header-social-icons-color']      = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);
	$defaults['transparent-header-social-icons-h-color']    = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);
	$defaults['transparent-header-social-icons-bg-color']   = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);
	$defaults['transparent-header-social-icons-bg-h-color'] = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);

	$defaults['transparent-header-html-text-color']   = '';
	$defaults['transparent-header-html-link-color']   = '';
	$defaults['transparent-header-html-link-h-color'] = '';

	$defaults['transparent-header-widget-title-color']   = '';
	$defaults['transparent-header-widget-content-color'] = '';
	$defaults['transparent-header-widget-link-color']    = '';
	$defaults['transparent-header-widget-link-h-color']  = '';

	$defaults['transparent-header-button-text-color']   = '';
	$defaults['transparent-header-button-text-h-color'] = '';
	$defaults['transparent-header-button-bg-color']     = '';
	$defaults['transparent-header-button-bg-h-color']   = '';

	/**
	 * Off-Canvas defaults.
	 */
	$defaults['off-canvas-layout']                 = 'side-panel';
	$defaults['off-canvas-slide']                  = 'right';
	$defaults['header-builder-menu-toggle-target'] = 'icon';
	$defaults['off-canvas-background']             = array(
		'background-color'      => '#ffffff',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'auto',
		'background-attachment' => 'scroll',
	);
	$defaults['off-canvas-close-color']            = '#3a3a3a';
	$defaults['mobile-header-type']                = 'off-canvas';

	$defaults['footer-menu-layout'] = 'horizontal';

	$defaults['footer-menu-bg-obj-responsive'] = array(
		'desktop' => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'tablet'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
		'mobile'  => array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		),
	);

	$defaults['footer-menu-color-responsive'] = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);

	$defaults['footer-menu-h-bg-color-responsive'] = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);

	$defaults['footer-menu-h-color-responsive'] = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);

	$defaults['footer-menu-a-bg-color-responsive'] = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);

	$defaults['footer-menu-a-color-responsive'] = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);

	$defaults['footer-menu-font-size']      = array(
		'desktop'      => '',
		'tablet'       => '',
		'mobile'       => '',
		'desktop-unit' => 'px',
		'tablet-unit'  => 'px',
		'mobile-unit'  => 'px',
	);
	$defaults['footer-menu-font-weight']    = 'inherit';
	$defaults['footer-menu-font-family']    = 'inherit';
	$defaults['footer-menu-text-transform'] = '';
	$defaults['footer-menu-line-height']    = '';

	$defaults['footer-main-menu-spacing'] = array(
		'desktop'      => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'tablet'       => array(
			'top'    => '0',
			'right'  => '20',
			'bottom' => '0',
			'left'   => '20',
		),
		'mobile'       => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'desktop-unit' => 'px',
		'tablet-unit'  => 'px',
		'mobile-unit'  => 'px',
	);

	// Mobile Trigger defaults.

	$defaults['mobile-header-toggle-btn-color']       = '#0274be';
	$defaults['mobile-header-toggle-btn-bg-color']    = '#eeeeee';
	$defaults['header-trigger-icon']                  = 'menu';
	$defaults['mobile-header-toggle-icon-size']       = 20;
	$defaults['mobile-header-toggle-btn-style']       = 'minimal';
	$defaults['mobile-header-toggle-btn-border-size'] = array(
		'top'    => 1,
		'right'  => 1,
		'bottom' => 1,
		'left'   => 1,
	);
	$defaults['mobile-header-toggle-border-color']    = '#eeeeee';
	$defaults['mobile-header-toggle-border-radius']   = 2;

	// HTML Footer defaults.
	for ( $index = 1; $index <= Astra_Builder_Helper::$num_of_footer_html; $index++ ) {

		$defaults[ 'footer-html-' . $index ] = __( 'Insert HTML text here.', 'astra' );

		$defaults[ 'font-size-section-fb-html-' . $index ] = array(
			'desktop'      => 15,
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);

		$defaults[ 'footer-html-' . $index . '-alignment' ] = array(
			'desktop' => 'center',
			'tablet'  => 'center',
			'mobile'  => 'center',
		);

		$defaults[ 'font-size-section-fb-html-' . $index ]      = array(
			'desktop'      => '',
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);
		$defaults[ 'font-weight-section-fb-html-' . $index ]    = 'inherit';
		$defaults[ 'font-family-section-fb-html-' . $index ]    = 'inherit';
		$defaults[ 'text-transform-section-fb-html-' . $index ] = '';
		$defaults[ 'line-height-section-fb-html-' . $index ]    = '';
	}

	// Widget Header defaults.
	for ( $index = 1; $index <= Astra_Builder_Helper::$num_of_header_widgets; $index++ ) {
		
		/**
		 * Title Typography.
		 */
		$defaults[ 'header-widget-' . $index . '-font-family' ]    = 'inherit';
		$defaults[ 'header-widget-' . $index . '-font-weight' ]    = 'inherit';
		$defaults[ 'header-widget-' . $index . '-text-transform' ] = '';
		$defaults[ 'header-widget-' . $index . '-line-height' ]    = '';
		$defaults[ 'header-widget-' . $index . '-font-size' ]      = array(
			'desktop'      => '',
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);

		/**
		 * Content Typography.
		 */
		$defaults[ 'header-widget-' . $index . '-content-font-family' ]    = 'inherit';
		$defaults[ 'header-widget-' . $index . '-content-font-weight' ]    = 'inherit';
		$defaults[ 'header-widget-' . $index . '-content-text-transform' ] = '';
		$defaults[ 'header-widget-' . $index . '-content-line-height' ]    = '';
		$defaults[ 'header-widget-' . $index . '-content-font-size' ]      = array(
			'desktop'      => '',
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);
	}

	// Widget Footer defaults.
	for ( $index = 1; $index <= Astra_Builder_Helper::$num_of_footer_widgets; $index++ ) {
		$defaults[ 'footer-widget-alignment-' . $index ] = array(
			'desktop' => 'left',
			'tablet'  => 'center',
			'mobile'  => 'center',
		);
		
		/**
		 * Title Typography.
		 */
		$defaults[ 'footer-widget-' . $index . '-font-family' ]    = 'inherit';
		$defaults[ 'footer-widget-' . $index . '-font-weight' ]    = 'inherit';
		$defaults[ 'footer-widget-' . $index . '-text-transform' ] = '';
		$defaults[ 'footer-widget-' . $index . '-line-height' ]    = '';
		$defaults[ 'footer-widget-' . $index . '-font-size' ]      = array(
			'desktop'      => '',
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);

		/**
		 * Content Typography.
		 */
		$defaults[ 'footer-widget-' . $index . '-content-font-family' ]    = 'inherit';
		$defaults[ 'footer-widget-' . $index . '-content-font-weight' ]    = 'inherit';
		$defaults[ 'footer-widget-' . $index . '-content-text-transform' ] = '';
		$defaults[ 'footer-widget-' . $index . '-content-line-height' ]    = '';
		$defaults[ 'footer-widget-' . $index . '-content-font-size' ]      = array(
			'desktop'      => '',
			'tablet'       => '',
			'mobile'       => '',
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);
	}

	/**
	 * Mobile trigger - Label Typography.
	 */
	$defaults['mobile-header-label-font-family']    = 'inherit';
	$defaults['mobile-header-label-font-weight']    = 'inherit';
	$defaults['mobile-header-label-text-transform'] = '';
	$defaults['mobile-header-label-line-height']    = '';
	$defaults['mobile-header-label-font-size']      = '';

	return $defaults;
}
