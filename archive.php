<?php

/* Afficher la page d'archive par défaut :
*  valable pour toute taxonomie, categorie, tag, etc.
*  qui n'a pas de page dédiée.
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
    <div class="p28-archive-banner p28-bg-15071d">
        <img class="p28-bannerbg-img" src="<?php echo $taxonomy_thumbnail; ?>" alt="">
        <div class="p28-bannerbg-item">
            <h1 class="p28-h1 p28-txt-cbbdff p28-txtcenter"><?php wp_title(''); ?></h1>
            <?php if ($taxonomy_excerpt) : ?>
                <div class="p28-txt-cbbdff p28-txtcenter"><?php echo $taxonomy_excerpt; ?></div>
            <?php endif; ?>
        </div>
    </div>
    <div class=" p28-catalogue">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>



                <div class="p28-catalogue-item"><a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url(get_field('affiche')['url']); ?>" class="p28-catalogue-img" />
                    </a>
                </div>


            <?php endwhile;
        else : ?><p class="p28-txt-cbbdff p28-txtcenter">Il n'y a pas encore d'&oelig;uvres référencées pour ce genre.</p><?php
                                                                                                                        endif; ?>
    </div>
</div><?php the_posts_pagination(); ?>
<?php get_footer(); ?>