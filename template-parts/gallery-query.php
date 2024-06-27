<div class="p28-row p28-justify-center">
    <div class="p28-col">
        <div class="p28-grid-4">

            <?php
            $args_to_pass = array();
            if ($args['p28_tax_query']) :
                $args_tax = array(
                    'taxonomy' => $args['p28_tax_query'][0]['p28_taxonomy'],
                    'field' => $args['p28_tax_query'][0]['p28_field'],
                    'terms' => $args['p28_tax_query'][0]['p28_terms'],

                );
                $args_to_pass['tax_query'] = $args_tax;
            endif;


            $order = array_merge($args_to_pass, array(
                'post_type'           => $args['p28_post_type'],
                'posts_per_page'      => $args['p28_posts_per_page'],
                'orderby'             => $args['p28_orderby'],
                'order'               => 'DESC'
            ));

            $query = new WP_Query($order);

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

            ?>

                    <div class="p28-grid-item" id="p28-grid-tag-item-<?php echo the_ID(); ?>">
                        <div class="p28-grid-item-content">
                            <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo esc_url(get_field('affiche')['url']); ?>" class="p28-thumbnail" alt="affiche du film : <?php the_title(); ?>" />
                            </a>
                        </div>
                    </div>
            <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>