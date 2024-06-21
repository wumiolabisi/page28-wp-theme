<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class('p28-bg-light'); ?> onscroll="stickyNav()">


    <nav class="p28-navbar" id="p28_nav_sticky">
        <ul>
            <li>
                <a href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-page-28.png" alt="Logo Page 28" class="width-50">
                </a>
            </li>
            <li class="p28-navbar-item">
                <a href="<?php echo home_url('/'); ?>">ACCUEIL</a>
            </li>
            <li class="p28-navbar-item">
                <a href="<?php echo get_post_type_archive_link('oeuvre'); ?>">FILMS & SÉRIES</a>
            </li>
            <li class="p28-navbar-item">
                <a href="<?php echo get_post_type_archive_link('realisation'); ?>">RÉALISATRICES</a>
            </li>
        </ul>
    </nav>

    <?php wp_body_open(); ?>