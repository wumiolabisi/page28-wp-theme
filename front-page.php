<?php

/* Afficher la page d'acceuil du site */

get_header(); ?>


<div class="p28-container">


    <?php

    if (have_posts()) : while (have_posts()) : the_post();


            $args  = array(
                'post_type'           => 'oeuvre',
                'posts_per_page'      => 2,
                'orderby'             => 'date',
                'order'               => 'DESC',
                'meta_key'            => 'sticky_custom_post',
                'meta_value'          => 1,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();


                    if ($query->current_post == 0) : ?>
                        <div class="p28-pinnedpost p28-bg-15071d">
                            <div class="p28-pinnedpost-left p28-pad2025">
                                <h1 class="p28-txt-cbbdff p28-h1"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                                <div class="p28-bannerexcerpt p28-txt-cbbdff"><?php the_excerpt(); ?></div>
                                <a href="<?php the_permalink(); ?>" class="p28-btn p28-btn-primary">VOIR LA FICHE</a>

                            </div>
                            <div class="p28-flexrowend p28-angled-right p28-bg-15071d">
                                <div class="p28-bar p28-bg-fec32e"></div>
                                <div class="p28-bar p28-bg-cbbdff"></div>
                            </div>
                            <div class="p28-pinnedpost-right">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'p28-imgfull']); ?></a>
                            </div>
                        </div>
            <?php elseif ($query->current_post == 1) :

                        $p28_sticky_post = array(
                            'p28_permalink' => get_the_permalink(),
                            'p28_excerpt'   => get_the_excerpt(),
                            'p28_title'     => get_the_title(),
                            'p28_thumbnail' => get_the_post_thumbnail(get_the_ID(), 'post-thumbnail', ['class' => 'p28-imgfull']),
                        );

                    endif;
                endwhile;
            endif;

            wp_reset_postdata();
            ?>
            <!-- BLOC SEO -->
            <div class="p28-txtbloc p28-txtcenter">
                <h2 class="p28-h2 p28-txt-cbbdff">
                    Découvrez notre sélection de films 100% réalisés par des femmes
                </h2>
                <p class="p28-txt-cbbdff">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
            </div>

            <!-- DIV DEBUT CATALOGUE-->
            <div class="p28-catalogue">
                <?php $args  = array(
                    'post_type'           => 'oeuvre',
                    'posts_per_page'      => 8,
                    'orderby'             => 'date',
                    'order'               => 'DESC',
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                ?>
                        <div class="p28-catalogue-item"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(get_field('affiche')['url']); ?>" class="p28-catalogue-img" /></a></div>
                <?php endwhile;
                endif;
                wp_reset_postdata(); ?>
                <div class="p28-alginselfcenter"><a href="<?php echo get_post_type_archive_link('oeuvre'); ?>" class="p28-btn p28-btn-primary">VOIR LA SÉLECTION</a></div>
            </div>

            <!-- DIV ZOOM REAL -->

            <?php
            $p28_taxonomy;
            $check_sticky_taxonomy;
            $taxonomy_thumbnail;
            $p28_taxonomies = get_taxonomies(array(
                '_builtin' => false
            ));
            /* 
                * S'il existe des taxonomies personnalisée alors on fait une recherche
                * Dans chaque taxonomie existante, on va chercher les terms
                * Si on trouve le champ personnalisé ACF et qu'il vaut 1, alors on arrête la boucle 
                * et la taxonomie est trouvée
                */
            if ($p28_taxonomies) :
                foreach ($p28_taxonomies as $taxonomy) :
                    $p28_search_terms = get_terms($taxonomy);
                    $check_sticky_taxonomy = get_field('sticky_taxonomy', $taxonomy . '_' . $p28_search_terms[0]->term_id);
                    $taxonomy_thumbnail = get_field('taxonomy_thumbnail', $taxonomy . '_' . $p28_search_terms[0]->term_id);

                    if ($check_sticky_taxonomy == 1) :
                        $p28_taxonomy = $taxonomy;
                        break;
                    endif;


                endforeach;
            endif;
            $terms = get_terms($p28_taxonomy);
            $args = array(
                'post_type'     => 'oeuvre',
                'post_status'   => 'publish',
                'post_per_page' => 3,
                'tax_query'     => array(
                    array(
                        'taxonomy' => $p28_taxonomy,
                        'field' => 'term_id',
                        'terms' => $terms[0]->term_id,
                    )
                )
            );

            $query = new WP_Query($args);


            ?>
            <div class="p28-focusreal" style="background-image: url(<?php echo esc_url($taxonomy_thumbnail['url']); ?>);">
                <h2 class="p28-h2 p28-txt-15071d">
                    Focus sur <?php echo $terms[0]->name; ?>
                </h2>

                <div class="p28-focusreal-item p28-bg-15071d">

                    <p class="p28-txt-cbbdff"><?php echo $terms[0]->description; ?></p>
                    <div class="p28-filmsreal">
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="p28-filmsreal-item"><img src="<?php echo esc_url(get_field('affiche')['url']); ?>" class="p28-catalogue-img" alt="affiche du film : <?php the_title(); ?>" />
                                    <div class="p28-mar-20 p28-txtcenter"><a href="<?php the_permalink(); ?>" class="p28-btn p28-btn-primary"><?php the_title(); ?></a></div>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>

                    <?php wp_reset_postdata(); ?>
                </div>

            </div>
            <!-- SECOND STICKY POST -->

            <div class="p28-secondpinnedpost p28-bg-15071d">
                <div class="p28-pinnedpost-right">
                    <a href="<?php echo $p28_sticky_post['p28_permalink']; ?>" title="<?php echo $p28_sticky_post['p28_title']; ?>"><?php echo $p28_sticky_post['p28_thumbnail']; ?></a>
                </div>
                <div class="p28-flexrowstart p28-angled-left p28-bg-15071d">
                    <div class="p28-bar p28-bg-fec32e"></div>
                    <div class="p28-bar p28-bg-29ade6"></div>
                </div>
                <div class="p28-pinnedpost-left p28-pad2520">
                    <h2 class="p28-txt-fec32e p28-h1"><a href="<?php echo $p28_sticky_post['p28_permalink']; ?>" title="<?php echo $p28_sticky_post['p28_title']; ?>"><?php echo $p28_sticky_post['p28_title']; ?></a></h2>
                    <div class="p28-bannerexcerpt p28-txt-fec32e"><?php echo $p28_sticky_post['p28_excerpt']; ?></div>
                    <a href="<?php echo $p28_sticky_post['p28_permalink']; ?>" class="p28-btn p28-btn-primary-fec32e">VOIR LA FICHE</a>

                </div>


            </div>

            <!-- BLOC SEO -->
            <div class="p28-txtbloc p28-txtcenter">
                <h2 class="p28-h2 p28-txt-fec32e">
                    Découvrez notre sélection de films 100% réalisés par des femmes
                </h2>
                <p class="p28-txt-fec32e">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>

            </div>


    <?php endwhile;
    endif; ?>
</div>
<?php get_footer(); ?>