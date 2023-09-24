<?php

/* Afficher la page d'acceuil du site */

get_header(); ?>


<div class="p28-container">
    <?php
    $args  = array(
        'post_type'           => 'oeuvres',
        'posts_per_page'      => 1
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>



            <div class="p28-pinnedpost p28-bg-15071d">
                <div class="p28-pinnedpost-left">
                    <h1 class="p28-txt-cbbdff"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                    <div class="p28-bannerexcerpt p28-txt-cbbdff"><?php the_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>" class="p28-btn p28-btn-primary">VOIR LA FICHE</a></span>

                </div>
                <div class="p28-flexrowend p28-angled-right p28-bg-15071d">
                    <div class="p28-bar p28-bg-fec32e"></div>
                    <div class="p28-bar p28-bg-cbbdff"></div>
                </div>
                <div class="p28-pinnedpost-right">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'p28-imgfull']); ?></a>
                </div>
            </div>







    <?php
        endwhile;
    endif;

    wp_reset_postdata();
    ?>
</div>
<?php get_footer(); ?>