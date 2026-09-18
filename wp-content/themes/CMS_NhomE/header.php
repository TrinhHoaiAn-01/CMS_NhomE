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
        <a class="navbar-brand font-weight-bold" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Mở menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ</a></li>
            </ul>
        </div>
    </nav>
</header>
