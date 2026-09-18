<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$enable_header_search = get_theme_mod( 'enable_header_search', true );
$default_category_id  = (int) get_option( 'default_category' );
$header_categories    = get_categories(
	array(
		'taxonomy'   => 'category',
		'hide_empty' => false,
		'orderby'    => 'term_id',
		'order'      => 'ASC',
		'exclude'    => $default_category_id,
		'number'     => 3,
	)
);
?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<header id="site-header" class="header-footer-group">
		<div class="header-inner section-inner">
			<div class="header-titles-wrapper">
				<div class="header-titles">
					<?php twentytwenty_site_logo(); ?>
				</div>
			</div>

			<a class="cms-home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Home', 'twentytwenty' ); ?>
			</a>

			<?php get_search_form( array( 'aria_label' => __( 'Search this website', 'twentytwenty' ) ) ); ?>

			<?php if ( ! empty( $header_categories ) ) : ?>
				<nav class="cms-category-nav" aria-label="<?php esc_attr_e( 'Categories', 'twentytwenty' ); ?>">
					<?php foreach ( $header_categories as $header_category ) : ?>
						<a href="<?php echo esc_url( get_category_link( $header_category->term_id ) ); ?>">
							<?php echo esc_html( $header_category->name ); ?>
						</a>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>

			<div class="cms-header-actions hide-no-js">
				<button class="toggle nav-toggle desktop-nav-toggle cms-action-button" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" data-set-focus=".close-nav-toggle" aria-expanded="false" type="button">
					<span class="cms-action-icon" aria-hidden="true"><i class="fa-solid fa-ellipsis"></i></span>
					<span class="cms-action-label"><?php esc_html_e( 'Menu', 'twentytwenty' ); ?></span>
				</button>

				<?php if ( true === $enable_header_search ) : ?>
					<button class="toggle search-toggle desktop-search-toggle cms-action-button" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false" type="button">
						<span class="cms-action-icon" aria-hidden="true"><i class="fa-solid fa-magnifying-glass"></i></span>
						<span class="cms-action-label"><?php echo esc_html_x( 'Search', 'toggle text', 'twentytwenty' ); ?></span>
					</button>
				<?php endif; ?>

				<div class="cms-account">
					<button class="cms-account-button" type="button" aria-haspopup="true">
						<span class="cms-action-icon cms-account-icon" aria-hidden="true"><i class="fa-regular fa-circle-user"></i></span>
						<span class="cms-account-label">
							<?php esc_html_e( 'Account', 'twentytwenty' ); ?>
							<i class="fa-solid fa-caret-down" aria-hidden="true"></i>
						</span>
					</button>

					<div class="cms-account-menu">
						<?php if ( is_user_logged_in() ) : ?>
							<?php $current_user = wp_get_current_user(); ?>
							<span class="cms-account-name"><?php echo esc_html( $current_user->display_name ); ?></span>
							<a href="<?php echo esc_url( admin_url( 'profile.php' ) ); ?>"><?php esc_html_e( 'Profile', 'twentytwenty' ); ?></a>
							<a href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Logout', 'twentytwenty' ); ?></a>
						<?php else : ?>
							<a href="<?php echo esc_url( wp_login_url( home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Login', 'twentytwenty' ); ?></a>
							<?php if ( get_option( 'users_can_register' ) ) : ?>
								<a href="<?php echo esc_url( wp_registration_url() ); ?>"><?php esc_html_e( 'Register', 'twentytwenty' ); ?></a>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<?php
		if ( true === $enable_header_search ) {
			get_template_part( 'template-parts/modal-search' );
		}
		?>
	</header>

	<?php get_template_part( 'template-parts/modal-menu' );
