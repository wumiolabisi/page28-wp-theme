<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class('p28-bg-fceeca'); ?> onscroll="stickyNav()">

    <nav class="p28-navbar" id="p28_nav_sticky">
        <ul class="p28-navbar-items">
            <li class="p28-navbar-item">
                <span id="p28-clicksvg" class="p28-svginteract" onclick="overlay()">


                    <svg id="p28-menu-icon" class="p28-50 p28-fill-15071d" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 4H8V8H4V4Z" />
                        <path d="M4 10H8V14H4V10Z" />
                        <path d="M8 16H4V20H8V16Z" />
                        <path d="M10 4H14V8H10V4Z" />
                        <path d="M14 10H10V14H14V10Z" />
                        <path d="M10 16H14V20H10V16Z" />
                        <path d="M20 4H16V8H20V4Z" />
                        <path d="M16 10H20V14H16V10Z" />
                        <path d="M20 16H16V20H20V16Z" />

                    </svg></span>

                <div id="p28-sidemenu">
                    <p class="p28-smalltxt">Vous recherchez ...</p>

                    <?php wp_nav_menu(array(
                        'menu'         => 'format_menu',
                        'menu_class'   => 'p28-sideheader-menu'
                    ));
                    ?>
                    <p class="p28-smalltxt">Trouver par genre</p>

                    <?php wp_nav_menu(array(
                        'menu'         => 'header_menu',
                        'menu_class'   => 'p28-sideheader-menu'
                    ));
                    ?>


                </div>
            </li>
            <li class="p28-navbar-item p28-disappearmobile"><a href="<?php echo get_post_type_archive_link('oeuvre'); ?>" class="p28-navlink p28-link">CONSULTER LE CATALOGUE</a></li>
            <li class="p28-navbar-item p28-logo-item"><a href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-page-28.png" alt="Logo Page 28" class="p28-50">
                </a></li>
            <!--<li class="p28-navbar-item p28-navlink p28-link p28-disappearmobile"><a href="<?php echo esc_url(wp_login_url(get_permalink())); ?>" title="Connectez-vous ou inscrivez-vous" alt="Connectez-vous ou inscrivez-vous">CONNEXION</a></li>
                -->
            <li class="p28-navbar-item p28-navlink p28-link"><a href="<?php echo get_permalink(get_page_by_path('a-propos')); ?>">A PROPOS</a></li>
            <!--<li class="p28-navbar-item"><a class="p28-btn p28-btn-secondary">APPEL A PROJET</a></li>
                -->
        </ul>
    </nav>
    <div id="overlay" class=""></div>
    <?php wp_body_open(); ?>