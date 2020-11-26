<?php
/**
 * Template part for header component.
 *
 * @package Astra
 */

if ( astra_wp_version_compare( '5.4.99', '>=' ) ) {
	$component_slug = wp_parse_args( $args, array( 'type' => '' ) );
	$component_slug = $component_slug['type'];
} else {
	$component_slug = get_query_var( 'type' );
}

switch ( $component_slug ) {

	case 'logo':
		?>
		<div class="ast-builder-layout-element site-header-focus-item" data-section="title_tagline">
			<?php do_action( 'astra_site_identity' ); ?>
		</div>
		<?php
		break;

	case 'button-1':
		?>
		<div class="ast-builder-layout-element site-header-focus-item ast-header-button-1" data-section="section-hb-button-1">
			<?php do_action( 'astra_header_button_1' ); ?>
		</div>
		<?php
		break;

	case 'menu-1':
		?>
		<div class="ast-builder-menu-1 ast-builder-menu ast-builder-menu-1-focus-item ast-builder-layout-element site-header-focus-item" data-section="section-hb-menu-1">
			<?php do_action( 'astra_header_menu_1' ); ?>
		</div>
		<?php
		break;

	case 'menu-2':
		?>
		<div class="ast-builder-menu-2 ast-builder-menu ast-builder-menu-2-focus-item ast-builder-layout-element site-header-focus-item" data-section="section-hb-menu-2">
			<?php do_action( 'astra_header_menu_2' ); ?>
		</div>
		<?php
		break;

	case 'html-1':
		?>
		<div class="ast-builder-layout-element site-header-focus-item ast-header-html-1" data-section="section-hb-html-1">
			<?php do_action( 'astra_header_html_1' ); ?>
		</div>
		<?php
		break;

	case 'html-2':
		?>
			<div class="ast-builder-layout-element site-header-focus-item ast-header-html-2" data-section="section-hb-html-2">
				<?php do_action( 'astra_header_html_2' ); ?>
			</div>
			<?php
		break;

	case 'search':
		?>
		<div class="ast-builder-layout-element site-header-focus-item ast-header-search" data-section="section-header-search">
			<?php do_action( 'astra_header_search', $args['device'] ); ?>
		</div>
		<?php
		break;

	case 'social-icons-1':
		?>
		<div class="ast-builder-layout-element site-header-focus-item" data-section="section-hb-social-icons-1">
			<?php do_action( 'astra_header_social_1' ); ?>
		</div>
		<?php
		break;

	case 'mobile-trigger':
		?>
		<div class="ast-builder-layout-element site-header-focus-item" data-section="section-header-mobile-trigger">
			<?php do_action( 'astra_header_mobile_trigger' ); ?>
		</div>
		<?php
		break;
	default:
		do_action( 'astra_render_header_components', $component_slug );
		break;

}
?>
