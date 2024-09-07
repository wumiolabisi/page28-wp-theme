<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class('p28-bg-light'); ?> onscroll="stickyNav()">


    <nav class="p28-navbar p28-navbar-top display-from-md" id="p28_nav_sticky">
        <ul>
            <li>
                <a href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-page-28.png" alt="Logo Page 28" class="width-40">
                </a>
            </li>
            <li class="p28-navbar-item">
                <a href="<?php echo home_url('/'); ?>">ACCUEIL</a>
            </li>
            <li class="p28-navbar-item">
                <a href="<?php echo get_post_type_archive_link('oeuvre'); ?>">FILMS & SÉRIES</a>
            </li>
            <li class="p28-navbar-item">
                <a href="<?php echo get_permalink(get_page_by_path('realisation')); ?>">RÉALISATRICES</a>
            </li>
            <li><?php echo do_shortcode('[get_random_oeuvre]'); ?></li>
        </ul>
    </nav>

    <nav class="p28-navbar p28-navbar-bottom p28-bg-light display-until-md">
        <ul>
            <li class="p28-text-center">
                <a href="<?php echo home_url('/'); ?>" alt="Aller à la page d'accueil" title="Aller à la page d'accueil">
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/home.png" alt="Icône en forme de maison" class="width-7vw">
                    </div>
                    <span class="p28-small-text">Accueil</span>
                </a>
            </li>
            <li class="p28-text-center">
                <a href="<?php echo get_post_type_archive_link('oeuvre'); ?>" alt="Aller au catalogue" title="Aller au catalogue">
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/search.png" alt="Icône qui représente une loupe" class="width-7vw">
                    </div>
                    <span class="p28-small-text">Recherche</span>
                </a>
            </li>

            <li class="p28-text-center">
                <a href="<?php echo get_permalink(get_page_by_path('a-propos')); ?>" alt="A propos de Page 28" title="A propos de Page 28">
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/info.png" alt="Icône d'information" class="width-7vw">
                    </div>
                    <span class="p28-small-text">A propos</span>
                </a>
            </li>
        </ul>
    </nav>

    <?php wp_body_open(); ?>