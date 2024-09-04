<?php

add_action('after_setup-theme', function () {
    // Prise en charge des images mises en avant
    add_theme_support('post-thumbnails');

    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support('title-tag');
    add_theme_support('menus');
});





// Déclaration des styles et animations

require_once get_template_directory() . '/src/server/assets.php';

// Déclaration des CPT

require_once get_template_directory() . '/src/server/post-types.php';

//include get_template_directory() . '/src/server/load-more.php';
include get_template_directory() . '/src/server/filter.php';


//Enlever le switcher de langage sur la page de login

add_filter('login_display_language_dropdown', '__return_false');

// Modifier Wp_Query post type pour la pagination des oeuvres

add_action('pre_get_posts', 'post_type_oeuvre', 1, 1);
function post_type_oeuvre($query)
{
    if (is_post_type_archive('oeuvre') && $query->is_main_query()) {
        $query->set('posts_per_page', -1);
    }
}
