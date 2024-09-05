<div class="p28-row p28-justify-center">
    <div class="p28-col">
        <div class="p28-grid-5">

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

                    <?php get_template_part('template-parts/gallery'); ?>

            <?php endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>