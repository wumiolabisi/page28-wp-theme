<?php

add_action('wp_ajax_p28_search_oeuvre', 'p28_search_oeuvre');
add_action('wp_ajax_nopriv_p28_search_oeuvre', 'p28_search_oeuvre');

function p28_search_oeuvre()
{

    // Vérification de sécurité
    if (
        !isset($_REQUEST['nonce']) or
        !wp_verify_nonce($_REQUEST['nonce'], 'p28_search_oeuvre')
    ) {
        wp_send_json_error("Vous n’avez pas l’autorisation d’effectuer cette action.", 403);
    }

    // On vérifie que l'identifiant a bien été envoyé
    if (!isset($_POST['format']) || !isset($_POST['genre'])) {
        wp_send_json_error("Il manque des paramètres.", 400);
    }

    // Récupération des données du formulaire
    $format = sanitize_text_field($_POST['format']);
    /* $realisation = sanitize_text_field($_POST['realisation']);
    $production = sanitize_text_field($_POST['production']);
    $scenario = sanitize_text_field($_POST['scenario']);*/
    $genre = sanitize_text_field($_POST['genre']);
    $posttype = sanitize_text_field($_POST['posttype']);



    $args_tax_query = [];

    if (isset($format) && $format != 'null' && $format != 'undefined') :
        $array_format = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $format
        );
        array_push($args_tax_query, $array_format);
    endif;

    if (isset($genre) && $genre != 'null') :
        $array_genre = array(
            'taxonomy' => 'genre',
            'field'    => 'slug',
            'terms'    => $genre
        );
        array_push($args_tax_query, $array_genre);
    endif;


    $args = array(
        'post_type' => $posttype,
        'relation' => 'AND',
        'tax_query' => [],
    );
    $args['tax_query'] = $args_tax_query;


    // Requête puis mise en forme des posts
    // $p28_posts = get_posts($args);

    $p28_posts = new WP_Query($args);
    $p28_posts_html = '';

    if ($p28_posts->have_posts()) :

        $p28_posts_html = '<div class="p28-block p28-txtcenter"><h3 class="p28-smalltxt">Il y a ' . $p28_posts->post_count . ' publications(s) trouvée(s).</h3></div>';
        ob_start();
        while ($p28_posts->have_posts()) : $p28_posts->the_post();
            get_template_part('template-parts/catalogue');
        endwhile;
        $p28_posts_html .= ob_get_clean();
    else : $p28_posts_html = '<p>Aucun résultat.</p>';
    endif;

    // Envoyer les données au navigateur

    wp_send_json_success($p28_posts_html);
}
