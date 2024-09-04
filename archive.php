<?php
/* Afficher la page d'archive des oeuvres */
get_header(); ?>

<div class="p28-main">
    <div class="p28-container">
        <div class="p28-row p28-justify-center">
            <div class="p28-col">
                <h1 class="p28-text-center">Parcourez toutes les oeuvres correspondant au <?php the_archive_title(); ?></h1>
            </div>
        </div>

        <div class="p28-row p28-justify-center">
            <div class="p28-col p28-filter-msg"></div>
        </div>
        <div class="p28-row p28-justify-center p28-margin p28-gap-row">
            <div class="p28-col">
                <div class="p28-grid-4 p28-search-result" id="p28-load-more-results">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


                            <?php get_template_part('template-parts/gallery'); ?>


                    <?php endwhile;

                    endif; ?>
                </div>


            </div>
            <?php wp_reset_postdata(); ?>
        </div>

        <div class="p28-row p28-justify-center p28-margin">
            <div class="p28-col ">
                <?php get_template_part('template-parts/pagination'); ?>

                <?php //if ($wp_query->max_num_pages > 1) : 
                ?>
                <!-- <div class="p28-btn-primary" id="p28-load-more">
                        CHARGER PLUS
                    </div>-->
                <?php //endif; 
                ?>
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