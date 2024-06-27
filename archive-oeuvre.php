<?php



/* Afficher la page d'archive des oeuvres */



get_header(); ?>

<div class="p28-main">
    <div class="p28-container">
        <div class="p28-row p28-justify-center">
            <div class="p28-col">
                <h1 class="p28-text-center">Trouvez votre film pour ce soir dans notre catalogue d'&oelig;uvres cinématographiques</h1>
                <p class="p28-text-center p28-small-text">Vous pouvez trier les films et séries du catalogue par format, genre, pays de la réalisatrice ou encore par date.</p>
            </div>
        </div>
        <div class="p28-row p28-justify-center">
            <div class="p28-col width-100pc ">
                <?php get_template_part('template-parts/search-form'); ?>
            </div>
        </div>
        <div class="p28-row p28-justify-center p28-margin">
            <div class="p28-col p28-search-result">
                <div class="p28-grid-4 ">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


                            <div class="p28-grid-item" id="p28-grid-tag-item-<?php the_ID(); ?>">
                                <div class="p28-grid-item-content">
                                    <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
                                        <img src="<?php echo esc_url(get_field('affiche')['url']); ?>" class="p28-thumbnail" alt="affiche du film : <?php the_title(); ?>" />
                                    </a>
                                </div>
                            </div>




                    <?php endwhile;

                    endif; ?>

                </div>
                <?php the_posts_pagination(); ?>
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