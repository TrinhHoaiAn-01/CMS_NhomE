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
        <?php if ( has_custom_logo() ) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <a class="navbar-brand font-weight-bold" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
            </a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Mở menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a></li>
                <li class="nav-item">
                    <form class="form-inline" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <label class="sr-only" for="module-header-search">Tìm kiếm</label>
                        <input id="module-header-search" class="form-control form-control-sm custom-search-input" type="search" name="s" value="<?php echo esc_attr( get_search_query( false ) ); ?>" placeholder="Tìm kiếm" required>
                        <button class="btn btn-sm custom-search-btn" type="submit">Tìm</button>
                    </form>
                </li>
            </ul>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'navbar-nav cms-module-menu',
                'fallback_cb'    => false,
                'depth'          => 1,
            ) );
            ?>
            <ul class="navbar-nav ml-lg-auto align-items-lg-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="accountMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-regular fa-circle-user" aria-hidden="true"></i> Tài khoản
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountMenu">
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
