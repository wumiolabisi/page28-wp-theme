<?php
function p28_register_post_types()
{
    // CPT Fiche oeuvre
    $labels = array(
        'name' => 'Fiche Œuvre',
        'all_items' => 'Toutes les œuvres',  // affiché dans le sous menu
        'singular_name' => 'Œuvre',
        'add_new_item' => 'Ajouter une œuvre',
        'edit_item' => 'Modifier l&apos;œuvre',
        'menu_name' => 'Œuvres'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
        'menu_position' => 3,
        'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode("<svg height='24' viewBox='0 0 24 24' fill='#cbbdff' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm.001 6c-.001 0-.001 0 0 0h-.465l-2.667-4H20l.001 4zM15.5 15 10 18v-6l5.5 3zm-.964-6-2.667-4h2.596l2.667 4h-2.596zm-2.404 0H9.536L6.869 5h2.596l2.667 4zM4 5h.465l2.667 4H4V5z'/></svg>"),
    );

    register_post_type('oeuvre', $args);

    //Déclaration de la taxonomie : film ou série
    $labels = array(
        'name' => 'Type œuvre',
        'new_item_name' => 'Nom du nouveau Type',
        'parent_item' => 'Type œuvre parent',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
    );

    register_taxonomy('type-oeuvre', 'oeuvre', $args);
}
add_action('init', 'p28_register_post_types');
