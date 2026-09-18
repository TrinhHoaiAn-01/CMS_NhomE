/**
 * Remove squared button style
 *
 * @since CMS_NhomE 1.0
 */
/* global wp */
wp.domReady( function() {
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );
} );
