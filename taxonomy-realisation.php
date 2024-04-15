<?php

/* Afficher la page d'archive de la taxonomie REALISATION :
*/

get_header(); ?>
<?php
$taxonomy_thumbnail = get_field('taxonomy_thumbnail', get_queried_object());
$taxonomy_excerpt = term_description(get_queried_object()->term_id, get_queried_object()->name);

if ($taxonomy_thumbnail) : $taxonomy_thumbnail = esc_url($taxonomy_thumbnail['url']);
else : $taxonomy_thumbnail = get_template_directory_uri() . '/img/placeholder-banner-archive.jpg';
endif;
?>
<div class="p28-container">

    <div class="p28-block p28-flexrowcenter">
        <div class="p28-flexrowcenter-item">
            <img class="p28-img-100pc-300" alt="Pohto de <?php echo get_queried_object()->name ?>" src="<?php echo $taxonomy_thumbnail; ?>" alt="">
        </div>
        <div class="p28-flexrowcenter-item">
            <h1 class="p28-h1 p28-txt-15071d p28-txtjustify-left"><?php echo get_queried_object()->name ?></h1>
            <?php if ($taxonomy_excerpt) : ?>
                <div class="p28-txt-15071d p28-txtjustify-left"><?php echo $taxonomy_excerpt; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <h2 class=" p28-txtcenter">Découvrez toutes les &oelig;uvres réalisées ou co-réalisées par <?php echo get_queried_object()->name ?></h2>

    <div class="p28-catalogue">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>



                <div class="p28-catalogue-item"><a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url(get_field('affiche')['url']); ?>" class="p28-catalogue-img" />
                    </a>
                </div>


            <?php endwhile;
        else : ?><p class="p28-txt-15071d p28-txtcenter">Il n'y a pas encore d'&oelig;uvres référencées pour cette .</p><?php
                                                                                                                    endif; ?>
    </div>
</div><?php the_posts_pagination(); ?>
<?php get_footer(); ?>