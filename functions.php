<?php

// Prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

function page28_register_assets()
{

    // Déclarer jQuery
    wp_enqueue_script('jquery');




    // Déclarer le fichier CSS à un autre emplacement
    wp_enqueue_style(
        'general',
        get_template_directory_uri() . '/assets/general.css',
        array(),
        '1.0'
    );
    wp_enqueue_style(
        'header',
        get_template_directory_uri() . '/assets/header.css',
        array(),
        '1.0'
    );
    wp_enqueue_style(
        'images',
        get_template_directory_uri() . '/assets/images.css',
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'page28_register_assets');
