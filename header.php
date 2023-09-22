<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php ?>
    <nav class="p28-navbar">
        <ul>
            <li class="">
                <ol class="p28-menu-icon"><svg fill="none" class="p28-34-34 p28-fill-cbbdff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 4H8V8H4V4Z" />
                        <path d="M4 10H8V14H4V10Z" />
                        <path d="M8 16H4V20H8V16Z" />
                        <path d="M10 4H14V8H10V4Z" />
                        <path d="M14 10H10V14H14V10Z" />
                        <path d="M10 16H14V20H10V16Z" />
                        <path d="M20 4H16V8H20V4Z" />
                        <path d="M16 10H20V14H16V10Z" />
                        <path d="M20 16H16V20H20V16Z" />

                    </svg>
                </ol>
                <ol>PAGE 1</ol>
                <ol>PAGE 2</ol>
                <ol>PAGE 3</ol>
                <ol>PAGE 4</ol>
            </li>
            <li>FILMS FEEL GOOD</li>
            <li>BOOM BOOM PAN PAN</li>
            <li>A PROPOS</li>
            <li><a class="p28-btn p28-btn-secondary">APPEL A PROJET</a></li>
            <li> <a href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-page-28.png" alt="Logo Page 28" class="p28-logo">
                </a></li>
        </ul>
    </nav>
    <?php wp_body_open(); ?>