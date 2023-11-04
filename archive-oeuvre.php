<?php

/* Afficher la page d'archive des oeuvres */

get_header(); ?>

<div class="p28-container">
    <div class="p28-archive-banner p28-bg-fceeca">
        <h1 class="p28-h1 p28-txt-15071d p28-txtcenter">&OElig;uvres cinématographiques réalisées par des femmes</h1>
        <p class="p28-txt-15071d p28-txtcenter">
            Découvrez notre sélection de films et séries réalisées par des femmes.
        </p>
        <?php get_template_part('template-parts/search-form'); ?>
    </div>
    <div class="p28-catalogue">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>



                <div class="p28-catalogue-item"><a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url(get_field('affiche')['url']); ?>" class="p28-catalogue-img" />
                    </a>
                </div>


        <?php endwhile;
        endif; ?>
    </div><?php the_posts_pagination(); ?>
</div>
<?php get_footer(); ?>