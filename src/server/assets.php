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


function p28_load_and_filter()
{

    global $wp_query;

    wp_register_script('p28_load_more_filter', get_stylesheet_directory_uri() . '/dist/js/filter.js', array('jquery'));

    wp_localize_script('p28_load_more_filter', 'p28_query_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'query' => json_encode($wp_query->query_vars),
        'found_posts' => $wp_query->found_posts,
        'posts_count' => $wp_query->post_count,
        'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
        'max_pages' => $wp_query->max_num_pages
    ));

    wp_enqueue_script('p28_load_more_filter');
}
add_action('wp_enqueue_scripts', 'p28_load_and_filter');
