<?php

/* Afficher une fiche oeuvre type.
*/

get_header();
$post_genre = array();
$post_realisateurice = array();
$post_scenariste = array();
$post_producteurice = array();

?>

<div class="p28-container">


    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
            if (get_field('date_de_sortie')) : $date_sortie = get_field('date_de_sortie');
            endif;
            /* POUR RECUPERER LES INFOS DE LA FICHE OEUVRE :
            *  Il faut d'abord récupérer les taxonomies du post avec get_post_taxonomies()
            *  Il faut ensuite récupérer les terms de chaque taxonomie avec wp_get_post_terms()
            */
            $p28_post_taxonomies = get_post_taxonomies($post->ID);
            $p28_terms  = wp_get_post_terms($post->ID, $p28_post_taxonomies);

            /*
            *  Pour récupérer les infos dans les variables qu'on a créé
            *  On boucle sur les terms et on vérifie si le term correspond à ce qu'on recherche
            *  On range chaque term dans le tableau associé
            */

            foreach ($p28_terms as $terms) :
                $current_taxonomy = $terms->taxonomy;
                $current_name = $terms->name;

                if ($current_taxonomy == 'scenario') : array_push($post_scenariste, '<a class="p28-link" href="' . get_term_link($terms) . '" title="Voir plus de ' . $current_name . '">' . $current_name . '</a>');
                elseif ($current_taxonomy == 'realisation') : array_push($post_realisateurice, '<a class="p28-link" href="' . get_term_link($terms) . '" title="Voir plus de ' . $current_name . '">' . $current_name . '</a>');
                elseif ($current_taxonomy == 'genre') : array_push($post_genre, '<a class="p28-link" href="' . get_term_link($terms) . '" title="Voir plus de ' . $current_name . '">' . $current_name . '</a>');
                elseif ($current_taxonomy == 'production') : array_push($post_producteurice, '<a class="p28-link" href="' . get_term_link($terms) . '" title="Voir plus de ' . $current_name . '">' . $current_name . '</a>');
                endif;


            endforeach;

            ?>
            <div class="p28-archive-banner p28-bg-15071d">

                <?php the_post_thumbnail('post-thumbnail', ['class' => 'p28-bannerbg-img']); ?>
                <div class="p28-bannerbg-item">
                    <h1 class="p28-h1 p28-txt-fceeca p28-txtcenter"><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <div class="p28-block">
                            <p class="p28-txt-fceeca p28-txtcenter"><?php echo get_the_excerpt(); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="p28-content">
                <p class="p28-smalltxt p28-txtcenter"><?php echo implode(", ", $post_genre); ?></p>
                <div class="p28-infos">
                    <div class="p28-infos-item p28-bg-d7ccff">
                        <p>DATE DE SORTIE :</p>
                        <p><?php echo $date_sortie; ?></p>
                    </div>
                    <div class="p28-infos-item p28-bg-b8d8e5">
                        <p>R&Eacute;ALISATRICE(S) :</p>
                        <p><?php echo implode(", ", $post_realisateurice); ?></p>
                    </div>
                    <div class="p28-infos-item p28-bg-3afc7e">
                        <p>SC&Eacute;NARISTE(S) :</p>
                        <p><?php echo implode(", ", $post_scenariste); ?></p>
                    </div>
                    <div class="p28-infos-item p28-bg-fec32e">
                        <p>PRODUCTRICE(S) :</h3>
                        <p><?php echo implode(", ", $post_producteurice); ?></p>
                    </div>
                </div>
                <div class="p28-txt-15071d p28-txtjustify-left"><?php the_content(); ?></div>
            </div>

    <?php
        endwhile;
    endif;

    ?>
    <div class="p28-block">
        <h2 class="p28-txt-15071d p28-h2 p28-txtcenter">Découvrez les avis des internautes sur cette &oelig;uvre</h2>
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template('/comments.php');
        endif; ?>
    </div>
    <div class="p28-comments">

        <?php

        comment_form(); ?>
    </div>
</div>
</div>
<?php get_footer(); ?>