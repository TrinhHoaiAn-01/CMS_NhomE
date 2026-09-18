<?php
/**
 * CMS_NhomE SVG Icon helper functions
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since CMS_NhomE 1.0
 */

if ( ! function_exists( 'CMS_NhomE_the_theme_svg' ) ) {
	/**
	 * Outputs the SVG markup for an icon in the CMS_NhomE_SVG_Icons class.
	 *
	 * @since CMS_NhomE 1.0
	 *
	 * @param string $svg_name The name of the icon.
	 * @param string $group    The group the icon belongs to.
	 * @param string $color    Color code.
	 */
	function CMS_NhomE_the_theme_svg( $svg_name, $group = 'ui', $color = '' ) {
		echo CMS_NhomE_get_theme_svg( $svg_name, $group, $color );
	}
}

if ( ! function_exists( 'CMS_NhomE_get_theme_svg' ) ) {

	/**
	 * Gets information about the SVG icon.
	 *
	 * @since CMS_NhomE 1.0
	 *
	 * @param string $svg_name The name of the icon.
	 * @param string $group    The group the icon belongs to.
	 * @param string $color    Color code.
	 */
	function CMS_NhomE_get_theme_svg( $svg_name, $group = 'ui', $color = '' ) {

		// Make sure that only our allowed tags and attributes are included.
		$svg = wp_kses(
			CMS_NhomE_SVG_Icons::get_svg( $svg_name, $group, $color ),
			array(
				'svg'     => array(
					'class'       => true,
					'xmlns'       => true,
					'width'       => true,
					'height'      => true,
					'viewbox'     => true,
					'aria-hidden' => true,
					'role'        => true,
					'focusable'   => true,
				),
				'path'    => array(
					'fill'      => true,
					'fill-rule' => true,
					'd'         => true,
					'transform' => true,
				),
				'polygon' => array(
					'fill'      => true,
					'fill-rule' => true,
					'points'    => true,
					'transform' => true,
					'focusable' => true,
				),
			)
		);

		if ( ! $svg ) {
			return false;
		}
		return $svg;
	}
}
