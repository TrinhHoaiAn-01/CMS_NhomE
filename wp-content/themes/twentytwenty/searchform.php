<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$twentytwenty_unique_id = twentytwenty_unique_id( 'search-form-' );

$twentytwenty_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
// Backward compatibility, in case a child theme template uses a `label` argument.
if ( empty( $twentytwenty_aria_label ) && ! empty( $args['label'] ) ) {
	$twentytwenty_aria_label = 'aria-label="' . esc_attr( $args['label'] ) . '"';
}
$twentytwenty_input_id = $twentytwenty_unique_id . '-field';
?>
<form
	role="search"
	method="get"
	class="cms-header-search"
	action="<?php echo esc_url( home_url( '/' ) ); ?>"
	<?php echo $twentytwenty_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
>
	<label class="screen-reader-text" for="<?php echo esc_attr( $twentytwenty_input_id ); ?>">
		<?php _e( 'Search for:', 'twentytwenty' ); ?>
	</label>

	<input
		id="<?php echo esc_attr( $twentytwenty_input_id ); ?>"
		class="cms-search-input"
		type="search"
		name="s"
		value="<?php echo esc_attr( get_search_query() ); ?>"
		placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'twentytwenty' ); ?>"
		autocomplete="off"
	>

	<button class="cms-search-submit" type="submit">
		<?php esc_html_e( 'Submit', 'twentytwenty' ); ?>
	</button>
</form>
