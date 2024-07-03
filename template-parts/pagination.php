<div class="p28-pagination">
    <?php
    /*the_posts_pagination(array(
        'prev_text' => 'Précédent',
        'next_text' => 'Suivant',
    ));*/

    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%/',
        'current' => max(1, get_query_var('paged')),
        'show_all' => false,
        'end_size' => 1,
        'mid_size' => 2,
        'prev_next' => true,
        'prev_text' => __('Previous', 'test'),
        'next_text' => __('Next', 'test'),
        'class' => '',
    ));
    ?></div>