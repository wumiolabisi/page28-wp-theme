<?php

function p28_register_post_types()

{

    /**

     * Déclaration du CPT Fiche OEUVRE

     * Déclaration de la taxonomie associée TYPE OEUVRE

     * 

     */

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

        'name' => 'Format œuvre',

        'new_item_name' => 'Nom du nouveau format',

        'parent_item' => 'Format parent',

        'update_item' => 'Mettre à jour le format',

        'add_new_item' => 'Ajouter un format',

        'edit_item' => 'Modifier le format',

        'back_to_items' => 'Retour aux formats',

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'show_in_menu'  => true,

        'show_in_nav_menus' => true,

        'show_in_rest' => true,

        'hierarchical' => false,

        'show_admin_column' => true

    );



    register_taxonomy('format', 'oeuvre', $args);



    //Déclaration de la taxonomie : réalisation

    $labels = array(

        'name' => 'Réalisation',

        'new_item_name' => 'Réalisateurice',

        'parent_item' => 'Type réalisateurice parent',

        'update_item' => 'Mettre à jour',

        'add_new_item' => 'Ajouter une réalisateurice',

        'edit_item' => 'Modifier la réalisateurice',

        'back_to_items' => 'Retour aux réalisateurices',

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'show_in_rest' => true,

        'hierarchical' => false,

        'has_archive' => true

    );



    register_taxonomy('realisation', 'oeuvre', $args);



    //Déclaration de la taxonomie : production

    $labels = array(

        'name' => 'Production',

        'new_item_name' => 'Producteurices',

        'update_item' => 'Mettre à jour',

        'add_new_item' => 'Ajouter une producteurice',

        'edit_item' => 'Modifier la producteurice',

        'back_to_items' => 'Retour aux producteurice',

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'show_in_rest' => true,

        'hierarchical' => false,

    );



    register_taxonomy('production', 'oeuvre', $args);



    //Déclaration de la taxonomie : scénaristes

    $labels = array(

        'name' => 'Scénario',

        'new_item_name' => 'Scénaristes',

        'update_item' => 'Mettre à jour',

        'add_new_item' => 'Ajouter une scénariste',

        'edit_item' => 'Modifier la scénariste',

        'back_to_items' => 'Retour aux scénaristes',

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'show_in_rest' => true,

        'hierarchical' => false,

    );



    register_taxonomy('scenario', 'oeuvre', $args);

    //Déclaration de la taxonomie : genre

    $labels = array(

        'name' => 'Genre',

        'new_item_name' => 'Genre',

        'update_item' => 'Mettre à jour',

        'add_new_item' => 'Ajouter un genre',

        'edit_item' => 'Modifier le genre',

        'back_to_items' => 'Retour aux genres',

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'show_in_rest' => true,

        'hierarchical' => false,

        'show_admin_column' => true

    );



    register_taxonomy('genre', 'oeuvre', $args);

    //Déclaration de la taxonomie : tag

    $labels = array(

        'name' => 'Étiquette',

        'new_item_name' => 'Étiquettes',

        'update_item' => 'Mettre à jour',

        'add_new_item' => 'Ajouter une étiquette',

        'edit_item' => 'Modifier cette étiquette ',

        'back_to_items' => 'Retour aux étiquettes',

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'show_in_rest' => true,

        'hierarchical' => false,

        'show_admin_column' => true,


    );



    register_taxonomy('tag', 'oeuvre', $args);
}

add_action('init', 'p28_register_post_types');
