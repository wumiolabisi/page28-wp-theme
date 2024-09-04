<?php
/* Afficher la page des realisatrices enregistrées */
get_header(); ?>

<div class="p28-main">
    <div class="p28-container">
        <div class="p28-row p28-justify-center">
            <div class="p28-col">
                <h1 class="p28-text-center">Réalisatrices - Catalogue des professionnelles du cinéma</h1>
                <p class="p28-text-center p28-small-text">Découvrez toutes les réalisatrices référencées dans notre catalogue</p>
            </div>
        </div>

        <div class="p28-row p28-justify-center">
            <div class="p28-col p28-filter-msg"></div>
        </div>
        <div class="p28-row p28-justify-center p28-margin p28-gap-row">
            <div class="p28-col">
                <div class="p28-grid-4 p28-search-result" id="p28-load-more-results">
                    <?php
                    $taxonomy = 'realisation';
                    $terms = get_terms([
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false,
                    ]);



                    foreach ($terms as $realisatrice) : ?>
                        <?php

                        $director_thumbnail;
                        if (!empty(get_field('taxonomy_thumbnail', $taxonomy . '_' . $realisatrice->term_id)['url'])) {
                            $director_thumbnail = get_field('taxonomy_thumbnail', $taxonomy . '_' . $realisatrice->term_id)['url'];
                        } else {
                            $director_thumbnail = get_template_directory_uri() . '/img/pexels-alinevianafoto-3491697.jpg';;
                        } ?>
                        <div class="p28-grid-item" id="p28-grid-tag-item-<?php echo $realisatrice->term_id; ?>">
                            <div class="p28-grid-item-content">
                                <a href="<?php echo get_term_link($realisatrice); ?>" alt="<?php echo $realisatrice->name; ?>" title="<?php echo $realisatrice->name; ?>">
                                    <img src="<?php echo esc_url($director_thumbnail); ?>" class="p28-thumbnail" alt="Découvrez les oeuvres de la réalisatrice <?php echo $realisatrice->name; ?>" />
                                </a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>


            </div>
        </div>


    </div>
</div>
<?php
$args_banner = array(
    'p28_text' => 'Besoin d&apos;aide pour utiliser le catalogue ? Envie de proposer un film ou une série réalisé par une femme ?',
    'p28_button_text' => 'NOUS CONTACTER',
    'p28_button_link' => ''
);
get_template_part('template-parts/banner', null, $args_banner); ?>
<?php get_footer(); ?>