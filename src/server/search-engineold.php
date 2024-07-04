<?php

add_action('wp_ajax_p28_load_moreold', 'p28_load_moreold');
add_action('wp_ajax_nopriv_p28_load_moreold', 'p28_load_moreold');

function p28_load_moreold()
{
    $params = json_decode(stripslashes($_REQUEST['query']), true);
    $params['paged'] = intval($_REQUEST['page']) + 1;
    $params['post_status'] = 'publish';
    $params['tax_query'] = [];
    $params['relation'] = 'AND';

    if (isset($params['format'])) {

        $array_format = array(
            'taxonomy' => 'format',
            'field'    => 'slug',
            'terms'    => $params['format']
        );
        $params['tax_query'][] = $array_format;
    }

    $query_posts = new WP_Query($params);

    $p28_posts_html2 = '';

    if ($query_posts->have_posts()) :

        ob_start();

        while ($query_posts->have_posts()) : $query_posts->the_post();
            get_template_part('template-parts/gallery', get_post_format());
        endwhile;

        $p28_posts_html2 .= ob_get_clean();


    endif;


    echo json_encode(array(
        'success' => true,
        'posts' => json_encode($query_posts->query_vars),
        'found_posts' => $query_posts->found_posts,
        'posts_count' => $query_posts->post_count,
        'content' => $p28_posts_html2
    ));

    die();
}


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
    if (!isset($_POST['format']) || !isset($_POST['genre']) || !isset($_POST['tag'])) {
        wp_send_json_error("Il manque des paramètres.", 400);
    }


    // Récupération des données du formulaire

    $format = sanitize_text_field($_POST['format']);
    /* $realisation = sanitize_text_field($_POST['realisation']);
    $production = sanitize_text_field($_POST['production']);
    $scenario = sanitize_text_field($_POST['scenario']);*/
    $genre = sanitize_text_field($_POST['genre']);
    $tag = sanitize_text_field($_POST['tag']);
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



    if (isset($tag) && $tag != 'null') :

        $array_tag = array(
            'taxonomy' => 'tag',
            'field'    => 'slug',
            'terms'    => $tag
        );

        array_push($args_tax_query, $array_tag);

    endif;

    $args = array(

        'post_type' => $posttype,
        'relation' => 'AND',
        'tax_query' => [],

    );

    $args['tax_query'] = $args_tax_query;


    $args['posts_per_page'] = 8;


    // Requête puis mise en forme des posts
    // $p28_posts = get_posts($args);

    $p28_posts = new WP_Query($args);
    $p28_posts_html = '';

    if ($p28_posts->have_posts()) :

        ob_start();

        while ($p28_posts->have_posts()) : $p28_posts->the_post();
            get_template_part('template-parts/gallery', get_post_format());
        endwhile;

        $p28_posts_html .= ob_get_clean();


    endif;


    echo json_encode(array(
        'success' => true,
        'posts' => json_encode($p28_posts->query_vars),
        'maxpages' => $p28_posts->max_num_pages,
        'found_posts' => $p28_posts->found_posts,
        'posts_count' => $p28_posts->post_count,
        'content' => $p28_posts_html
    ));

    die();
}
