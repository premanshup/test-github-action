<?php
/**
 * Heading Colors for Astra theme.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Astra 2.1.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'ASTRA_PRIMARY_HEADER_DIR', ASTRA_THEME_DIR . 'inc/builder/type/header/primary-header' );
define( 'ASTRA_PRIMARY_HEADER_URI', ASTRA_THEME_URI . 'inc/builder/type/header/primary-header' );

if ( ! class_exists( 'Astra_Primary_Header' ) ) {

	/**
	 * Heading Initial Setup
	 *
	 * @since 2.1.4
	 */
	class Astra_Primary_Header {

		/**
		 * Constructor function that initializes required actions and hooks
		 */
		public function __construct() {
			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require_once ASTRA_PRIMARY_HEADER_DIR . '/class-astra-primary-header-loader.php';

			// Include front end files.
			if ( ! is_admin() ) {
				require_once ASTRA_PRIMARY_HEADER_DIR . '/dynamic-css/dynamic.css.php';
				remove_filter( 'astra_dynamic_theme_css', 'astra_header_breakpoint_style' );
			}
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}
	}

	/**
	 *  Kicking this off by creating an object.
	 */
	new Astra_Primary_Header();

}
