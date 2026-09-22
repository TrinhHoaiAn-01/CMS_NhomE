<?php
/** Module 1: site header and navigation. */
$header_categories = get_categories(
    array(
        'taxonomy'   => 'category',
        'hide_empty' => false,
        'number'     => 3,
        'orderby'    => 'name',
        'order'      => 'ASC',
    )
);

if ( is_wp_error( $header_categories ) ) {
    $header_categories = array();
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="site-header">
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar" aria-label="Điều hướng chính">
        <a class="navbar-brand font-weight-bold mr-4 text-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>">Group</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Mở menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link text-secondary px-3" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                </li>
                <li class="nav-item ml-lg-2">
                    <form class="form-inline" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <label class="sr-only" for="module-header-search">Search</label>
                        <input id="module-header-search" class="form-control form-control-sm mr-2 custom-search-input" type="search" name="s" placeholder="Search" value="<?php echo esc_attr( get_search_query( false ) ); ?>" aria-label="Search" required>
                        <button class="btn btn-sm custom-search-btn" type="submit">Submit</button>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto align-items-lg-center">
                <?php foreach ( $header_categories as $category ) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-secondary px-2" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                    </li>
                <?php endforeach; ?>

                <li class="nav-item dropdown">
                    <a class="header-icon-link dropdown-toggle" href="#" id="headerMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Menu">
                        <i class="fa-solid fa-ellipsis" aria-hidden="true"></i>
                        <small>Menu</small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow-sm" aria-labelledby="headerMenu">
                        <a class="dropdown-item" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                        <?php foreach ( $header_categories as $category ) : ?>
                            <a class="dropdown-item" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="header-icon-link" href="#module-header-search" aria-label="Search">
                        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                        <small>Search</small>
                    </a>
                </li>

                <li class="nav-item dropdown ml-lg-3">
                    <a class="nav-link dropdown-toggle text-dark d-flex align-items-center" href="#" id="accountMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-regular fa-circle-user fa-lg mr-1 text-secondary" aria-hidden="true"></i> Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow-sm" aria-labelledby="accountMenu">
                        <?php if ( is_user_logged_in() ) : ?>
                            <a class="dropdown-item" href="<?php echo esc_url( admin_url( 'profile.php' ) ); ?>">Hồ sơ cá nhân</a>
                            <a class="dropdown-item" href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>">Đăng xuất</a>
                        <?php else : ?>
                            <a class="dropdown-item" href="<?php echo esc_url( wp_login_url() ); ?>">Đăng nhập</a>
                            <?php if ( get_option( 'users_can_register' ) ) : ?>
                                <a class="dropdown-item" href="<?php echo esc_url( wp_registration_url() ); ?>">Đăng ký</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
