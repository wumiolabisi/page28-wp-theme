<?php

/* Afficher la page d'acceuil du site */

get_header(); ?>



<div class="p28-main p28-bg-2024">
    <div class="p28-container">
        <div class="p28-row p28-justify-center">
            <div class="p28-col p28-500w margin-2side">
                <h1 class="p28-text-center">Les réalisatrices à l’honneur dans un catalogue de films et séries dédiées à leurs &oelig;vres</h1>
                <p class="p28-text-center">Explorez des récits vibrants, des perspectives uniques et des réalisations cinématographiques saisissantes, toutes portées par le talent et la vision des femmes derrière la caméra.</p>
                <div class="margin-0-auto">
                    <a class="p28-btn-primary" target="_blank" alt="Aller au catalogue">EXPLORER LE CATALOGUE</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="p28-container">

    <div class="p28-secondpinnedpost p28-slidercontent p28-bg-15071d p28-block-rounded">
        <div class="p28-pinnedpost-right">
            <div class="slider">

                <?php
                $i = 1;
                $args  = array(
                    'post_type'           => 'oeuvre',
                    'posts_per_page'      => 4,
                    'orderby'             => 'date',
                    'order'               => 'DESC',


                );
                $query = new WP_Query($args);

                if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>


                        <div class="slide" id="p28-img<?php echo $i; ?>">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'p28-slide-img']); ?></a>

                        </div>

                <?php $i++;
                    endwhile;
                endif;
                wp_reset_postdata(); ?>

            </div>

        </div>
        <div class="p28-flexrowstart p28-angled-left p28-bg-15071d" style="z-index: 5;">
            <div class="p28-bar p28-bg-fec32e"></div>
            <div class="p28-bar p28-bg-29ade6"></div>
        </div>
        <div class="p28-pinnedpost-left">
            <div class="p28-logoanim">
                <h1 class="p28-txt-fceeca">Page 28 met les réalisatrices à l'honneur !</h1>
            </div>
            <p class="p28-txt-fceeca p28-h1accroche p28-txtjustify-left">Explorez des récits vibrants, des perspectives uniques et des réalisations cinématographiques saisissantes,
                toutes portées par le talent et la vision des femmes derrière la caméra.</p>
            <a href="<?php echo get_post_type_archive_link('oeuvre'); ?>" title="Catalogue de films" class="p28-btn p28-btn-primary">EXPLORER LE CATALOGUE</a>

        </div>


    </div>

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
                        <div class="p28-pinnedpost p28-bg-fceeca">
                            <div class="p28-pinnedpost-left p28-pad2025">
                                <h2 class="p28-txt-15071d"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Ce mois-ci, nous souhaitons vous faire découvrir <em><?php the_title(); ?></em></a></h2>
                                <div class="p28-bannerexcerpt p28-txt-15071d p28-txtjustify-left"><?php the_excerpt(); ?></div>
                                <a href="<?php the_permalink(); ?>" class="p28-btn p28-btn-primary">Découvrez l'&oelig;uvre</a>

                            </div>
                            <div class="p28-flexrowend p28-angled-right p28-bg-fceeca">
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
            <div class="p28-txtbloc p28-txtjustify-center">
                <h2 class="p28-h2 p28-txt-15071d">
                    Découvrez notre sélection de films d'action réalisés par des femmes
                </h2>
                <p class="p28-txt-15071d">Découvrez un univers cinématographique engagé sur notre site de <strong>catalogue de films et séries</strong>.
                    Conçu pour les cinéphiles en quête de diversité et d'inclusivité, vous trouverez sur le catalogue Page 28 un choix de plus de 100 œuvres réalisées ou co-réalisées par des femmes.
                    Explorez notre <strong>catalogue de films variés</strong>, allant du documentaire à la fiction, en passant par des genres et formats uniques !
                </p>

            </div>

            <!-- DIV DEBUT CATALOGUE-->
            <div class="p28-catalogue">
                <?php $args  = array(
                    'post_type'           => 'oeuvre',
                    'posts_per_page'      => 8,
                    'orderby'             => 'date',
                    'order'               => 'DESC',
                    'tax_query'           => array(
                        array(
                            'taxonomy'    => 'genre',
                            'field'       => 'slug',
                            'terms'       => 'action'
                        )
                    )
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
                'posts_per_page' => 3,
                'post_limits'   => 3,
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

                <div class="p28-focusreal-item p28-bg-fceeca">

                    <p class="p28-txt-15071d p28-txtjustify-left"><?php echo $terms[0]->description; ?></p>
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

            <div class="p28-secondpinnedpost p28-bg-fceeca">
                <div class="p28-pinnedpost-right">
                    <a href="<?php echo $p28_sticky_post['p28_permalink']; ?>" title="<?php echo $p28_sticky_post['p28_title']; ?>"><?php echo $p28_sticky_post['p28_thumbnail']; ?></a>
                </div>
                <div class="p28-flexrowstart p28-angled-left p28-bg-fceeca">
                    <div class="p28-bar p28-bg-fec32e"></div>
                    <div class="p28-bar p28-bg-29ade6"></div>
                </div>
                <div class="p28-pinnedpost-left p28-pad2520">
                    <h2 class="p28-txt-15071d"><a href="<?php echo $p28_sticky_post['p28_permalink']; ?>" title="<?php echo $p28_sticky_post['p28_title']; ?>"><?php echo $p28_sticky_post['p28_title']; ?></a></h2>
                    <div class="p28-bannerexcerpt p28-txt-15071d p28-txtjustify-left"><?php echo $p28_sticky_post['p28_excerpt']; ?></div>
                    <a href="<?php echo $p28_sticky_post['p28_permalink']; ?>" class="p28-btn p28-btn-primary">L'&oelig;uvre en détail</a>

                </div>


            </div>

            <!-- BLOC SEO -->
            <div class="p28-txtbloc p28-txtjustify-center">
                <h2 class="p28-h2 p28-txt-15071d">
                    Notre objectif : créer un catalogue de films et série riche et accessible à tous·tes !
                </h2>
                <p class="p28-txt-15071d">Parce que chaque film est une invitation au dialogue, à la réflexion et à l'empathie, nous mettons un point d'honneur à créer un catalogue
                    cinématographique simple d'utilisation et collaboratif.</p>
                <p class="p28-txt-15071d">Page28.fr est en cours de développement, nous implémenterons bientôt des options pour que vous puissiez créer des listes personnalisées,
                    donner votre avis dans la zone de commentaires et découvrir de nouvelles pépites grâce à la fonctionnalité "Un film au hasard" !</p>

            </div>


    <?php endwhile;
    endif; ?>
</div>
<?php get_footer(); ?>