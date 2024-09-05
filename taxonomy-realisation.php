<?php
/* 
 * Afficher la page type d'un terme de la taxonomie REALISATION :
 */

get_header(); ?>

<?php

$taxonomy_thumbnail = get_field('taxonomy_thumbnail', get_queried_object());
$taxonomy_excerpt = term_description(get_queried_object()->term_id, get_queried_object()->name);

if ($taxonomy_thumbnail) : $taxonomy_thumbnail = esc_url($taxonomy_thumbnail['url']);
else : $taxonomy_thumbnail = get_template_directory_uri() . '/img/placeholder-banner-archive.jpg';
endif;

?>
<div class="p28-main">
    <div class="p28-container">
        <div class="p28-row p28-justify-center p28-gap-row p28-margin">
            <div class="p28-col p28-fr1">
                <h1 class="p28-h2 p28-text-center-md"><span class="p28-font-p1">Films et séries réalisés par</span><br>
                    <span class="p28-font-p2"><a href="#p28-real"><?php echo get_queried_object()->name ?></a></span>
                </h1>
                <div class="p28-grid-4 p28-search-result">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php get_template_part('template-parts/gallery'); ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p class="p28-text-center">Oups ! Il n'y a pas encore d'&oelig;uvres référencées pour <?php echo get_queried_object()->name ?>.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="p28-col p28-fr2" id="p28-real">
                <h2 class="p28-text-center-md display-until-md">Quelques mots concernant <?php echo get_queried_object()->name ?></h2>
                <img class="p28-img-real" alt="Photo de <?php echo get_queried_object()->name ?>" src="<?php echo $taxonomy_thumbnail; ?>" alt="">
                <?php if ($taxonomy_excerpt) : ?>

                    <div class="p28-text-center-md p28-small-text"><?php echo $taxonomy_excerpt; ?></div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>