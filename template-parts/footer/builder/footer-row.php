<?php
/**
 * Template part for displaying the a row of the footer
 *
 * @package Astra Builder
 */

if ( astra_wp_version_compare( '5.4.99', '>=' ) ) {

	$row = wp_parse_args( $args, array( 'row' => '' ) );
	$row = $row['row'];
} else {

	$row = get_query_var( 'row' );
}

if ( Astra_Builder_helper::is_footer_row_empty( $row ) ) {

	$option  = ( 'above' === $row ) ? 'hba' : ( ( 'below' === $row ) ? 'hbb' : 'hb' );
	$columns = astra_get_option( $option . '-footer-column' );
	$layout  = astra_get_option( $option . '-footer-layout' );

	$desk_layout = ( isset( $layout['desktop'] ) ) ? $layout['desktop'] : 'full';
	$tab_layout  = ( isset( $layout['tablet'] ) ) ? $layout['tablet'] : 'full';
	$mob_layout  = ( isset( $layout['mobile'] ) ) ? $layout['mobile'] : 'full';
	?>
<div class="site-<?php echo esc_attr( $row ); ?>-footer-wrap ast-builder-grid-row-container site-footer-focus-item ast-builder-grid-row-<?php echo esc_attr( $desk_layout ); ?> ast-builder-grid-row-tablet-<?php echo esc_attr( $tab_layout ); ?> ast-builder-grid-row-mobile-<?php echo esc_attr( $mob_layout ); ?>" data-section="section-<?php echo esc_attr( $row ); ?>-footer-builder">
	<div class="ast-builder-grid-row-container-inner">
		<?php
		if ( is_customize_preview() ) {
			Astra_Builder_UI_Controller::render_grid_row_customizer_edit_button( 'Footer', $row );
		}
		?>
		<div class="site-container">
			<div class="ast-builder-footer-grid-columns site-<?php echo esc_attr( $row ); ?>-footer-inner-wrap ast-builder-grid-row">
			<?php for ( $zones = 1; $zones <= Astra_Builder_Helper::$num_of_footer_columns; $zones++ ) { ?>
				<?php
				if ( $zones > $columns ) {
					break; }
				?>
				<div class="site-footer-<?php echo esc_attr( $row ); ?>-section-<?php echo esc_attr( $zones ); ?> site-footer-section site-footer-section-<?php echo esc_attr( $zones ); ?>">
					<?php do_action( 'astra_render_footer_column', $row, $zones ); ?>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>
