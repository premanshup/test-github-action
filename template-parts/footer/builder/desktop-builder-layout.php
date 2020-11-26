<?php
/**
 * Template part for displaying the footer info.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

?>

<footer
<?php
echo astra_attr(
	'footer',
	array(
		'id'    => 'colophon',
		'class' => 'ast-site-footer ' . join(
			' ',
			astra_get_footer_classes()
		),
	)
);
?>
>
	<div class="ast-main-footer-wrap">
		<?php
		/**
		 * Astra Top footer
		 */
		do_action( 'astra_above_footer' );
		/**
		 * Astra Middle footer
		 */
		do_action( 'astra_primary_footer' );
		/**
		 * Astra Bottom footer
		 */
		do_action( 'astra_below_footer' );
		?>
	</div>
</footer><!-- #colophon -->

