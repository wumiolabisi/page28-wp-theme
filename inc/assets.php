<?php

function page28_register_assets()
{
    // Déclarer jQuery
    wp_enqueue_script('jquery');

    // Déclarer le JS
    wp_enqueue_script(
        'app',
        get_template_directory_uri() . '/dist/js/app.js',
        array('jquery'),
        '1.0',
        true

    );

    wp_enqueue_script(
        'ajax',
        get_template_directory_uri() . '/dist/js/ajax.js',
        array('jquery'),
        '1.0',
        true
    );

    // Déclarer le fichier CSS à un autre emplacement
    wp_enqueue_style(
        'style',
        get_template_directory_uri() . '/dist/css/style.css',
        array(),
        '1.0'
    );
}

add_action('wp_enqueue_scripts', 'page28_register_assets');



function p28_login_logo()
{
    wp_enqueue_style(
        'custom-login',
        get_template_directory_uri() . '/dist/css/custom-login.css',
        array('login')
    );
}

add_action('login_enqueue_scripts', 'p28_login_logo');
