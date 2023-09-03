<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <a href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo-page-28.png" alt="Logo Page 28" class="page28-img-50-50">
        </a>
    </header>
    <?php wp_body_open(); ?>