<?php
function page28_register_assets()
{

    // Déclarer jQuery
    wp_enqueue_script('jquery');

    // Déclarer le JS
    wp_enqueue_script(
        'header',
        get_template_directory_uri() . '/assets/header.js',
        array('jquery'),
        '1.0',
        true
    );



    // Déclarer le fichier CSS à un autre emplacement
    wp_enqueue_style(
        'style',
        get_template_directory_uri() . '/style.css',
        array(),
        '1.0'
    );
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
        'footer',
        get_template_directory_uri() . '/assets/footer.css',
        array(),
        '1.0'
    );
    wp_enqueue_style(
        'front-page',
        get_template_directory_uri() . '/assets/front-page.css',
        array(),
        '1.0'
    );
    wp_enqueue_style(
        'post',
        get_template_directory_uri() . '/assets/post.css',
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'page28_register_assets');
