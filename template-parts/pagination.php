<div class="p28-pagination">
    <?php
    echo paginate_links(array(
        'base' => str_replace(9999999999, '%#%', esc_url(get_pagenum_link(9999999999))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
    ?></div>