<?php
/**
 * The template for displaying the site footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$footer_columns = array(
	array(
		__( 'Home', 'twentytwenty' )        => home_url( '/' ),
		__( 'About', 'twentytwenty' )       => home_url( '/about/' ),
		__( 'FAQ', 'twentytwenty' )         => home_url( '/faq/' ),
		__( 'Get Started', 'twentytwenty' ) => home_url( '/get-started/' ),
		__( 'Videos', 'twentytwenty' )      => home_url( '/videos/' ),
	),
	array(
		__( 'Home', 'twentytwenty' )        => home_url( '/' ),
		__( 'About', 'twentytwenty' )       => home_url( '/about/' ),
		__( 'FAQ', 'twentytwenty' )         => home_url( '/faq/' ),
		__( 'Get Started', 'twentytwenty' ) => home_url( '/get-started/' ),
		__( 'Videos', 'twentytwenty' )      => home_url( '/videos/' ),
	),
	array(
		__( 'Home', 'twentytwenty' )        => home_url( '/' ),
		__( 'About', 'twentytwenty' )       => home_url( '/about/' ),
		__( 'FAQ', 'twentytwenty' )         => home_url( '/faq/' ),
		__( 'Get Started', 'twentytwenty' ) => home_url( '/get-started/' ),
		__( 'Imprint', 'twentytwenty' )     => home_url( '/imprint/' ),
	),
);

$footer_socials = array(
	array(
		'label' => 'Facebook',
		'icon'  => 'fa-brands fa-facebook-f',
	),
	array(
		'label' => 'Twitter',
		'icon'  => 'fa-brands fa-twitter',
	),
	array(
		'label' => 'Instagram',
		'icon'  => 'fa-brands fa-instagram',
	),
	array(
		'label' => 'Google Plus',
		'icon'  => 'fa-brands fa-google-plus-g',
	),
	array(
		'label' => 'Email',
		'icon'  => 'fa-solid fa-envelope',
	),
);
?>
			<footer id="site-footer" class="cms-site-footer header-footer-group">
				<div class="cms-footer-inner">
					<div class="cms-footer-columns">
						<?php foreach ( $footer_columns as $footer_column ) : ?>
							<nav class="cms-footer-column" aria-label="<?php esc_attr_e( 'Quick links', 'twentytwenty' ); ?>">
								<h2 class="cms-footer-column-title"><?php esc_html_e( 'Quick links', 'twentytwenty' ); ?></h2>
								<ul class="cms-footer-links">
									<?php foreach ( $footer_column as $link_label => $link_url ) : ?>
										<li><a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_label ); ?></a></li>
									<?php endforeach; ?>
								</ul>
							</nav>
						<?php endforeach; ?>
					</div>

					<nav class="cms-footer-socials" aria-label="<?php esc_attr_e( 'Social media', 'twentytwenty' ); ?>">
						<?php foreach ( $footer_socials as $footer_social ) : ?>
							<a href="#" aria-label="<?php echo esc_attr( $footer_social['label'] ); ?>">
								<i class="<?php echo esc_attr( $footer_social['icon'] ); ?>" aria-hidden="true"></i>
							</a>
						<?php endforeach; ?>
					</nav>

					<div class="cms-footer-legal">
						<p>
							<a href="#">National Transaction Corporation</a> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]
						</p>
						<p>&copy; <?php esc_html_e( 'All right Reserved. Sunlimetech', 'twentytwenty' ); ?></p>
					</div>
				</div>
			</footer>

		<?php wp_footer(); ?>

	</body>
</html>
