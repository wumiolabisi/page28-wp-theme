<?php

add_action('wp_ajax_p28_load_more', 'p28_load_more');
add_action('wp_ajax_nopriv_p28_load_more', 'p28_load_more');

function p28_load_more()
{
    $params = json_decode(stripslashes($_REQUEST['query']), true);
    $params['paged'] = intval($_REQUEST['current_page']) + 1;
    $params['post_status'] = 'publish';
    query_posts($params);


    if (have_posts()) :

        while (have_posts()) : the_post();
            get_template_part('template-parts/gallery', get_post_format());
        endwhile;

    endif;
    die();
}
