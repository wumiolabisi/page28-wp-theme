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
