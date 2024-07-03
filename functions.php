<?php



// Prise en charge des images mises en avant

add_theme_support('post-thumbnails');



// Ajouter automatiquement le titre du site dans l'en-tête du site

add_theme_support('title-tag');

add_theme_support('menus');



// Déclaration des styles et animations

require_once get_template_directory() . '/inc/assets.php';

// Déclaration des CPT

require_once get_template_directory() . '/inc/post-types.php';

include get_template_directory() . '/inc/search-engine.php';

//Enlever le switcher de langage sur la page de login

add_filter('login_display_language_dropdown', '__return_false');

// Modifier Wp_Query post type pour la pagination des oeuvres

add_action('pre_get_posts', 'post_type_oeuvre', 1, 1);
function post_type_oeuvre($query)
{
    if (!is_admin() && is_post_type_archive('oeuvre') && $query->is_main_query()) {
        $query->set('posts_per_page', 8);
    }
}
