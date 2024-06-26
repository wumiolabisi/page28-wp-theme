<?php

/* Afficher la page d'acceuil du site */

get_header(); ?>



<div class="p28-main p28-bg-voile p28-bg-2024">
    <div class="p28-container">
        <div class="p28-row p28-justify-center">
            <div class="p28-col p28-500w margin-2side">
                <h1 class="p28-text-center">Les réalisatrices à l’honneur dans un catalogue de films et séries dédié à leurs &oelig;vres</h1>
                <p class="p28-text-center">Explorez des récits vibrants, des perspectives uniques et des réalisations cinématographiques saisissantes, toutes portées par le talent et la vision des femmes derrière la caméra.</p>
                <div class="margin-0-auto">
                    <a href="<?php echo get_post_type_archive_link('oeuvre'); ?>" class="p28-btn-primary" target="_blank" alt="Aller au catalogue">EXPLORER LE CATALOGUE</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="p28-main">
    <div class="p28-container">
        <h2 class="p28-h2">Découvrez les derniers ajouts au catalogue</h2>
        <div class="p28-row p28-justify-center">
            <div class="p28-col">
                <div class="p28-grid">
                    <?php
                    $i = 1;
                    $args  = array(
                        'post_type'           => 'oeuvre',
                        'posts_per_page'      => 5,
                        'orderby'             => 'date',
                        'order'               => 'DESC',


                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>


                            <div class="p28-grid-item" id="p28-grid-item-<?php echo $i; ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);background-size:cover;background-position:center;background-repeat:no-repeat">
                                <div class="p28-grid-item-content">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="hide-from-md"><?php the_title(); ?></h3>
                                        <p class="hide-from-md">Réalisatrice : <?php echo get_the_terms($post->ID, 'realisation')[0]->name; ?></p>
                                        <p class="p28-small-text hide-from-md"><?php echo  wp_trim_words(get_the_excerpt(), 20); ?></p>
                                    </a>
                                </div>
                            </div>

                    <?php $i++;
                        endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>


    <div class="p28-container">
        <div class="p28-row p28-justify-center">
            <div class="p28-col p28-500w">
                <h2 class="p28-text-center">Explorez un catalogue de films variés, allant du documentaire à la fiction</h2>
                <p class="p28-text-center">Découvrez des films et séries engagés, tout ça dans le catalogue Page 28 ! Conçu pour les cinéphiles en herbes ou expérimentés, vous retrouverez dans ce catalogue libre d'accès plus de 100 &oelig;uvres réalisées ou co-réalisées par des femmes.</p>
                <div class="margin-0-auto">
                    <a href="<?php echo get_post_type_archive_link('oeuvre'); ?>" class="p28-btn-primary" target="_blank" alt="Aller au catalogue">TROUVER VOTRE FILM POUR CE SOIR</a>
                </div>
            </div>
        </div>
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
        'posts_per_page' => 2,
        'post_limits'   => 2,
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
    <div id="p28-realisatrice-coeur" class="p28-container" style="background-image: url(<?php echo esc_url($taxonomy_thumbnail['url']); ?>);background-position:50% 50%;background-size:cover;background-repeat:no-repeat">
        <div class="p28-row p28-space-between">
            <div class="p28-col">
                <div class="p28-tag">
                    <div class="p28-heart28">
                        <span>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/heart.png" alt="Icône qui représente un coeur" class="width-30">
                        </span><span>Réalisatrice c&oelig;ur c&oelig;ur</span>
                    </div>
                </div>
            </div>
            <div class="p28-col p28-align-self-end p28-40pc">
                <h3 class="p28-big-text p28-text-light"><?php echo $terms[0]->name; ?></h3>
                <div>
                    <a href="<?php echo get_post_type_archive_link('oeuvre'); ?>" class="p28-btn-secondary" target="_blank" alt="Aller au catalogue">VOIR SES &OElig;UVRES</a>
                </div>
            </div>
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

                    <div class="p28-col">
                        <a class="p28-180x250" href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                            <img src="<?php echo esc_url(get_field('affiche')['url']); ?>" class="p28-thumbnail" alt="affiche du film : <?php the_title(); ?>" />
                        </a>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>


    <!-- DIV CATALOGUE ETIQUETTE -->
    <div class="p28-container">
        <h2 class="p28-h2">Les films et séries pour les <em>badass</em></h2>
        <div class="p28-row p28-justify-center">
            <div class="p28-col">
                <div class="p28-grid-4">

                    <?php $args  = array(
                        'post_type'           => 'oeuvre',
                        'posts_per_page'      => 4,
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

                            <div class="p28-grid-item" id="p28-grid-tag-item-<?php echo $i; ?>">
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
    </div>

    <div class="p28-container">
        <div class="p28-row p28-justify-center">
            <div class="p28-col p28-500w">
                <h2 class="p28-text-center">Un catalogue collaboratif et acessible</h2>
                <p class="p28-text-center">Parce que chaque film est une invitation au dialogue, à la réflexion et à l'empathie, Page 28 souhaite vous proposer un catalogue simple d'utilisation et collaboratif.</p>
            </div>
        </div>

        <div class="p28-row p28-justify-center">
            <div class="p28-col">
                <div class="p28-masque-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/9165800_movie_clapper_film_icon.png" class="width-50" />
                </div>
                <p class="p28-text-center">Une sélection de films et séries internationaux réalisés ou co-réalisés par des femmes.</p>
            </div>
            <div class="p28-col">
                <div class="p28-masque-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/9165687_bulb_light_icon.png" class="width-50" />
                </div>
                <p class="p28-text-center">Des dossiers de presse vulgarisés pour rendre la compréhension de l'&oelig;uvre accessible à tous·tes.</p>
            </div>
            <div class="p28-col">
                <div class="p28-masque-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/doodle_magnifier_magnifying.png" class="width-50" />
                </div>
                <p class="p28-text-center">Un catalogue simple d'utilisation pour que vous trouviez votre prochain film à regarder.</p>
            </div>
        </div>
    </div>
</div>
<div class="p28-main p28-bg-voile p28-bg-image">
    <div class="p28-container">
        <div class="p28-row p28-justify-start p28-align-items-center">
            <div class="p28-col p28-500w p28-margin">
                <p class="p28-h1">Besoin d'aide pour utiliser le catalogue ? Envie de proposer un film ou une série réalisé par une femme ?</p>

            </div>
            <div class="p28-col">
                <div class="margin-0-auto">
                    <a href="<?php echo get_post_type_archive_link('oeuvre'); ?>" class="p28-btn-primary" target="_blank" alt="Aller au catalogue">CONTACTEZ-NOUS</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="spacer"></div>
<?php get_footer(); ?>