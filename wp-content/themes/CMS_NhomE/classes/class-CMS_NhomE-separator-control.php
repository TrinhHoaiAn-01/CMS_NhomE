<?php
/**
 * Customizer Separator Control settings for this theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since CMS_NhomE 1.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	if ( ! class_exists( 'CMS_NhomE_Separator_Control' ) ) {
		/**
		 * Separator Control.
		 *
		 * @since CMS_NhomE 1.0
		 */
		class CMS_NhomE_Separator_Control extends WP_Customize_Control {
			/**
			 * Renders the hr.
			 *
			 * @since CMS_NhomE 1.0
			 */
			public function render_content() {
				echo '<hr/>';
			}
		}
	}
}
